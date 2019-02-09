<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * @author Isaias Filho
 */

class Log_in extends CI_Model {

    public function __construct() {

        parent::__construct();
        $this->load->model('gerenciador/usuario');
//        $this->load->model('gerenciador/cliente');
    }

    public function validar_login($login, $senha, $area = 'admin') {

        if ($area == 'admin') {
            if ($this->usuario->validar_usuario(array('usu_email' => $login, 'usu_senha' => $senha)) == 1) {

                return true;
            }
        } else {
            
            $senha = md5($senha);
            
            if ($this->cliente->validar_cliente(array('cli_email' => $login, 'cli_senha' => $senha)) == 1) {                
                $this->gerar_login($login, $senha, 'cliente');
                return true;
            }
        }


        return false;
    }

    public function gerar_login($login, $senha, $area = 'admin') {

        if ($area == 'admin') {
            foreach ($this->usuario->get_usuario(array('usu_email' => $login, 'usu_senha' => $senha)) as $log)
                ;

            $dados_sessao = array('log_' . $log->usu_perfil => array(
                    'id_user' => $log->usu_id,
                    'nome_user' => $log->usu_nome,
                    'email' => $log->usu_email,
                    'perfil' => $log->usu_perfil,
                    'login' => true
            ));
        } else {
            $cliente = $this->cliente->get_cliente(array('cli_email' => $login, 'cli_senha' => $senha));
            $dados_sessao = array('log_cliente' => array(
                    'id_user' => $cliente->cli_id,
                    'nome_user' => $cliente->cli_nome,
                    'email' => $cliente->cli_email,
                    'perfil' => 'cliente',                                        
                    'login' => true
            ));
        }

        $this->session->set_userdata($dados_sessao);

        if ($area == 'admin')
            return $log->usu_perfil;
    }

     public function is_loggedin($sessao, $controller) {

        $login = $this->session->userdata('log_' . $sessao);

        if (!$login['login'] || $login['perfil'] != $sessao) {
//          $this->session->unset_userdata('log_usuario');
            redirect($controller);
        }
    }

    public function is_logged($sessao, $controller = 'gerenciador/login') {

        $login = array();
        foreach ($sessao as $sess) {
            if ($this->session->userdata('log_' . $sess)) {
                $login = $this->session->userdata('log_' . $sess);
            }
        }
        if (!isset($login['login'])) {
//          $this->session->unset_userdata('log_usuario');
            redirect($controller);
        } elseif (!in_array($login['perfil'], $sessao)) {
            redirect('gerenciador/denied');
        }
    }
    
    public function is_cart($cart, $controller) {
        
        //Verifica se tem algum produto no carrinho, caso nao tenha redireciona para o carrinho vazio
        if (!$cart) {
//          $this->session->unset_userdata('log_usuario');
            redirect($controller);
        }
    }

}

