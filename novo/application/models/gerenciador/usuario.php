<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Model {

	/**
	 * @author Isaias Filho
	 */
	
	public function inserir($dados){
		
		if ($this->validar_usuario(array('usu_email' => $dados['usu_email'])) == 0){
			$this->db->insert('usuario', $dados);
			return $this->db->affected_rows();	
		}
		
		return 'exists';
		
	} 
	
	public function atualizar($where, $dados){
		
		$this->db->update('usuario', $dados, $where);
		return $this->db->affected_rows();
		
	}
	
	public function delete($where){
		
		$this->db->delete('usuario', $where);
		return $this->db->affected_rows();
		
	}
	
	public function listar_usuario($where, $paginacao, $limite, $campo_ordem = 'usu_nome', $ordem = 'ASC'){
		
		$this->db->order_by($campo_ordem, $ordem);
		$query = $this->db->get_where('usuario', $where, $limite, $paginacao);
		return $query->result();
		
	}
	
	public function total_usuario($where){
		
		$query = $this->db->get_where('usuario', $where);
		return $query->num_rows();
		
	}
	
	public function get_usuario($where){
		
		$query = $this->db->get_where('usuario', $where);
		return $query->result();
		
	}
	
	private function validar_email($where){
		
		$query = $this->db->get_where('usuario', $where);
		if ($query->num_rows() == 0){
			return true;
		}
		
		return false;
		
	}
	
	public function validar_usuario($where){
		
		$query = $this->db->get_where('usuario', $where);
		return $query->num_rows();
		
	}
	
    public function reset_senha($email){
        
        if ($this->validar_usuario(array('email_usuario' => $email)) > 0){
            
            $nova_senha = $this->gerador_senha();
            $senha_hash = do_hash($nova_senha, 'md5');
            
            if ($nova_senha != ''){
                
                if ($this->atualizar(array('email_usuario' => $email), array('senha_usuario' => $senha_hash))){
                    
                    $template_email = $this->template_emails->email_reset_senha($email, $nova_senha, base_url());
                    $this->sender->enviar_email(
                             $this->configs->get_smtpuser(),
                             $this->configs->get_titulo(), 
                             $email, 'Novos dados de acesso', $template_email
                             );
                    
                   return 'Uma nova senha foi enviada para seu email.';
                   
                }else{
                    
                   return 'Não foi possível alterar sua senha.';
                }
                
            }
            
        }else {
            
            return 'Email inexistente.';
            
        }
        
    }
    
    public function gerador_senha(){
        
        $nova_senha = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',5)),0,10);
        return $nova_senha;
        
    }
	
}
