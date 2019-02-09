<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Feijoes extends CI_Controller {

    /**
     * @author Jobson Ribeiro
     */
    public function __construct() {
        parent::__construct();
        $this->form_validation->set_message('required', '%s não pode ser vazio');
        $this->form_validation->set_message('valid_email', '%s não possui um email válido');
        $this->log_in->is_logged(array('administrador', 'funcionario'));
        $this->load->model('gerenciador/feijao');
    }

    public function index($pagina = false) {

        $dados = array();

        $paginacao = $pagina != false ? $pagina : 0;

        $config['base_url'] = base_url() . 'gerenciador/feijoes/';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->feijao->total_feijao();
        $config['per_page'] = 25;
        $config['cur_tag_open'] = '<span class="selected">';
        $config['cur_tag_close'] = '</span>';

        $this->pagination->initialize($config);

        $dados['msg'] = $this->session->flashdata('cad_ok');
        $dados['erro'] = $this->session->flashdata('cad_erro');

        $dados['feijoes'] = $this->feijao->listar_feijao(array(), $paginacao, $config['per_page'], 'fei_nome', 'ASC');
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/feijoes/lista_feijao', $dados);
    }
	
	public function busca_feijao($pagina = false){

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
        
        $dados['feijoes'] = $this->feijao->listar_pesquisa(array('fei_nome' => $busca), 0, 300);
        $dados['titulo'] = $this->configs->get_titulo().' - Gerenciador';
        
        $this->render->view('gerenciador/feijoes/lista_feijao', $dados);

    }

    public function add_feijao() {

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dados_bd = $this->input->post();

            if ($this->feijao->inserir($dados_bd)) {

                $this->session->flashdata('cad_ok', 'Feijao cadastrado com sucesso.');
                redirect('gerenciador/feijoes');
            } else {
                $dados['erros'] = 'Não foi possível cadastrar no banco de dados.';
            }
        }
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/feijoes/add_feijao', $dados);
    }

    public function editar_feijao($id_feijao) {

        $dados = array();
        $dados['feijao'] = $this->feijao->get_feijao(array('fei_id' => $id_feijao));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dados_bd = $this->input->post();
            
            if ($this->feijao->atualizar(array('fei_id' => $id_feijao), $dados_bd) > 0) {
                
                $this->session->set_flashdata('cad_ok', 'Feijao atualizado com sucesso');
                redirect('gerenciador/feijoes');
            } else {
                $dados['erros'] = 'Nenhuma alteração foi efetuada.';
            }
        }


        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/feijoes/edit_feijao', $dados);
    }

    public function excluir_feijao($id_feijao) {

        if ($this->feijao->delete(array('fei_id' => $id_feijao)) > 0) {

            $this->session->set_flashdata('cad_ok', 'Feijao excluido com sucesso');
        }

        redirect('gerenciador/feijoes');
    }

}
