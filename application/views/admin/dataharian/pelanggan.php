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

      <?php $h=$this->session->userdata('akses'); ?>
    <?php $u=$this->session->userdata('user'); ?>
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
  					Data Pelanggan dan service
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
                    <h3>Data Customer</h3>
  					</div>
  					<!-- /.box-header -->
  					<div class="box-body">
                      <table class="table table-striped" style="font-size:14px;">
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
$customer_keterangan = $i['ket'];
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

?>
 <div class="box-header">
                      <a href="<?php echo base_url() . 'admin/dataharian'; ?>" class="btn btn-sm btn-warning"><span class=""></span> Kembali</a>
  					</div>
                                <tr>
                                <td><h5><strong>No Faktur</strong></h5></td>
                                <td>:</td>
                                <td><input type="text" name="nofak" class="text-primary input-sm" value="<?php echo $nofak; ?>" style="text-align:light;font-size:18px;" required readonly></td>
                                </tr>
                          
 <tr>
                                <td><h5><strong>Nama</strong></h5></td>
                                <td>:</td>
                                <td ><h5><strong><?php echo $customer_nama; ?></strong></h5></td>
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
                                <td><strong>No HP</strong></td>
                                <td>:</td>
                                <td><?php echo $nohp; ?></td>
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
                      <hr>

                      <table class="table table-bordered table-condensed" style="font-size:12px;" id="mydata">
                                    
                                    <thead class="text-primary">
                                        <tr>
                                            <th style="width:70px;">No</th>
                                            <th >Status</th>
                                            <th >Nama Barang</th>
                                              <th >Harga Jual</th>
                                              <th>Qty</th>
                                              <th>Diskon</th>
                                              <th>Total</th>
                                              <th>Mekanik</th>
                                              <th>Ket</th>
											 
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
        $ket = $i['keterangan'];
        $status = $i['proses'];
        $author = $i['jual_user_id'];
        
        
        ?>
                                    <tr>
                                      <td><?php echo $no; ?></td>
                                      <td><?php echo $status; ?></td>
                                      <td><?php echo $d_nama; ?></td>
                                      <td>Rp. <?php echo number_format ($harjul); ?></td>
                                      <td><?php echo $qty; ?></td>
                                      <td><?php echo $diskon; ?></td>
                                      <td>Rp. <?php echo number_format($d_total);?></td>
                                      <td><?php echo $author ?></td>
                                      <td><?php echo $ket ?></td>
                                      <td><a href="<?php echo base_url().'admin/dataharian/edit_jual/'.$id; ?>" class="btn btn-sm btn-primary"><span class=""></span>lihat</a>
                                     </td>
									
                                      <?php $a += $d_total;?>	
                                  </tr>
                                  <?php endforeach;?>                                                                                                                               
     
      
                                    </tbody>
                                </table>
                                </form>
            <table style="font-size:14px;">
                <tr>
                    <td style="width:0px;" rowspan="2"></td>
                    <th style="width:140px; font-size:14px;">Total Belanja(Rp)</th>
                    <th style="text-align:light;"><input type="text" name="total2" value="<?php echo number_format($a);?>" class="form-control input-sm" style="text-align:light;font-size:14px;" readonly></th>
                </tr>
            
            </table>
                    <div class="box-header">
  						<a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-send"></span> SELESAI</a>
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
  <!--Modal Add Pengguna-->
  <?php

foreach ($data->result_array() as $i):

$customer_id = $i['id'];
$customer_keterangan = $i['ket'];
$nofak = $i['nofak'];

?> 
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
				<h4 class="modal-title" id="myModalLabel">FINISH SERVICE</h4>
			</div>
			<form class="form-horizontal" action="<?php echo base_url() . 'admin/dataharian/update_finis' ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">

                <div class="alert alert-warning">
                    <h4><i class="fa fa-info"></i> Perhatian!</h4> Sebelum mengirim hasil service, periksa kembali sebelum kasir melakukan transakasi pemabayaran.
                    <p>Apakah yakin No. Faktur <input type="text" name="nofak" class="text-primary input-sm" value="<?php echo $nofak; ?>" style="text-align:light;font-size:14px;" required readonly> ini suah selesai</p>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat" id="simpan">SELESAI</button>
            </div>
        </form>
    </div>
</div>
</div>

<?php endforeach;?>
</div>

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

