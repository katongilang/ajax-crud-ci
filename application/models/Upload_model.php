<?php
class Upload_model extends CI_Model{

	function save_upload($table, $data){		
	    return $this->db->insert($table,$data);
	}

	function get_all($table){
		$this->db->from($table);
		$this->db->order_by('id DESC');
		return $this->db->get()->result();
    }

    function delete($table, $code){
        $this->db->where('id', $code);
        $result=$this->db->delete($table);
        return $result;
    }

	
}