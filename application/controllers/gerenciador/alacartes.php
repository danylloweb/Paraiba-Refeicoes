<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alacartes extends CI_Controller {

    /**
     * @author Jobson Ribeiro
     */
    public function __construct() {
        parent::__construct();
        $this->form_validation->set_message('required', '%s não pode ser vazio');
        $this->form_validation->set_message('valid_email', '%s não possui um email válido');
        $this->log_in->is_logged(array('administrador', 'funcionario'));
        $this->load->model('gerenciador/alacarte');
        $this->load->model('gerenciador/alacarte_categoria');
    }

    public function index($pagina = false) {

        $dados = array();

        $paginacao = $pagina != false ? $pagina : 0;

        $config['base_url'] = base_url() . 'gerenciador/alacartes/';
        $config['uri_segment'] = 3;
        $config['total_rows'] = $this->alacarte->total_alacarte();
        $config['per_page'] = 25;
        $config['cur_tag_open'] = '<span class="selected">';
        $config['cur_tag_close'] = '</span>';

        $this->pagination->initialize($config);

        $dados['msg'] = $this->session->flashdata('cad_ok');
        $dados['erro'] = $this->session->flashdata('cad_erro');

        $dados['alacartes'] = $this->alacarte->listar_alacarte(array(), $paginacao, $config['per_page'], 'ala_nome', 'ASC');
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/alacartes/lista_alacarte', $dados);
    }

    public function add_alacarte() {

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dados_bd = $this->input->post();

            if ($this->alacarte->inserir($dados_bd)) {

                $this->session->flashdata('cad_ok', 'À la Carte cadastrado com sucesso.');
                redirect('gerenciador/alacartes');
            } else {
                $dados['erros'] = 'Não foi possível cadastrar no banco de dados.';
            }
        }
        
        $dados['categorias'] = $this->alacarte_categoria->listar_alacarte_categoria(array(), 0, 99, 'alc_nome', 'ASC');
        
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/alacartes/add_alacarte', $dados);
    }

    public function editar_alacarte($id_alacarte) {

        $dados = array();
        $dados['alacarte'] = $this->alacarte->get_alacarte(array('ala_id' => $id_alacarte));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dados_bd = $this->input->post();
            
            if ($this->alacarte->atualizar(array('ala_id' => $id_alacarte), $dados_bd) > 0) {
                
                $this->session->set_flashdata('cad_ok', 'À la Carte atualizado com sucesso');
                redirect('gerenciador/alacartes');
            } else {
                $dados['erros'] = 'Nenhuma alteração foi efetuada.';
            }
        }

        $dados['categorias'] = $this->alacarte_categoria->listar_alacarte_categoria(array(), 0, 99, 'alc_nome', 'ASC');

        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/alacartes/edit_alacarte', $dados);
    }

    public function excluir_alacarte($id_alacarte) {

        if ($this->alacarte->delete(array('ala_id' => $id_alacarte)) > 0) {

            $this->session->set_flashdata('cad_ok', 'À la Carte excluido com sucesso');
        }

        redirect('gerenciador/alacartes');
    }

}
