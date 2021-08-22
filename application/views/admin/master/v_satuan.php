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
  				<h4>
  					Satuan
  					<small></small>
  				</h4>
        <!-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Satuan</li>
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
                      <a href="<?php echo base_url() . 'admin/barang'; ?>" class="btn btn-sm btn-warning"><span class=""></span> Kembali</a>
                     <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> Tambah Satuan</a>
  					</div>
  					<!-- /.box-header -->
  					<div class="box-body table-responsive">
                      <table class="table table-bordered table-condensed" style="font-size:11px;margin-top:10px;">
                <thead>
                    <tr>
                        <th style="text-align:center;width:40px;">No</th>
                        <th>satuan</th>
                        <th style="width:140px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $id=$a['satuan_id'];
                        $nm=$a['satuan_nama'];
                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no;?></td>
                        <td><?php echo $nm;?></td>
                        <td style="text-align:center;">
                            <a class="btn btn-xs btn-warning" href="#modalEditPelanggan<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
                            <a class="btn btn-xs btn-danger" href="#modalHapusPelanggan<?php echo $id?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
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
  <!-- ============ MODAL ADD =============== -->
  <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah satuan</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/satuan/tambah_satuan'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama satuan</label>
                        <div class="col-xs-9">
                            <input name="satuan" class="form-control" type="text" placeholder="Input Nama satuan..." style="width:280px;" required>
                        </div>
                    </div>
                           

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>

        <!-- ============ MODAL EDIT =============== -->
        <?php
                    foreach ($data->result_array() as $a) {
                        $id=$a['satuan_id'];
                        $nm=$a['satuan_nama'];
                    ?>
                <div id="modalEditPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Edit satuan</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/satuan/edit_satuan'?>">
                        <div class="modal-body">
                            <input name="kode" type="hidden" value="<?php echo $id;?>">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >satuan</label>
                        <div class="col-xs-9">
                            <input name="satuan" class="form-control" type="text" value="<?php echo $nm;?>" style="width:280px;" required>
                        </div>
                    </div>

                </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            <?php
        }
        ?>

        <!-- ============ MODAL HAPUS =============== -->
        <?php
                    foreach ($data->result_array() as $a) {
                        $id=$a['satuan_id'];
                        $nm=$a['satuan_nama'];
                    ?>
                <div id="modalHapusPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Hapus satuan</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/satuan/hapus_satuan'?>">
                        <div class="modal-body">
                            <p>Yakin mau menghapus data <b><?php echo $nm; ?></b>?</p>
                                    <input name="kode" type="hidden" value="<?php echo $id; ?>">
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            <?php
        }
        ?>


        <!--END MODAL-->



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
				text: "Satuan Berhasil disimpan ke database.",
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
					text: "Satuan berhasil di update",
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
						text: "Satuan Berhasil dihapus.",
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
			</body>
			</html>


