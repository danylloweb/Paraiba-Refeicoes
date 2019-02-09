<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cliente extends CI_Model {

    /**
     * @author Jobson Ribeiro
     */
    public function inserir($dados) {

        if ($this->validar_cliente(array('cli_email' => $dados['cli_email'])) == 0) {
            $this->db->insert('cliente', $dados);
            return $this->db->affected_rows();
        }

        return 'exists';
    }

    public function atualizar($where, $dados) {

        $valida = true;
        if (isset($dados['cli_email']) && !$this->validar_email(array('cli_email' => $dados['cli_email']))) {
            $valida = false;
        }        
        if ($valida) {
            $this->db->update('cliente', $dados, $where);
            return $this->db->affected_rows();
        }

        return 0;
    }
    
    public function atualizar_informacoes($where, $dados) {

        $valida = true;

        if ($valida) {
            $this->db->update('cliente', $dados, $where);
            return $this->db->affected_rows();
        }

        return 0;
    }

    public function delete($where_cliente, $where_pedido) {

         $query = $this->db->get_where('pedido', $where_pedido);
         
        if ($query->num_rows() == 0){
           $this->db->delete('cliente', $where_cliente);
            return $this->db->affected_rows();  
        }
        
        return 'exists';
               
    }

    public function listar_cliente($where, $paginacao, $limite, $campo_ordem = 'cli_id', $ordem = 'DESC') {

        $this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('cliente', $where, $limite, $paginacao);

        return $query->result();
    }

    public function total_cliente($where = array()) {

        $query = $this->db->get_where('cliente', $where);
        return $query->num_rows();
    }

    public function get_cliente($where) {

        $query = $this->db->get_where('cliente', $where);
        foreach ($query->result() as $cliente)
            ;
        return isset($cliente) ? $cliente : array();
    }
    
    private function validar_email($where) {

        $query = $this->db->get_where('cliente', $where);
        if ($query->num_rows() == 0) {
            return true;
        }

        return false;
    }

    public function validar_cliente($where) {

        $query = $this->db->get_where('cliente', $where);
        return $query->num_rows();
    }

    public function validar_cpf($cpf) {
        $query = $this->db->get_where('cliente', array('cli_cpf' => $cpf));
        if ($query->num_rows() == 0)
            return true;

        return false;
    }

}
