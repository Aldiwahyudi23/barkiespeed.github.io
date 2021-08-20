<!DOCTYPE html>
<html>
  <head>
  <?php $iden = $iden->row_array()?>
  <title><?php echo ucfirst($this->uri->segment(1)) . " - " . ucfirst($this->uri->segment(2)) ?></title>
  <link rel="icon" href="<?=base_url('assetss/favicon/') . $iden['favicon']?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Produk By Aldi">
    <meta name="author" content="Aldi Wahyudi">
    <!-- Bootstrap -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
    <!-- styles -->
		<link href="<?php echo base_url().'assets/css/stylesl.css'?>" rel="stylesheet">
		<style>
		.masuk-bg {
			background-image: url(http://localhost/barkiespeed/assetss/images/air-jernih.jpg);
		}
		</style>
   
  </head>
  <body class="masuk-bg">
  

	<div class="page-content container ">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box" style="margin-top:20%;">
			            <div class="content-wrap">
			                <img width="200px" src="<?php echo base_url().'assetss/images/speed.jpeg'?>"/>
			                <p><h3><strong>Silahkan Login</strong></h3></p>
			                <p><?php echo $this->session->flashdata('msg');?></p>
	                        <hr/>
	                        <form action="<?php echo base_url().'pelanggan/login/cekuser'?>" method="post">
	                        	<input class="form-control" type="text" name="username" placeholder="No Faktur" required>
				                <input class="form-control" type="password" name="password" placeholder="Kata Sandi" style="margin-bottom:1px;" required>
				                <div class="action">
				                    <button type="submit" class="btn btn-lg btn-success " style="width:310px;margin-bottom:30px;">MASUK</button>
				                </div>
	                        </form>
								    
			            </div>
			        </div>
			    </div>
			</div>
		</div>
	</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
    
  </body>
</html>