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
  					Proses Servis
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
                      <div class="box">
			  <div class="alert alert-warning">
              <h4><i class="fa fa-info"></i> Perhatian!</h4>Untuk Barang tidak boleh di hapus, walaupun mau dihapus harus ke kasir dulu.
            </div>
                    <h3>Data Service</h3>

  					</div>
                      
  					<!-- /.box-header -->
  					<div class="box-body">
                      <form class="form-horizontal" action="<?php echo base_url() . 'admin/dataharian/edit' ?>" method="post">
                      <?php
      $no = 0;
      $a=0;
      foreach ($data1->result_array() as $i):
        $no++; 
        $id = $i['d_jual_id'];
        $nofak = $i['d_jual_nofak'];
        $barang_id = $i['d_jual_barang_id'];
        $harfok = $i['d_jual_barang_harpok'];
        $harjul = $i['d_jual_barang_harjul'];
        $qty = $i['d_jual_qty'];
        $diskon = $i['d_jual_diskon'];
        $d_total = $i['d_jual_total'];
        $d_nama = $i['d_jual_barang_nama'];
        $satuan = $i['d_jual_barang_satuan'];
        $ket = $i['keterangan'];
        $status= $i['proses'];
        
        
        ?>
	<a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#ModalHapus<?php echo $id; ?>"><span class="fa fa-trash"> Hapus</span></a>
        <div>
        </div>
                                <br>
                             <table class="table table-striped" style="font-size:14px;">
                                <tr>
                                <td><h5><strong>No Faktur</strong></h5></td>
                                <td>:</td>
                                <td ><h5><strong><?php echo $nofak; ?></strong></h5></td>
                            </tr>
                          
 <tr>
                                <td><h5><strong>Nama</strong></h5></td>
                                <td>:</td>
                                <td ><h5><strong><?php echo $d_nama; ?></strong></h5></td>
                            </tr>
                            <tr>
                                <td><strong>Harga</strong></td>
                                <td>:</td>
                                <td><?php echo $harjul; ?></td>
                            </tr>
                            <tr>

                                <td><strong>Satuan</strong></td>
                                <td>:</td>
                                <td><?php echo $satuan; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Keterangan</strong></td>
                                <td>:</td>
                                <td>	<textarea class="form-control" rows="3" name="ket" placeholder="Deskripsi ..." required><?php echo $ket; ?></textarea>
                                
                                </td>
                                </tr>
                            <tr>
                                <td><strong>Keterangan</strong></td>
                                <td>:</td>
                                <td>
                                <tr>
                                <td><strong>Status</strong></td>
                                <td>:</td>
                                <td>   

                                    <div class="col-sm-7">
                                        <select class="form-control" name="status" required>
                                        <?php if ($status == 'proses'): ?>
                                        <option value="proses" selected>Proses</option>
                                        <option value="selesai">Selesai</option>
                                        <?php else: ?>
                                            <option value="proses">Proses</option>
                                            <option value="selesai" selected>Selesai</option>


                                        <?php endif;?>
                                        </select>
                                    </div>
</td>
                                </tr>
                                </td>
                                </tr>



                                <input name="nofak" class="form-control" type="hidden" value="<?php echo $nofak;?>" readonly></td>

                                <input type="hidden" name="kode" value="<?php echo $id; ?>">
<?php endforeach;?>                 
                      
                      </table>
                      <br>
                      
				                 <center>   <button type="submit" class="btn btn-lg btn-success " style="width:250px;margin-bottom:30px;">Selesai</button></center>
				           
          </form>
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
<?php
      $no = 0;
      $a=0;
      foreach ($data1->result_array() as $i):
        $no++; 
        $id = $i['d_jual_id'];
        $nofak = $i['d_jual_nofak'];
        $barang_id = $i['d_jual_barang_id'];
        $harfok = $i['d_jual_barang_harpok'];
        $harjul = $i['d_jual_barang_harjul'];
        $qty = $i['d_jual_qty'];
        $diskon = $i['d_jual_diskon'];
        $d_total = $i['d_jual_total'];
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
																																<form class="form-horizontal" action="<?php echo base_url() . 'admin/dataharian/hapus_jual' ?>" method="post" enctype="multipart/form-data">
																																	<div class="modal-body">
																																		<input type="hidden" name="kode" value="<?php echo $id; ?>"/>
                                                                                                                                        
                                                                                                                                         <input name="nofak" class="form-control" type="hidden" value="<?php echo $nofak;?>" readonly></td>
																																		<p>Apakah Anda yakin mau menghapus <b><?php echo $d_nama; ?></b> ?</p>

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

