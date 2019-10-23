<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart_model extends CI_Model{

  //get data from database
  function get_all($table){
      $this->db->select('*');
      return $this->db->get($table);
  }

}
