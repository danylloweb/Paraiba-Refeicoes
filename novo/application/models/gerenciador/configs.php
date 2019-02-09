<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configs extends CI_Model {

    /**
     * @author Isaias Filho
     * 
     */
        public $table = 'configuration';
	private $conf_id = 1;
	private $conf_name;
	private $conf_url;
	private $conf_email;
	private $conf_email_funcionario;
	private $conf_adress;
	private $conf_phone_one;
	private $conf_phone_two;
	private $conf_preco_marmita;
	private $conf_phone_three;
	private $conf_phone_four;
	private $conf_smtp_host;
	private $conf_smtp_user;
	private $conf_smtp_port;
	private $conf_smtp_password;
	private $conf_seo_keywords;
	private $conf_seo_description;
	private $conf_preco_tapete;
	
    public function __construct(){
    	
    	parent::__construct();
    	
    	$query = $this->db->get_where('configuration', array('conf_id' => 1));
    	if($query->num_rows() > 0){
    		foreach ($query->result() as $configs){
    			foreach($configs as $obj => $valor){
    				$this->$obj = $valor;
    			}
    		}
    	}
    	    	
    }
    
    public function get_titulo(){
    	return $this->conf_name;
    }
    
    public function get_descricao(){
    	return $this->conf_seo_description;
    }
    
    public function get_email(){
    	return $this->conf_email;
    }
    
    public function get_email_funcionario(){
    	return $this->conf_email_funcionario;
    }
    
    public function get_tel1(){
    	return $this->conf_phone_one;
    }
    
    public function get_tel2(){
    	return $this->conf_phone_two;
    }
    
    public function get_preco_marmita(){
    	return $this->conf_preco_marmita;
    }
    
    public function get_smtphost(){
    	return $this->conf_smtp_host;
    }
    
    public function get_smtpuser(){
    	return $this->conf_smtp_user;
    }
    
    public function get_smtppass(){
    	return $this->conf_smtp_password;
    }
    
    public function get_smtpport(){
    	return $this->conf_smtp_port;
    }
        	        
    public function get_endereco(){
    	return $this->conf_adress;
    }
    
    public function get_plvchave(){
    	return $this->conf_seo_keywords;
    }
    public function get_preco_tapete(){
    	return $this->conf_preco_tapete;
    }
    
    public function atualizar($dados){
        
        $this->db->update('configuration', $dados, array('conf_id' => $this->conf_id));
        return $this->db->affected_rows();
        
    }
    
    public function select()
	{
		$this->db->select('*');

		return $this->db->get($this->table)->result();
	}

	public function select_by_id($id)
	{
		$this->db->select('*');
		$this->db->where('conf_id', $id);

		return $this->db->get($this->table)->row();
	}

	public function get_config()
	{
		$this->db->select('*');
		$this->db->where('conf_id', 1);
		$this->db->limit(1);
		
		return $this->db->get($this->table)->row();
	}

	public function get_smtp_config()
	{
		$this->db->select('conf_smtp_host, conf_smtp_user, conf_smtp_port, conf_smtp_password');
		$this->db->where('conf_id', 1);
		$this->db->limit(1);
		
		return $this->db->get($this->table)->row();
	}        
    
    
}
