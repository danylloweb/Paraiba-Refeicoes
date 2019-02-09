<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prato_Categoria extends CI_Model {

    /**
     * @author Jobson Ribeiro
     */
    
    public function inserir($dados){
        
        $this->db->insert('prato_categoria', $dados);
        return $this->db->affected_rows();  
        
    }        
    
    public function atualizar($where, $dados){
        
        $this->db->update('prato_categoria', $dados, $where);
        return $this->db->affected_rows();
        
    }
    
    public function delete($where){
        
        $this->db->delete('prato_categoria', $where);
        return $this->db->affected_rows();  
        
    }
    
    public function listar_prato_categoria($where, $paginacao, $limite, $campo_ordem = 'prc_id', $ordem = 'DESC'){
                
    	$this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('prato_categoria', $where, $limite, $paginacao);
        return $query->result();
        
    }      
    
    public function total_prato_categoria($where = array()){
                
        $query = $this->db->get_where('prato_categoria', $where);
        return $query->num_rows();
        
    }
    
    public function get_prato_categoria($where){
                        
        $query = $this->db->get_where('prato_categoria', $where);
        foreach($query->result() as $prato_categoria);
        return isset($prato_categoria) ? $prato_categoria : array();
        
    }
    
}
