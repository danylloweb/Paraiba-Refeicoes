<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Refeicao extends CI_Model {

    /**
     * @author Jobson Ribeiro
     */
    public function inserir($dados) {

        $this->db->insert('refeicao', $dados);
        if ($this->db->affected_rows() > 0)
            return true;

        return false;
    }

    public function atualizar($where, $dados) {

        $this->db->update('refeicao', $dados, $where);
        return $this->db->affected_rows();
    }

    public function delete($where_refeicao,$where_pedido) {

        $query = $this->db->get_where('pedido_item', $where_pedido);        
        if ($query->num_rows() == 0){
           $this->db->delete('refeicao', $where_refeicao);
            return $this->db->affected_rows();  
        }
        
        return 'exists';
    }

    public function listar_refeicao($where, $paginacao, $limite, $campo_ordem = 'ref_id', $ordem = 'DESC') {

        
        $this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('refeicao', $where, $limite, $paginacao);
        return $query->result();
    }

    public function total_refeicao($where = array()) {

        
        $query = $this->db->get_where('refeicao', $where);
        return $query->num_rows();
    }

    public function listar_pesquisa($where, $paginacao, $limite, $campo_ordem = 'ref_id', $ordem = 'DESC') {

        
        $this->db->like($where);
        $this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get('refeicao', $limite, $paginacao);

        return $query->result();
    }

    public function total_pesquisa($where) {

        
        $this->db->like($where);
        $query = $this->db->get('refeicao');
        return $query->num_rows();
    }

    public function get_refeicao($where) {

        
        $query = $this->db->get_where('refeicao', $where);
        foreach ($query->result() as $refeicao)
            ;
        return isset($refeicao) ? $refeicao : array();
    }

}
