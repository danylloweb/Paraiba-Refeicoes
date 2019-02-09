<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Newsletter_email extends CI_Model {

    /**
     * @author Jobson Ribeiro
     */
    public function inserir($dados) {
        
        $query = $this->db->get_where('email', array('ema_email' => $dados["ema_email"]));        
        if ($query->num_rows() == 0) {
            $this->db->insert('email', $dados);        
            return $this->db->affected_rows();
        }

        return 0;
    }

    public function atualizar($where, $dados) {

        $this->db->update('email', $dados, $where);
        return $this->db->affected_rows();
    }

    public function delete($where) {

        $this->db->delete('email', $where);
        return $this->db->affected_rows();
    }

    public function listar_email($where, $paginacao, $limite, $campo_ordem = 'ema_id', $ordem = 'DESC') {

        $this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('email', $where, $limite, $paginacao);
        return $query->result();
    }

    public function total_email($where = array()) {

        $query = $this->db->get_where('email', $where);
        return $query->num_rows();
    }

    public function get_newsletter_email($where) {

        $query = $this->db->get_where('email', $where);
        foreach ($query->result() as $email)
            ;
        return isset($email) ? $email : array();
    }

}
