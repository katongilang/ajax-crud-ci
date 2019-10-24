<!DOCTYPE html>
<html>
<head>
	<title>Shopping cart using codeigniter and AJAX</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets_cart/css/bootstrap.css'?>">
</head>
<body>	
	<!-- NAVBAR -->
	<?php $this->load->view("_partials/navbar.php");?>
	<!-- NAVBAR -->
	<div class="container"><br/>
		<h3>Shopping Cart <small>Using Ajax and Codeigniter</small></h3>
		<hr/>
		<div class="row">
			<div class="col-md-8">
				<h4>Product</h4>
				<div class="row">
					<?php foreach ($data->result() as $row) : ?>
						<div class="col-md-4">
							<div class="thumbnail">
								<img width="200" src="<?= base_url().'assets_cart/images/'.$row->product_image;?>">
								<div class="caption">
									<h4><?= $row->product_name;?></h4>
									<div class="row">
										<div class="col-md-7">
											<h4>Rp <?= number_format($row->product_price);?>,-</h4>
										</div>
										<div class="col-md-5">
											<input type="number" name="quantity" id="<?= $row->product_id;?>" value="1" class="quantity form-control">
										</div>
									</div>
									<button class="add_cart btn btn-success btn-block" data-productid="<?= $row->product_id;?>" data-productname="<?= $row->product_name;?>" data-productprice="<?= $row->product_price;?>">Add To Cart</button>
								</div>
							</div>
						</div>
					<?php endforeach;?>

				</div>

			</div>
			<div class="col-md-4">
				<h4>Shopping Cart</h4>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Items</th>
							<th>Price</th>
							<th>Qty</th>
							<th>Total</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody id="detail_cart">

					</tbody>

				</table>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="<?php echo base_url().'assets_cart/js/jquery-3.2.1.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets_cart/js/bootstrap.js'?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.add_cart').click(function(){
				var product_id    = $(this).data("productid");
				var product_name  = $(this).data("productname");
				var product_price = $(this).data("productprice");
				var quantity   	  = $('#' + product_id).val();
				$.ajax({
					url : "<?= site_url('cart/add_to_cart');?>",
					method : "POST",
					data : {product_id: product_id, product_name: product_name, product_price: product_price, quantity: quantity},
					success: function(data){
						$('#detail_cart').html(data);
					}
				});
			});


			$('#detail_cart').load("<?= site_url('cart/load_cart');?>");

			// REMOVE FROM CART
			$(document).on('click','.romove_cart',function(){
				var row_id=$(this).attr("id"); 
				$.ajax({
					url : "<?= site_url('cart/delete_cart');?>",
					method : "POST",
					data : {row_id : row_id},
					success :function(data){
						$('#detail_cart').html(data);
					}
				});
			});
		});
	</script>
</body>
</html>