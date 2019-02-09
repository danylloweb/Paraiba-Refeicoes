<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * @author Isaias Filho
 */

class Login extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('gerenciador/usuario');
        $this->session->unset_userdata('log_usuario');
    }

    public function index() {

        $dados['erros'] = $this->session->flashdata('erros');
        $this->load->view('gerenciador/login', $dados);
    }

    public function do_login() {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $usuario = $this->input->post('email');
            $senha = do_hash($this->input->post('senha'), 'md5');

            if ($this->log_in->validar_login($usuario, $senha)) {

                $perfil = $this->log_in->gerar_login($usuario, $senha);
                $usuario = $this->session->userdata('log_' . $perfil);
                
                if ($usuario['perfil'] == 'administrador') {
                    redirect('gerenciador');
                } elseif ($usuario['perfil'] == 'funcionario') {                    
                    redirect('gerenciador/pedidos');
                } elseif ($usuario['perfil'] == 'usuario') {
                    redirect('index');
                }
            } else {

                $this->session->set_flashdata('erros', 'Usuário ou senha inválidos');
                redirect($this->input->post('controller'));
            }
        }
    }

    public function logout($sessao) {

        $this->session->unset_userdata('log_' . $sessao);
        redirect('gerenciador');
    }

    public function esqueci_senha() {
        
    }

}