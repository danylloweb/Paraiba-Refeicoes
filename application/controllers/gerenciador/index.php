<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->log_in->is_logged(array('administrador'));
	}
	
	public function index(){
		
		$dados['titulo'] = $this->configs->get_titulo().' - Gerenciador';
		
		$this->render->view('gerenciador/home', $dados);
		
	}
	
}