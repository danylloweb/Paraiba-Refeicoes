<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bebidas extends CI_Controller {

    private $tpl = 'tpl_site';

    public function __construct() {
        parent::__construct();

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
        
        $dados['estatico'] = $this->estatico->get_estatico(array('est_esc_id' => 7));
        
        $dados['adressConf'] =  $config->conf_adress;
                
        $dados['titulo'] = 'Bebidas';

        $this->template->load($this->tpl, 'bebidas/index', $dados);
    }

}