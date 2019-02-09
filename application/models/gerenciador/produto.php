<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produto extends CI_Model {

    /**
     * @author Jobson Ribeiro
     */
    public function inserir($dados) {

        $this->db->insert('produto', $dados);
        if ($this->db->affected_rows() > 0)
            return true;

        return false;
    }

    public function atualizar($where, $dados) {

        $this->db->update('produto', $dados, $where);
        return $this->db->affected_rows();
    }

    public function delete($where_produto,$where_pedido) {

        $query = $this->db->get_where('pedido_item', $where_pedido);        
        if ($query->num_rows() == 0){
           $this->db->delete('produto', $where_produto);
            return $this->db->affected_rows();  
        }
        
        return 'exists';
    }

    public function listar_produto($where, $paginacao, $limite, $campo_ordem = 'pro_id', $ordem = 'DESC') {

        $this->db->join('produto_categoria', 'produto_categoria.prc_id = produto.pro_prc_id');
        $this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('produto', $where, $limite, $paginacao);
        return $query->result();
    }

    public function total_produto($where = array()) {

        $this->db->join('produto_categoria', 'produto_categoria.prc_id = produto.pro_prc_id');
        $query = $this->db->get_where('produto', $where);
        return $query->num_rows();
    }

    public function listar_pesquisa($where, $paginacao, $limite, $campo_ordem = 'pro_id', $ordem = 'DESC') {

        $this->db->join('produto_categoria', 'produto_categoria.prc_id = produto.pro_prc_id');
        $this->db->like($where);
        $this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get('produto', $limite, $paginacao);

        return $query->result();
    }

    public function total_pesquisa($where) {

        $this->db->join('produto_categoria', 'produto_categoria.prc_id = produto.pro_prc_id');
        $this->db->like($where);
        $query = $this->db->get('produto');
        return $query->num_rows();
    }

    public function get_produto($where) {

        $this->db->join('produto_categoria', 'produto_categoria.prc_id = produto.pro_prc_id');
        $query = $this->db->get_where('produto', $where);
        foreach ($query->result() as $produto)
            ;
        return isset($produto) ? $produto : array();
    }

}
