<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Acompanhamentos extends CI_Controller {

    /**
     * @author Jobson Ribeiro
     */
    public function __construct() {
        parent::__construct();
        $this->form_validation->set_message('required', '%s não pode ser vazio');
        $this->form_validation->set_message('valid_email', '%s não possui um email válido');
        $this->log_in->is_logged(array('administrador', 'funcionario'));
        $this->load->model('gerenciador/acompanhamento');
    }

    public function index($pagina = false) {

        $dados = array();

        $paginacao = $pagina != false ? $pagina : 0;

        $config['base_url'] = base_url() . 'gerenciador/acompanhamentos/';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->acompanhamento->total_acompanhamento();
        $config['per_page'] = 25;
        $config['cur_tag_open'] = '<span class="selected">';
        $config['cur_tag_close'] = '</span>';

        $this->pagination->initialize($config);

        $dados['msg'] = $this->session->flashdata('cad_ok');
        $dados['erro'] = $this->session->flashdata('cad_erro');

        $dados['acompanhamentos'] = $this->acompanhamento->listar_acompanhamento(array(), $paginacao, $config['per_page'], 'aco_nome', 'ASC');
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/acompanhamentos/lista_acompanhamento', $dados);
    }
	
	public function busca_acompanhamento($pagina = false){

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
        
        $dados['acompanhamentos'] = $this->acompanhamento->listar_pesquisa(array('aco_nome' => $busca), 0, 300);
        $dados['titulo'] = $this->configs->get_titulo().' - Gerenciador';
        
        $this->render->view('gerenciador/acompanhamentos/lista_acompanhamento', $dados);

    }

    public function add_acompanhamento() {

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dados_bd = $this->input->post();

            if ($this->acompanhamento->inserir($dados_bd)) {

                $this->session->flashdata('cad_ok', 'Acompanhamento cadastrado com sucesso.');
                redirect('gerenciador/acompanhamentos');
            } else {
                $dados['erros'] = 'Não foi possível cadastrar no banco de dados.';
            }
        }
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/acompanhamentos/add_acompanhamento', $dados);
    }

    public function editar_acompanhamento($id_acompanhamento) {

        $dados = array();
        $dados['acompanhamento'] = $this->acompanhamento->get_acompanhamento(array('aco_id' => $id_acompanhamento));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dados_bd = $this->input->post();
            
            if ($this->acompanhamento->atualizar(array('aco_id' => $id_acompanhamento), $dados_bd) > 0) {
                
                $this->session->set_flashdata('cad_ok', 'Acompanhamento atualizado com sucesso');
                redirect('gerenciador/acompanhamentos');
            } else {
                $dados['erros'] = 'Nenhuma alteração foi efetuada.';
            }
        }


        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/acompanhamentos/edit_acompanhamento', $dados);
    }

    public function excluir_acompanhamento($id_acompanhamento) {

        if ($this->acompanhamento->delete(array('aco_id' => $id_acompanhamento)) > 0) {

            $this->session->set_flashdata('cad_ok', 'Acompanhamento excluido com sucesso');
        }

        redirect('gerenciador/acompanhamentos');
    }

}
