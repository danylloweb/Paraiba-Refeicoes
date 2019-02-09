<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empresa_Cliente extends CI_Model {

    /**
     * @author Jobson Ribeiro
     */
    
    public function inserir($dados){
        
        $this->db->insert('empresa_cliente', $dados);
        return $this->db->affected_rows();  
        
    } 
    
    public function atualizar($where, $dados){
        
        $this->db->update('empresa_cliente', $dados, $where);
        return $this->db->affected_rows();
        
    }
    
    public function delete($where){
        
        $this->db->delete('empresa_cliente', $where);
        return $this->db->affected_rows();  
        
    }
    
    public function listar_empresa_cliente($where, $paginacao, $limite, $campo_ordem = 'emc_id', $ordem = 'DESC'){
        
    	$this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('empresa_cliente', $where, $limite, $paginacao);
        return $query->result();
        
    }
    
    public function total_empresa_cliente($where = array()){
        
        $query = $this->db->get_where('empresa_cliente', $where);
        return $query->num_rows();
        
    }
    
    public function get_empresa_cliente($where){
        
        $query = $this->db->get_where('empresa_cliente', $where);
        foreach($query->result() as $empresa_cliente);
        return isset($empresa_cliente) ? $empresa_cliente : array();
        
    }
    
}
