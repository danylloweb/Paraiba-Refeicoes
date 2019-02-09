<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Macarroes extends CI_Controller {

    /**
     * @author Jobson Ribeiro
     */
    public function __construct() {
        parent::__construct();
        $this->form_validation->set_message('required', '%s não pode ser vazio');
        $this->form_validation->set_message('valid_email', '%s não possui um email válido');
        $this->log_in->is_logged(array('administrador', 'funcionario'));
        $this->load->model('gerenciador/macarrao');
    }

    public function index($pagina = false) {

        $dados = array();

        $paginacao = $pagina != false ? $pagina : 0;

        $config['base_url'] = base_url() . 'gerenciador/macarroes/';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->macarrao->total_macarrao();
        $config['per_page'] = 25;
        $config['cur_tag_open'] = '<span class="selected">';
        $config['cur_tag_close'] = '</span>';

        $this->pagination->initialize($config);

        $dados['msg'] = $this->session->flashdata('cad_ok');
        $dados['erro'] = $this->session->flashdata('cad_erro');

        $dados['macarroes'] = $this->macarrao->listar_macarrao(array(), $paginacao, $config['per_page'], 'mac_nome', 'ASC');
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/macarroes/lista_macarrao', $dados);
    }
	
	public function busca_macarrao($pagina = false){

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
        
        $dados['macarroes'] = $this->macarrao->listar_pesquisa(array('mac_nome' => $busca), 0, 300);
        $dados['titulo'] = $this->configs->get_titulo().' - Gerenciador';
        
        $this->render->view('gerenciador/macarroes/lista_macarrao', $dados);

    }

    public function add_macarrao() {

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dados_bd = $this->input->post();

            if ($this->macarrao->inserir($dados_bd)) {

                $this->session->flashdata('cad_ok', 'Macarrão cadastrado com sucesso.');
                redirect('gerenciador/macarroes');
            } else {
                $dados['erros'] = 'Não foi possível cadastrar no banco de dados.';
            }
        }
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/macarroes/add_macarrao', $dados);
    }

    public function editar_macarrao($id_macarrao) {

        $dados = array();
        $dados['macarrao'] = $this->macarrao->get_macarrao(array('mac_id' => $id_macarrao));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dados_bd = $this->input->post();
            
            if ($this->macarrao->atualizar(array('mac_id' => $id_macarrao), $dados_bd) > 0) {
                
                $this->session->set_flashdata('cad_ok', 'Macarrão atualizado com sucesso');
                redirect('gerenciador/macarroes');
            } else {
                $dados['erros'] = 'Nenhuma alteração foi efetuada.';
            }
        }


        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/macarroes/edit_macarrao', $dados);
    }

    public function excluir_macarrao($id_macarrao) {

        if ($this->macarrao->delete(array('mac_id' => $id_macarrao)) > 0) {

            $this->session->set_flashdata('cad_ok', 'Macarrão excluido com sucesso');
        }

        redirect('gerenciador/macarroes');
    }

}
