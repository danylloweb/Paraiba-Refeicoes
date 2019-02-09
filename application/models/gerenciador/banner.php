<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends CI_Model {

    /**
     * @author Jobson Ribeiro
     */
    
    public function inserir($dados){
        
        $this->db->insert('banner', $dados);
        return $this->db->affected_rows();  
        
    } 
    
    public function atualizar($where, $dados){
        
        $this->db->update('banner', $dados, $where);
        return $this->db->affected_rows();
        
    }
    
    public function delete($where){
        
        $this->db->delete('banner', $where);
        return $this->db->affected_rows();  
        
    }
    
    public function listar_banner($where, $paginacao, $limite, $campo_ordem = 'ban_id', $ordem = 'DESC'){
        
    	$this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('banner', $where, $limite, $paginacao);
        return $query->result();
        
    }
    
    public function listar_banner_categoria($where, $campo_ordem = 'ban_id', $ordem = 'DESC'){
        
    	$this->db->order_by($campo_ordem, $ordem);
        $this->db->distinct();
        $this->db->select('ban_categoria');
        $this->db->from('banner');
        $this->db->where($where);
        
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function total_banner($where = array()){
        
        $query = $this->db->get_where('banner', $where);
        return $query->num_rows();
        
    }
    
    public function get_banner($where){
        
        $query = $this->db->get_where('banner', $where);
        foreach($query->result() as $banner);
        return isset($banner) ? $banner : array();
        
    }
    
}
