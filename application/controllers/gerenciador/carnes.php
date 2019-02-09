<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Carnes extends CI_Controller {

    /**
     * @author Jobson Ribeiro
     */
    public function __construct() {
        parent::__construct();
        $this->form_validation->set_message('required', '%s não pode ser vazio');
        $this->form_validation->set_message('valid_email', '%s não possui um email válido');
        $this->log_in->is_logged(array('administrador', 'funcionario'));
        $this->load->model('gerenciador/carne');
    }

    public function index($pagina = false) {

        $dados = array();

        $paginacao = $pagina != false ? $pagina : 0;

        $config['base_url'] = base_url() . 'gerenciador/carnes/';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->carne->total_carne();
        $config['per_page'] = 25;
        $config['cur_tag_open'] = '<span class="selected">';
        $config['cur_tag_close'] = '</span>';

        $this->pagination->initialize($config);

        $dados['msg'] = $this->session->flashdata('cad_ok');
        $dados['erro'] = $this->session->flashdata('cad_erro');

        $dados['carnes'] = $this->carne->listar_carne(array(), $paginacao, $config['per_page'], 'car_nome', 'ASC');
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/carnes/lista_carne', $dados);
    }
	
	public function busca_carne($pagina = false){

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
        
        $dados['carnes'] = $this->carne->listar_pesquisa(array('car_nome' => $busca), 0, 300);
        $dados['titulo'] = $this->configs->get_titulo().' - Gerenciador';
        
        $this->render->view('gerenciador/carnes/lista_carne', $dados);

    }

    public function add_carne() {

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dados_bd = $this->input->post();

            if ($this->carne->inserir($dados_bd)) {

                $this->session->flashdata('cad_ok', 'Carne cadastrado com sucesso.');
                redirect('gerenciador/carnes');
            } else {
                $dados['erros'] = 'Não foi possível cadastrar no banco de dados.';
            }
        }
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/carnes/add_carne', $dados);
    }

    public function editar_carne($id_carne) {

        $dados = array();
        $dados['carne'] = $this->carne->get_carne(array('car_id' => $id_carne));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dados_bd = $this->input->post();
            
            if ($this->carne->atualizar(array('car_id' => $id_carne), $dados_bd) > 0) {
                
                $this->session->set_flashdata('cad_ok', 'Carne atualizado com sucesso');
                redirect('gerenciador/carnes');
            } else {
                $dados['erros'] = 'Nenhuma alteração foi efetuada.';
            }
        }


        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/carnes/edit_carne', $dados);
    }

    public function excluir_carne($id_carne) {

        if ($this->carne->delete(array('car_id' => $id_carne)) > 0) {

            $this->session->set_flashdata('cad_ok', 'Carne excluido com sucesso');
        }

        redirect('gerenciador/carnes');
    }

}
