<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product2 extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('product2_model');
		$this->load->library('session');
	}

	function index(){
		$data['products'] = $this->product2_model->get_products();
		$this->load->view('product2/product_list_view',$data);
	}

	// add new product
	function add_new(){
		if ($this->input->post('submit', TRUE) == 'Submit') {
			$data = array(
				'product_name' => $this->input->post('product_name',TRUE),
				'product_price' => $this->input->post('product_price',TRUE),
				'product_category_id' => $this->input->post('category',TRUE),
				'product_subcategory_id' => $this->input->post('sub_category',TRUE),
			);
			$this->product2_model->insert('product2',$data);
			$this->session->set_flashdata('msg','<div class="alert alert-success">Product Saved</div>');
			redirect('product2');
		}
		// LOAD "ADD NEW" PAGE
		$data['category'] = $this->product2_model->get_all('category')->result();
		$this->load->view('product2/add_product_view', $data);
	}

	// get sub category by category_id
	function get_sub_category(){
		$category_id = $this->input->post('id',TRUE);
		$data = $this->product2_model->get_where('sub_category',array('subcategory_category_id' => $category_id))->result();
		echo json_encode($data);
	}

	function get_edit(){
		$product_id = $this->uri->segment(3);
		$data['product_id'] = $product_id;
		$data['category'] = $this->product2_model->get_all('category')->result();
		$get_data = $this->product2_model->get_where('product2', array('product_id' =>  $product_id));
		if($get_data->num_rows() > 0){
			$row = $get_data->row_array();
			$data['sub_category_id'] = $row['product_subcategory_id'];
		}
		$this->load->view('product2/edit_product_view',$data);
	}

	function get_data_edit(){
		$product_id = $this->input->post('product_id',TRUE);
		$data = $this->product2_model->get_where('product2', array('product_id' =>  $product_id))->result();
		echo json_encode($data);
	}

	//update product to database
	function update_product(){
		$product_id 	= $this->input->post('product_id',TRUE);

		$data = array(
			'product_name' => $this->input->post('product_name', TRUE),
			'product_price' => $this->input->post('product_price', TRUE),
			'product_category_id' => $this->input->post('category', TRUE),
			'product_subcategory_id' => $this->input->post('sub_category', TRUE),
		);
		$this->product2_model->update_product('product2', $data, ['product_id' => $product_id]);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Product Updated</div>');
		redirect('product2');
	}

	//Delete Product from Database
	function delete(){
		$product_id = $this->uri->segment(3);
		$this->product2_model->delete_product($product_id);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Product Deleted</div>');
		redirect('product2');
	}
}