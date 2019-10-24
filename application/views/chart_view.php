<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Latihan Chart</title>  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/css/morris.css'?>">
  <style type="text/css">
    .hide-element {
      display: none;
      visibility: hidden;
    }
  </style>
</head>
<body>
  <!-- NAVBAR -->
  <?php $this->load->view("_partials/navbar.php");?>
  <!-- NAVBAR -->
  <div class="container">
    <form class="mt-3">
      <div class="form-group col-md-4">
        <select class="form-control" name="pilih" id="pilih" required>
          <option value="">Pilih Chart</option>
          <option value="morris">Morris</option>          
          <option value="highcharts">Highcharts</option>
        </select>
      </div>
    </form>

    <h3>Chart <small>using Codeigniter and Morris.js</small></h3>
    <div id="morris"></div>
    <div id="highcharts"></div>
  </div>

  <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.4.1.js'?>"></script>  
  <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
  <script src="<?php echo base_url().'assets/js/raphael-min.js'?>"></script>
  <script src="<?php echo base_url().'assets/js/morris.min.js'?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){

      $('#pilih').change(function(){

        var pilih  = $('#pilih').val();

        if (pilih === 'morris') {
          $('#highcharts').addClass("hide-element");
          show_morris();
        }
        else if (pilih == 'highcharts') {
          $('#morris').empty();
          $('#highcharts').removeClass("hide-element");
          $('#highcharts').html("belum dibuat");
        }
        else {
          $('#morris').empty();
          $('#highcharts').addClass("hide-element");
        }

      }); 

      function show_morris(){
        Morris.Area({
          element: 'morris',
          data: <?= $show_data;?>,
          xkey: 'year',
          ykeys: ['purchase', 'sale', 'profit'],
          labels: ['Purchase', 'Sale', 'Profit']
        });
      }
      
    });
  </script>
</body>
</html>
