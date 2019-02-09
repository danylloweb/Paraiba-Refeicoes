<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cardapio_Semanal extends CI_Controller {

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

        $dados['estatico'] = $this->estatico->get_estatico(array('est_esc_id' => 5));
        
        $dados['adressConf'] = $config->conf_adress;

        $getUltimaData = $this->marmita->listar_marmita_maximo(array(), 0, 99);
        
        $sexta = strtotime($getUltimaData->mar_data . '-1 days');
        $quinta = strtotime($getUltimaData->mar_data . '-2 days');
        $quarta = strtotime($getUltimaData->mar_data . '-3 days');
        $terca = strtotime($getUltimaData->mar_data . '-4 days');
        $segunda = strtotime($getUltimaData->mar_data . '-5 days');
        
        $dados['sabado'] = $this->marmita->get_marmita(array('mar_data' => $getUltimaData->mar_data));
        
        $dados['sexta'] = $this->marmita->get_marmita(array('mar_data' => date('y-m-d', $sexta)));
        $dados['quinta'] = $this->marmita->get_marmita(array('mar_data' => date('y-m-d', $quinta)));
        $dados['quarta'] = $this->marmita->get_marmita(array('mar_data' => date('y-m-d', $quarta)));
        $dados['terca'] = $this->marmita->get_marmita(array('mar_data' => date('y-m-d', $terca)));
        $dados['segunda'] = $this->marmita->get_marmita(array('mar_data' => date('y-m-d', $segunda)));        

        $dados['titulo'] = 'Cardápio da semana';

        $this->template->load($this->tpl, 'cardapio_semanal/index', $dados);
    }

}