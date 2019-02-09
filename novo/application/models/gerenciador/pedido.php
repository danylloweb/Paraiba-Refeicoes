<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedido extends CI_Model {

    /**
     * @author Jobson Ribeiro
     */
    
    public function inserir($pedido, $itens){
        
            $this->db->insert('pedido', $pedido);
            if($this->db->affected_rows() > 0){
            	$id = $this->db->insert_id();
            	foreach ($itens as $item){
            		$dados_bd[] = array('pei_ped_id' => $id, 'pei_ref_id' => $item['id'], 
            						'pei_quantidade' => $item['qty']);
            	}
            	$this->db->insert_batch('pedido_item', $dados_bd);
            	
            }
            
            if($this->db->affected_rows() > 0)
            	return $id;

            return false;
        
    } 
    
    public function atualizar($where, $dados){
        
        $this->db->update('pedido', $dados, $where);
        return $this->db->affected_rows();
        
    }
    
    
    public function listar_pedido($where, $paginacao, $limite, $campo_ordem = 'pedido.ped_id', $ordem = 'DESC'){

        $this->db->join('cliente', 'cliente.cli_id = pedido.ped_cli_id');
        $this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('pedido', $where, $limite, $paginacao);
        return $query->result();
        
    }
    
    public function total_pedido($where = array()){
        
        $query = $this->db->get_where('pedido', $where);
        return $query->num_rows();
        
    }
    
    public function get_pedido($where){
        
        $this->db->join('cliente', 'cliente.cli_id = pedido.ped_cli_id');
        $query = $this->db->get_where('pedido', $where);
        foreach($query->result() as $categoria);
        return isset($categoria) ? $categoria : array();
        
    }
    
    public function listar_itempedido($where, $paginacao, $limite, $campo_ordem = 'pedido_item.pei_id', $ordem = 'DESC'){

        $this->db->join('refeicao', 'refeicao.ref_id = pedido_item.pei_ref_id');
        $this->db->order_by($campo_ordem, $ordem);
    	$query = $this->db->get_where('pedido_item', $where, $limite, $paginacao);
    	return $query->result();
    
    }
    
}
