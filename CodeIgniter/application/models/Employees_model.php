<?php

class Employees_model extends CI_Model{
	function get_all(){
		$res= $this->db->get('employees');
		return $res->result();
	}
	
	function get_by_id($id){
		$this->db->where('id',$id);
		$res= $this->db->get('employees');
		return $res->first_row();
	}
	
	function post($data){
		return $this->db->insert('employees',$data);
	}
	
	function put($id,$data){
		$this->db->where('id',$id);
		return $this->db->update('employees',$data);
	}
	
	function delete($id){
		$this->db->where('id',$id);
		return $this->db->delete('employees');
	}
}