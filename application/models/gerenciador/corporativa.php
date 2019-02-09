<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Corporativa extends CI_Model {

    /**
     * @author Jobson Ribeiro
     */
    
    public function inserir($dados){
        
        $this->db->insert('corporativa', $dados);
        return $this->db->affected_rows();  
        
    }        
    
    public function atualizar($where, $dados){
        
        $this->db->update('corporativa', $dados, $where);
        return $this->db->affected_rows();
        
    }
    
    public function delete($where){
        
        $this->db->delete('corporativa', $where);
        return $this->db->affected_rows();  
        
    }
    
    public function listar_corporativa($where, $paginacao, $limite, $campo_ordem = 'cor_id', $ordem = 'DESC'){
        
        $this->db->join('corporativa_categoria', 'corporativa_categoria.coc_id = corporativa.cor_coc_id');
    	$this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('corporativa', $where, $limite, $paginacao);
        return $query->result();
        
    }      
    
    public function total_corporativa($where = array()){
        
        
        $query = $this->db->get_where('corporativa', $where);
        return $query->num_rows();
        
    }
    
    public function get_corporativa($where){
        
                
        $query = $this->db->get_where('corporativa', $where);
        foreach($query->result() as $corporativa);
        return isset($corporativa) ? $corporativa : array();
        
    }
    
}
