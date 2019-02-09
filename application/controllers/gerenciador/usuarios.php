<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    /**
     * @author Isaias Filho
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('gerenciador/usuario');
        $this->form_validation->set_message('required', '%s não pode ser vazio');
        $this->form_validation->set_message('valid_email', '%s não possui um email válido');
        $this->log_in->is_logged(array('administrador'));
    }

    public function index($pagina = false) {

        $dados = array();

        $paginacao = $pagina != false ? $pagina : 0;

        $config['base_url'] = base_url() . 'gerenciador/usuarios/';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->usuario->total_usuario(array());
        $config['per_page'] = 25;
        $config['cur_tag_open'] = '<span class="selected">';
        $config['cur_tag_close'] = '</span>';

        $this->pagination->initialize($config);

        $dados['msg'] = $this->session->flashdata('cad_ok');
        $dados['erro'] = $this->session->flashdata('cad_erro');

        $dados['usuarios'] = $this->usuario->listar_usuario(array(), $paginacao, $config['per_page']);
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/usuarios/lista_usuario', $dados);
    }

    public function add_usuario() {

        $dados = array();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('usu_nome', 'Nome', 'required');
            $this->form_validation->set_rules('usu_perfil', 'Perfil', 'required');
            $this->form_validation->set_rules('usu_email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('usu_senha', 'Senha', 'required');

            if ($this->form_validation->run() == false) {

                $dados['erros'] = validation_errors('<li>', '</li>');
            } else {

                foreach ($this->input->post() as $key => $valor) {

                    if ($key == 'usu_senha') {
                        $valor = do_hash($valor, 'md5');
                    }

                    $dados_bd[$key] = $valor;
                }

              
                switch ($this->usuario->inserir($dados_bd)) {
                    case 1:
                        $this->session->set_flashdata('cad_ok', 'Usuário cadastrado com sucesso.');
                        redirect('gerenciador/usuarios');

                    case 'exists':

                        $dados['erros'] = 'Email já cadastrado.';
                }
            }
        }

        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';
        $this->render->view('gerenciador/usuarios/add_usuario', $dados);
    }

    public function editar_usuario($id_usuario) {

        $dados = array();
        foreach ($this->usuario->get_usuario(array('usu_id' => $id_usuario)) as $dados['usuario'])
            ;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('usu_nome', 'Nome', 'required');

            if ($this->form_validation->run() == false) {

                $dados['erros'] = validation_errors('<li>', '</li>');
            } else {

                foreach ($this->input->post() as $key => $valor) {

                    if ($key == 'usu_senha' && $valor != '') {
                        $valor = do_hash($valor, 'md5');
                    } elseif ($key == 'usu_senha' && $valor == '') {
                        $valor = $dados['usuario']->usu_senha;
                    }

                    $dados_bd[$key] = $valor;
                }
               

                if ($this->usuario->atualizar(array('usu_id' => $id_usuario), $dados_bd) > 0) {

                    $this->session->set_flashdata('cad_ok', 'Usuário atualizado com sucesso.');
                    redirect('gerenciador/usuarios');
                }

                $dados['erros'] = 'Nenhuma alteração foi efetuada.';
            }
        }

        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';
        $this->render->view('gerenciador/usuarios/edit_usuario', $dados);
    }

    public function excluir_usuario($id_usuario) {

        if ($this->usuario->delete(array('usu_id' => $id_usuario)) > 0) {

            $this->session->set_flashdata('cad_ok', 'Usuário excluido com sucesso.');
        } else {

            $this->session->set_flashdata('cad_erro', 'Não foi possível excluir.');
        }

        redirect('gerenciador/usuarios');
    }

}