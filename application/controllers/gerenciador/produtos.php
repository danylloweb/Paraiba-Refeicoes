<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produtos extends CI_Controller {

    /**
     * @author Jobson Ribeiro
     */
    private $path_upload = 'public/uploads/produtos/';

    public function __construct() {
        parent::__construct();

        $this->form_validation->set_message('required', '%s não pode ser vazio');
        $this->form_validation->set_message('valid_email', '%s não possui um email válido');
        $this->log_in->is_logged(array('administrador'));
        $this->load->model('gerenciador/produto');
        $this->load->model('gerenciador/categoria');        
        $this->load->model('gerenciador/subcategoria');        

        $config['upload_path'] = $this->path_upload;
        $config['allowed_types'] = 'jpg|png|gif';
        $config['max_size'] = '1024';
        $config['remove_spaces'] = true;
        $config['encrypt_name'] = true;
        
        $this->upload->initialize($config);
    }

    public function index($pagina = false) {

        $dados = array();

        $paginacao = $pagina != false ? $pagina : 0;

        $config['base_url'] = base_url() . 'gerenciador/produtos/';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->produto->total_produto();
        $config['per_page'] = 25;
        $config['cur_tag_open'] = '<span class="selected">';
        $config['cur_tag_close'] = '</span>';

        $this->pagination->initialize($config);

        $dados['msg'] = $this->session->flashdata('cad_ok');
        $dados['erro'] = $this->session->flashdata('cad_erro');

        $dados['produtos'] = $this->produto->listar_produto(array(), $paginacao, $config['per_page'],'pro_id','DESC');
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/produtos/lista_produto', $dados);
    }
    
    public function busca_produto($pagina = false){

	$dados = array();
	
//        $paginacao = $pagina != false  ? $pagina : 0;
//        
//	
	$busca = $this->input->post('keyword');
//        $config['base_url'] = base_url().'index.php/gerenciador/produtos/';
//        $config['uri_segment'] = 3;
//        $config['total_rows'] = $this->produto->total_busca($busca);
//        $config['per_page'] = 300;
//        $config['cur_tag_open'] = '<span class="selected">';
//        $config['cur_tag_close'] = '</span>';
//	
//        $this->pagination->initialize($config); 
        
        $dados['msg'] = $this->session->flashdata('cad_ok');
        $dados['erro'] = $this->session->flashdata('cad_erro');
        
        $dados['produtos'] = $this->produto->buscar_produto($busca, 0, 300);
        $dados['titulo'] = $this->configs->get_titulo().' - Gerenciador';
        
        $this->render->view('gerenciador/produtos/lista_produto', $dados);

    }

    public function add_produto() {

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('pro_titulo', 'Titulo', 'required');
            $this->form_validation->set_rules('pro_prc_id', 'Categoria', 'required');

            if ($this->form_validation->run() == false) {

                $dados['erros'] = validation_errors('<li>', '</li>');
            } else {

                $dados_bd = $this->input->post();
                                
                if (!$this->upload->do_upload('pro_imagem')) {

                    $dados['erros'] = $this->upload->display_errors();
                } else {

                    $file = $this->upload->data();
                    $dados_bd['pro_imagem'] = $file['file_name'];

                    if ($this->produto->inserir($dados_bd)) {

                        $this->session->set_flashdata('cad_ok', 'Produto cadastrado com sucesso.');

                        redirect('gerenciador/produtos');
                    }

                    unlink($this->path_upload . $file['file_name']);
                    $dados['erros'] = 'Não foi possível cadastrar no banco de dados.';
                }
            }
        }
        $dados['categorias'] = $this->categoria->listar_categoria(array(), 0, 99999); 
        
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/produtos/add_produto', $dados);
    }

    public function editar_produto($id_produto) {

        $dados = array();
        $dados['produto'] = $this->produto->get_produto(array('pro_id' => $id_produto));
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('pro_titulo', 'Produto', 'required');
            $this->form_validation->set_rules('pro_prc_id', 'Categoria', 'required');
            $this->form_validation->set_rules('pro_descricao', 'Descrição', 'required');

            if ($this->form_validation->run() == false) {

                $dados['erros'] = validation_errors('<li>', '</li>');
            } else {

                $dados_bd = $this->input->post();

                
                if ($this->upload->do_upload('pro_imagem')) {

                    $file = $this->upload->data();
                    $file_antigo = $this->path_upload . $dados['produto']->pro_imagem;

                    $dados_bd['pro_imagem'] = $file['file_name'];
                }

                if ($this->produto->atualizar(array('pro_id' => $id_produto), $dados_bd) > 0 || isset($dados_bd['acompanhamentos'])) {

                    if (isset($file_antigo)) {
                        if (file_exists($file_antigo))
                            unlink($file_antigo);
                    }

                    $this->session->set_flashdata('cad_ok', 'Produto atualizado com sucesso');
                                        
                    redirect('gerenciador/produtos');
                }

                $dados['erros'] = 'Nenhuma alteração efetuada.';
            }
        }
        $dados['categorias'] = $this->categoria->listar_categoria(array(), 0, 99999);
        $dados['subcategorias'] = $this->subcategoria->listar_subcategoria(array('produto_subcategoria.prs_prc_id' => $dados['produto']->pro_prc_id), 0, 99999);
        
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/produtos/edit_produto', $dados);
    }

    public function excluir_produto($id_produto) {

        $produto = $this->produto->get_produto(array('pro_id' => $id_produto));
        if (count($produto) > 0) {
            if ($this->produto->delete(array('pro_id' => $id_produto), array('pei_pro_id' => $id_produto)) > 0) {

                if (file_exists($this->path_upload . $produto->pro_imagem))
                    unlink($this->path_upload . $produto->pro_imagem);

                $this->session->set_flashdata('cad_ok', 'Produto excluido com sucesso');
            }else {
                $this->session->set_flashdata('cad_erro', 'Produto não pode ser excluido, porque existe cotação com esse produto!');
            }
        }


        redirect('gerenciador/produtos');
    }

}