<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acompanhamento extends CI_Model {

    /**
     * @author Jobson Ribeiro
     */
    
    public function inserir($dados){
        
        $this->db->insert('acompanhamento', $dados);
        return $this->db->affected_rows();  
        
    } 
    
    public function delete_acompanhamento_marmita($where){
        
        $this->db->delete('marmita_tem_acompanhamento', $where);
        return $this->db->affected_rows();  
        
    } 
    
    public function inserir_acompanhamento_marmita($dados){
        
        $this->db->insert('marmita_tem_acompanhamento', $dados);
        return $this->db->affected_rows();  
        
    } 
    
    public function atualizar($where, $dados){
        
        $this->db->update('acompanhamento', $dados, $where);
        return $this->db->affected_rows();
        
    }
    
    public function delete($where){
        
        $this->db->delete('acompanhamento', $where);
        return $this->db->affected_rows();  
        
    }
    
    public function listar_acompanhamento($where, $paginacao, $limite, $campo_ordem = 'aco_id', $ordem = 'DESC'){
        
        $this->db->join('marmita_tem_acompanhamento', 'marmita_tem_acompanhamento.maa_aco_id = acompanhamento.aco_id','left');
        $this->db->group_by("aco_id"); 
    	$this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('acompanhamento', $where, $limite, $paginacao);
        return $query->result();
        
    }  

	public function listar_tem_acompanhamento($where, $paginacao, $limite, $campo_ordem = 'maa_mar_id', $ordem = 'DESC'){
                       
    	$this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('marmita_tem_acompanhamento', $where, $limite, $paginacao);
        return $query->result();
        
    }      
    
    public function total_acompanhamento($where = array()){
        
        $this->db->join('marmita_tem_acompanhamento', 'marmita_tem_acompanhamento.maa_aco_id = acompanhamento.aco_id','left');
        $this->db->group_by("aco_id"); 
        $query = $this->db->get_where('acompanhamento', $where);
        return $query->num_rows();
        
    }
	
	public function listar_pesquisa($where, $paginacao, $limite, $campo_ordem = 'aco_id', $ordem = 'DESC') {
        
        $this->db->like($where);
        $this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get('acompanhamento', $limite, $paginacao);

        return $query->result();
    }

    public function total_pesquisa($where) {

        $this->db->like($where);
        $query = $this->db->get('acompanhamento');
        return $query->num_rows();
    }
    
    public function get_acompanhamento($where){
        
        $this->db->join('marmita_tem_acompanhamento', 'marmita_tem_acompanhamento.maa_aco_id = acompanhamento.aco_id','left');
        $this->db->group_by("aco_id"); 
        $query = $this->db->get_where('acompanhamento', $where);
        foreach($query->result() as $acompanhamento);
        return isset($acompanhamento) ? $acompanhamento : array();
        
    }
    
}
