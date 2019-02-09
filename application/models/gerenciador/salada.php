<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Salada extends CI_Model {

    /**
     * @author Jobson Ribeiro
     */
    
    public function inserir($dados){
        
        $this->db->insert('salada', $dados);
        return $this->db->affected_rows();  
        
    } 
    
    public function delete_salada_marmita($where){
        
        $this->db->delete('marmita_tem_salada', $where);
        return $this->db->affected_rows();  
        
    } 
    
    public function inserir_salada_marmita($dados){
        
        $this->db->insert('marmita_tem_salada', $dados);
        return $this->db->affected_rows();  
        
    } 
    
    public function atualizar($where, $dados){
        
        $this->db->update('salada', $dados, $where);
        return $this->db->affected_rows();
        
    }
    
    public function delete($where){
        
        $this->db->delete('salada', $where);
        return $this->db->affected_rows();  
        
    }
    
    public function listar_salada($where, $paginacao, $limite, $campo_ordem = 'sal_id', $ordem = 'DESC'){
        
        $this->db->join('marmita_tem_salada', 'marmita_tem_salada.mts_sal_id = salada.sal_id','left');
        $this->db->group_by("sal_id"); 
    	$this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('salada', $where, $limite, $paginacao);
        return $query->result();
        
    } 

	public function listar_tem_salada($where, $paginacao, $limite, $campo_ordem = 'mts_mar_id', $ordem = 'DESC'){
                       
    	$this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('marmita_tem_salada', $where, $limite, $paginacao);
        return $query->result();
        
    } 
    
    public function total_salada($where = array()){
        
        $this->db->join('marmita_tem_salada', 'marmita_tem_salada.mts_sal_id = salada.sal_id','left');
        $this->db->group_by("sal_id"); 
        $query = $this->db->get_where('salada', $where);
        return $query->num_rows();
        
    }
	
	public function listar_pesquisa($where, $paginacao, $limite, $campo_ordem = 'sal_id', $ordem = 'DESC') {
        
        $this->db->like($where);
        $this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get('salada', $limite, $paginacao);

        return $query->result();
    }

    public function total_pesquisa($where) {
        
        $this->db->like($where);
        $query = $this->db->get('salada');
        return $query->num_rows();
    }
    
    public function get_salada($where){
        
        $this->db->join('marmita_tem_salada', 'marmita_tem_salada.mts_sal_id = salada.sal_id','left');
        $this->db->group_by("sal_id"); 
        $query = $this->db->get_where('salada', $where);
        foreach($query->result() as $salada);
        return isset($salada) ? $salada : array();
        
    }
    
}
