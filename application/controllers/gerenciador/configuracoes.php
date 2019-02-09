<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configuracoes extends CI_Controller {

    /**
     * @author Jobson Ribeiro
     */
    
    public function __construct(){
        parent::__construct();
        $this->form_validation->set_message('required','%s não pode ser vazio');
        $this->form_validation->set_message('valid_email','%s não possui um email válido');
        $this->log_in->is_logged(array('administrador'));
    }
    
    public function index()  {
        
        $dados = array();
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
        	if($this->configs->atualizar($this->input->post()) > 0){
        		
        		$dados['msg'] = 'Configuração atualizada com sucesso';
        		
        	}else{
        		
        		$dados['erros'] = 'Nenhuma configuração modificada';
        		
        	}
        	redirect('gerenciador/configuracoes');
        	
        }
        
        $dados['titulo'] = $this->configs->get_titulo().' - Gerenciador';
        
        $this->render->view('gerenciador/configuracoes/edit_configuracao', $dados);
        
    }
    
    
}