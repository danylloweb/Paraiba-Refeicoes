<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alacarte_Categoria extends CI_Model {

    /**
     * @author Jobson Ribeiro
     */
    
    public function inserir($dados){
        
        $this->db->insert('alacarte_categoria', $dados);
        return $this->db->affected_rows();  
        
    }        
    
    public function atualizar($where, $dados){
        
        $this->db->update('alacarte_categoria', $dados, $where);
        return $this->db->affected_rows();
        
    }
    
    public function delete($where){
        
        $this->db->delete('alacarte_categoria', $where);
        return $this->db->affected_rows();  
        
    }
    
    public function listar_alacarte_categoria($where, $paginacao, $limite, $campo_ordem = 'alc_id', $ordem = 'DESC'){
        
        
    	$this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('alacarte_categoria', $where, $limite, $paginacao);
        return $query->result();
        
    }      
    
    public function total_alacarte_categoria($where = array()){
        
        
        $query = $this->db->get_where('alacarte_categoria', $where);
        return $query->num_rows();
        
    }
    
    public function get_alacarte_categoria($where){
        
                
        $query = $this->db->get_where('alacarte_categoria', $where);
        foreach($query->result() as $alacarte_categoria);
        return isset($alacarte_categoria) ? $alacarte_categoria : array();
        
    }
    
}
