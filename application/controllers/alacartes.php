<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alacartes extends CI_Controller {

    private $tpl = 'tpl_site';

    public function __construct() {
        parent::__construct();

        $this->form_validation->set_message('required', '%s é obrigatório');
        $this->form_validation->set_message('valid_email', '%s não possui um valor válido');
        
        $this->load->model('gerenciador/alacarte');
        $this->load->model('gerenciador/alacarte_categoria');

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
        
        $dados['estatico'] = $this->estatico->get_estatico(array('est_esc_id' => 6));
        
        $dados['carnes_categoria'] = $this->alacarte_categoria->get_alacarte_categoria(array('alc_id' => 1));
        
        $dados['frangos_categoria'] = $this->alacarte_categoria->get_alacarte_categoria(array('alc_id' => 2));
                       
        $dados['peixes_categoria'] = $this->alacarte_categoria->get_alacarte_categoria(array('alc_id' => 3));
                       
        $dados['parmegianas_categoria'] = $this->alacarte_categoria->get_alacarte_categoria(array('alc_id' => 4));
                       
        $dados['guarnicoes_categoria'] = $this->alacarte_categoria->get_alacarte_categoria(array('alc_id' => 5));
                       
        $dados['executivos_categoria'] = $this->alacarte_categoria->get_alacarte_categoria(array('alc_id' => 6));
        
        $dados['espetos_categoria'] = $this->alacarte_categoria->get_alacarte_categoria(array('alc_id' => 7));
                       
                
        $config = $this->configs->select_by_id(1);
        
        $dados['adressConf'] =  $config->conf_adress;
                
        $dados['titulo'] = 'À la Carte';

        $this->template->load($this->tpl, 'alacartes/index', $dados);
    }

}