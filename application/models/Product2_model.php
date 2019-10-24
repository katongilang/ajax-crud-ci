<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product2_model extends CI_Model{
	
	function get_all($table){
		$query = $this->db->get($table);
		return $query;	
	}

	function get_where($table,$where){
		$this->db->from($table);
		$this->db->where($where);
		return $this->db->get();
	}
	
	function insert($table, $data){
		$this->db->insert('product2',$data);
	}

	function get_products(){
		$this->db->select('product_id,product_name,product_price,category_name,subcategory_name');
		$this->db->from('product2');
		$this->db->join('category','product_category_id = category_id','left');
		$this->db->join('sub_category','product_subcategory_id = subcategory_id','left');	
		$query = $this->db->get();
		return $query;
	}

	function update_product($table, $data, $where){
		$this->db->update($table, $data, $where);
	}

	//Delete Product
	function delete_product($product_id){
		$this->db->delete('product2', array('product_id' => $product_id));
	}

	
}