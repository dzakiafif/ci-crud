<?php

class Crud_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function buildQuery($query)
	{
		$build = $this->db->query($query);
		
		return $build;
	}
	
	function getWhere($tabel , $data)
	{
		$query = $this->db->get_where($tabel, $data);
		
		return $query->row();
	}
	
	function getData($tabel)
	{
		$query = $this->db->get($tabel);
		
		return $query->result();
	}
	
	function insertData($tabel , $data)
	{
		$this->db->insert($tabel , $data);
		
		if ( $this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function deleteData($tabel , $data)
	{
		$this->db->delete($tabel , $data);
		
		if ( $this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function updatePosisi($id , $nama)
	{
		$data= array(
			'nama' => $nama
		);
		
		$this->db->where('id_posisi' , $id);
		$this->db->update('posisi',$data);
	}
	
}