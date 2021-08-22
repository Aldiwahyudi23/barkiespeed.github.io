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

	  <?php $h=$this->session->userdata('akses'); ?>
    <?php $u=$this->session->userdata('user'); ?>

  </head>

  		<!--Header-->
  		<?php
$this->load->view('template/v_header');
$this->load->view('admin/v_menu');
?>
  		<!-- Content Wrapper. Contains page content -->
  		<div class="masuk-bg content-wrapper">
  			<!-- Content Header (Page header) -->
  			<section class="content-header">
  				<h4>
  					Data Pelanggan
  					<small></small>
  				</h4>
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

      <?php if($h=='1'|| $h=='2'){ ?>
			  <div class="alert alert-warning">
              <h4><i class="fa fa-warning"></i> Perhatian!</h4> Pelanggan yang pernah masuk ke bengkel,
              <br>
              <p>Di urutkan berdasarkan no faktur pada saat proses perbaikan atau perawatan. Untuk mengaktifkan akun pelanggan klik tombol button biru</p>
			  </div>
		  <?php }?>
  			<div class="box">

  				<div class="box">
  				
  					<!-- /.box-header -->
  					<div class="box-body table-responsive">
  						<table id="example1" class=" table table-striped table-bordered table-hover" style="font-size:14px;">
  							<thead>
  								<tr>
  									<th style="width:70px;">No</th>
  									<th>Tanggal Post</th>
  									<th>No Faktur</th>
  									<th>Nama</th>
  									<th>No HP</th>
  									<th>No Polisi</th>
  									<th>Kendaraan</th>
  									<th>Keluhan</th>
  				
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
	$customer_alamat = $i['alamat'];
	$customer_keterangan = $i['ket'];
	$customer_author = $i['userid'];
	$tanggal = $i['tanggal'];
	$nohp = $i['nohp'];
	$kendaraan = $i['kendaraan'];
	$nofak = $i['nofak'];
	$nopol = $i['nopol'];
	$kode1 = $i['kode1'];
	$kode3 = $i['kode3'];
	$level = $i['level'];

	?>
																												  									<tr>
																												  										<td><?php echo $no; ?></td>
																												  										<td><?php echo $tanggal; ?></td>
																												  										<td><?php echo $nofak; ?></td>
																												  										<td> <a href="customer/active/<?php echo $nopol; ?>" class="pull-LIGHT"><small><?php echo $customer_nama; ?></td>
																												  										<td><?php echo $nohp; ?></td>
																												  										<td><?php echo $kode1; ?> <?php echo $nopol; ?> <?php echo $kode3; ?></td>
																												  										<td><?php echo $kendaraan; ?></td>
																												  										<td><?php echo $customer_keluhan; ?></td>
																												  							
																												  										<td style="text-align:right;">
																																						<?php if($h=='1' || $h=='2') { ?>
																												  											<a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#ModalEdit<?php echo $customer_id; ?>"><span class="fa fa-pencil"></span></a>
																												  											<a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#ModalHapus<?php echo $customer_id; ?>"><span class="fa fa-trash"></span></a>
																												  											<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Modalactive<?php echo $customer_id; ?>"><span class="fa fa-warning"></span>AKtif</a>

																												  											
																												  											
																																							 
																																						<?php } ?>
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

<!--Modal Add Pengguna-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
				<h4 class="modal-title" id="myModalLabel">Add customer</h4>
			</div>
			<form class="form-horizontal" action="<?php echo base_url() . 'admin/customer/simpan_customer' ?>" method="post" enctype="multipart/form-data">
				<div class="modal-body">

					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">Nama customer</label>
						<div class="col-sm-7">
							<input type="text" name="xnama_customer" class="form-control" id="inputUserName" placeholder="Nama customer" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">No Hp</label>
						<div class="col-sm-7">
							<input type="text" name="xnohp" class="form-control" id="inputUserName" placeholder="+62 8XX XXX XXX" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">No Polisi</label>
						<div class="col-sm-7">
							<input type="text" name="xnopol" class="form-control" id="inputUserName" placeholder="B 4719 UR" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">Kendaraan</label>
						<div class="col-sm-7">
							<input type="text" name="xkendaraan" class="form-control" id="inputUserName" placeholder="Merk/Type" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">Type</label>
						<div class="col-sm-7">
							<input type="text" name="xtype" class="form-control" id="inputUserName" placeholder="Merk/Type" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">KM</label>
						<div class="col-sm-7">
							<input type="text" name="xkm" class="form-control" id="inputUserName" placeholder="0000000" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">Keluhan</label>
						<div class="col-sm-7">
							<textarea class="form-control" rows="3" name="xkeluhan" placeholder="Deskripsi ..." required></textarea>
						</div>
					</div>
					<!-- /.form group -->
					<div class="form-group">
						<label for="inputUserName" class="col-sm-4 control-label">alamat</label>
						<div class="col-sm-7">
							<input type="text" name="xalamat" class="form-control" id="inputUserName" placeholder="alamat" required>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>


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
																																	<h4 class="modal-title" id="myModalLabel">Edit Data customer</h4>
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
																																		<div class="form-group">
																																			<label for="inputUserName" class="col-sm-4 control-label">Keterangan</label>
																																			<div class="col-sm-7">
																																				<input type="text" name="xketerangan" class="form-control" value="<?php echo $customer_keterangan; ?>"  id="inputUserName" placeholder="alamat" required>
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


																												<?php foreach ($data->result_array() as $i):
	$pengguna_id = $i['id'];
	$pengguna_nama = $i['nama'];
	$pengguna_jenkel = $i['jenkel'];
	$pengguna_email = $i['email'];
	$pengguna_username = $i['username'];
	$pengguna_password = $i['password'];
	$pengguna_nohp = $i['nohp'];
	$pengguna_level = $i['level'];
	$pengguna_photo = $i['photo'];
	?>
									  <!--Modal Edit Pengguna-->
									  <div class="modal fade" id="Modalactive<?php echo $pengguna_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									    <div class="modal-dialog" role="document">
									      <div class="modal-content">
									        <div class="modal-header">
									          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
									          <h4 class="modal-title" id="myModalLabel">Edit Pengguna</h4>
									        </div>
									        <form class="form-horizontal" action="<?php echo base_url() . 'admin/customer/update_pelanggan' ?>" method="post" enctype="multipart/form-data">
									          <div class="modal-body">

									            <div class="form-group">
									              <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
									              <div class="col-sm-7">
									               <input type="hidden" name="kode" value="<?php echo $pengguna_id; ?>"/>
									               <input type="text" name="xnama" class="form-control" id="inputUserName" value="<?php echo $pengguna_nama; ?>" placeholder="Nama Lengkap" required>
									             </div>
									           </div>
									           <div class="form-group">
									            <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
									            <div class="col-sm-7">
									              <input type="email" name="xemail" rm-control" value="<?php echo $pengguna_email; ?>" id="inputEmail3" placeholder="Email" required>
									            </div>
									          </div>
											  <div class="form-group">
												<label for="inputUserName" class="col-sm-4 control-label">Status</label>
												<div class="col-sm-7">
													<select class="form-control" name="xjenkel" required>
													<?php if ($pengguna_jengkel == 'P'): ?>
													<option value="P" selected>Perempuan</option>
													<option value="L">Laki-Laki</option>
													<?php else: ?>
														<option value="P">Perempuan</option>
														<option value="L" selected>Laki-Laki</option>


													<?php endif;?>
													</select>
												</div>
												</div>

        <div class="form-group">
          <label for="inputUserName" class="col-sm-4 control-label">Username</label>
          <div class="col-sm-7">
            <input type="text" name="xusername" class="form-control" value="<?php echo $pengguna_username; ?>" id="inputUserName" placeholder="Username" required>
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
          <div class="col-sm-7">
            <input type="password" name="xpassword" class="form-control" id="inputPassword3" placeholder="Password">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword4" class="col-sm-4 control-label">Ulangi Password</label>
          <div class="col-sm-7">
            <input type="password" name="xpassword2" class="form-control" id="inputPassword4" placeholder="Ulangi Password">
          </div>
        </div>
        <div class="form-group">
          <label for="inputUserName" class="col-sm-4 control-label">Kontak Person</label>
          <div class="col-sm-7">
            <input type="text" name="xkontak" class="form-control" value="<?php echo $pengguna_nohp; ?>" id="inputUserName" placeholder="Kontak Person" required>
          </div>
        </div>
        <div class="form-group">
          <label for="inputUserName" class="col-sm-4 control-label">Status</label>
          <div class="col-sm-7">
            <select class="form-control" name="xlevel" required>
             <?php if ($pengguna_level == '4'): ?>
              <option value="4" selected>Aktif</option>
              <option value="0">Tidak Aktif</option>
              <?php else: ?>
                <option value="4">Aktif</option>
                <option value="0" selected>Tidak Aktif</option>


              <?php endif;?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
          <div class="col-sm-7">
            <input type="file" name="filefoto"/>
             <input type="hidden" value="<?php echo $pengguna_photo; ?>" name="gambar">
          </div>
        </div>


      </div>
      <div class="modal-footer">
		  <a class="btn btn-xs btn-success" href="customer/cart/<?php echo ($pengguna_id); ?>" ><span class="fa fa-print"></span> Print</a>
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
      </div>
    </form>
  </div>
</div>
</div>
<?php endforeach;?>

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
	?>
																													<!--Modal Hapus Pengguna-->
																													<div class="modal fade" id="ModalHapus<?php echo $customer_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
																														<div class="modal-dialog" role="document">
																															<div class="modal-content">
																																<div class="modal-header">
																																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
																																	<h4 class="modal-title" id="myModalLabel">Hapus Data customer</h4>
																																</div>
																																<form class="form-horizontal" action="<?php echo base_url() . 'admin/customer/hapus_customer' ?>" method="post" enctype="multipart/form-data">
																																	<div class="modal-body">
																																		<input type="hidden" name="kode" value="<?php echo $customer_id; ?>"/>
																																		<p>Apakah Anda yakin mau menghapus Customer <b><?php echo $customer_nama; ?></b> ?</p>

																																	</div>
																																	<div class="modal-footer">
																																		<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
																																		<button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
																																	</div>
																																</form>
																															</div>
																														</div>
																													</div>
																												<?php endforeach;?>


<!--Modal Reset Password-->
<div class="modal fade" id="Modalreset<?php echo $pengguna_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									    <div class="modal-dialog" role="document">
									      <div class="modal-content">
									        <div class="modal-header">
									          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
									          <h4 class="modal-title" id="myModalLabel">Edit Pengguna</h4>
									        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel">Reset Password</h4>
      </div>

      <div class="modal-body">

        <table>
          <tr>
            <th style="width:120px;">Username</th>
            <th>:</th>
            <th><?php echo $this->session->flashdata('uname'); ?></th>
          </tr>
          <tr>
            <th style="width:120px;">Password Baru</th>
            <th>:</th>
            <th><?php echo $this->session->flashdata('upass'); ?></th>
          </tr>
        </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


<?php foreach ($data->result_array() as $i):
	$pengguna_id = $i['id'];
	$pengguna_nama = $i['nama'];
	$pengguna_jenkel = $i['jenkel'];
	$pengguna_email = $i['email'];
	$pengguna_username = $i['username'];
	$pengguna_password = $i['password'];
	$pengguna_nohp = $i['nohp'];
	$pengguna_level = $i['level'];
	$pengguna_photo = $i['photo'];
	$nofak = $i['nofak'];
	?>
									  <!--Modal Edit Pengguna-->
									  <div class="modal fade" id="Modalactive1<?php echo $pengguna_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									    <div class="modal-dialog" role="document">
									      <div class="modal-content">
									        <div class="modal-header">
									          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
									          <h4 class="modal-title" id="myModalLabel">Edit Pengguna</h4>
									        </div>
									        <form class="form-horizontal" action="<?php echo base_url() . 'admin/customer/update_pelanggan' ?>" method="post" enctype="multipart/form-data">
									          <div class="modal-body">

											  <div class="modal-body">

<table>
  <tr>
	<th style="width:120px;">No Faktur</th>
	<th>:</th>
	<th><?php echo $nofak; ?></th>
  </tr>
  <tr>
	<th style="width:120px;">Kata Sandi</th>
	<th>:</th>
	<th><?php echo $this->session->flashdata('password'); ?></th>
  </tr>
</table>
 
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
<?php if ($this->session->flashdata('msg') == 'error'): ?>
	<script type="text/javascript">
		$.toast({
			heading: 'Error',
			text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
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
				<?php elseif ($this->session->flashdata('msg') == 'danger'): ?>
				<script type="text/javascript">
					$.toast({
						heading: 'PERINGATAN !',
						text: "Mohon Maaf Anda Tidak Mempunyai Akses Untuk Masuk Ke Halaman Tersebut.",
						showHideTransition: 'slide',
						icon: 'danger',
						hideAfter: false,
						position: 'bottom-right',
						bgColor: '#FF4859'
					});
				</script>
				<?php else: ?>

				<?php endif;?>
			</body>
			</html>
