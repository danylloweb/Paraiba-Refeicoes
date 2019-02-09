<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alacarte extends CI_Model {

    /**
     * @author Jobson Ribeiro
     */
    
    public function inserir($dados){
        
        $this->db->insert('alacarte', $dados);
        return $this->db->affected_rows();  
        
    }        
    
    public function atualizar($where, $dados){
        
        $this->db->update('alacarte', $dados, $where);
        return $this->db->affected_rows();
        
    }
    
    public function delete($where){
        
        $this->db->delete('alacarte', $where);
        return $this->db->affected_rows();  
        
    }
    
    public function listar_alacarte($where, $paginacao, $limite, $campo_ordem = 'ala_id', $ordem = 'DESC'){
        
        $this->db->join('alacarte_categoria', 'alacarte_categoria.alc_id = alacarte.ala_alc_id','inner');
    	$this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('alacarte', $where, $limite, $paginacao);
        return $query->result();
        
    }      
    
    public function total_alacarte($where = array()){
        
        $this->db->join('alacarte_categoria', 'alacarte_categoria.alc_id = alacarte.ala_alc_id','inner');
        $query = $this->db->get_where('alacarte', $where);
        return $query->num_rows();
        
    }
    
    public function get_alacarte($where){
        
        $this->db->join('alacarte_categoria', 'alacarte_categoria.alc_id = alacarte.ala_alc_id','inner');        
        $query = $this->db->get_where('alacarte', $where);
        foreach($query->result() as $alacarte);
        return isset($alacarte) ? $alacarte : array();
        
    }
    
}
