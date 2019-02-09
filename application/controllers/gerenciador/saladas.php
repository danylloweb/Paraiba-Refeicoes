<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Saladas extends CI_Controller {

    /**
     * @author Jobson Ribeiro
     */
    public function __construct() {
        parent::__construct();
        $this->form_validation->set_message('required', '%s não pode ser vazio');
        $this->form_validation->set_message('valid_email', '%s não possui um email válido');
        $this->log_in->is_logged(array('administrador', 'funcionario'));
        $this->load->model('gerenciador/salada');
    }

    public function index($pagina = false) {

        $dados = array();

        $paginacao = $pagina != false ? $pagina : 0;

        $config['base_url'] = base_url() . 'gerenciador/saladas/';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->salada->total_salada();
        $config['per_page'] = 25;
        $config['cur_tag_open'] = '<span class="selected">';
        $config['cur_tag_close'] = '</span>';

        $this->pagination->initialize($config);

        $dados['msg'] = $this->session->flashdata('cad_ok');
        $dados['erro'] = $this->session->flashdata('cad_erro');

        $dados['saladas'] = $this->salada->listar_salada(array(), $paginacao, $config['per_page'], 'sal_nome', 'ASC');
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/saladas/lista_salada', $dados);
    }
	
	public function busca_salada($pagina = false){

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
        
        $dados['saladas'] = $this->salada->listar_pesquisa(array('sal_nome' => $busca), 0, 300);
        $dados['titulo'] = $this->configs->get_titulo().' - Gerenciador';
        
        $this->render->view('gerenciador/saladas/lista_salada', $dados);

    }

    public function add_salada() {

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dados_bd = $this->input->post();

            if ($this->salada->inserir($dados_bd)) {

                $this->session->flashdata('cad_ok', 'Salada cadastrado com sucesso.');
                redirect('gerenciador/saladas');
            } else {
                $dados['erros'] = 'Não foi possível cadastrar no banco de dados.';
            }
        }
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/saladas/add_salada', $dados);
    }

    public function editar_salada($id_salada) {

        $dados = array();
        $dados['salada'] = $this->salada->get_salada(array('sal_id' => $id_salada));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dados_bd = $this->input->post();
            
            if ($this->salada->atualizar(array('sal_id' => $id_salada), $dados_bd) > 0) {
                
                $this->session->set_flashdata('cad_ok', 'Salada atualizado com sucesso');
                redirect('gerenciador/saladas');
            } else {
                $dados['erros'] = 'Nenhuma alteração foi efetuada.';
            }
        }


        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/saladas/edit_salada', $dados);
    }

    public function excluir_salada($id_salada) {

        if ($this->salada->delete(array('sal_id' => $id_salada)) > 0) {

            $this->session->set_flashdata('cad_ok', 'Salada excluido com sucesso');
        }

        redirect('gerenciador/saladas');
    }

}
