<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function get_data_exploded($data, $posicao, $mes_texto = false){
	 $CI =& get_instance();
	 
	 $dt = explode("-", $data);
	 if ($posicao == 1 && $mes_texto == true){
	 	return data_mes_texto($dt[$posicao]);
	 }
	 return $dt[$posicao];
}

function data_mes_texto($mes){
	switch($mes){
		case '01':
			$mes = 'jan';
			break;
		case '02':
			$mes = 'fev';
			break;
		case '03':
			$mes = 'mar';
			break;
		case '04':
			$mes = 'abr';
			break;
		case '05':
			$mes = 'mai';
			break;
		case '06':
			$mes = 'jun';
			break;
		case '07':
			$mes = 'jul';
			break;
		case '08':
			$mes = 'ago';
			break;
		case '09':
			$mes = 'set';
			break;
		case '10':
			$mes = 'out';
			break;
		case '11':
			$mes = 'nov';
			break;
		case '12':
			$mes = 'dez';
			break;
	}
	
	return $mes;
}

function data_for_humans($data){
	$dt = explode("-", $data);
	return $dt[2].'/'.$dt[1].'/'.$dt[0];
}

function dh_for_humans($data, $hora = true){
	$dt = explode("-", $data);
	$hr = explode(" ", $dt[2]);
	
	if ($hora){
		return $hr[0].'/'.$dt[1].'/'.$dt[0].' '.$hr[1];
	}
	return $hr[0].'/'.$dt[1].'/'.$dt[0];
}

function data_for_unix($data){
	$dt = explode("/", $data);
	return $dt[2].'-'.$dt[1].'-'.$dt[0];
}

function dh_mktime_for_humans($mktime){
	
	return date("d/m/Y H:i:s",strtotime($mktime));
}