<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Emails extends CI_Controller {

    /**
     * @author Jobson Ribeiro
     */

    public function __construct() {
        parent::__construct();
        $this->form_validation->set_message('required', '%s não pode ser vazio');
        $this->form_validation->set_message('valid_email', '%s não possui um email válido');
        $this->log_in->is_logged(array('administrador','funcionario'));
        $this->load->model('gerenciador/newsletter_email');

    }

    public function index($pagina = false) {

        $dados = array();

        $paginacao = $pagina != false ? $pagina : 0;

        $config['base_url'] = base_url() . 'gerenciador/emails/';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->newsletter_email->total_email();
        $config['per_page'] = 25;
        $config['cur_tag_open'] = '<span class="selected">';
        $config['cur_tag_close'] = '</span>';

        $this->pagination->initialize($config);

        $dados['msg'] = $this->session->flashdata('cad_ok');
        $dados['erro'] = $this->session->flashdata('cad_erro');

        $dados['emails'] = $this->newsletter_email->listar_email(array(), $paginacao, $config['per_page']);
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';
        
        $this->render->view('gerenciador/emails/lista_email', $dados);
    }

    public function add_email() {

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('ema_email', 'Email', 'required');
            if ($this->form_validation->run() == false) {

                $dados['erros'] = validation_errors('<li>', '</li>');
            } else {

                $dados_bd = $this->input->post();
                
                if (empty($dados_bd['ema_status'])) {
                    $dados_bd += array('ema_status' => '0');
                }
                
                if ($this->newsletter_email->inserir($dados_bd)) {

                    $this->session->flashdata('cad_ok', 'Parceiro cadastrado com sucesso.');
                    redirect('gerenciador/emails');
                } else {
                    $dados['erros'] = 'Não foi possível cadastrar no banco de dados.';
                }
            }
        }
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/emails/add_email', $dados);
    }

    public function editar_email($id_email) {

        $dados = array();
        $dados['email'] = $this->newsletter_email->get_newsletter_email(array('ema_id' => $id_email));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('ema_email', 'Email', 'required');

            if ($this->form_validation->run() == false) {

                $dados['erros'] = validation_errors('<li>', '</li>');
            } else {

                $dados_bd = $this->input->post();
                if (empty($dados_bd['ema_status'])) {
                    $dados_bd += array('ema_status' => '0');
                }
                
                
                if ($this->newsletter_email->atualizar(array('ema_id' => $id_email), $dados_bd) > 0) {
                    
                    $this->session->set_flashdata('cad_ok', 'Email atualizado com sucesso');
                    redirect('gerenciador/emails');
                }

                $dados['erros'] = 'Nenhuma alteração foi efetuada.';
            }
        }

        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';
        
        $this->render->view('gerenciador/emails/edit_email', $dados);
    }

    public function excluir_email($id_email) {

        if ($this->newsletter_email->delete(array('ema_id' => $id_email)) > 0) {

            $this->session->set_flashdata('cad_ok', 'Email excluido com sucesso');
        }

        redirect('gerenciador/emails');
    }

}
