<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Marmita extends CI_Model {

    /**
     * @author Jobson Ribeiro
     */
    
    public function inserir($dados){
        
        $this->db->insert('marmita', $dados);
        return $this->db->affected_rows();  
        
    } 
    
    public function atualizar($where, $dados){
        
        $this->db->update('marmita', $dados, $where);
        return $this->db->affected_rows();
        
    }
    
    public function delete($where){
        
        $this->db->delete('marmita', $where);
        return $this->db->affected_rows();  
        
    }
    
    public function listar_marmita($where, $paginacao, $limite, $campo_ordem = 'mar_id', $ordem = 'DESC'){
        
        
    	$this->db->order_by($campo_ordem, $ordem);        
        $query = $this->db->get_where('marmita', $where, $limite, $paginacao);
        return $query->result();
        
    }

    public function listar_marmita_maximo($where, $paginacao, $limite, $campo_ordem = 'mar_id', $ordem = 'DESC'){
        
        
    	$this->db->order_by($campo_ordem, $ordem);        
        $this->db->select_max('mar_data');
        $query = $this->db->get_where('marmita', $where, $limite, $paginacao);
        foreach($query->result() as $marmita);
        return isset($marmita) ? $marmita : array();
        
    }        
    
    public function total_marmita($where = array()){
        
        
        $query = $this->db->get_where('marmita', $where);
        return $query->num_rows();
        
    }
    
    public function get_marmita($where){
        
        
        $query = $this->db->get_where('marmita', $where);
        foreach($query->result() as $marmita);
        return isset($marmita) ? $marmita : array();
        
    }
    
    public function listar_marmita_feijao($where, $paginacao, $limite){        
        
        $this->db->join('feijao', 'marmita_tem_feijao.mtf_fei_id = feijao.fei_id');        
        $query = $this->db->get_where('marmita_tem_feijao', $where, $limite, $paginacao);
        return $query->result();        
        
    }
    public function listar_marmita_arroz($where, $paginacao, $limite){        
        
        $this->db->join('arroz', 'marmita_tem_arroz.mta_arr_id = arroz.arr_id');        
        $query = $this->db->get_where('marmita_tem_arroz', $where, $limite, $paginacao);
        return $query->result();        
        
    }
    public function listar_marmita_macarrao($where, $paginacao, $limite){        
        
        $this->db->join('macarrao', 'marmita_tem_macarrao.mtm_mac_id = macarrao.mac_id');        
        $query = $this->db->get_where('marmita_tem_macarrao', $where, $limite, $paginacao);
        return $query->result();        
        
    }
    public function listar_marmita_salada($where, $paginacao, $limite){        
        
        $this->db->join('salada', 'marmita_tem_salada.mts_sal_id = salada.sal_id');        
        $query = $this->db->get_where('marmita_tem_salada', $where, $limite, $paginacao);
        return $query->result();        
        
    }
    public function listar_marmita_acompanhamento($where, $paginacao, $limite){        
        
        $this->db->join('acompanhamento', 'marmita_tem_acompanhamento.maa_aco_id = acompanhamento.aco_id');        
        $query = $this->db->get_where('marmita_tem_acompanhamento', $where, $limite, $paginacao);
        return $query->result();        
        
    }    
    
    public function listar_marmita_carne($where, $paginacao, $limite){        
        
        $this->db->join('carne', 'marmita_tem_carne.mtc_car_id = carne.car_id');        
        $query = $this->db->get_where('marmita_tem_carne', $where, $limite, $paginacao);
        return $query->result();        
        
    }
    
    public function listar_marmita_bebida($where, $paginacao, $limite){        
        
        $this->db->join('bebida', 'marmita_tem_bebida.mtb_beb_id = bebida.beb_id');        
        $query = $this->db->get_where('marmita_tem_bebida', $where, $limite, $paginacao);
        return $query->result();        
        
    }
    
    public function listar_marmita_sobremesa($where, $paginacao, $limite){        
        
        $this->db->join('sobremesa', 'marmita_tem_sobremesa.mas_sob_id = sobremesa.sob_id');        
        $query = $this->db->get_where('marmita_tem_sobremesa', $where, $limite, $paginacao);
        return $query->result();        
        
    }
    
}
