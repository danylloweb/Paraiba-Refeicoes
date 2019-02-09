<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pesquisa_empresa extends CI_Controller {

    private $tpl = 'tpl_site';

    public function __construct() {
        parent::__construct();

        $this->form_validation->set_message('required', '%s é obrigatório');
        $this->form_validation->set_message('valid_email', '%s não possui um valor válido');

        $this->load->model('gerenciador/empresa_cliente');
        $this->load->model('template_emails');

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

        $dados['estatico'] = $this->estatico->get_estatico(array('est_esc_id' => 1));

        $dados['adressConf'] =  $config->conf_adress;

        $dados['titulo'] = 'Pesquisa';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('atend', 'Atendimento', 'required|trim|strip_tags');
            $this->form_validation->set_rules('alimentos', 'Qualidade dos Alimentos', 'required|trim|strip_tags');
            $this->form_validation->set_rules('bebidas', 'Qualidade das Bebidas', 'required|trim|strip_tags');
            $this->form_validation->set_rules('delivery', 'Delivery', 'required|trim|strip_tags');
            $this->form_validation->set_rules('mensagem', 'Sugestões e Comentários', 'trim|strip_tags');
            $this->form_validation->set_rules('empresa', 'Empresa', 'required|trim|strip_tags');

            if (!$this->form_validation->run()) {
                $dados['erros'] = validation_errors();
            } else {
                $data = $this->input->post();

                $email_template = $this->template_emails->email_pesquisa_empresa($data);

                $this->sender->enviar_email(
                    $config->conf_smtp_user,
                    $data['atend'],
                    'pesquisapb@outlook.com',
                    'Pesquisa - Paraíba Refeições - Empresas.',
                    $email_template,
                    'klecio@lumenagencia.com.br'
                );

                $dados['erros'] = 'Mensagem enviada com sucesso.';
                $dados['limpar'] = 1;
            }
        }

        $this->template->load($this->tpl, 'pesquisaEmpresa/index', $dados);
    }

    public function ambiente() {
        $dados = array();

        $config = $this->configs->select_by_id(1);

        $dados['estatico'] = $this->estatico->get_estatico(array('est_esc_id' => 2));

        $dados['adressConf'] =  $config->conf_adress;

        $dados['titulo'] = 'Pesquisa - Ambiente';

        $this->template->load($this->tpl, 'pesquisaEmpresa/ambiente', $dados);
    }

    public function clientes() {
        $dados = array();

        $config = $this->configs->select_by_id(1);

        $dados['adressConf'] =  $config->conf_adress;

	$dados['clientes'] = $this->empresa_cliente->listar_empresa_cliente(array(),0,99);

        $dados['titulo'] = 'Pesquisa - Clientes';

        $this->template->load($this->tpl, 'pesquisaEmpresa/clientes', $dados);
    }

}
