<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Arroz extends CI_Model {

    /**
     * @author Jobson Ribeiro
     */
    
    public function inserir($dados){
        
        $this->db->insert('arroz', $dados);
        return $this->db->affected_rows();  
        
    } 
    
    public function delete_arroz_marmita($where){
        
        $this->db->delete('marmita_tem_arroz', $where);
        return $this->db->affected_rows();  
        
    }
    
    public function inserir_arroz_marmita($dados){
        
        $this->db->insert('marmita_tem_arroz', $dados);
        return $this->db->affected_rows();  
        
    } 
    
    public function atualizar($where, $dados){
        
        $this->db->update('arroz', $dados, $where);
        return $this->db->affected_rows();
        
    }
    
    public function delete($where){
        
        $this->db->delete('arroz', $where);
        return $this->db->affected_rows();  
        
    }
    
    public function listar_arroz($where, $paginacao, $limite, $campo_ordem = 'arr_id', $ordem = 'DESC'){
        
        $this->db->join('marmita_tem_arroz', 'marmita_tem_arroz.mta_arr_id = arroz.arr_id','left');
        $this->db->group_by("arr_id"); 
    	$this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('arroz', $where, $limite, $paginacao);
        return $query->result();
        
    }   

	public function listar_tem_arroz($where, $paginacao, $limite, $campo_ordem = 'mta_mar_id', $ordem = 'DESC'){
                        
    	$this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get_where('marmita_tem_arroz', $where, $limite, $paginacao);
        return $query->result();
        
    }   	
    
    public function total_arroz($where = array()){
        
        $this->db->join('marmita_tem_arroz', 'marmita_tem_arroz.mta_arr_id = arroz.arr_id','left');
        $this->db->group_by("arr_id"); 
        $query = $this->db->get_where('arroz', $where);
        return $query->num_rows();
        
    }
	
	public function listar_pesquisa($where, $paginacao, $limite, $campo_ordem = 'arr_id', $ordem = 'DESC') {
        
        $this->db->like($where);
        $this->db->order_by($campo_ordem, $ordem);
        $query = $this->db->get('arroz', $limite, $paginacao);

        return $query->result();
    }

    public function total_pesquisa($where) {
        
        $this->db->like($where);
        $query = $this->db->get('arroz');
        return $query->num_rows();
    }
    
    public function get_arroz($where){
        
        $this->db->join('marmita_tem_arroz', 'marmita_tem_arroz.mta_arr_id = arroz.arr_id','left');
        $this->db->group_by("arr_id"); 
        $query = $this->db->get_where('arroz', $where);
        foreach($query->result() as $arroz);
        return isset($arroz) ? $arroz : array();
        
    }
    
}
