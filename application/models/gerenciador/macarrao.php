<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Macarrao extends CI_Model {

    /**
     * @author Jobson Ribeiro
     */
    public function inserir($dados) {

        $this->db->insert('macarrao', $dados);
        return $this->db->affected_rows();
    }

    public function delete_macarrao_marmita($where) {

        $this->db->delete('marmita_tem_macarrao', $where);
        return $this->db->affected_rows();
    }

    public function inserir_macarrao_marmita($dados) {

        $this->db->insert('marmita_tem_macarrao', $dados);
        return $this->db->affected_rows();
    }

    public function atualizar($where, $dados) {

        $this->db->update('macarrao', $dados, $where);
        return $this->db->affected_rows();
    }

    public function delete($where) {

        $this->db->delete('macarrao', $where);
        return $this->db->affected_rows();
    }

    public function listar_macarrao($where, $paginacao, $limite, $campo_ordem = 'mac_id', $ordem = 'DESC') {

        $this->db->join('marmita_tem_macarrao', 'marmita_tem_macarrao.mtm_mac_id = macarrao.mac_id', 'left');
        $this->db->group_by("mac_id");
        $this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('macarrao', $where, $limite, $paginacao);
        return $query->result();
    }
	
	public function listar_tem_macarrao($where, $paginacao, $limite, $campo_ordem = 'mtm_mar_id', $ordem = 'DESC') {
               
        $this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('marmita_tem_macarrao', $where, $limite, $paginacao);
        return $query->result();
    }

    public function total_macarrao($where = array()) {

        $this->db->join('marmita_tem_macarrao', 'marmita_tem_macarrao.mtm_mac_id = macarrao.mac_id', 'left');
        $this->db->group_by("mac_id");
        $query = $this->db->get_where('macarrao', $where);
        return $query->num_rows();
    }
	
	public function listar_pesquisa($where, $paginacao, $limite, $campo_ordem = 'mac_id', $ordem = 'DESC') {
        
        $this->db->like($where);
        $this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get('macarrao', $limite, $paginacao);

        return $query->result();
    }

    public function total_pesquisa($where) {

        $this->db->like($where);
        $query = $this->db->get('macarrao');
        return $query->num_rows();
    }

    public function get_macarrao($where) {

        $this->db->join('marmita_tem_macarrao', 'marmita_tem_macarrao.mtm_mac_id = macarrao.mac_id', 'left');
        $this->db->group_by("mac_id");
        $query = $this->db->get_where('macarrao', $where);
        foreach ($query->result() as $macarrao)
            ;
        return isset($macarrao) ? $macarrao : array();
    }

}
