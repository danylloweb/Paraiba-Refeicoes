<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carne extends CI_Model {

    /**
     * @author Jobson Ribeiro
     */
    
    public function inserir($dados){
        
        $this->db->insert('carne', $dados);
        return $this->db->affected_rows();  
        
    } 
    
    public function delete_carne_marmita($where){
        
        $this->db->delete('marmita_tem_carne', $where);
        return $this->db->affected_rows();  
        
    }
    
    public function inserir_carne_marmita($dados){
        
        $this->db->insert('marmita_tem_carne', $dados);
        return $this->db->affected_rows();  
        
    } 
    
    public function atualizar($where, $dados){
        
        $this->db->update('carne', $dados, $where);
        return $this->db->affected_rows();
        
    }
    
    public function delete($where){
        
        $this->db->delete('carne', $where);
        return $this->db->affected_rows();  
        
    }
    
    public function listar_carne($where, $paginacao, $limite, $campo_ordem = 'car_id', $ordem = 'DESC'){
        
        
        $this->db->join('marmita_tem_carne', 'marmita_tem_carne.mtc_car_id = carne.car_id','left');
    	$this->db->order_by($campo_ordem, $ordem);
        $this->db->group_by("car_id"); 
        $query = $this->db->get_where('carne', $where, $limite, $paginacao);
                
        return $query->result();
        
    }      
	
	public function listar_tem_carne($where, $paginacao, $limite, $campo_ordem = 'mtc_mar_id', $ordem = 'DESC'){
                           
        $this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('marmita_tem_carne', $where, $limite, $paginacao);
                
        return $query->result();
        
    }  
    
    public function total_carne($where = array()){
        
        $this->db->join('marmita_tem_carne', 'marmita_tem_carne.mtc_car_id = carne.car_id','left');
        $this->db->group_by("car_id"); 
        $query = $this->db->get_where('carne', $where);
        return $query->num_rows();
        
    }
	
	public function listar_pesquisa($where, $paginacao, $limite, $campo_ordem = 'car_id', $ordem = 'DESC') {
        
        $this->db->like($where);
        $this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get('carne', $limite, $paginacao);

        return $query->result();
    }

    public function total_pesquisa($where) {
        
        $this->db->like($where);
        $query = $this->db->get('carne');
        return $query->num_rows();
    }
    
    public function get_carne($where){
                
        $this->db->group_by("car_id"); 
        $query = $this->db->get_where('carne', $where);
        foreach($query->result() as $carne);
        return isset($carne) ? $carne : array();
        
    }
    
}
