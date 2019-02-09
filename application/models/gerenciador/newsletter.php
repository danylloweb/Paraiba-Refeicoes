<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newsletter extends CI_Model {

    /**
     * @author Isaias Filho
     */
    
    public function inserir($dados){
        
    	$query = $this->db->get_where('newsletter', $dados);
    	if ($query->num_rows() == 0){
    		
    		$this->db->insert('newsletter', $dados);
            return $this->db->affected_rows();
    		
    	}
        
    	return 0;
        
    } 
    
    public function atualizar($where, $dados){
        
        $this->db->update('newsletter', $dados, $where);
        return $this->db->affected_rows();
        
    }
    
    public function delete($where){
        
        $this->db->delete('newsletter', $where);
        return $this->db->affected_rows();  
        
    }
    
    public function listar_newsletter($where, $paginacao, $limite){
        
        $query = $this->db->get_where('newsletter', $where, $limite, $paginacao);
        return $query->result();
        
    }
    
    public function total_newsletter(){
        
        $query = $this->db->get('newsletter');
        return $query->num_rows();
        
    }
    
    public function get_newsletter($where){
        
        $query = $this->db->get_where('newsletter', $where);
        foreach($query->result() as $newsletter);
        return isset($newsletter) ? $newsletter : array();
        
    }
    
    
}
