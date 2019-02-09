<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Prato extends CI_Model {

    /**
     * @author Jobson Ribeiro
     */
    public function inserir($dados) {

        $this->db->insert('prato', $dados);
        if ($this->db->affected_rows() > 0)
            return true;

        return false;
    }

    public function atualizar($where, $dados) {

        $this->db->update('prato', $dados, $where);
        return $this->db->affected_rows();
    }

    public function delete($where_prato,$where_pedido) {

        $query = $this->db->get_where('pedido_prato_item', $where_pedido);        
        if ($query->num_rows() == 0){
           $this->db->delete('prato', $where_prato);
            return $this->db->affected_rows();  
        }
        
        return 'exists';
    }

    public function listar_prato($where, $paginacao, $limite, $campo_ordem = 'pra_id', $ordem = 'DESC') {

        $this->db->join('prato_categoria', 'prato_categoria.prc_id = prato.pra_prc_id');
        $this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('prato', $where, $limite, $paginacao);
        return $query->result();
    }

    public function total_prato($where = array()) {

        $this->db->join('prato_categoria', 'prato_categoria.prc_id = prato.pra_prc_id');
        $query = $this->db->get_where('prato', $where);
        return $query->num_rows();
    }

    public function listar_pesquisa($where, $paginacao, $limite, $campo_ordem = 'pra_id', $ordem = 'DESC') {

        $this->db->join('prato_categoria', 'prato_categoria.prc_id = prato.pra_prc_id');
        $this->db->like($where);
        $this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get('prato', $limite, $paginacao);

        return $query->result();
    }

    public function total_pesquisa($where) {

        $this->db->join('prato_categoria', 'prato_categoria.prc_id = prato.pra_prc_id');
        $this->db->like($where);
        $query = $this->db->get('prato');
        return $query->num_rows();
    }

    public function get_prato($where) {

        $this->db->join('prato_categoria', 'prato_categoria.prc_id = prato.pra_prc_id');
        $query = $this->db->get_where('prato', $where);
        foreach ($query->result() as $prato)
            ;
        return isset($prato) ? $prato : array();
    }

}
