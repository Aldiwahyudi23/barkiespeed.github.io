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
  		<div class="masuk-bg content-wrapper">
  			<!-- Content Header (Page header) -->
  			<section class="content-header">
  				<h1>
  					Data Pelanggan dan Service
  					<small></small>
  				</h1>
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
                    <h3>Data Pelanggan</h3>
  					</div>
  					<!-- /.box-header -->
  					<div class="box-body">
                    
                      <table class="table table-bordered table-condensed" style="font-size:12px;" id="mydata">
                      <?php 
    $urut=0;
    $nomor=0;
    $group='-';
    foreach($data1->result_array()as $d){
    $nomor++;
    $urut++;
    if($group=='-' || $group!=$d['d_jual_nofak']){
        $kat=$d['d_jual_nofak'];
        $nama=$d['nama'];
        $alamat=$d['alamat'];
        $kendaraan=$d['kendaraan'];
        $type=$d['type'];
        $tanggal=$d['tanggal'];
        $km=$d['km'];
        $nohp=$d['nohp'];
        $keluhan=$d['keluhan'];
        $query=$this->db->query("SELECT jual_nofak,d_jual_barang_nama,d_jual_total,SUM(d_jual_total) AS tot_stok FROM tbl_detail_jual JOIN tbl_jual ON jual_nofak=d_jual_nofak WHERE d_jual_nofak='$kat'");
        $t=$query->row_array();
        $tots=$t['tot_stok'];
        if($group!='-')
        echo "</table><br>";
        echo "<table align='center' width='300px;'  border='0'>";
        echo "<tr><td colspan='2'><b>Nama: $nama</b></td>       <td style='text-align:light; '><h5><b>$kat </b></h5></td></tr>";
        echo "<tr><td colspan='2'>Alamat: $alamat</td>       <td style='text-align:light;'> $tanggal </td></tr>";
        echo "<tr><td colspan='2'>No HP: $nohp</td>      <td style='text-align:light;'> </td></tr>";
        echo "<tr><td colspan='2'>Kendaraan: $type-$kendaraan</td>       <td style='text-align:light;'> </td></tr>";
        echo "<tr><td colspan='2'>Keluhan: $keluhan</td>      <td style='text-align:light;'> </td></tr>";
        echo "<tr><td colspan='2'>KM: $km</td>        <td style='text-align:light;'><b>Total: Rp. $tots </b></td></tr>";
echo "<tr style='background-color:#ccc;'>
    <td width='4%' align='center'>No</td>
    <td width='60%' align='center'>Nama Barang</td>
    <td width='30%' align='center'>jumlah</td>
    
    </tr>";
$nomor=1;
    }
    $group=$d['d_jual_nofak'];
        if($urut==500){
        $nomor=0;
            echo "<div class='pagebreak'> </div>";
            //echo "<center><h2>KALENDER EVENTS PER TAHUN</h2></center>";
            }
        ?>
        <tr>
                <td style="text-align:center;vertical-align:top;text-align:center;"><?php echo $nomor; ?></td>
                <td style="vertical-align:top;padding-left:14px;"><?php echo $d['d_jual_barang_nama']; ?></td>
                <td style="vertical-align:top;text-align:light;">Rp. <?php echo number_format($d['d_jual_total']); ?></td>  
        </tr>
        

        <?php
        }
        ?>
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