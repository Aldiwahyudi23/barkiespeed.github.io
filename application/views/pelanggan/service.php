<!DOCTYPE html>
<html>
<head>
<?php $iden = $iden->row_array()?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keyword" content="Bengkel Barkiespeef, Barkiespeed, Portal Bengkel Barkiespeef, Web Bengkel Barkiespeef">
<meta name="description" content="Portal Resmi Bengkel Barkiespeef">

  <title><?php echo ucfirst($this->uri->segment(1)) . " - " . ucfirst($this->uri->segment(2)) ?></title>
  <link rel="icon" href="<?=base_url('assetss/favicon/speed.jpeg') . $iden['favicon']?>">

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/bootstrap/css/bootstrap.min.css' ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/font-awesome/css/font-awesome.min.css' ?>">
  <!-- Ionicons -->
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css' ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/AdminLTE.min.css' ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/skins/_all-skins.min.css' ?>">

  		<?php
$this->load->view('template/v_header_pelanggan');
$this->load->view('pelanggan/v_menu');
?>
  </head>

  		<!--Header-->
  		<!-- Content Wrapper. Contains page content -->
  		<div class="content-wrapper">
  			<!-- Content Header (Page header) -->
  			<section class="content-header">
  				<h4>
  					Data Service Pelanggan
  					<small></small>
  				</h4>
        <!-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Agenda</li>
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
                    <h4>Data Customer</h4>
  					</div>
  					<!-- /.box-header -->
  					<div class="box-body">
                      <table class="table table-striped" style="font-size:12px;">
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
$ket = $i['ket'];
$customer_author = $i['userid'];
$tangal = $i['tanggal'];
$nohp = $i['nohp'];
$nopol = $i['nopol'];
$kendaraan = $i['kendaraan'];
$type = $i['type'];
$km = $i['km'];
$tanggal = $i['tanggal'];
$nohp = $i['nohp'];
$nofak = $i['nofak'];
$satus = $i['deskripsi'];

?>
</tr>
<th style="font-size:13px;" class="text-success"><center><h2><strong><?php echo $ket; ?></strong></h2></center></th>
<tr>
</tr>                           
                                <td><h5><strong>No Faktur</strong></h5></td>
                                <td></td>
                                <td ><h5><strong><?php echo $nofak; ?></strong></h5></td>
</tr>
<br>
 <tr>
                                <td><h5><strong>Nama</strong></h5></td>
                                <td>:</td>
                                <td ><h5><strong><?php echo $customer_nama; ?></strong></h5></td>
                            </tr>
                            <tr>
                                <td><strong>No HP</strong></td>
                                <td>:</td>
                                <td><?php echo $nohp; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Alamat</strong></td>
                                <td>:</td>
                                <td><?php echo $customer_alamat; ?></td>
                                </tr>
                            <tr>

                                <td><strong>Tanggal Input</strong></td>
                                <td>:</td>
                                <td><?php echo $tanggal; ?></td>
                            </tr>
                            <tr>
                                <td><strong>No Polisi</strong></td>
                                <td>:</td>
                                <td><?php echo $nopol; ?></td>
                                </tr>
                            <tr>
                                <td><strong>Kendaraan</strong></td>
                                <td>:</td>
                                <td><?php echo $type; ?>/<?php echo $kendaraan; ?></td>
                            </tr>
                            <tr>
                                <td><strong>KM</strong></td>
                                <td>:</td>
                                <td><?php echo $km; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Keluhan</strong></td>
                                <td>:</td>
                                <td><?php echo $customer_keluhan; ?></td>
                               
                            </tr>

<?php endforeach;?>                 
                      
                      </table>
                                <center><h3><strong><?php echo $satus; ?></strong></h3></center>
                      </div>
                      <hr>
                      <div class="box-body table responsive">
                      <table class="table table-bordered table-condensed table-responsive" style="font-size:12px;margin-top:10px;">
                                    
                                    <thead class="text-primary">
                                        <tr>
                                            <th style="width:70px;">No</th>
                                            <th >Keterangan</th>
                                            <th >Nama Barang</th>
                                              <th >Harga</th>
                                              <th>Qty</th>
                                              <th>Diskon</th>
                                              <th>Total</th>
					
                                        </tr>
                                    </thead>
                                    <tbody>		
                                    <?php
      $no = 0;
      $a=0;
      foreach ($data1->result_array() as $i):
          $no++; 
          $id = $i['d_jual_id'];
          $d_nofak = $i['d_jual_nofak'];
          $barang_id = $i['d_jual_barang_id'];
          $harfok = $i['d_jual_barang_harpok'];
          $harjul = $i['d_jual_barang_harjul'];
          $qty = $i['d_jual_qty'];
          $diskon = $i['d_jual_diskon'];
          $d_total = $i['d_jual_total'];
          $nopol = $i['nopol'];
          $d_nama = $i['d_jual_barang_nama'];
          $satuan = $i['d_jual_barang_satuan'];
		  $ket = $i['proses'];
          $satus = $i['deskripsi'];
      
      
          ?>
                                    <tr>
                                      <td><?php echo $no; ?></td>
                                      <td><?php echo $ket; ?></td>
                                      <td><?php echo $d_nama; ?></td>
                                      <td>Rp. <?php echo number_format ($harjul); ?></td>
                                      <td><?php echo $qty; ?></td>
                                      <td><?php echo $diskon; ?></td>
                                      <td>Rp. <?php echo number_format($d_total);?></td>
									 
                                      <?php $a += $d_total;?>	
                                  </tr>
                                                                                                                                            
          <?php endforeach;?>
      
                                    </tbody>
                                </table>
                                </div>
            <table>
                <tr>
                    <td style="width:60px;" rowspan="2"></td>
                    <th style="width:140px; font-size:18px;">Total Belanja(Rp)</th>
                    <th style="text-align:right;"><input type="text" name="total2" value="<?php echo number_format($a);?>" class="form-control input-sm" style="text-align:right;font-size:14px;" readonly></th>
                    <input type="hidden" id="total" name="total" value="<?php echo $a;?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                </tr>

            
            </table>
            <br>
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
     
<?php  foreach ($data1->result_array() as $i):
          $no++; 
          $id = $i['d_jual_id'];
          $d_nofak = $i['d_jual_nofak'];
          $barang_id = $i['d_jual_barang_id'];
          $harfok = $i['d_jual_barang_harpok'];
          $harjul = $i['d_jual_barang_harjul'];
          $qty = $i['d_jual_qty'];
          $diskon = $i['d_jual_diskon'];
          $d_total = $i['d_jual_total'];
          $nopol = $i['nopol'];
          $d_nama = $i['d_jual_barang_nama'];
          $satuan = $i['d_jual_barang_satuan'];
		  $ket = $i['keterangan'];
      
      
          ?>
																													<!--Modal Edit Pengguna-->
																													<div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
																														<div class="modal-dialog" role="document">
																															<div class="modal-content">
																																<div class="modal-header">
																																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
																																	<h4 class="modal-title" id="myModalLabel">Tambah Keterangan</h4>
																																</div>
																																<form class="form-horizontal" action="<?php echo base_url() . 'admin/dataharian/update_customer' ?>" method="post" enctype="multipart/form-data">
																																	<div class="modal-body">

																																		<div class="form-group">
																																			<label for="inputUserName" class="col-sm-4 control-label">Keterangan</label>
																																			<div class="col-sm-7">
																															
																																				<input type="text" name="ket" class="form-control" value="<?php echo $ket; ?>" id="inputUserName" placeholder="Nama customer" required>
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

<?php  foreach ($data1->result_array() as $i):
          $no++; 
          $id = $i['d_jual_id'];
          $d_nofak = $i['d_jual_nofak'];
          $barang_id = $i['d_jual_barang_id'];
          $harfok = $i['d_jual_barang_harpok'];
          $harjul = $i['d_jual_barang_harjul'];
          $qty = $i['d_jual_qty'];
          $diskon = $i['d_jual_diskon'];
          $d_total = $i['d_jual_total'];
          $nopol = $i['nopol'];
          $d_nama = $i['d_jual_barang_nama'];
          $satuan = $i['d_jual_barang_satuan'];
		  $ket = $i['keterangan'];
      
      
          ?>
																													<!--Modal Hapus Pengguna-->
																													<div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
																														<div class="modal-dialog" role="document">
																															<div class="modal-content">
																																<div class="modal-header">
																																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
																																	<h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
																																</div>
																																<form class="form-horizontal" action="<?php echo base_url() . 'admin/dataharian/hapus_customer' ?>" method="post" enctype="multipart/form-data">
																																	<div class="modal-body">
																																		<input type="hidden" name="kode" value="<?php echo $id; ?>"/>
																																		<p>Apakah Anda yakin mau menghapus Pengguna <b><?php echo $d_nama; ?></b> ?</p>

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

<script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.js' ?>"></script>
<!-- page script -->


                <script type="text/javascript">
        $(function(){
            $('#jml_uang').on("input",function(){
                var total=$('#total').val();
                var jumuang=$('#jml_uang').val();
                var hsl=jumuang.replace(/[^\d]/g,"");
                $('#jml_uang2').val(hsl);
                $('#kembalian').val(hsl-total);
            })
            
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        } );
    </script>
    <script type="text/javascript">
        $(function(){
            $('.jml_uang').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('#jml_uang2').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ''
            });
            $('#kembalian').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('.harjul').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
        });
    </script>
    
   

			</body>
			</html>

