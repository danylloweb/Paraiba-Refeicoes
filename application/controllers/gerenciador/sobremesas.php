<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sobremesas extends CI_Controller {

    /**
     * @author Jobson Ribeiro
     */
    public function __construct() {
        parent::__construct();
        $this->form_validation->set_message('required', '%s não pode ser vazio');
        $this->form_validation->set_message('valid_email', '%s não possui um email válido');
        $this->log_in->is_logged(array('administrador', 'funcionario'));
        $this->load->model('gerenciador/sobremesa');
    }

    public function index($pagina = false) {

        $dados = array();

        $paginacao = $pagina != false ? $pagina : 0;

        $config['base_url'] = base_url() . 'gerenciador/sobremesas/';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->sobremesa->total_sobremesa();
        $config['per_page'] = 25;
        $config['cur_tag_open'] = '<span class="selected">';
        $config['cur_tag_close'] = '</span>';

        $this->pagination->initialize($config);

        $dados['msg'] = $this->session->flashdata('cad_ok');
        $dados['erro'] = $this->session->flashdata('cad_erro');

        $dados['sobremesas'] = $this->sobremesa->listar_sobremesa(array(), $paginacao, $config['per_page'], 'sob_nome', 'ASC');
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/sobremesas/lista_sobremesa', $dados);
    }

    public function busca_sobremesa($pagina = false) {

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

        $dados['sobremesas'] = $this->sobremesa->listar_pesquisa(array('sob_nome' => $busca), 0, 300);
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/sobremesas/lista_sobremesa', $dados);
    }

    public function add_sobremesa() {

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dados_bd = $this->input->post();

            if ($this->sobremesa->inserir($dados_bd)) {

                $valor1 = str_replace(".", "", $dados_bd['sob_preco']);
                $valor_real = str_replace(",", ".", $valor1);

                $dados_bd['sob_preco'] = $valor_real;

                $this->session->flashdata('cad_ok', 'Sobremesa cadastrado com sucesso.');
                redirect('gerenciador/sobremesas');
            } else {
                $dados['erros'] = 'Não foi possível cadastrar no banco de dados.';
            }
        }
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/sobremesas/add_sobremesa', $dados);
    }

    public function editar_sobremesa($id_sobremesa) {

        $dados = array();
        $dados['sobremesa'] = $this->sobremesa->get_sobremesa(array('sob_id' => $id_sobremesa));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dados_bd = $this->input->post();

            $valor1 = str_replace(".", "", $dados_bd['sob_preco']);
            $valor_real = str_replace(",", ".", $valor1);

            $dados_bd['sob_preco'] = $valor_real;

            if ($this->sobremesa->atualizar(array('sob_id' => $id_sobremesa), $dados_bd) > 0) {

                $this->session->set_flashdata('cad_ok', 'Sobremesa atualizado com sucesso');
                redirect('gerenciador/sobremesas');
            } else {
                $dados['erros'] = 'Nenhuma alteração foi efetuada.';
            }
        }


        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/sobremesas/edit_sobremesa', $dados);
    }

    public function excluir_sobremesa($id_sobremesa) {

        if ($this->sobremesa->delete(array('sob_id' => $id_sobremesa)) > 0) {

            $this->session->set_flashdata('cad_ok', 'Sobremesa excluido com sucesso');
        }

        redirect('gerenciador/sobremesas');
    }

}
