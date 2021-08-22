<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('template/v_meta')?>
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/bootstrap/css/bootstrap.min.css' ?>">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/font-awesome/css/font-awesome.min.css' ?>">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.css' ?>">

	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/AdminLTE.min.css' ?>">
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css' ?>">
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css' ?>">

	<!-- bootstrap datepicker -->
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  	folder instead of downloading all of them to reduce the load. -->
  	<link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/skins/_all-skins.min.css' ?>">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.css' ?>"/>

  </head>

  		<!--Header-->
  		<?php
$this->load->view('template/v_header');
$this->load->view('admin/v_menu');
?>
  		<!-- Content Wrapper. Contains page content -->
  		<div class="content-wrapper">
  			<!-- Content Header (Page header) -->
  			<section class="content-header">
  				<h1>
  					Data customer
  					<small></small>
  				</h1>
        <!-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">customer</li>
      </ol> -->
      <?php
$this->load->view('template/v_bread');
?>
  </section>

  <!-- Main content -->
  <section class="content">
  	<div class="row">
  		<div class="col-xs-12">
  			<div class="box">
  				<div class="box">
              <div class="box-header">
                    <a> <p> Halaman ini berfungsi sebagai transaksi pembayaran </p></a>
  					</div>

  					<!-- /.box-header -->
  					<div class="box-body table-responsive">
					  <table class="table table-bordered table-condensed" style="font-size:11px;margin-top:10px;">
  						<table id="example1" class="table table-striped" style="font-size:11px;margin-top:10px;">
  							<thead>
  								<tr>
  									<th style="width:70px;">No</th>
  									<th>Tanggal Post</th>
  									<th>Nama</th>
  									<th>Kendaraan</th>
  									<th>No Polisi</th>
  									<th style="text-align:right;">Aksi</th>
  								</tr>
  							</thead>
  							<tbody>
  								<?php
$no = 0;
foreach ($data->result_array() as $i):
	$no++;
    $customer_id = $i['id'];
	$customer_nama = $i['nama'];
	$customer_keluhan = $i['keluhan'];
	$customer_mulai = $i['startdate'];
	$customer_selesai = $i['enddate'];
	$customer_alamat = $i['alamat'];
	$keterangan = $i['ket'];
	$customer_author = $i['userid'];
	$tangal = $i['tanggal'];
	$nohp = $i['nohp'];
	$nopol = $i['nopol'];
	$kode1 = $i['kode1'];
	$kode3 = $i['kode3'];
	$kendaraan = $i['kendaraan'];
	$type = $i['type'];
	$km = $i['km'];
	$tanggal = $i['tanggal'];
	$nofak = $i['nofak'];


	?>
																												  									<tr>
																												  										<td><?php echo $no; ?></td>
																												  										<td><?php echo $tanggal; ?></td>
																												  										<td><?php echo $customer_nama; ?></td>
																												  										<td><?php echo $type;?>-<?php echo $kendaraan; ?></td>
																												  						
																												  										<td><?php echo $kode1; ?> <?php echo $nopol; ?> <?php echo $kode3; ?></td>
																												  										<td style="text-align:right;">
                                                                                                                                                          <a class="btn btn-xs btn-warning" href="transaksi/service/<?php echo $nofak; ?>" title="Bayar"><span class="fa fa-print"></span> <?php echo $keterangan; ?></a>
										
																												  					
																												  										</td>
																												  									</tr>
																												  								<?php endforeach;?>
  							</tbody>
  						</table>
  					</div>
  					<!-- /.box-body -->
  				</div>
  				<!-- /.box -->
  			</div>
  			<!-- /.col -->
  		</div>
  		<!-- /.row -->
  	</section>
  	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('template/v_footer');?>

</div>
<!-- ./wrapper -->


<?php foreach ($data->result_array() as $i):
	$customer_id = $i['id'];
	$customer_nama = $i['nama'];
	$customer_keluhan = $i['keluhan'];
	$customer_mulai = $i['startdate'];
	$customer_selesai = $i['enddate'];
	$customer_alamat = $i['alamat'];
	$customer_keterangan = $i['ket'];
	$customer_author = $i['userid'];
	$tangal = $i['tanggal'];
	$nohp = $i['nohp'];
	$nopol = $i['nopol'];
	$kendaraan = $i['kendaraan'];
	$type = $i['type'];
	$km = $i['km'];
	?>
																													<!--Modal Edit Pengguna-->
																													<div class="modal fade" id="ModalEdit<?php echo $customer_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
																														<div class="modal-dialog" role="document">
																															<div class="modal-content">
																																<div class="modal-header">
																																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
																																	<h4 class="modal-title" id="myModalLabel">Edit customer</h4>
																																</div>
																																<form class="form-horizontal" action="<?php echo base_url() . 'admin/customer/update_customer' ?>" method="post" enctype="multipart/form-data">
																																	<div class="modal-body">

																																		<div class="form-group">
																																			<label for="inputUserName" class="col-sm-4 control-label">Nama customer</label>
																																			<div class="col-sm-7">
																																				<input type="hidden" name="kode" value="<?php echo $customer_id; ?>">
																																				<input type="text" name="xnama_customer" class="form-control" value="<?php echo $customer_nama; ?>" id="inputUserName" placeholder="Nama customer" required>
																																			</div>
																																		</div>
																																		<div class="form-group">
																																			<label for="inputUserName" class="col-sm-4 control-label">No HP</label>
																																			<div class="col-sm-7">
																																				<input type="hidden" name="kode" value="<?php echo $customer_id; ?>">
																																				<input type="text" name="xnohp" class="form-control" value="<?php echo $nohp; ?>" id="inputUserName"  required>
																																			</div>
																																		</div>
																																		<div class="form-group">
																																			<label for="inputUserName" class="col-sm-4 control-label">No Polisi</label>
																																			<div class="col-sm-7">
																																				<input type="hidden" name="kode" value="<?php echo $customer_id; ?>">
																																				<input type="text" name="xnopol" class="form-control" value="<?php echo $nopol; ?>" id="inputUserName"  required>
																																			</div>
																																		</div>
																																		<div class="form-group">
																																			<label for="inputUserName" class="col-sm-4 control-label">Kendaraan</label>
																																			<div class="col-sm-7">
																																		
																																				<input type="text" name="xkendaraan" class="form-control" value="<?php echo $kendaraan; ?>" id="inputUserName"  required>
																																			</div>
																																		</div>
																																		<div class="form-group">
																																			<label for="inputUserName" class="col-sm-4 control-label">Type</label>
																																			<div class="col-sm-7">
																																		
																																				<input type="text" name="xtype" class="form-control" value="<?php echo $type; ?>" id="inputUserName"  required>
																																			</div>
																																		</div>
																																		<div class="form-group">
																																			<label for="inputUserName" class="col-sm-4 control-label">KM</label>
																																			<div class="col-sm-7">
																																		
																																				<input type="text" name="xkm" class="form-control" value="<?php echo $km; ?>" id="inputUserName"  required>
																																			</div>
																																		</div>
																																		<div class="form-group">
																																			<label for="inputUserName" class="col-sm-4 control-label">Keluhan</label>
																																			<div class="col-sm-7">
																																				<textarea class="form-control" rows="3" name="xkeluhan" placeholder="Deskripsi ..." required><?php echo $customer_keluhan; ?></textarea>
																																			</div>
																																		</div>

																																
																																		<!-- /.form group -->
																																		<div class="form-group">
																																			<label for="inputUserName" class="col-sm-4 control-label">alamat</label>
																																			<div class="col-sm-7">
																																				<input type="text" name="xalamat" class="form-control" value="<?php echo $customer_alamat; ?>"  id="inputUserName" placeholder="alamat" required>
																																			</div>
																																		</div>

																																	</div>
																																	<div class="modal-footer">
																																		<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
																																		<button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
																																	</div>
																																</form>
																															</div>
																														</div>
																													</div>
																												<?php endforeach;?>





<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url() . 'assets/plugins/jQuery/jquery-2.2.3.min.js' ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url() . 'assets/plugins/datatables/jquery.dataTables.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.min.js' ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() . 'assets/plugins/slimScroll/jquery.slimscroll.min.js' ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url() . 'assets/plugins/fastclick/fastclick.js' ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() . 'assets/dist/js/app.min.js' ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() . 'assets/dist/js/demo.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datetimepicker/js/moment-with-locales.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js' ?>"></script>


<script type="text/javascript" src="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.js' ?>"></script>
<!-- page script -->
<script>
	$(function () {
		$('#color').colorpicker();
		$('#color2').colorpicker();
		$('.input-group.date').datetimepicker({
			locale: 'id',
			format:'YYYY-MM-DD HH:mm:ss',
		});
		$('.input-group.date').datetimepicker({
			locale: 'id',
			format:'YYYY-MM-DD HH:mm:ss',
		});
		$('.input-group.date').datetimepicker({
			locale: 'id',
			format:'YYYY-MM-DD HH:mm:ss',
		});
		$('.input-group.date').datetimepicker({
			locale: 'id',
			format:'YYYY-MM-DD HH:mm:ss',
		});
		$("#example1").DataTable();
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false
		});

	});
</script>
<?php if ($this->session->flashdata('msg') == 'warning'): ?>
	<script type="text/javascript">
		$.toast({
			heading: 'Peringatan',
			text: "Mohon Periksa Inputan Sebelum Menyimpan.",
			showHideTransition: 'slide',
			icon: 'error',
			hideAfter: false,
			position: 'bottom-right',
			bgColor: '#FF4859'
		});
	</script>

	<?php elseif ($this->session->flashdata('msg') == 'success'): ?>
		<script type="text/javascript">
			$.toast({
				heading: 'Success',
				text: "customer Berhasil disimpan ke database.",
				showHideTransition: 'slide',
				icon: 'success',
				hideAfter: false,
				position: 'bottom-right',
				bgColor: '#7EC857'
			});
		</script>
		<?php elseif ($this->session->flashdata('msg') == 'info'): ?>
			<script type="text/javascript">
				$.toast({
					heading: 'Info',
					text: "customer berhasil di update",
					showHideTransition: 'slide',
					icon: 'info',
					hideAfter: false,
					position: 'bottom-right',
					bgColor: '#00C9E6'
				});
			</script>
			<?php elseif ($this->session->flashdata('msg') == 'success-hapus'): ?>
				<script type="text/javascript">
					$.toast({
						heading: 'Success',
						text: "customer Berhasil dihapus.",
						showHideTransition: 'slide',
						icon: 'success',
						hideAfter: false,
						position: 'bottom-right',
						bgColor: '#7EC857'
					});
				</script>
			<?php elseif ($this->session->flashdata('msg') == 'jumlah'): ?>
				<script type="text/javascript">
					$.toast({
						heading: 'Info',
						text: "Jumlah Uang Kurang.",
						showHideTransition: 'slide',
						icon: 'success',
						hideAfter: false,
						position: 'bottom-right',
						bgColor: '#7EC857'
					});
				</script>
				<?php else: ?>

				<?php endif;?>
			</body>
			</html>
