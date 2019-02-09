<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cardapio extends CI_Controller {

    private $tpl = 'tpl';

    public function __construct() {
        parent::__construct();

        $this->form_validation->set_message('required', '%s é obrigatório');
        $this->form_validation->set_message('valid_email', '%s não possui um valor válido');
       
        $config = $this->configs->select_by_id(1);
        
        $this->load->model('gerenciador/bebida');
        $this->load->model('gerenciador/sobremesa');
                
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
        
        if ($this->session->userdata('tipo_cardapio') == 'alacarte') {
            $this->session->unset_userdata('cart_contents');
            $this->session->set_userdata('tipo_cardapio', 'marmita');
            redirect('cardapio');
        } else {
            $this->session->set_userdata('tipo_cardapio', 'marmita');
        }
        
        $config = $this->configs->select_by_id(1);
        
        $dados['preco_quentinha'] =  $config->conf_preco_marmita;
        
        $data_atual = date('Y/m/d');
        
        $dados['marmita'] = $this->marmita->get_marmita(array('mar_data' => $data_atual));
        
        if (empty($dados['marmita'])) {
            redirect('atendimento');
        }
        
        $id_marmita = $dados['marmita']->mar_id;
        
        $dados['feijoes'] = $this->marmita->listar_marmita_feijao(array('mtf_mar_id' => $id_marmita),0,99, 'fei_nome', 'ASC');
        
        $dados['arrozes'] = $this->marmita->listar_marmita_arroz(array('mta_mar_id' => $id_marmita),0,99, 'arr_nome', 'ASC');
        
        $dados['macarroes'] = $this->marmita->listar_marmita_macarrao(array('mtm_mar_id' => $id_marmita),0,99, 'mac_nome', 'ASC');
        
        $dados['saladas'] = $this->marmita->listar_marmita_salada(array('mts_mar_id' => $id_marmita),0,99, 'sal_nome', 'ASC');
        
        $dados['acompanhamentos'] = $this->marmita->listar_marmita_acompanhamento(array('maa_mar_id' => $id_marmita),0,99, 'aco_nome', 'ASC');
                
        $dados['carnes'] = $this->marmita->listar_marmita_carne(array('mtc_mar_id' => $id_marmita),0,99, 'car_nome', 'ASC');
        
        $dados['bebidas'] = $this->marmita->listar_marmita_bebida(array('mtb_mar_id' => $id_marmita),0,99, 'beb_nome', 'ASC');                                
        
        $dados['sobremesas'] = $this->marmita->listar_marmita_sobremesa(array('mas_mar_id' => $id_marmita),0,99, 'sob_nome', 'ASC');
                
//        print_r($this->session->all_userdata());
        $dados['titulo'] = 'Bem vindo';        
        
        $this->template->load($this->tpl, 'cardapio/index', $dados);
    }
    
    public function add_marmita() {
        $dados = array();

        $config = $this->configs->select_by_id(1);
        
        $preco_quentinha =  $config->conf_preco_marmita;
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dados_bd = $this->input->post();
            
            $dados_bd['ref_data'] = date('Y/m/d');
            
            $bebida = $this->bebida->get_bebida(array('beb_nome' => $dados_bd['ref_bebida']));
            
            $sobremesa = $this->sobremesa->get_sobremesa(array('sob_nome' => $dados_bd['ref_sobremesa']));
            
            if (count($bebida) > 0 && count($sobremesa) > 0) {
                $preco_final = $preco_quentinha + $bebida->beb_preco + $sobremesa->sob_preco;
            } elseif (count($bebida) > 0) {
                $preco_final = $preco_quentinha + $bebida->beb_preco;
            } elseif (count($sobremesa) > 0) {
                $preco_final = $preco_quentinha + $sobremesa->sob_preco;
            } else {
                $preco_final = $preco_quentinha;
            }

	    if (count(array_filter($dados_bd)) <= 3) {                
                echo "<script type='text/javascript' charset='utf-8'>
                alert('Insira pelo menos tr\u00eas itens a marmita.');
                window.location.href='cardapio';
                </script>";
            } else { 
            
            if ($this->refeicao->inserir($dados_bd)) {
                $id_refeicao = $this->db->insert_id();
                
                $itensMarmita = array('id' => $id_refeicao, 'name' => 'marmita ' . $id_refeicao,
                                      'qty' => 1, 'price' => $preco_final);
                
                $this->cart->insert($itensMarmita);
                
                redirect('cardapio');
                
            } else {
                $this->session->set_flashdata('cad_erro', 'Não foi possível adicionar a marmita, entre em contato conosco.');
                redirect('cardapio');
            }
        }
      }
    }

}
