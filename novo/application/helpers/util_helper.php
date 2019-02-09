<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function get_enum_bd($tabela, $coluna){
	 $CI =& get_instance();
	 	 
	 
	 
}

function set_selecionado($valor1, $valor2, $retorno){
	
	if(is_array($valor2)){
		return in_array($valor1, $valor2) ? $retorno : '';
	}
	return $valor1 == $valor2 ? $retorno : '';

}

function grava_url($url){
	$CI =& get_instance();
	$CI->session->set_userdata('url_anterior', $url);

}

function get_url(){
	$CI =& get_instance();
	return $CI->session->userdata('url_anterior');

}

