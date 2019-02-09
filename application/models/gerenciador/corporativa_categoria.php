<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Corporativa_Categoria extends CI_Model {

    /**
     * @author Jobson Ribeiro
     */
    
    public function inserir($dados){
        
        $this->db->insert('corporativa_categoria', $dados);
        return $this->db->affected_rows();  
        
    }        
    
    public function atualizar($where, $dados){
        
        $this->db->update('corporativa_categoria', $dados, $where);
        return $this->db->affected_rows();
        
    }
    
    public function delete($where){
        
        $this->db->delete('corporativa_categoria', $where);
        return $this->db->affected_rows();  
        
    }
    
    public function listar_corporativa_categoria($where, $paginacao, $limite, $campo_ordem = 'coc_id', $ordem = 'DESC'){
        
        
    	$this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('corporativa_categoria', $where, $limite, $paginacao);
        return $query->result();
        
    }      
    
    public function total_corporativa_categoria($where = array()){
        
        
        $query = $this->db->get_where('corporativa_categoria', $where);
        return $query->num_rows();
        
    }
    
    public function get_corporativa_categoria($where){
        
                
        $query = $this->db->get_where('corporativa_categoria', $where);
        foreach($query->result() as $corporativa_categoria);
        return isset($corporativa_categoria) ? $corporativa_categoria : array();
        
    }
    
}
