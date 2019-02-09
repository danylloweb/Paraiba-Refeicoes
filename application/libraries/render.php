<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Render {

    public function view($view, $dados = array(), $sessao = 'gerenciador'){
    	
    	$CI =& get_instance();
    	switch ($sessao){
    		case 'gerenciador':
    			$header = 'gerenciador/fix/header';
    			$footer = 'gerenciador/fix/footer';
    			break;
    		case 'site':
    			$header = 'fix/header';
    			$footer = 'fix/footer';
    			break;
    		
    	}
    	
    	$CI->load->view($header, $dados);
    	$CI->load->view($view, $dados);
    	$CI->load->view($footer);
    	
    }
	
}