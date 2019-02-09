<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Clientes extends CI_Controller {

    /**
     * @author Jobson Ribeiro
     */
    private $path_upload = 'public/uploads/clientes/';

    public function __construct() {
        parent::__construct();
        $this->form_validation->set_message('required', '%s não pode ser vazio');
        $this->form_validation->set_message('valid_email', '%s não possui um email válido');
        $this->log_in->is_logged(array('administrador','funcionario'));

        $this->load->model('gerenciador/cliente');

        $config['upload_path'] = $this->path_upload;
        $config['allowed_types'] = 'jpg|png|gif';
        $config['max_size'] = '1024';
        $config['remove_spaces'] = true;
        $config['encrypt_name'] = true;
        $this->upload->initialize($config);
    }

    public function index($pagina = false) {

        $dados = array();

        $paginacao = $pagina != false ? $pagina : 0;

        $config['base_url'] = base_url() . 'gerenciador/clientes/';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->cliente->total_cliente();
        $config['per_page'] = 25;
        $config['cur_tag_open'] = '<span class="selected">';
        $config['cur_tag_close'] = '</span>';

        $this->pagination->initialize($config);

        $dados['msg'] = $this->session->flashdata('cad_ok');
        $dados['erro'] = $this->session->flashdata('cad_erro');

        $dados['clientes'] = $this->cliente->listar_cliente(array(), $paginacao, $config['per_page'], 'cli_id', 'DESC');
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/clientes/lista_cliente', $dados);
    }
    public function busca_cliente($pagina = false){

    $dados = array();
 
    $busca = $this->input->post('keyword');

        $dados['msg'] = $this->session->flashdata('cad_ok');
        $dados['erro'] = $this->session->flashdata('cad_erro');
        
        $dados['clientes'] = $this->cliente->listar_pesquisa(array('cli_nome' => $busca), 0, 300);
        $dados['titulo'] = $this->configs->get_titulo().' - Gerenciador';
       
        $this->render->view('gerenciador/clientes/lista_cliente', $dados);

    }

    public function add_cliente() {

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('cli_nome', 'Titulo', 'required');

            if ($this->form_validation->run() == false) {

                $dados['erros'] = validation_errors('<li>', '</li>');
            } else {
                $dados_bd = $this->input->post();

                $dados_bd['cli_senha'] = md5($dados_bd['cli_senha']);
                $dados_bd['cli_data_cadastro']=date('d/m/Y');
                $dados['cli_data_cadastro']=date('d/m/Y');
                if ($this->cliente->inserir($dados_bd) > 0) {

                    $this->session->set_flashdata('cad_ok', 'Cliente cadastrado com sucesso.');
                    redirect('gerenciador/clientes');
                } else {
                    unlink($this->path_upload . $file['file_name']);
                    $dados['erros'] = 'Não foi possível cadastrar no banco de dados.';
                }
            }
        }

        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/clientes/add_cliente', $dados);
    }

    public function editar_cliente($id_cliente) {

        $dados = array();
        $dados['cliente'] = $this->cliente->get_cliente(array('cli_id' => $id_cliente));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('cli_nome', 'Titulo', 'required');

            if ($this->form_validation->run() == false) {

                $dados['erros'] = validation_errors('<li>', '</li>');
            } else {
                $dados_bd = $this->input->post();

                $dados_bd['cli_senha'] = md5($dados_bd['cli_senha']);
                
                if ($this->cliente->atualizar_informacoes(array('cli_id' => $id_cliente), $dados_bd) > 0) {

                    $this->session->set_flashdata('cad_ok', 'Cliente atualizado com sucesso');
                    redirect('gerenciador/clientes');
                }

                $dados['erros'] = 'Nenhuma modificação efetuada.';
            }
        }

        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/clientes/edit_cliente', $dados);
    }

    public function excluir_cliente($id_cliente) {

        if ($this->cliente->delete(array('cli_id' => $id_cliente), array('ped_cli_id' => $id_cliente)) > 0) {

            $this->session->set_flashdata('cad_ok', 'Cliente excluido com sucesso');
        } else {
            $this->session->set_flashdata('cad_erro', 'Cliente não pode ser excluido, porque existe pedido atribuido a ele!');
        }
        
        redirect('gerenciador/clientes');
    }

}
