<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bebida extends CI_Model {

    /**
     * @author Jobson Ribeiro
     */
    
    public function inserir($dados){
        
        $this->db->insert('bebida', $dados);
        return $this->db->affected_rows();  
        
    } 
    
    public function delete_bebida_marmita($where){
        
        $this->db->delete('marmita_tem_bebida', $where);
        return $this->db->affected_rows();  
        
    } 
    
    public function inserir_bebida_marmita($dados){
        
        $this->db->insert('marmita_tem_bebida', $dados);
        return $this->db->affected_rows();  
        
    } 
    
    public function atualizar($where, $dados){
        
        $this->db->update('bebida', $dados, $where);
        return $this->db->affected_rows();
        
    }
    
    public function delete($where){
        
        $this->db->delete('bebida', $where);
        return $this->db->affected_rows();  
        
    }
    
    public function listar_bebida($where, $paginacao, $limite, $campo_ordem = 'beb_id', $ordem = 'DESC'){
        
        $this->db->join('marmita_tem_bebida', 'marmita_tem_bebida.mtb_beb_id = bebida.beb_id','left');
        $this->db->group_by("beb_id"); 
    	$this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('bebida', $where, $limite, $paginacao);
        return $query->result();
        
    }   

	public function listar_tem_bebida($where, $paginacao, $limite, $campo_ordem = 'mtb_mar_id', $ordem = 'DESC'){
        
    	$this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('marmita_tem_bebida', $where, $limite, $paginacao);
        return $query->result();
        
    }   	
    
    public function total_bebida($where = array()){
        
        $this->db->join('marmita_tem_bebida', 'marmita_tem_bebida.mtb_beb_id = bebida.beb_id','left');
        $this->db->group_by("beb_id"); 
        $query = $this->db->get_where('bebida', $where);
        return $query->num_rows();
        
    }
	
	public function listar_pesquisa($where, $paginacao, $limite, $campo_ordem = 'beb_id', $ordem = 'DESC') {
        
        $this->db->like($where);
        $this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get('bebida', $limite, $paginacao);

        return $query->result();
    }

    public function total_pesquisa($where) {
        
        $this->db->like($where);
        $query = $this->db->get('bebida');
        return $query->num_rows();
    }
    
    public function get_bebida($where){
        
        $this->db->join('marmita_tem_bebida', 'marmita_tem_bebida.mtb_beb_id = bebida.beb_id','left');
        $this->db->group_by("beb_id"); 
        $query = $this->db->get_where('bebida', $where);
        foreach($query->result() as $bebida);
        return isset($bebida) ? $bebida : array();
        
    }
    
}
