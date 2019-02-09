<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Escolha extends CI_Controller {

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
        
        $config = $this->configs->select_by_id(1);
        
        $dados['adressConf'] =  $config->conf_adress;
                
        $dados['preco_quentinha'] =  $config->conf_preco_marmita;
        
        $data_atual = date('Y/m/d');
        
        $dados['marmita'] = $this->marmita->get_marmita(array('mar_data' => $data_atual));
        
        if (empty($dados['marmita'])) {
            redirect('atendimento');
        }
            
        $dados['titulo'] = 'Escolha uma das opções.';

        $this->template->load($this->tpl, 'escolha/index', $dados);
    }

}