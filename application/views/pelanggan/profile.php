<!DOCTYPE html>
<html>
<head>
<?php $iden = $iden->row_array()?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keyword" content="Bengkel Barkiespeef, Barkiespeed, Portal Bengkel Barkiespeef, Web Bengkel Barkiespeef">
<meta name="description" content="Portal Resmi Bengkel Barkiespeef">

  <title><?php echo ucfirst($this->uri->segment(1)) . " - " . ucfirst($this->uri->segment(2)) ?></title>
  <link rel="icon" href="<?=base_url('assetss/favicon/') . $iden['favicon']?>">
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
          Profile
          <small></small>
        </h4>
 <?php $this->load->view('template/v_bread')?>

      </section>

      <!-- Main content -->
      <section class="content">
  	<div class="row">
  		<div class="col-xs-12">
  			<div class="box">


  				<div class="box">
  					<div class="box-header">
                    <h4>Photo</h4>
  					</div>
  					<!-- /.box-header -->
  					<div class="box-body">


<!-- Begin Page Content -->
<div class="container-fluid">

    <?php
$id_admin = $this->session->userdata('idadmin');
$q = $this->db->query("SELECT * FROM tb_customer WHERE id='$id_admin'");
$c = $q->row_array();
?>
    <div class="card mb-3 col-lg-12">
        <div class="row no-gutters">
            <div class="col-md-6">
            <img src="<?php echo base_url() . 'assets/images/' . $c['photo']; ?>" class="card-image" alt="">
            </div>
           
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<form action="<?php echo base_url().'pelanggan/profile/edit'?>" method="post">
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
$photo = $i['photo'];
$pengguna_id = $i['id'];
$pengguna_nama = $i['nama'];
$pengguna_jenkel = $i['jenkel'];
$pengguna_email = $i['email'];
$pengguna_username = $i['username'];
$pengguna_password = $i['password'];
$pengguna_nohp = $i['nohp'];
$pengguna_level = $i['level'];
$pengguna_photo = $i['photo'];
$pengguna_alamat = $i['alamat'];

?>

                            <tr>
                                <td><h6><strong>No Faktur</strong></h6></td>
                                <td>:</td>
                                <td ><h6><strong><?php echo $nofak; ?></strong></h6></td>
                              
                            </tr>
                            <tr>
                                <td><h6><strong>Nama</strong></h6></td>
                                <td>:</td>
                                <td ><h6><strong><?php echo $customer_nama; ?></strong></h6></td>
                                </tr>
                            <tr>
                                <td><strong>Alamat</strong></td>
                                <td>:</td>
                                <td><?php echo $customer_alamat; ?></td>
                                </tr>
                            <tr>
                                <td><strong>No HP</strong></td>
                                <td>:</td>
                                <td><?php echo $nohp; ?></td>
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
             
                 </table>
                
            </form>
  				<!-- /.box -->
  			</div>
  			<!-- /.col -->
  		</div>
  		<!-- /.row -->
</section>
      <section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-6">
            <!-- MAP & BOX PANE -->
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Edit Profile</h3>

                <form action="<?php echo base_url().'pelanggan/profile/edit'?>" method="post">
                <table class="table table-bordered table-condensed" style="font-size:12px;" id="mydata">
                                     

  <div class="modal-body">
  <div class="form-group">
									              <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
									              <div class="col-sm-7">
									               <input type="hidden" name="kode" value="<?php echo $customer_id; ?>"/>
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
									            <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
									            <div class="col-sm-7">
									              <?php if ($pengguna_jenkel == 'Laki-Laki'): ?>
									               <div class="radio radio-info radio-inline">
									                <input type="radio" id="inlineRadio1" value="L" name="xjenkel" checked>
									                <label for="inlineRadio1"> Laki-Laki </label>
									              </div>
									              <div class="radio radio-info radio-inline">
									                <input type="radio" id="inlineRadio1" value="P" name="xjenkel">
									                <label for="inlineRadio2"> Perempuan </label>
									              </div>
									              <?php else: ?>
               <div class="radio radio-info radio-inline">
                <input type="radio" id="inlineRadio1" value="L" name="xjenkel">
                <label for="inlineRadio1"> Laki-Laki </label>
              </div>
              <div class="radio radio-info radio-inline">
                <input type="radio" id="inlineRadio1" value="P" name="xjenkel" checked>
                <label for="inlineRadio2"> Perempuan </label>
              </div>
            <?php endif;?>
          </div>
        </div>
        <div class="form-group">
          <label for="inputUserName" class="col-sm-4 control-label">Username</label>
          <div class="col-sm-7">
            <input type="text" name="xusername" class="form-control" value="<?php echo $pengguna_username; ?>" id="inputUserName" placeholder="Username" required>
          </div>
        </div>

        <div class="form-group">
          <label for="inputUserName" class="col-sm-4 control-label">Kontak Person</label>
          <div class="col-sm-7">
            <input type="text" name="xkontak" class="form-control" value="<?php echo $pengguna_nohp; ?>" id="inputUserName" placeholder="Kontak Person" required>
            <input type="hidden" name="xlevel" class="form-control" value="<?php echo $pengguna_level; ?>" id="inputUserName" placeholder="Kontak Person" required>
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
<button type="submit" class="btn btn-primary btn-flat" id="simpan">Edit</button>
</div>
  </div>


</table>

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
              <h3 class="box-title">Ganti Password</h3>
              <table class="table table-bordered table-condensed" style="font-size:12px;" id="mydata">

                                     

  <div class="modal-body">
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

</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary btn-flat" id="simpan">Ganti</button>
</div>
  </div>


</table>
                 </form>
		<?php endforeach;?>
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
