<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alacartes_Categorias extends CI_Controller {

    /**
     * @author Jobson Ribeiro
     */
    private $path_upload = 'public/uploads/alacartes/';

    public function __construct() {
        parent::__construct();
        $this->form_validation->set_message('required', '%s não pode ser vazio');
        $this->form_validation->set_message('valid_email', '%s não possui um email válido');
        $this->log_in->is_logged(array('administrador', 'funcionario'));
        $this->load->model('gerenciador/alacarte');
        $this->load->model('gerenciador/alacarte_categoria');

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

        $config['base_url'] = base_url() . 'gerenciador/alacartes_categorias/';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->alacarte_categoria->total_alacarte_categoria();
        $config['per_page'] = 25;
        $config['cur_tag_open'] = '<span class="selected">';
        $config['cur_tag_close'] = '</span>';

        $this->pagination->initialize($config);

        $dados['msg'] = $this->session->flashdata('cad_ok');
        $dados['erro'] = $this->session->flashdata('cad_erro');

        $dados['categorias'] = $this->alacarte_categoria->listar_alacarte_categoria(array(), $paginacao, $config['per_page'], 'alc_nome', 'ASC');
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/alacartes_categorias/lista_categoria', $dados);
    }

    public function add_alacarte_categoria() {

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dados_bd = $this->input->post();

            if (!$this->upload->do_upload('alc_imagem')) {

                $dados['erros'] = $this->upload->display_errors();
            } else {

                $file = $this->upload->data();
                $dados_bd['alc_imagem'] = $file['file_name'];

                if ($this->alacarte_categoria->inserir($dados_bd)) {

                    $this->session->flashdata('cad_ok', 'Categoria cadastrado com sucesso.');
                    redirect('gerenciador/alacartes_categorias');
                } else {
                    $dados['erros'] = 'Não foi possível cadastrar no banco de dados.';
                }
            }
        }

        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/alacartes_categorias/add_categoria', $dados);
    }

    public function editar_alacarte_categoria($id_alacarte_categoria) {

        $dados = array();
        $dados['categoria'] = $this->alacarte_categoria->get_alacarte_categoria(array('alc_id' => $id_alacarte_categoria));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dados_bd = $this->input->post();

            if ($this->upload->do_upload('alc_imagem')) {

                $file = $this->upload->data();
                $file_antigo = $this->path_upload . $dados['categoria']->alc_imagem;

                $dados_bd['alc_imagem'] = $file['file_name'];
            }

            if ($this->alacarte_categoria->atualizar(array('alc_id' => $id_alacarte_categoria), $dados_bd) > 0) {

                if (isset($file_antigo)) {
                    if (file_exists($file_antigo))
                        unlink($file_antigo);
                }

                $this->session->set_flashdata('cad_ok', 'Categoria atualizado com sucesso');
                redirect('gerenciador/alacartes_categorias');
            } else {
                $dados['erros'] = 'Nenhuma alteração foi efetuada.';
            }
        }

        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/alacartes_categorias/edit_categoria', $dados);
    }

    public function excluir_alacarte_categoria($id_alacarte_categoria) {

        if ($this->alacarte_categoria->delete(array('alc_id' => $id_alacarte_categoria)) > 0) {

            $this->session->set_flashdata('cad_ok', 'Categoria excluido com sucesso');
        }

        redirect('gerenciador/alacartes_categorias');
    }

}
