<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Arrozes extends CI_Controller {

    /**
     * @author Jobson Ribeiro
     */
    public function __construct() {
        parent::__construct();
        $this->form_validation->set_message('required', '%s não pode ser vazio');
        $this->form_validation->set_message('valid_email', '%s não possui um email válido');
        $this->log_in->is_logged(array('administrador', 'funcionario'));
        $this->load->model('gerenciador/arroz');
    }

    public function index($pagina = false) {

        $dados = array();

        $paginacao = $pagina != false ? $pagina : 0;

        $config['base_url'] = base_url() . 'gerenciador/arrozes/';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->arroz->total_arroz();
        $config['per_page'] = 25;
        $config['cur_tag_open'] = '<span class="selected">';
        $config['cur_tag_close'] = '</span>';

        $this->pagination->initialize($config);

        $dados['msg'] = $this->session->flashdata('cad_ok');
        $dados['erro'] = $this->session->flashdata('cad_erro');

        $dados['arrozes'] = $this->arroz->listar_arroz(array(), $paginacao, $config['per_page'], 'arr_nome', 'ASC');
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/arrozes/lista_arroz', $dados);
    }
	
	public function busca_arroz($pagina = false){

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
        
        $dados['arrozes'] = $this->arroz->listar_pesquisa(array('arr_nome' => $busca), 0, 300);
        $dados['titulo'] = $this->configs->get_titulo().' - Gerenciador';
        
        $this->render->view('gerenciador/arrozes/lista_arroz', $dados);

    }

    public function add_arroz() {

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dados_bd = $this->input->post();

            if ($this->arroz->inserir($dados_bd)) {

                $this->session->flashdata('cad_ok', 'Arroz cadastrado com sucesso.');
                redirect('gerenciador/arrozes');
            } else {
                $dados['erros'] = 'Não foi possível cadastrar no banco de dados.';
            }
        }
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/arrozes/add_arroz', $dados);
    }

    public function editar_arroz($id_arroz) {

        $dados = array();
        $dados['arroz'] = $this->arroz->get_arroz(array('arr_id' => $id_arroz));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dados_bd = $this->input->post();
            
            if ($this->arroz->atualizar(array('arr_id' => $id_arroz), $dados_bd) > 0) {
                
                $this->session->set_flashdata('cad_ok', 'Arroz atualizado com sucesso');
                redirect('gerenciador/arrozes');
            } else {
                $dados['erros'] = 'Nenhuma alteração foi efetuada.';
            }
        }


        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/arrozes/edit_arroz', $dados);
    }

    public function excluir_arroz($id_arroz) {

        if ($this->arroz->delete(array('arr_id' => $id_arroz)) > 0) {

            $this->session->set_flashdata('cad_ok', 'Arroz excluido com sucesso');
        }

        redirect('gerenciador/arrozes');
    }

}
