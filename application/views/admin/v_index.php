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
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

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
/* Mengambil query report*/
if (!empty($visitor)) {
	foreach ($visitor as $result) {
		$bulan[] = $result->tgl; //ambil bulan
		$value[] = (float) $result->jumlah; //ambil nilai
	}
}

/* end mengambil query*/

?>

</head>


    <!--Header-->
    <?php
$this->load->view('template/v_header');

$this->load->view('admin/v_menu');
?>

    <!-- Left side column. contains the logo and sidebar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="masuk-bg content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">

        <h1>
          Dashboard
          <small></small>
        </h1>
 <?php $this->load->view('template/v_bread')?>

      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-inventory"></i></span>
              <?php
$query = $this->db->query("SELECT * FROM tbl_barang WHERE barang_id");
$jml = $query->num_rows();
?>
              <div class="info-box-content">
                <span class="info-box-text">Barang</span>
                <span class="info-box-number"><?php echo $jml; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12" >
            <div class="info-box"> 
              <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>
              <?php
$query = $this->db->query("SELECT * FROM tb_customer WHERE id");
$jml = $query->num_rows();
?>
              <div class="info-box-content">
                <span class="info-box-text" >Pelanggan</span>
                <span class="info-box-number"><?php echo $jml; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix visible-sm-block"></div>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-green"><i class="fa fa-industry"></i></span>
              <?php
$query = $this->db->query("SELECT * FROM tbl_suplier WHERE suplier_id");
$jml = $query->num_rows();
?>
              <div class="info-box-content">
                <span class="info-box-text">Supplier</span>
                <span class="info-box-number"><?php echo $jml; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-yellow"><i class="fa fa-user"></i></span>
              <?php
$query = $this->db->query("SELECT * FROM tbl_user WHERE id");
$jml = $query->num_rows();
?>
              <div class="info-box-content">
                <span class="info-box-text">Karyawan</span>
                <span class="info-box-number"><?php echo $jml; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- MAP & BOX PANE -->
            <div class="box box-success table-responsive">
              <div class="box-header with-border">
                <h3 class="box-title">Pelanggan</h3>

                <table class="table table-bordered table-condensed" style="font-size:16px;" id="mydata">
  							<thead class="text-primary">
  								<tr>
  									<th style="width:70px;">No</th>
  									<th>Nama</th>
  									<th>No HP</th>
  									<th>Kendaraan</th>
  									<th>No Polisi</th>
  								
  									<th>alamat</th>
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
	$customer_keterangan = $i['ket'];
	$customer_author = $i['userid'];
	$tanggal = $i['tanggal'];
	$nohp = $i['nohp'];
	$kendaraan = $i['kendaraan'];
	$type = $i['type'];
	$nopol = $i['nopol'];
	$nofak = $i['nofak'];

	?>
																												  									<tr>
																												  										<td><?php echo $no; ?></td>
																												  										<td>  <a href="<?php echo base_url().'admin/dataharian/pelanggan/'.$nofak; ?>" class="pull-LIGHT"><small><?php echo $customer_nama; ?></small></a></td>
																												  										<td><?php echo $nohp; ?></td>
																												  										<td><?php echo $kendaraan; ?>-<?php echo $type; ?></td>
																												  						
																												  										<td><?php echo $nopol; ?></td>
																												  										<td><?php echo $customer_alamat; ?></td>
																												  									</tr>
																												  								<?php endforeach;?>
  							</tbody>
  						</table>
  					</div>
  					<!-- /.box-body -->
  				</div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-safar"></i></span>
            <?php
$query = $this->db->query("SELECT * FROM tbl_barang WHERE barang_stok='0'");
$jml = $query->num_rows();
?>
            <div class="info-box-content">
              <span class="info-box-text">Barang yang habis</span>
              <span class="info-box-number"><?php echo number_format($jml); ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                Barang
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-user-in-store"></i></span>
            <?php
$query = $this->db->query("SELECT * FROM tbl_barang WHERE barang_stok='1' or barang_stok='2' or barang_stok='3'");
$jml = $query->num_rows();
?>
            <div class="info-box-content">
              <span class="info-box-text">Barang Hampir habis</span>
              <span class="info-box-number"><?php echo number_format($jml); ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                Barang
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
       
          <!-- /.info-box -->

          <!-- PRODUCT LIST -->

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
<!-- FastClick -->
<script src="<?php echo base_url() . 'assets/plugins/fastclick/fastclick.js' ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() . 'assets/dist/js/app.min.js' ?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url() . 'assets/plugins/sparkline/jquery.sparkline.min.js' ?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url() . 'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js' ?>"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url() . 'assets/plugins/slimScroll/jquery.slimscroll.min.js' ?>"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url() . 'assets/plugins/chartjs/Chart.min.js' ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() . 'assets/dist/js/pages/dashboard2.js' ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() . 'assets/dist/js/demo.js' ?>"></script>

<script>

  var lineChartData = {
    labels : <?php echo json_encode($bulan); ?>,
    datasets : [

    {
      fillColor: "rgba(60,141,188,0.9)",
      strokeColor: "rgba(60,141,188,0.8)",
      pointColor: "#3b8bba",
      pointStrokeColor: "#fff",
      pointHighlightFill: "#fff",
      pointHighlightStroke: "rgba(152,235,239,1)",
      data : <?php echo json_encode($value); ?>
    }

    ]

  }

  var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);

  var canvas = new Chart(myLine).Line(lineChartData, {
    scaleShowGridLines : true,
    scaleGridLineColor : "rgba(0,0,0,.005)",
    scaleGridLineWidth : 0,
    scaleShowHorizontalLines: true,
    scaleShowVerticalLines: true,
    bezierCurve : true,
    bezierCurveTension : 0.4,
    pointDot : true,
    pointDotRadius : 4,
    pointDotStrokeWidth : 1,
    pointHitDetectionRadius : 2,
    datasetStroke : true,
    tooltipCornerRadius: 2,
    datasetStrokeWidth : 2,
    datasetFill : true,
    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
    responsive: true
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
						heading: 'danger',
						text: "Mohon Maaf Anda Tidak Mempunyai Akses Untuk Masuk Ke Halaman Tersebut.",
						showHideTransition: 'slide',
						icon: 'danger',
						hideAfter: false,
						position: 'bottom-right',
						bgColor: '#7EC857'
					});
				</script>
				<?php else: ?>

				<?php endif;?>

</body>
</html>
