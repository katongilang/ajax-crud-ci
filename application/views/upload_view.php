<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Upload files using CI and Ajax</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
</head>
<body>
	<!-- NAVBAR -->
	<?php $this->load->view("_partials/navbar.php");?>
	<!-- NAVBAR -->
	<div class="container">
		<h1>Upload files <small>using CI and Ajax</small></h1>
		<div class="col-sm-4">
			<div class="card p-4 box-shadow">
				<form class="form-horizontal" id="submit">
					<div class="form-group">
						<input type="text" name="title" class="form-control" placeholder="Title">
					</div>
					<div class="form-group">
						<input type="file" name="file">
					</div>

					<div class="form-group">
						<button class="btn btn-success" id="btn_upload" type="submit">Upload</button>
					</div>
				</form>	
			</div>
		</div>
		<hr/>
		<div class="row" id="show_data">
		</div>
	</div>

	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.4.1.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			show(); // CALL

			 // SHOW ALL GALLERY
			 function show(){
			 	$.ajax({
			 		type  : 'ajax',
			 		url   : '<?= site_url('upload/show_data')?>',
			 		async : false,
			 		dataType : 'json',
			 		success : function(data){
			 			var html = '';
			 			var i;
			 			for(i=0; i<data.length; i++){

			 				html += '<div class="col-md-4">'+
			 				'<div class="card mb-4 box-shadow">'+
			 				'<img class="card-img-top" alt="webdev upload" style="height: 225px; width: 100%; display: block;" src="<?=base_url('')?>assets/images/'+data[i].file_name+'">'+
			 				'<div class="card-body">'+
			 				'<h5 class="card-title">'+data[i].title+'</h5>'+
			 				'<p class="card-text">Default Description hehehe.</p>'+
			 				'<div class="d-flex justify-content-between align-items-center">'+
			 				'<div class="btn-group">'+
			 				'<a href="" idnya="'+data[i].id+'" class="btn btn-danger" >Delete</a>'+
			 				'</div></div></div></div></div>';
			 			}
			 			$('#show_data').html(html);
			 		}

			 	});
			 }

			 // UPLOAD GAMBAR
			 $('#submit').submit(function(e){
			 	e.preventDefault(); 
			 	$.ajax({
			 		url:'<?= base_url();?>upload/do_upload',
			 		type:"post",
		             data:new FormData(this), //this is formData
		             processData:false,
		             contentType:false,
		             cache:false,
		             async:false,
		             success: function(data){ // Respon ketika success
		             	alert("Upload Image Successful.");
		             	show();
		             }
		         });
			 });

			 // DELETE
			$(document).on('click','.btn-danger',function(){
			 	var id_gambar = $(this).attr('idnya');
			 	console.log(id_gambar);
			 	//if (confirm("Are you sure you want to delete this?")) {
			 		$.ajax({
			 			type : "POST",
			 			url   : '<?= base_url('upload/delete')?>',
			 			dataType : 'JSON',
			 			data : {id_gambar:id_gambar},
			 			success : function(data){
			 				show();
			 			}
			 		});
			 	//}
			 	return false;
			 });


			});

		</script>
	</body>
	</html>