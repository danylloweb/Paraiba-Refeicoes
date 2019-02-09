<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Identificacao extends CI_Controller {

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
        
        if ($this->session->userdata('log_cliente')) {
            redirect('confirmacao_endereco');
        }
        
        $dados['erro'] = $this->session->flashdata('erro');
        $dados['oklog'] = $this->session->flashdata('oklog');
        $dados['errocad'] = $this->session->flashdata('errocad');
        $dados['okcad'] = $this->session->flashdata('okcad');

        $config = $this->configs->select_by_id(1);

        $dados['preco_quentinha'] = $config->conf_preco_marmita;

        $data_atual = date('Y/m/d');

        $dados['marmita'] = $this->marmita->get_marmita(array('mar_data' => $data_atual));

        if (empty($dados['marmita'])) {
            redirect('atendimento');
        }

        $dados['titulo'] = 'Identificação';
        //print_r($this->session->all_userdata());
        $this->template->load($this->tpl, 'identificacao/index', $dados);
    }

    public function do_login() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($this->session->userdata["log_cliente"])) {
                $this->session->set_flashdata('erro', 'Você ja está logado');
                redirect('identificacao');
            } elseif ($this->log_in->validar_login($this->input->post('cli_email'), $this->input->post('cli_senha'), 'cliente')) {
                $this->session->set_flashdata('oklog', 'Login efetuado com sucesso.');
                redirect('confirmacao_endereco');
            } else {
                $this->session->set_flashdata('erro', 'Usuário ou senha inválidos');
                redirect('identificacao');
            }
        }
    }

    public function cadastro() {
        $dados = array();

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

                redirect('identificacao');
            } elseif ($this->input->post('cli_senha') != $this->input->post('senha_two')) {

                $this->session->set_flashdata('errocad', 'Erro ao repetir a senha.');
                redirect('identificacao');
            } else {
                foreach ($this->input->post() as $key => $valor) {
                    if ($key != 'control_to' && $key != 'control_from' && $key != 'senha_two') {
                        $dados_db[$key] = $valor;
                    }
                }
                $dados_db['cli_senha'] = md5($this->input->post('cli_senha'));

                if ($this->cliente->inserir($dados_db) > 0) {
                    $id = $this->db->insert_id();

                    $this->log_in->validar_login($this->input->post('cli_email'), $this->input->post('cli_senha'), 'cliente');

                    $email_cliente = $this->template_emails->email_cadastro_efetuado($id);
                    
                    $this->sender->enviar_email(
                            $this->configs->get_smtpuser(), $this->configs->get_titulo(), $this->input->post('cli_email'), 'Cadastro efetuado. Seja bem vindo', $email_cliente
                    );

                    $this->session->set_flashdata('okcad', 'Cadastrado com sucesso.');

                    redirect('confirmacao_endereco');
                } else {
                    $this->session->set_flashdata('errocad', 'Email já sendo usado.');
                    redirect('identificacao');
                }
            }
        }
    }
    
    public function recovery() {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            if (!$this->cliente->validar_cliente(array('cli_email' => $this->input->post('cli_email')))) {                
                echo '0Não existe esse email no sistema.';
                exit;                
            } else {
                                
                //criar senha nova
                $senhaNova = random_string("alnum", 10);
                $senhaNew = md5($senhaNova);
                
                $this->cliente->atualizar_informacoes(array('cli_email' => $this->input->post('cli_email')), array('cli_senha' => $senhaNew));
                
                $email_cliente = $this->template_emails->email_reset_senha($this->input->post('cli_email'), $senhaNova, site_url('identificacao'));
                $this->sender->enviar_email(
                    $this->configs->get_smtpuser(), $this->configs->get_titulo(), $this->input->post('cli_email'), 'Recuperação de senha.', $email_cliente
                );
                
                echo '1Senha gerada com sucesso. Verifique em seu e-mail.';
                exit;                
            }
        }
    }

}
