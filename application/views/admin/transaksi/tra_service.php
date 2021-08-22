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
  				<h4>
  					Penjualan Barang Langsung
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
  					<div class="box-body ">
                      <form action="<?php echo base_url().'admin/transaksi/simpan_penjualan_grosir'?>" method="post">
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
                            <tr>
                                <td><h5><strong>No Faktur</strong></h5></td>
                                <td>:</td>
                                <td><input type="text" name="nofak" class="text-primary input-sm" value="<?php echo $nofak; ?>" style="text-align:light;font-size:14px;" required readonly></td>

 <tr>
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
                            <tr>
                            </tr>
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

<?php endforeach;?>                 
                      
                      </table>
                      <hr>
            <div class="table-responsive">
                      <table class="table table-bordered table-condensed" style="font-size:12px;" id="mydata">
                                    
                                    <thead class="text-primary">
                                        <tr>
                                            <th style="width:70px;">No</th>
                                            <th >Proses</th>
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
          $ket = $i['keterangan'];
          $proses = $i['proses'];
      
      
          ?>
                                    <tr>
                                      <td><?php echo $no; ?></td>
                                      <td><?php echo $proses; ?></td>
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
                    <td style="width:760px;" rowspan="2"></td>
                    <th style="width:140px; font-size:14px;">Total Belanja(Rp)</th>
                    <th style="text-align:right;"><input type="text" name="total2" value="<?php echo number_format($a);?>" class="form-control input-sm" style="text-align:right;font-size:14px;" readonly></th>
                    <input type="hidden" id="total" name="total" value="<?php echo $a;?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                </tr>
                <tr>
                    <th style="font-size:12px;"> Tunai(Rp)</th>
                    <th style="text-align:right;"><input type="text" id="jml_uang" name="jml_uang" class="jml_uang form-control input-sm" style="text-align:right;font-size:12px;" required></th>
                    <input type="hidden" id="jml_uang2" name="jml_uang2" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required>
                </tr>
                <tr>
                    <td></td>
                    <th style="font-size:14px;" class="text-primary">Kembalian(Rp)</th>
                    <th style="text-align:right;"><input type="text" id="kembalian" name="kembalian" class="text-primary input-sm" style="text-align:right;font-size:14px;" required></th>
                </tr>
                <tr>  <td style="text-align:right;width:760px;" rowspan="2"><button type="submit" target="_blank" class="btn btn-info btn-lg-23"> Bayar</button></td></tr>

            </table>
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

