<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pratos_Categorias extends CI_Controller {

    /**
     * @author Jobson Ribeiro
     */
    public function __construct() {
        parent::__construct();
        $this->form_validation->set_message('required', '%s não pode ser vazio');
        $this->form_validation->set_message('valid_email', '%s não possui um email válido');
        $this->log_in->is_logged(array('administrador', 'funcionario'));
        $this->load->model('gerenciador/prato');
        $this->load->model('gerenciador/prato_categoria');
    }

    public function index($pagina = false) {

        $dados = array();
        
        $paginacao = $pagina != false ? $pagina : 0;

        $config['base_url'] = base_url() . 'gerenciador/pratos_categorias/';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->prato_categoria->total_prato_categoria();
        $config['per_page'] = 25;
        $config['cur_tag_open'] = '<span class="selected">';
        $config['cur_tag_close'] = '</span>';

        $this->pagination->initialize($config);

        $dados['msg'] = $this->session->flashdata('cad_ok');
        $dados['erro'] = $this->session->flashdata('cad_erro');

        $dados['categorias'] = $this->prato_categoria->listar_prato_categoria(array(), $paginacao, $config['per_page'], 'prc_nome', 'ASC');
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/pratos_categorias/lista_categoria', $dados);
    }

    public function add_prato_categoria() {

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dados_bd = $this->input->post();

            if ($this->prato_categoria->inserir($dados_bd)) {

                $this->session->flashdata('cad_ok', 'Categoria cadastrado com sucesso.');
                redirect('gerenciador/pratos_categorias');
            } else {
                $dados['erros'] = 'Não foi possível cadastrar no banco de dados.';
            }
        }

        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/pratos_categorias/add_categoria', $dados);
    }

    public function editar_prato_categoria($id_prato_categoria) {

        $dados = array();
        $dados['categoria'] = $this->prato_categoria->get_prato_categoria(array('prc_id' => $id_prato_categoria));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dados_bd = $this->input->post();

            if ($this->prato_categoria->atualizar(array('prc_id' => $id_prato_categoria), $dados_bd) > 0) {

                $this->session->set_flashdata('cad_ok', 'Categoria atualizado com sucesso');
                redirect('gerenciador/pratos_categorias');
            } else {
                $dados['erros'] = 'Nenhuma alteração foi efetuada.';
            }
        }

        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/pratos_categorias/edit_categoria', $dados);
    }

    public function excluir_prato_categoria($id_prato_categoria) {

        if ($this->prato_categoria->delete(array('prc_id' => $id_prato_categoria)) > 0) {

            $this->session->set_flashdata('cad_ok', 'Categoria excluido com sucesso');
        }

        redirect('gerenciador/pratos_categorias');
    }
}
