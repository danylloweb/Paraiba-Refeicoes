<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    private $tpl = 'tpl_site';

    public function __construct() {
        parent::__construct();

        $this->form_validation->set_message('required', '%s é obrigatório');
        $this->form_validation->set_message('valid_email', '%s não possui um valor válido');

        $this->load->model('gerenciador/banner');

        $config = $this->configs->select_by_id(1);

        $this->template->set('title', $config->conf_name);
        $this->template->set('description', $config->conf_seo_description);
        $this->template->set('keywords', $config->conf_seo_keywords);
        $this->template->set('emailConf', $config->conf_email);
        $this->template->set('foneConf', $config->conf_phone_one);
        $this->template->set('foneConfTwo', $config->conf_phone_two);
        $this->template->set('adressConf', $config->conf_adress);
    }

    public function index() {

        $dados = array();

        $config = $this->configs->select_by_id(1);

        $dados['preco_quentinha'] =  $config->conf_preco_marmita;

        $dados['adressConf'] =  $config->conf_adress;

        $data_atual = date('Y/m/d');

        $dados['marmita'] = $this->marmita->get_marmita(array('mar_data' => $data_atual));

        if (empty($dados['marmita'])) {
            redirect('atendimento');
        }

        $dados['id_marmita'] = $dados['marmita']->mar_id;

        $getUltimaData = $this->marmita->listar_marmita_maximo(array(), 0, 99);

        $sexta = strtotime($getUltimaData->mar_data . '-1 days');
        $quinta = strtotime($getUltimaData->mar_data . '-2 days');
        $quarta = strtotime($getUltimaData->mar_data . '-3 days');
        $terca = strtotime($getUltimaData->mar_data . '-4 days');
        $segunda = strtotime($getUltimaData->mar_data . '-5 days');

        $dados['sabado'] = $this->marmita->get_marmita(array('mar_data' => $getUltimaData->mar_data));
        $dados['sexta'] = $this->marmita->get_marmita(array('mar_data' => date('y-m-d', $sexta)));
        $dados['quinta'] = $this->marmita->get_marmita(array('mar_data' => date('y-m-d', $quinta)));
        $dados['quarta'] = $this->marmita->get_marmita(array('mar_data' => date('y-m-d', $quarta)));
        $dados['terca'] = $this->marmita->get_marmita(array('mar_data' => date('y-m-d', $terca)));
        $dados['segunda'] = $this->marmita->get_marmita(array('mar_data' => date('y-m-d', $segunda)));

        $dados['banners'] = $this->banner->listar_banner(array(),0,99);

        $dados['titulo'] = 'Bem vindo';

        $this->template->load($this->tpl, 'home/index', $dados);
    }

    public function newsletter() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('ema_email', 'Email', 'required|valid_email');

            if ($this->form_validation->run() == false) {

//                $dados['erros'] = validation_errors();

                echo "0Email Inválido";
                exit;
            } else {

                if ($this->newsletter_email->inserir($this->input->post()) > 0) {

//                    $this->session->set_flashdata('cad_ok', 'Email cadastrado com sucesso.');
//                    $dados['erros'] = 'Email cadastrado com sucesso';
                    echo '1';
                    exit;
                } else {
//                    $dados['erros'] = 'Email já cadastrado';
                    echo "0Email já cadastrado";
                    exit;
                }
            }
        }

    }

    public function teste()
    {
        // echo '<pre>';
        // print_r($this->configs);

        // return false;

        $this->sender->enviar_email($this->configs->get_smtpuser(), $this->configs->get_titulo(), 'erickamaral@gmail.com', 'Solicitação de marmita.', 'Enviando teste');
    }

}
