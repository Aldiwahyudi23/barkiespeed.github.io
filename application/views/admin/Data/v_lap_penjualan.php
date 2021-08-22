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
  					Data Barang
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
		  
      <?php if($h=='1'|| $h=='2'){ ?>
			  <div class="alert alert-warning">
              <h4><i class="fa fa-warning"></i> Perhatian!</h4> Perhatikan Data Transaksi Penjualan.
              <p>Data ini berasarkan hasil transaksi penjualan dan service</p>
              </div>
		  <?php }?>

  				<div class="box">
                  <?php if($h =='1' || $h == '2') {?>
  					<div class="box-header">
                      <a class="btn btn-sm btn-default" href="#lap_jual_pertanggal" data-toggle="modal"><span class="fa fa-edit"></span> Pertanggal</a>
                      <a class="btn btn-sm btn-primary" href="#lap_jual_perbulan" data-toggle="modal"><span class="fa fa-edit"></span> Perbulan</a>
                      <a class="btn btn-sm btn-success" href="#lap_jual_pertahun" data-toggle="modal"><span class="fa fa-edit"></span> Pertahun</a>
                    
  					</div>
                <?php } ?>
  					<!-- /.box-header -->
  					<div class="box-body table-responsive">
                      <table class="table table-bordered table-condensed" style="font-size:12px;" id="mydata">
                      <thead>
    <tr>
        <th style="width:50px;">No</th>
        <th>No Faktur</th>
        <th>Tanggal</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Satuan</th>
        <th>Harga Jual</th>
        <th>Qty</th>
        <th>Diskon</th>
        <th>Total</th>
    </tr>
</thead>
<tbody>
<?php 
$no=0;
    foreach ($data->result_array() as $i) {
        $no++;
        $nofak=$i['jual_nofak'];
        $tgl=$i['jual_tanggal'];
        $barang_id=$i['d_jual_barang_id'];
        $barang_nama=$i['d_jual_barang_nama'];
        $barang_satuan=$i['d_jual_barang_satuan'];
        $barang_harjul=$i['d_jual_barang_harjul'];
        $barang_qty=$i['d_jual_qty'];
        $barang_diskon=$i['d_jual_diskon'];
        $barang_total=$i['d_jual_total'];
?>
    <tr>
        <td style="text-align:center;"><?php echo $no;?></td>
        <td style="padding-left:5px;"><?php echo $nofak;?></td>
        <td style="text-align:center;"><?php echo $tgl;?></td>
        <td style="text-align:center;"><?php echo $barang_id;?></td>
        <td style="text-align:left;"><?php echo $barang_nama;?></td>
        <td style="text-align:left;"><?php echo $barang_satuan;?></td>
        <td style="text-align:right;"><?php echo 'Rp '.number_format($barang_harjul);?></td>
        <td style="text-align:center;"><?php echo $barang_qty;?></td>
        <td style="text-align:right;"><?php echo 'Rp '.number_format($barang_diskon);?></td>
        <td style="text-align:right;"><?php echo 'Rp '.number_format($barang_total);?></td>
    </tr>
<?php }?>
</tbody>
<tfoot>
<?php 
    $b=$jml->row_array();
?>
    <tr>
        <td colspan="9" style="text-align:center;"><b>Total</b></td>
        <td style="text-align:right;"><b><?php echo 'Rp '.number_format($b['total']);?></b></td>
    </tr>
</tfoot>
</table>
            
            </div>
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
				text: "Barang Berhasil di Simpan.",
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
					text: "barang berhasil di update",
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
						text: "barang Berhasil dihapus.",
						showHideTransition: 'slide',
						icon: 'success',
						hideAfter: false,
						position: 'bottom-right',
						bgColor: '#7EC857'
					});
				</script>
			</script>
			<?php elseif ($this->session->flashdata('msg') == 'danger'): ?>
				<script type="text/javascript">
					$.toast({
						heading: 'Peringatan',
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

                <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable({
                "language": {
                    "search":"Cari",
                    "info":"Menampilkan _START_ Sampai _END_ Dari _TOTAL_ data",
                    "lengthMenu":"Menampilkan _MENU_ baris",
                    "infoEmpty":"Tidak ditemukan",
                    "infoFiltered":"(pencarian dari _MAX_ data)",
                    "zeroRecords":"Data tidak ditemukan",
                    "paginate": {
                        "next":"Selanjutnya",
                        "previous":"Sebelumnya",
                    }
                }
            });
        } );
    </script>
    <script type="text/javascript">
        $(function(){
            $('.harpok').priceFormat({
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


     <!-- ============ MODAL ADD =============== -->
  <div class="modal fade" id="lap_jual_pertanggal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Pilih Tanggal</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/transaksi/penjualan_pertanggal'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggal</label>
                        <div class="col-xs-9">
                            <div class='input-group date' id='datepicker' style="width:300px;">
                                <input type='text' name="tgl" class="form-control" value="" placeholder="Tanggal..." required/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                           

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info"><span class="fa fa-print"></span>Lihat</button>
                </div>
            </form>
            </div>
            </div>
        </div>

        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="lap_jual_perbulan" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Pilih Bulan</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/transaksi/penjualan_perbulan'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Bulan</label>
                        <div class="col-xs-9">
                                <select name="bln" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Bulan" data-width="80%" required/>
                                <?php foreach ($jual_bln->result_array() as $k) {
                                    $bln=$k['bulan'];
                                ?>
                                    <option><?php echo $bln;?></option>
                                <?php }?>
                                </select>
                        </div>
                    </div>
                           

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info"><span class="fa fa-print"></span>Lihat</button>
                </div>
            </form>
            </div>
            </div>
        </div>

        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="lap_jual_pertahun" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Pilih Tahun</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/transaksi/penjualan_pertahun'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tahun</label>
                        <div class="col-xs-9">
                                <select name="thn" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Tahun" data-width="80%" required/>
                                <?php foreach ($jual_thn->result_array() as $t) {
                                    $thn=$t['tahun'];
                                ?>
                                    <option><?php echo $thn;?></option>
                                <?php }?>
                                </select>
                        </div>
                    </div>
                           

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info"><span class="fa fa-print"></span>Lihat</button>
                </div>
            </form>
            </div>
            </div>
        </div>


         <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="lap_laba_rugi" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Pilih Bulan</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/transaksi/laba_rugi'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Bulan</label>
                        <div class="col-xs-9">
                                <select name="bln" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Bulan" data-width="80%" required/>
                                <?php foreach ($jual_bln->result_array() as $k) {
                                    $bln=$k['bulan'];
                                ?>
                                    <option><?php echo $bln;?></option>
                                <?php }?>
                                </select>
                        </div>
                    </div>
                           

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info"><span class="fa fa-print"></span>Lihat</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        

        <!--END MODAL-->
			</body>
			</html>

