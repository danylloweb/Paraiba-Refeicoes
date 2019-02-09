<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Newsletters extends CI_Controller {

    /**
     * @author Jobson Ribeiro
     */
    private $path_upload = 'public/uploads/newsletters/';

    public function __construct() {

        parent::__construct();
        $this->form_validation->set_message('required', '%s não pode ser vazio');
        $this->form_validation->set_message('valid_email', '%s não possui um email válido');
        $this->log_in->is_logged(array('administrador'));
        $this->load->helper('email');
        $this->load->model('gerenciador/newsletter');
        $this->load->model('gerenciador/newsletter_email');

        $config['upload_path'] = $this->path_upload;
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '1024';
        $config['remove_spaces'] = true;
        $config['encrypt_name'] = true;
        $this->upload->initialize($config);
    }

    public function index($pagina = false) {

        $dados = array();

        $paginacao = $pagina != false ? $pagina : 0;

        $config['base_url'] = base_url() . 'gerenciador/newsletters';
        $config['uri_segment'] = 4;
        $config['total_rows'] = $this->newsletter->total_newsletter();
        $config['per_page'] = 25;
        $config['cur_tag_open'] = '<span class="selected">';
        $config['cur_tag_close'] = '</span>';

        $this->pagination->initialize($config);

        $dados['msg'] = $this->session->flashdata('cad_ok');
        $dados['erro'] = $this->session->flashdata('cad_erro');

        $dados['newsletters'] = $this->newsletter->listar_newsletter(array(), $paginacao, $config['per_page']);
        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/newsletters/lista_newsletter', $dados);
    }

    public function add_newsletter() {


        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('new_titulo', 'Titulo', 'required');

            if ($this->form_validation->run() == false) {

                $dados['erros'] = validation_errors('<li>', '</li>');
            } else {

                $dados_bd = $this->input->post();

                $dados_bd["new_data_criacao"] = date('Y-m-d H:i:s');

                if (!$this->upload->do_upload('new_imagem')) {

                    $dados['erros'] = $this->upload->display_errors();
                } else {

                    $file = $this->upload->data();
                    $dados_bd['new_imagem'] = $file['file_name'];

                    if ($this->newsletter->inserir($dados_bd)) {

                        $this->session->flashdata('cad_ok', 'Newsletter cadastrado com sucesso.');
                        redirect('gerenciador/newsletters');
                    } else {
                        unlink($this->path_upload . $file['file_name']);
                        $dados['erros'] = 'Não foi possível cadastrar no banco de dados.';
                    }
                }
            }
        }

        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/newsletters/add_newsletter', $dados);
    }

    public function editar_newsletter($id_newsletter) {

        $dados = array();
        $dados['newsletter'] = $this->newsletter->get_newsletter(array('new_id' => $id_newsletter));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('new_titulo', 'Titulo', 'required');

            if ($this->form_validation->run() == false) {

                $dados['erros'] = validation_errors('<li>', '</li>');
            } else {

                $dados_bd = $this->input->post();

                $dados_bd["new_data_alteracao"] = date('Y-m-d H:i:s');

                if ($this->upload->do_upload('new_imagem')) {

                    $file = $this->upload->data();
                    $file_antigo = $this->path_upload . $dados['newsletter']->new_imagem;

                    $dados_bd['new_imagem'] = $file['file_name'];
                }

                if ($this->newsletter->atualizar(array('new_id' => $id_newsletter), $dados_bd) > 0) {

                    if (isset($file_antigo)) {
                        if (file_exists($file_antigo))
                            unlink($file_antigo);
                    }

                    $this->session->set_flashdata('cad_ok', 'Newsletter atualizado com sucesso');
                    redirect('gerenciador/newsletters');
                }

                $dados['erros'] = 'Nenhuma alteração foi efetuada.';
            }
        }

        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';

        $this->render->view('gerenciador/newsletters/edit_newsletter', $dados);
    }

    public function excluir_newsletter($id_newsletter) {

        if ($this->newsletter->delete(array('new_id' => $id_newsletter)) > 0) {

            $this->session->set_flashdata('cad_ok', 'Newsletter excluido com sucesso');
        }

        redirect('gerenciador/newsletters');
    }

    public function enviar_news() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('mensagem', 'Newsletter', 'required');
            $this->form_validation->set_rules('assunto', 'Assunto', 'required');

            if ($this->form_validation->run() == false) {

                $dados['erros'] = 'O campo Newsletter não pode ser vazio.';
            } else {

                //$conf = $this->configuracao->get_configuracao();
                $emails = $this->newsletter_email->listar_email(array('ema_status' => 1), 0, 99999);
                if (count($emails) > 0) {

                    foreach ($emails as $email) {

                        $lista_emails[] = $email->ema_email;
                    }

                    $this->sender->enviar_email(
                            $this->configs->get_smtpuser(), 'O Borrachão', $this->configs->get_email(), $this->input->post('assunto'), $this->input->post('mensagem'), $cc = false, $lista_emails
                    );
                    $total_emails = count($lista_emails);
                    $this->session->set_flashdata('cad_ok', $total_emails . ' Emails enviados com sucesso.');
                    redirect('gerenciador/newsletters');
                } else {

                    $dados['erros'] = 'Não existem emails para enviar';
                }
            }
        }

        $dados['titulo'] = $this->configs->get_titulo() . ' - Gerenciador';
        
        $this->render->view('gerenciador/newsletters/envia_newsletter', $dados);        
    }

}