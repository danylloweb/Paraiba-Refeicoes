<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contato extends CI_Controller {

    private $tpl = 'tpl_site';

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
        
        $config = $this->configs->select_by_id(1);
        
        $dados['adressConf'] =  $config->conf_adress;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('nome', 'Nome', 'required|trim|strip_tags');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|strip_tags|valid_email');
            $this->form_validation->set_rules('telefone', 'Telefone', 'required|trim|strip_tags');
            $this->form_validation->set_rules('mensagem', 'Mensagem', 'required|trim|strip_tags');

            if (!$this->form_validation->run()) {

                $dados['erros'] = validation_errors();
            } else {
                foreach ($this->input->post() as $key => $valor) {
                    if ($key != 'control_to' && $key != 'control_from') {
                        $dados_db[$key] = $valor;
                    }
                }
                $email_admin = $this->template_emails->email_contato($dados_db);
                $email_cliente = $this->template_emails->email_resposta_contato();
                $this->sender->enviar_email(
                        $this->configs->get_smtpuser(), $this->configs->get_titulo(), $this->configs->get_email(), 'Solicitação de contato.', $email_admin
                );
                $this->sender->enviar_email(
                        $this->configs->get_smtpuser(), $this->configs->get_titulo(), $this->input->post('email'), 'Obrigado pelo seu contato.', $email_cliente
                );


                $dados['erros'] = 'Mensagem enviada com sucesso.';
                $dados['limpar'] = 1;
            }
        }
                
        $dados['titulo'] = 'Contato';

        $this->template->load($this->tpl, 'contato/index', $dados);
    }

}