<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_Model extends CI_Model {

	public $table = 'usuario';

	public function __construct()
	{
		parent::__construct();
	}

	public function count_all()
	{
		return $this->db->count_all($this->table);
	}

	public function select_list($page, $show)
	{
		$this->db->select('*');
		$this->db->limit($show, $page);

		return $this->db->get($this->table)->result();
	}

	public function select_where($where)
	{
		$this->db->select('usu_id, usu_nome, usu_email, usu_permissao');
		$this->db->where($where);
		$this->db->limit(1);

		return $this->db->get($this->table)->row();
	}

	public function select_list_search($word)
	{
		$this->db->select('*');
		$this->db->or_like('usu_nome', $word);
		$this->db->or_like('usu_email', $word);
		$this->db->or_like('usu_perfil', $word);

		return $this->db->get($this->table)->result();
	}

	public function select_by_id($id)
	{
		$this->db->select('*');
		$this->db->where('usu_id', $id);

		return $this->db->get($this->table)->row();
	}

	public function insert($data)
	{
		$this->db->trans_start();

		$this->db->insert($this->table, $data);

		$result = $this->db->insert_id();

		$this->db->trans_complete();

		if($this->db->trans_status() === false){
			return false;
		}else{
			return $result;
		}
	}

	public function update($data)
	{
		$this->db->trans_start();

		$this->db->where('usu_id', $data['usu_id']);
		$this->db->update($this->table, $data);

		$result = $this->db->affected_rows();

		$this->db->trans_complete();

		if($this->db->trans_status() === false){
			return false;
		}else{
			return $result;
		}
	}

	public function delete_in($in)
	{
		$this->db->trans_start();
		
		$this->db->where_in('usu_id', $in);
		$this->db->delete($this->table);

		$result = $this->db->affected_rows();

		$this->db->trans_complete();

		if($this->db->trans_status() === false){
			return false;
		}else{
			return $result;
		}
	}

}

/* End of file  */
/* Location: ./application/models/ */