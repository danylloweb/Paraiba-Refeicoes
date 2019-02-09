<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pratos extends CI_Controller {

    /**
     * @author Jobson Ribeiro
     */
    public function __construct() {
        parent::__construct();

        $this->form_validation->set_message('required', '%s não pode ser vazio');
        $this->form_validation->set_message('valid_email', '%s não possui um email válido');
        $this->log_in->is_logged(array('administrador'));
        $this->load->model('gerenciador/prato');
        $this->load->model('gerenciador/prato_categoria');
    }

    public function index($pagina = false) {

        $dados = array();

        $paginacao = $pagina != false ? $pagina : 0;

        $config['base_url'] = base_url() . 'gerenciador/pratos/';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->prato->total_prato();
        $config['per_page'] = 25;
        $config['cur_tag_open'] = '<span class="selected">';
        $config['cur_tag_close'] = '</span>';

        $this->pagination->initialize($config);

        $dados['msg'] = $this->session->flashdata('cad_ok');
        $dados['erro'] = $this->session->flashdata('cad_erro');

        $dados['pratos'] = $this->prato->listar_prato(array(), $paginacao, $config['per_page'], 'pra_nome', 'ASC');
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/pratos/lista_prato', $dados);
    }

    public function busca_prato($pagina = false) {

        $dados = array();

//        $paginacao = $pagina != false  ? $pagina : 0;
//        
//	
        $busca = $this->input->post('keyword');
//        $config['base_url'] = base_url().'index.php/gerenciador/pratos/';
//        $config['uri_segment'] = 3;
//        $config['total_rows'] = $this->prato->total_busca($busca);
//        $config['per_page'] = 300;
//        $config['cur_tag_open'] = '<span class="selected">';
//        $config['cur_tag_close'] = '</span>';
//	
//        $this->pagination->initialize($config); 

        $dados['msg'] = $this->session->flashdata('cad_ok');
        $dados['erro'] = $this->session->flashdata('cad_erro');

        $dados['pratos'] = $this->prato->listar_pesquisa(array('pra_nome' => $busca), 0, 300);
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/pratos/lista_prato', $dados);
    }

    public function add_prato() {

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('pra_nome', 'Titulo', 'required');
            $this->form_validation->set_rules('pra_valor', 'Preço', 'required');
            $this->form_validation->set_rules('pra_prc_id', 'Categoria', 'required');

            if ($this->form_validation->run() == false) {

                $dados['erros'] = validation_errors('<li>', '</li>');
            } else {

                $dados_bd = $this->input->post();
                
                $valor1 =str_replace(".","",$dados_bd['pra_valor']);
                $valor_real =str_replace(",",".",$valor1);

                $dados_bd['pra_valor'] = $valor_real;
                
                if ($this->prato->inserir($dados_bd)) {

                    $this->session->set_flashdata('cad_ok', 'Prato cadastrado com sucesso.');

                    redirect('gerenciador/pratos');
                } else {
                    $dados['erros'] = 'Não foi possível cadastrar no banco de dados.';
                }                
            }
        }
        $dados['categorias'] = $this->prato_categoria->listar_prato_categoria(array(), 0, 99999,'prc_nome','ASC');

        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/pratos/add_prato', $dados);
    }

    public function editar_prato($id_prato) {

        $dados = array();
        $dados['prato'] = $this->prato->get_prato(array('pra_id' => $id_prato));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('pra_nome', 'Prato', 'required');
            $this->form_validation->set_rules('pra_prc_id', 'Categoria', 'required');
            $this->form_validation->set_rules('pra_valor', 'Valor', 'required');

            if ($this->form_validation->run() == false) {

                $dados['erros'] = validation_errors('<li>', '</li>');
            } else {

                $dados_bd = $this->input->post();
                
                $valor1 =str_replace(".","",$dados_bd['pra_valor']);
                $valor_real =str_replace(",",".",$valor1);

                $dados_bd['pra_valor'] = $valor_real;
               
                if ($this->prato->atualizar(array('pra_id' => $id_prato), $dados_bd) > 0) {

                    $this->session->set_flashdata('cad_ok', 'Prato atualizado com sucesso');

                    redirect('gerenciador/pratos');
                } else {
                    $dados['erros'] = 'Nenhuma alteração efetuada.';
                }               
            }
        }
        $dados['categorias'] = $this->prato_categoria->listar_prato_categoria(array(), 0, 99999,'prc_nome','ASC');

        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/pratos/edit_prato', $dados);
    }

    public function excluir_prato($id_prato) {

        $prato = $this->prato->get_prato(array('pra_id' => $id_prato));
        if (count($prato) > 0) {
            if ($this->prato->delete(array('pra_id' => $id_prato), array('ppi_pra_id' => $id_prato)) > 0) {
                
                $this->session->set_flashdata('cad_ok', 'Prato excluido com sucesso');
            }else {
                $this->session->set_flashdata('cad_erro', 'Prato não pode ser excluido, porque existe cotação com esse prato!');
            }
        }

        redirect('gerenciador/pratos');
    }

}
