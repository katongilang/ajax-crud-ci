<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Latihan Chart</title>  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/css/morris.css'?>">
</head>
<body>
  <!-- NAVBAR -->
  <?php $this->load->view("_partials/navbar.php");?>
  <!-- NAVBAR -->
  <div class="container">
    <h1>Chart <small>using Codeigniter and Morris.js</small></h1>

    <div id="graph"></div>
  </div>

  <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.4.1.js'?>"></script>  
  <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
  <script src="<?php echo base_url().'assets/js/raphael-min.js'?>"></script>
  <script src="<?php echo base_url().'assets/js/morris.min.js'?>"></script>
  <script>
    Morris.Area({
      element: 'graph',
      data: <?= $show_data;?>,
      xkey: 'year',
      ykeys: ['purchase', 'sale', 'profit'],
      labels: ['Purchase', 'Sale', 'Profit']
    });
  </script>
</body>
</html>
