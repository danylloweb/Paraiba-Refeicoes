<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Empresa_Clientes extends CI_Controller {

    /**
     * @author Jobson Ribeiro
     */
    private $path_upload = 'public/uploads/clientes/';

    public function __construct() {
        parent::__construct();
        $this->form_validation->set_message('required', '%s não pode ser vazio');
        $this->form_validation->set_message('valid_email', '%s não possui um email válido');
        $this->log_in->is_logged(array('administrador'));
        
        $this->load->model('gerenciador/empresa_cliente');

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

        $config['base_url'] = base_url() . 'gerenciador/empresa_clientes/';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->empresa_cliente->total_empresa_cliente();
        $config['per_page'] = 25;
        $config['cur_tag_open'] = '<span class="selected">';
        $config['cur_tag_close'] = '</span>';

        $this->pagination->initialize($config);

        $dados['msg'] = $this->session->flashdata('cad_ok');
        $dados['erro'] = $this->session->flashdata('cad_erro');

        $dados['clientes'] = $this->empresa_cliente->listar_empresa_cliente(array(), $paginacao, $config['per_page'], 'emc_id', 'DESC');
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';
//        echo '1';exit;
        $this->render->view('gerenciador/empresa_clientes/lista_empresa_cliente', $dados);
    }

    public function add_empresa_cliente() {

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('emc_titulo', 'Titulo', 'required');
            
            if ($this->form_validation->run() == false) {

                $dados['erros'] = validation_errors('<li>', '</li>');
            } else {

                $dados_bd = $this->input->post();

                if (!$this->upload->do_upload('emc_imagem')) {

                    $dados['erros'] = $this->upload->display_errors();
                } else {

                    $file = $this->upload->data();
                    $dados_bd['emc_imagem'] = $file['file_name'];

                    if ($this->empresa_cliente->inserir($dados_bd)) {
                        
                        $this->session->flashdata('cad_ok', 'Cliente cadastrado com sucesso.');
                        redirect('gerenciador/empresa_clientes');
                    } else {
                        unlink($this->path_upload . $file['file_name']);
                        $dados['erros'] = 'Não foi possível cadastrar no emcco de dados.';
                    }
                }
            }
        }
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/empresa_clientes/add_empresa_cliente', $dados);
    }

    public function editar_empresa_cliente($id_empresa_cliente) {

        $dados = array();
        $dados['empresa_cliente'] = $this->empresa_cliente->get_empresa_cliente(array('emc_id' => $id_empresa_cliente));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('emc_titulo', 'Titulo', 'required');

            if ($this->form_validation->run() == false) {

                $dados['erros'] = validation_errors('<li>', '</li>');
            } else {

                $dados_bd = $this->input->post();

                if ($this->upload->do_upload('emc_imagem')) {

                    $file = $this->upload->data();
                    $file_antigo = $this->path_upload . $dados['empresa_cliente']->emc_imagem;

                    $dados_bd['emc_imagem'] = $file['file_name'];
                }

                if ($this->empresa_cliente->atualizar(array('emc_id' => $id_empresa_cliente), $dados_bd) > 0) {
                    
                    if (isset($file_antigo)) {
                        if (file_exists($file_antigo))
                            unlink($file_antigo);
                    }

                    $this->session->set_flashdata('cad_ok', 'Cliente atualizado com sucesso');
                    redirect('gerenciador/empresa_clientes');
                }

                $dados['erros'] = 'Nenhuma alteração foi efetuada.';
            }
        }

        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';
        
        $this->render->view('gerenciador/empresa_clientes/edit_empresa_cliente', $dados);
    }

    public function excluir_empresa_cliente($id_empresa_cliente) {

        if ($this->empresa_cliente->delete(array('emc_id' => $id_empresa_cliente)) > 0) {

            $this->session->set_flashdata('cad_ok', 'Cliente excluido com sucesso');
        }

        redirect('gerenciador/empresa_clientes');
    }

}