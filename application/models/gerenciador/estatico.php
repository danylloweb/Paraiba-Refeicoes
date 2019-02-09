<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Estatico extends CI_Model {

    /**
     * @author Jobson Ribeiro
     */
    public function inserir($dados) {

        $this->db->insert('estatico', $dados);
        return $this->db->affected_rows();
    }

    public function atualizar($where, $dados) {

        $this->db->update('estatico', $dados, $where);
        return $this->db->affected_rows();
    }

    public function delete($where) {


        $this->db->delete('estatico', $where);
        return $this->db->affected_rows();
    }

    public function listar_estatico($where, $paginacao, $limite, $campo_ordem = 'est_id', $ordem = 'DESC') {

        $this->db->join('estatico_categoria', 'estatico_categoria.esc_id = estatico.est_esc_id');
        $this->db->order_by('esc_nome', 'ASC');
        $this->db->order_by($campo_ordem, $ordem);        
        $query = $this->db->get_where('estatico', $where, $limite, $paginacao);

        return $query->result();
    }

    public function total_estatico($where = array()) {

        $this->db->join('estatico_categoria', 'estatico_categoria.esc_id = estatico.est_esc_id');
        $query = $this->db->get_where('estatico', $where);
        return $query->num_rows();
    }

    public function get_estatico($where) {

        $query = $this->db->get_where('estatico', $where);
        foreach ($query->result() as $estatico)
            ;
        return isset($estatico) ? $estatico : array();
    }

}
