<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Corporativas extends CI_Controller {

    private $tpl = 'tpl_site';

    public function __construct() {
        parent::__construct();

        $this->form_validation->set_message('required', '%s é obrigatório');
        $this->form_validation->set_message('valid_email', '%s não possui um valor válido');

        $config = $this->configs->select_by_id(1);
        
        $this->load->model('gerenciador/corporativa');
        $this->load->model('gerenciador/corporativa_categoria');

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
               
        redirect();
        $dados['titulo'] = 'Corporativas';

        $this->template->load($this->tpl, 'corporativas/index', $dados);
    }
    
    public function categoria($id_categoria) {
        $dados = array();
		
		$config = $this->configs->select_by_id(1);
		
		$dados['adressConf'] =  $config->conf_adress;
               
        $dados['corporativas'] = $this->corporativa->listar_corporativa(array('cor_coc_id' => $id_categoria),0,99);
        
        $dados['categorias'] = $this->corporativa_categoria->listar_corporativa_categoria(array(),0,99,'coc_nome','ASC');
        
        $dados['categoria'] = $this->corporativa_categoria->get_corporativa_categoria(array('coc_id' => $id_categoria));
        
        $dados['titulo'] = 'Corporativas';

        $this->template->load($this->tpl, 'corporativas/index', $dados);
    }

}