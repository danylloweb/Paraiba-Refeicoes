<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Estaticos extends CI_Controller {

    /**
     * @author Jobson Ribeiro
     */
    private $path_upload = 'public/uploads/estaticos/';

    public function __construct() {
        parent::__construct();
        $this->form_validation->set_message('required', '%s não pode ser vazio');
        $this->form_validation->set_message('valid_email', '%s não possui um email válido');
        $this->log_in->is_logged(array('administrador'));

        $this->load->model('gerenciador/estatico');
        $this->load->model('gerenciador/estatico_categoria');

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

        $config['base_url'] = base_url() . 'gerenciador/estaticos/';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->estatico->total_estatico();
        $config['per_page'] = 25;
        $config['cur_tag_open'] = '<span class="selected">';
        $config['cur_tag_close'] = '</span>';

        $this->pagination->initialize($config);

        $dados['msg'] = $this->session->flashdata('cad_ok');
        $dados['erro'] = $this->session->flashdata('cad_erro');

        $dados['estaticos'] = $this->estatico->listar_estatico(array(), $paginacao, $config['per_page']);
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/estaticos/lista_estatico', $dados);
    }

    public function add_estatico() {

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('est_descricao', 'Descrição', 'required');

            if ($this->form_validation->run() == false) {

                $dados['erros'] = validation_errors('<li>', '</li>');
            } else {
                $dados_bd = $this->input->post();
                
                    if ($this->estatico->inserir($dados_bd) > 0) {

                        $this->session->set_flashdata('cad_ok', 'Pagina Estatica cadastrado com sucesso.');
                        redirect('gerenciador/estaticos');
                    } else {
                        $dados['erros'] = 'Não foi possível cadastrar no banco de dados.';
                }
            }
        }

        $dados['categorias'] = $this->estatico_categoria->listar_estatico_categoria(array(),0,99);
        
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/estaticos/add_estatico', $dados);
    }

    public function editar_estatico($id_estatico) {

        $dados = array();
        $dados['estatico'] = $this->estatico->get_estatico(array('est_id' => $id_estatico));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('est_descricao', 'Descrição', 'required');

            if ($this->form_validation->run() == false) {

                $dados['erros'] = validation_errors('<li>', '</li>');
            } else {
                $dados_bd = $this->input->post();

                if ($this->estatico->atualizar(array('est_id' => $id_estatico), $dados_bd) > 0) {

                    $this->session->set_flashdata('cad_ok', 'Pagina Estatica atualizado com sucesso');
                    redirect('gerenciador/estaticos');
                }

                $dados['erros'] = 'Nenhuma modificação efetuada.';
            }
        }
        
        $dados['categorias'] = $this->estatico_categoria->listar_estatico_categoria(array(),0,99);

        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/estaticos/edit_estatico', $dados);
    }

    public function excluir_estatico($id_estatico) {

        if ($this->estatico->delete(array('est_id' => $id_estatico)) > 0) {

            $this->session->set_flashdata('cad_ok', 'Pagina Estatica excluido com sucesso');
        }

        redirect('gerenciador/estaticos');
    }

}
