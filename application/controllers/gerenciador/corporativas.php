<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Corporativas extends CI_Controller {

    /**
     * @author Jobson Ribeiro
     */
    private $path_upload = 'public/uploads/corporativas/';

    public function __construct() {
        parent::__construct();
        $this->form_validation->set_message('required', '%s não pode ser vazio');
        $this->form_validation->set_message('valid_email', '%s não possui um email válido');
        $this->log_in->is_logged(array('administrador', 'funcionario'));
        $this->load->model('gerenciador/corporativa');
        $this->load->model('gerenciador/corporativa_categoria');

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

        $config['base_url'] = base_url() . 'gerenciador/corporativas/';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->corporativa->total_corporativa();
        $config['per_page'] = 25;
        $config['cur_tag_open'] = '<span class="selected">';
        $config['cur_tag_close'] = '</span>';

        $this->pagination->initialize($config);

        $dados['msg'] = $this->session->flashdata('cad_ok');
        $dados['erro'] = $this->session->flashdata('cad_erro');

        $dados['corporativas'] = $this->corporativa->listar_corporativa(array(), $paginacao, $config['per_page'], 'cor_nome', 'ASC');
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/corporativas/lista_corporativa', $dados);
    }

    public function add_corporativa() {

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dados_bd = $this->input->post();

            if (!$this->upload->do_upload('cor_imagem')) {

                $dados['erros'] = $this->upload->display_errors();
            } else {

                $file = $this->upload->data();
                $dados_bd['cor_imagem'] = $file['file_name'];

                if ($this->corporativa->inserir($dados_bd)) {

                    $this->session->flashdata('cad_ok', 'Corporativa cadastrado com sucesso.');
                    redirect('gerenciador/corporativas');
                } else {
                    $dados['erros'] = 'Não foi possível cadastrar no banco de dados.';
                }
            }
        }
        
        $dados['categorias'] = $this->corporativa_categoria->listar_corporativa_categoria(array(),0,99);

        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/corporativas/add_corporativa', $dados);
    }

    public function editar_corporativa($id_corporativa) {

        $dados = array();
        $dados['corporativa'] = $this->corporativa->get_corporativa(array('cor_id' => $id_corporativa));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dados_bd = $this->input->post();

            if ($this->upload->do_upload('cor_imagem')) {

                $file = $this->upload->data();
                $file_antigo = $this->path_upload . $dados['corporativa']->cor_imagem;

                $dados_bd['cor_imagem'] = $file['file_name'];
            }

            if ($this->corporativa->atualizar(array('cor_id' => $id_corporativa), $dados_bd) > 0) {

                if (isset($file_antigo)) {
                    if (file_exists($file_antigo))
                        unlink($file_antigo);
                }

                $this->session->set_flashdata('cad_ok', 'Corporativa atualizado com sucesso');
                redirect('gerenciador/corporativas');
            } else {
                $dados['erros'] = 'Nenhuma alteração foi efetuada.';
            }
        }
        
        $dados['categorias'] = $this->corporativa_categoria->listar_corporativa_categoria(array(),0,99);

        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/corporativas/edit_corporativa', $dados);
    }

    public function excluir_corporativa($id_corporativa) {

        if ($this->corporativa->delete(array('cor_id' => $id_corporativa)) > 0) {

            $this->session->set_flashdata('cad_ok', 'Corporativa excluido com sucesso');
        }

        redirect('gerenciador/corporativas');
    }

}
