<?php
class Cart_model extends CI_Model{

	function get_all($table){
		$result=$this->db->get($table);
		return $result;
	}
	
}