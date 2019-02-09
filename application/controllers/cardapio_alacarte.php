<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cardapio_Alacarte extends CI_Controller {

    private $tpl = 'tpl';

    public function __construct() {
        parent::__construct();

        $this->form_validation->set_message('required', '%s é obrigatório');
        $this->form_validation->set_message('valid_email', '%s não possui um valor válido');

        $config = $this->configs->select_by_id(1);

        $this->load->model('gerenciador/prato');
        $this->load->model('gerenciador/prato_categoria');

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
        
        if ($this->session->userdata('tipo_cardapio') == 'marmita') {
            $this->session->unset_userdata('cart_contents');
            $this->session->set_userdata('tipo_cardapio', 'alacarte');
            redirect('cardapio_alacarte');
        } else {
            $this->session->set_userdata('tipo_cardapio', 'alacarte');
        }
        
        $config = $this->configs->select_by_id(1);

        $dados['adressConf'] = $config->conf_adress;

        $dados['preco_quentinha'] = $config->conf_preco_marmita;

        $data_atual = date('Y/m/d');

        $dados['marmita'] = $this->marmita->get_marmita(array('mar_data' => $data_atual));

        if (empty($dados['marmita'])) {
            redirect('atendimento');
        }

        $dados['pratos'] = $this->prato->listar_prato(array('pra_prc_id' => 1), 0, 999);

        $dados['categorias'] = $this->prato_categoria->listar_prato_categoria(array(), 0, 999, 'prc_nome', 'ASC');

        $dados['titulo'] = 'Cardápio do À la carte.';

        $this->template->load($this->tpl, 'cardapio_alacarte/index', $dados);
    }

    public function add_alacarte() {
        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dados_bd = $this->input->post();

            $id_alacarte = $dados_bd['id'];

            $alacarte = $this->prato->get_prato(array('pra_id' => $id_alacarte));

            $itensMarmita = array('id' => $id_alacarte, 'name' => $dados_bd['name'],
                'qty' => $dados_bd['qty'], 'price' => $alacarte->pra_valor);

            $this->cart->insert($itensMarmita);

            redirect('cardapio_alacarte');
        }
    }
    
    public function categoria($id_categoria) {
        $config = $this->configs->select_by_id(1);

        if ($this->session->userdata('tipo_cardapio') == 'marmita') {
            $this->session->unset_userdata('cart_contents');
            $this->session->set_userdata('tipo_cardapio', 'alacarte');
            redirect('cardapio_alacarte/categoria/' . $id_categoria);
        } else {
            $this->session->set_userdata('tipo_cardapio', 'alacarte');
        }
        
        $dados['adressConf'] = $config->conf_adress;

        $dados['preco_quentinha'] = $config->conf_preco_marmita;

        $data_atual = date('Y/m/d');

        $dados['marmita'] = $this->marmita->get_marmita(array('mar_data' => $data_atual));

        if (empty($dados['marmita'])) {
            redirect('atendimento');
        }

        $dados['pratos'] = $this->prato->listar_prato(array('pra_prc_id' => $id_categoria), 0, 999);

        $dados['categorias'] = $this->prato_categoria->listar_prato_categoria(array(), 0, 999, 'prc_nome', 'ASC');
        
        $dados['titulo'] = 'Cardápio do À la carte.';

        $this->template->load($this->tpl, 'cardapio_alacarte/index', $dados);
    }

}
