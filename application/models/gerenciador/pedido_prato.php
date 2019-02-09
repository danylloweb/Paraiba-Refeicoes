<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedido_Prato extends CI_Model {

    /**
     * @author Jobson Ribeiro
     */
    
    public function inserir($pedido, $itens){
        
            $this->db->insert('pedido_prato', $pedido);
            if($this->db->affected_rows() > 0){
            	$id = $this->db->insert_id();
            	foreach ($itens as $item){
            		$dados_bd[] = array('ppi_pep_id' => $id, 'ppi_pra_id' => $item['id'], 
            						'ppi_quantidade' => $item['qty']);
            	}
            	$this->db->insert_batch('pedido_prato_item', $dados_bd);
            	
            }
            
            if($this->db->affected_rows() > 0)
            	return $id;

            return false;
        
    } 
    
    public function atualizar($where, $dados){
        
        $this->db->update('pedido_prato', $dados, $where);
        return $this->db->affected_rows();
        
    }
    
    
    public function listar_pedido_prato($where, $paginacao, $limite, $campo_ordem = 'pedido_prato.pep_id', $ordem = 'DESC'){

        $this->db->join('cliente', 'cliente.cli_id = pedido_prato.pep_cli_id');
        $this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('pedido_prato', $where, $limite, $paginacao);
        return $query->result();
        
    }
    
    public function total_pedido_prato($where = array()){
        
        $query = $this->db->get_where('pedido_prato', $where);
        return $query->num_rows();
        
    }
    
    public function get_pedido_prato($where){
        
        $this->db->join('cliente', 'cliente.cli_id = pedido_prato.pep_cli_id');
        $query = $this->db->get_where('pedido_prato', $where);
        foreach($query->result() as $categoria);
        return isset($categoria) ? $categoria : array();
        
    }
    
    public function listar_itempedido_prato($where, $paginacao, $limite, $campo_ordem = 'ppi_pra_id', $ordem = 'DESC'){

        $this->db->join('prato', 'prato.pra_id = pedido_prato_item.ppi_pra_id');
        $this->db->order_by($campo_ordem, $ordem);
    	$query = $this->db->get_where('pedido_prato_item', $where, $limite, $paginacao);
    	return $query->result();
    
    }
    
}
