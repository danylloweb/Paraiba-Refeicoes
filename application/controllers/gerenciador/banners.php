<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Banners extends CI_Controller {

    /**
     * @author Jobson Ribeiro
     */
    private $path_upload = 'public/uploads/banners/';

    public function __construct() {
        parent::__construct();
        $this->form_validation->set_message('required', '%s não pode ser vazio');
        $this->form_validation->set_message('valid_email', '%s não possui um email válido');
        $this->log_in->is_logged(array('administrador'));
        $this->load->model('gerenciador/banner');

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

        $config['base_url'] = base_url() . 'gerenciador/banners/';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->banner->total_banner();
        $config['per_page'] = 25;
        $config['cur_tag_open'] = '<span class="selected">';
        $config['cur_tag_close'] = '</span>';

        $this->pagination->initialize($config);

        $dados['msg'] = $this->session->flashdata('cad_ok');
        $dados['erro'] = $this->session->flashdata('cad_erro');

        $dados['banners'] = $this->banner->listar_banner(array(), $paginacao, $config['per_page'], 'ban_id', 'DESC');
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';
//        echo '1';exit;
        $this->render->view('gerenciador/banners/lista_banner', $dados);
    }

    public function add_banner() {

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //$this->form_validation->set_rules('ban_data', 'Titulo', 'required');
            //$this->form_validation->set_rules('ban_descricao', 'Descrição', 'required');
            
            /*if ($this->form_validation->run() == false) {

                $dados['erros'] = validation_errors('<li>', '</li>');
            } else {*/

                $dados_bd = $this->input->post();

                if (!$this->upload->do_upload('ban_imagem')) {

                    $dados['erros'] = $this->upload->display_errors();
                } else {

                    $file = $this->upload->data();
                    $dados_bd['ban_imagem'] = $file['file_name'];

                    if ($this->banner->inserir($dados_bd)) {
                        
                        $this->session->flashdata('cad_ok', 'Banner cadastrado com sucesso.');
                        redirect('gerenciador/banners');
                    } else {
                        unlink($this->path_upload . $file['file_name']);
                        $dados['erros'] = 'Não foi possível cadastrar no banco de dados.';
                    }
                }
            //}
        }
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador 2';

        $this->render->view('gerenciador/banners/add_banner', $dados);
    }

    public function editar_banner($id_banner) {

        $dados = array();
        $dados['banner'] = $this->banner->get_banner(array('ban_id' => $id_banner));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //$this->form_validation->set_rules('ban_data', 'Titulo', 'required');
            //$this->form_validation->set_rules('ban_descricao', 'Descrição', 'required');

            /*if ($this->form_validation->run() == false) {

                $dados['erros'] = validation_errors('<li>', '</li>');
            } else {*/

                $dados_bd = $this->input->post();

                if ($this->upload->do_upload('ban_imagem')) {

                    $file = $this->upload->data();
                    $file_antigo = $this->path_upload . $dados['banner']->ban_imagem;

                    $dados_bd['ban_imagem'] = $file['file_name'];
                }

                if ($this->banner->atualizar(array('ban_id' => $id_banner), $dados_bd) > 0) {
                    
                    if (isset($file_antigo)) {
                        if (file_exists($file_antigo))
                            unlink($file_antigo);
                    }

                    $this->session->set_flashdata('cad_ok', 'Banner atualizado com sucesso');
                    redirect('gerenciador/banners');
                } else {
					$dados['erros'] = 'Nenhuma alteração foi efetuada.';
				}	
            //}
        }

        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';
        
        $this->render->view('gerenciador/banners/edit_banner', $dados);
    }

    public function excluir_banner($id_banner) {

        if ($this->banner->delete(array('ban_id' => $id_banner)) > 0) {

            $this->session->set_flashdata('cad_ok', 'Banner excluido com sucesso');
        }

        redirect('gerenciador/banners');
    }

}