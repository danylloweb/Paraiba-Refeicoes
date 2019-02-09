<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feijao extends CI_Model {

    /**
     * @author Jobson Ribeiro
     */
    
    public function inserir($dados){
        
        $this->db->insert('feijao', $dados);
        return $this->db->affected_rows();  
        
    } 
    
    public function delete_feijao_marmita($where){
        
        $this->db->delete('marmita_tem_feijao', $where);
        return $this->db->affected_rows();  
        
    } 
    
    public function inserir_feijao_marmita($dados){
        
        $this->db->insert('marmita_tem_feijao', $dados);
        return $this->db->affected_rows();  
        
    } 
    
    public function atualizar($where, $dados){
        
        $this->db->update('feijao', $dados, $where);
        return $this->db->affected_rows();
        
    }
    
    public function delete($where){
        
        $this->db->delete('feijao', $where);
        return $this->db->affected_rows();  
        
    }
    
    public function listar_feijao($where, $paginacao, $limite, $campo_ordem = 'fei_id', $ordem = 'DESC'){
        
        
    	$this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('feijao', $where, $limite, $paginacao);
        return $query->result();
        
    }   

	public function listar_tem_feijao($where, $paginacao, $limite, $campo_ordem = 'mtf_mar_id', $ordem = 'DESC'){
        
        
    	$this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('marmita_tem_feijao', $where, $limite, $paginacao);
        return $query->result();
        
    }   	
    
    public function total_feijao($where = array()){
        
        $this->db->join('marmita_tem_feijao', 'marmita_tem_feijao.mtf_fei_id = feijao.fei_id','left');
        $this->db->group_by("fei_id"); 
        $query = $this->db->get_where('feijao', $where);
        return $query->num_rows();
        
    }
	
	public function listar_pesquisa($where, $paginacao, $limite, $campo_ordem = 'fei_id', $ordem = 'DESC') {
        
        $this->db->like($where);
        $this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get('feijao', $limite, $paginacao);

        return $query->result();
    }

    public function total_pesquisa($where) {
        
        $this->db->like($where);
        $query = $this->db->get('feijao');
        return $query->num_rows();
    }
    
    public function get_feijao($where){
                
        $this->db->group_by("fei_id"); 
        $query = $this->db->get_where('feijao', $where);
        foreach($query->result() as $feijao);
        return isset($feijao) ? $feijao : array();
        
    }
    
}
