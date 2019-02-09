<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estatico_Categoria extends CI_Model {

    /**
     * @author Jobson Ribeiro
     */
    
    public function inserir($dados){
        
        $this->db->insert('estatico_categoria', $dados);
        return $this->db->affected_rows();  
        
    } 
    
    public function atualizar($where, $dados){
        
        $this->db->update('estatico_categoria', $dados, $where);
        return $this->db->affected_rows();
        
    }
    
    public function delete($where){
        
        $this->db->delete('estatico_categoria', $where);
        return $this->db->affected_rows();  
        
    }
    
    public function listar_estatico_categoria($where, $paginacao, $limite, $campo_ordem = 'esc_nome', $ordem = 'ASC'){
        
    	
    	$this->db->order_by($campo_ordem, $ordem);        
        $query = $this->db->get_where('estatico_categoria', $where, $limite, $paginacao);        
        return $query->result();
        
    }     
    
    public function total_estatico_categoria($where = array()){
        
        $query = $this->db->get_where('estatico_categoria', $where);
        return $query->num_rows();
        
    }
    
    public function get_estatico_categoria($where){
        
        $query = $this->db->get_where('estatico_categoria', $where);
        foreach($query->result() as $estatico_categoria);
        return isset($estatico_categoria) ? $estatico_categoria : array();
        
    }
    
}
