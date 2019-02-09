<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bebidas extends CI_Controller {

    /**
     * @author Jobson Ribeiro
     */
    public function __construct() {
        parent::__construct();
        $this->form_validation->set_message('required', '%s não pode ser vazio');
        $this->form_validation->set_message('valid_email', '%s não possui um email válido');
        $this->log_in->is_logged(array('administrador', 'funcionario'));
        $this->load->model('gerenciador/bebida');
    }

    public function index($pagina = false) {

        $dados = array();

        $paginacao = $pagina != false ? $pagina : 0;

        $config['base_url'] = base_url() . 'gerenciador/bebidas/';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->bebida->total_bebida();
        $config['per_page'] = 25;
        $config['cur_tag_open'] = '<span class="selected">';
        $config['cur_tag_close'] = '</span>';

        $this->pagination->initialize($config);

        $dados['msg'] = $this->session->flashdata('cad_ok');
        $dados['erro'] = $this->session->flashdata('cad_erro');

        $dados['bebidas'] = $this->bebida->listar_bebida(array(), $paginacao, $config['per_page'], 'beb_nome', 'ASC');
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/bebidas/lista_bebida', $dados);
    }

    public function busca_bebida($pagina = false) {

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

        $dados['bebidas'] = $this->bebida->listar_pesquisa(array('beb_nome' => $busca), 0, 300);
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/bebidas/lista_bebida', $dados);
    }

    public function add_bebida() {

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dados_bd = $this->input->post();
			
			$valor1 = str_replace(".", "", $dados_bd['beb_preco']);
			$valor_real = str_replace(",", ".", $valor1);

			$dados_bd['beb_preco'] = $valor_real;

            if ($this->bebida->inserir($dados_bd)) {

                $this->session->flashdata('cad_ok', 'Bebida cadastrado com sucesso.');
                redirect('gerenciador/bebidas');
            } else {
                $dados['erros'] = 'Não foi possível cadastrar no banco de dados.';
            }
        }
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/bebidas/add_bebida', $dados);
    }

    public function editar_bebida($id_bebida) {

        $dados = array();
        $dados['bebida'] = $this->bebida->get_bebida(array('beb_id' => $id_bebida));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dados_bd = $this->input->post();

            $valor1 = str_replace(".", "", $dados_bd['beb_preco']);
            $valor_real = str_replace(",", ".", $valor1);

            $dados_bd['beb_preco'] = $valor_real;

            if ($this->bebida->atualizar(array('beb_id' => $id_bebida), $dados_bd) > 0) {

                $this->session->set_flashdata('cad_ok', 'Bebida atualizado com sucesso');
                redirect('gerenciador/bebidas');
            } else {
                $dados['erros'] = 'Nenhuma alteração foi efetuada.';
            }
        }


        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/bebidas/edit_bebida', $dados);
    }

    public function excluir_bebida($id_bebida) {

        if ($this->bebida->delete(array('beb_id' => $id_bebida)) > 0) {

            $this->session->set_flashdata('cad_ok', 'Bebida excluido com sucesso');
        }

        redirect('gerenciador/bebidas');
    }

}
