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
$this->load->view('template/v_header_pelanggan');
$this->load->view('pelanggan/v_menu');
?>

    <!-- Left side column. contains the logo and sidebar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h4>
          Data
          <small></small>
        </h4>
 <?php $this->load->view('template/v_bread')?>

      <section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-6">
            <!-- MAP & BOX PANE -->
            <div class="box box-success">
              <div class="box-header with-border">
                <h4 class="box-title">Data Hasil Service</h4>
<hr>
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
        echo "<table align='center' width='250px;'  border='0'>";
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

  					</div>
  					<!-- /.box-body -->
  				</div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-6">
            <!-- MAP & BOX PANE -->
            <div class="box box-success">
              <div class="box-header with-border">
              <h3 class="box-title">CATATAN :</h3>
              <hr>
              <table class="table table-bordered table-condensed" style="font-size:12px;" id="mydata">
Data ini berisi hasil service yang telah di kerjakan, dan telah di sepakati oleh pihak yang bersangkutan
<p>Untuk semua hal yang bersangkutan bisa langsung hubungi kasir bengkel</p>
                                     

  <div class="modal-body">

  </div>


</table>
             

  					</div>
  					<!-- /.box-body -->
  				</div>
          <!-- /.box -->

          <!-- /.box -->
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

</body>
</html>
