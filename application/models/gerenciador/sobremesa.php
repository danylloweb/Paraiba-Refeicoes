<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sobremesa extends CI_Model {

    /**
     * @author Jobson Ribeiro
     */
    
    public function inserir($dados){
        
        $this->db->insert('sobremesa', $dados);
        return $this->db->affected_rows();  
        
    } 
    
    public function delete_sobremesa_marmita($where){
        
        $this->db->delete('marmita_tem_sobremesa', $where);
        return $this->db->affected_rows();  
        
    } 
    
    public function inserir_sobremesa_marmita($dados){
        
        $this->db->insert('marmita_tem_sobremesa', $dados);
        return $this->db->affected_rows();  
        
    } 
    
    public function atualizar($where, $dados){
        
        $this->db->update('sobremesa', $dados, $where);
        return $this->db->affected_rows();
        
    }
    
    public function delete($where){
        
        $this->db->delete('sobremesa', $where);
        return $this->db->affected_rows();  
        
    }
    
    public function listar_sobremesa($where, $paginacao, $limite, $campo_ordem = 'sob_id', $ordem = 'DESC'){
        
        $this->db->join('marmita_tem_sobremesa', 'marmita_tem_sobremesa.mas_sob_id = sobremesa.sob_id','left');
        $this->db->group_by("sob_id"); 
    	$this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('sobremesa', $where, $limite, $paginacao);
        return $query->result();
        
    }   

	public function listar_tem_sobremesa($where, $paginacao, $limite, $campo_ordem = 'mas_mar_id', $ordem = 'DESC'){
        
    	$this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('marmita_tem_sobremesa', $where, $limite, $paginacao);
        return $query->result();
        
    }   	
    
    public function total_sobremesa($where = array()){
        
        $this->db->join('marmita_tem_sobremesa', 'marmita_tem_sobremesa.mas_sob_id = sobremesa.sob_id','left');
        $this->db->group_by("sob_id"); 
        $query = $this->db->get_where('sobremesa', $where);
        return $query->num_rows();
        
    }
	
	public function listar_pesquisa($where, $paginacao, $limite, $campo_ordem = 'sob_id', $ordem = 'DESC') {
        
        $this->db->like($where);
        $this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get('sobremesa', $limite, $paginacao);

        return $query->result();
    }

    public function total_pesquisa($where) {
        
        $this->db->like($where);
        $query = $this->db->get('sobremesa');
        return $query->num_rows();
    }
    
    public function get_sobremesa($where){
        
        $this->db->join('marmita_tem_sobremesa', 'marmita_tem_sobremesa.mas_sob_id = sobremesa.sob_id','left');
        $this->db->group_by("sob_id"); 
        $query = $this->db->get_where('sobremesa', $where);
        foreach($query->result() as $sobremesa);
        return isset($sobremesa) ? $sobremesa : array();
        
    }
    
}
