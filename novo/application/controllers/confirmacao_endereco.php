<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Confirmacao_endereco extends CI_Controller {

    private $tpl = 'tpl';

    public function __construct() {
        parent::__construct();

        $this->form_validation->set_message('required', '%s é obrigatório');
        $this->form_validation->set_message('valid_email', '%s não possui um valor válido');

        $config = $this->configs->select_by_id(1);

        $this->template->set('title', $config->conf_name);
        $this->template->set('description', $config->conf_seo_description);
        $this->template->set('keywords', $config->conf_seo_keywords);
        $this->template->set('emailConf', $config->conf_email);
        $this->template->set('foneConf', $config->conf_phone_one);
        $this->template->set('foneConfTwo', $config->conf_phone_two);
        $this->template->set('adressConf', $config->conf_adress);
    }

    public function index() {
        $dados = array();

        $this->log_in->is_loggedin('cliente', 'identificacao');
        
        $dados['errocad'] = $this->session->flashdata('errocad');
        $dados['okcad'] = $this->session->flashdata('okcad');
        
        $config = $this->configs->select_by_id(1);

        $dados['preco_quentinha'] = $config->conf_preco_marmita;

        $data_atual = date('Y/m/d');

        $dados['marmita'] = $this->marmita->get_marmita(array('mar_data' => $data_atual));

        if (empty($dados['marmita'])) {
            redirect('atendimento');
        }
        
        $sess_cliente = $this->session->userdata('log_cliente');
        $dados['cliente'] = $this->cliente->get_cliente(array('cli_id' => $sess_cliente['id_user']));        

        $dados['titulo'] = 'Confirmação do endereço';

        $this->template->load($this->tpl, 'confirmacao_endereco/index', $dados);
    }
    
    public function atualizar() {
        $dados = array();
        
        $sess_cliente = $this->session->userdata('log_cliente');
        $dados['cliente'] = $this->cliente->get_cliente(array('cli_id' => $sess_cliente['id_user']));        
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('cli_email', 'Email', 'required|trim|strip_tags|valid_email');
            $this->form_validation->set_rules('cli_nome', 'Nome', 'required|trim|strip_tags');
            $this->form_validation->set_rules('cli_senha', 'Senha', 'required|trim|strip_tags');
            $this->form_validation->set_rules('senha_two', 'Senha', 'required|trim|strip_tags');
            $this->form_validation->set_rules('cli_telefone', 'Telefone', 'required|trim|strip_tags');
            $this->form_validation->set_rules('cli_celular', 'Celular', 'required|trim|strip_tags');
            $this->form_validation->set_rules('cli_endereco', 'Endereco', 'required|trim|strip_tags');
            $this->form_validation->set_rules('cli_referencia', 'Referencia', 'required|trim|strip_tags');

            if (!$this->form_validation->run()) {

                $this->session->set_flashdata('errocad', 'Todos os campos são obrigatórios');            

                redirect('confirmacao_endereco');
            } elseif ($this->input->post('cli_senha') != $this->input->post('senha_two')) {

                $this->session->set_flashdata('errocad', 'Erro ao repetir a senha.');
                redirect('confirmacao_endereco');
            } else {                
                foreach ($this->input->post() as $key => $valor) {
                    if ($key != 'control_to' && $key != 'control_from' && $key != 'senha_two') {
                        $dados_db[$key] = $valor;
                    }
                }
                $dados_db['cli_senha'] = md5($this->input->post('cli_senha'));
                
                if ($dados_db['cli_email'] == $dados['cliente']->cli_email) {
                    unset($dados_db['cli_email']);                    
                }

                if ($this->cliente->atualizar(array('cli_id' => $dados['cliente']->cli_id), $dados_db) > 0) {
                
                    $this->log_in->validar_login($this->input->post('cli_email'), $dados['cliente']->cli_senha, 'cliente');                    

                    $this->session->set_flashdata('okcad', 'Atualizado com sucesso.');

                    redirect('confirmacao_endereco');
                } else {                    
                    $this->session->set_flashdata('errocad', 'Email j&aacute; cadastrado.');
                    redirect('confirmacao_endereco');
                }
            }
        }
    }

}