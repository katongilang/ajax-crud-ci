<?php
class Chart extends CI_Controller{
    function __construct(){
      parent::__construct();
      $this->load->model('chart_model'); // LOAD MODEL
    }

    function index(){
      $data = $this->chart_model->get_all('account')->result(); // GET ALL DATA FROM TABEL ACCOUNT
      $x['show_data'] = json_encode($data); // TAMPUNG HASIL JSON_ENCODE KE ARRAY SHOW_DATA
      $this->load->view('chart_view',$x); // KIRIM KE VIEW
    }
}
