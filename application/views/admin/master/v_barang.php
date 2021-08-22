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

          <?php if($h=='3' ){ ?>
  			<div class="box">
			  <div class="alert alert-warning">
              <h4><i class="fa fa-info"></i> Perhatian!</h4> Perhatikan Stok barang sebelum mengerjakan kendaraan.
            </div>
		  <?php }?>
		  
      <?php if($h=='1'|| $h=='2'){ ?>
			  <div class="alert alert-warning">
              <h4><i class="fa fa-warning"></i> Perhatian!</h4> Perhatikan Stok barang.
              <p>Sebelum menyimpan data barang harap isi data dengan benar</p>
              </div>
		  <?php }?>

  				<div class="box">
                  <?php if($h =='1' || $h == '2') {?>
  					<div class="box-header">
                     <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> Tambah Barang</a>
                     <a href="kategori/" class="btn btn-sm btn-primary" ><span class="fa fa-plus"></span> Tambah Kategori</a>
                     <a href="satuan/" class="btn btn-sm btn-danger" ><span class="fa fa-plus"></span> Tambah Satuan</a>
  					</div>
                <?php } ?>
  					<!-- /.box-header -->
  					<div class="box-body table-responsive">
  			
                      <table class="table table-bordered table-condensed" style="font-size:12px;" id="mydata">
                <thead>
                    <tr>
                        <th style="text-align:center;width:40px;">No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Kategori</th>
                        <th>Harga Pokok</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th style="width:100px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $id=$a['barang_id'];
                        $nm=$a['barang_nama'];
                        $harpok=$a['barang_harpok'];
                        $harjul_grosir=$a['barang_harjul_grosir'];
                        $stok=$a['barang_stok'];
                        $min_stok=$a['barang_min_stok'];
                        $kat_id=$a['barang_kategori_id'];
                        $kat_nama=$a['kategori_nama'];
                        $satuan=$a['barang_satuan'];
                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no;?></td>
                        <td><?php echo $id;?></td>
                        <td><?php echo $nm;?></td>
                        <td><?php echo $satuan;?></td>
                        <td><?php echo $kat_nama;?></td>
                        <td style="text-align:light;"><?php echo 'Rp '.number_format($harpok);?></td>
                        <td style="text-align:light;"><?php echo 'Rp '.number_format($harjul_grosir);?></td>
                        <td style="text-align:center;"><?php echo $stok;?></td>
                        <td style="text-align:center;">
                        <?php if($h =='1'||$h=='2') {?>
                            <a class="btn btn-xs btn-warning" href="#modalEditPelanggan<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> </a>
                            <a class="btn btn-xs btn-danger" href="#modalHapusPelanggan<?php echo $id?>" data-toggle="modal" title="Hapus"><span class="fa fa-trash"></span> </a>
                        <?php } ?>
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
                <h3 class="modal-title" id="myModalLabel">Tambah Barang</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/barang/tambah_barang'?>">
                <div class="modal-body">

                    <!--<div class="form-group">
                        <label class="control-label col-xs-3" >Kode Barang</label>
                        <div class="col-xs-9">
                            <input name="kobar" class="form-control" type="text" placeholder="Kode Barang..." required>
                        </div>
                    </div>-->

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Barang <span class="text-danger">*</span></label>
                        <div class="col-xs-9">
                            <input name="nabar" class="form-control" type="text" placeholder="Nama Barang..." required>
                        </div>
                    </div>

                     <div class="form-group">
                            <label class="control-label col-xs-3" >Kategori <span class="text-danger">*</span></label>
                            <div class="col-xs-9">
                                <select name="kategori" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Kategori" data-width="80%" placeholder="Pilih Kategori" required>
                                    <option></option>
                                <?php foreach ($kat2->result_array() as $k2) {
                                    $id_kat=$k2['kategori_id'];
                                    $nm_kat=$k2['kategori_nama'];
                                    ?>
                                        <option value="<?php echo $id_kat;?>"><?php echo $nm_kat;?></option>
                                <?php }?>
                                    
                                </select>
                            </div>
                        </div>
                 

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Satuan <span class="text-danger">*</span></label>
                        <div class="col-xs-9">
                             <select name="satuan" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Satuan" data-width="80%" placeholder="Pilih Satuan" required>
                                 <option ></option>
                             <?php foreach ($data2->result_array() as $s2) {
                                $id_sat=$s2['satuan_id'];
                                $nm_sat=$s2['satuan_nama'];
                            ?>
                                <option value="<?php echo $nm_sat;?>"><?php echo $nm_sat;?></option>
                                <?php }?>
                             </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga Pokok <span class="text-danger">*</span></label>
                        <div class="col-xs-9">
                            <input name="harpok" class="harpok form-control" type="text" placeholder="Harga Pokok..."  required>
                        </div>
                    </div>

                    

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga Jual <span class="text-danger">*</span></label>
                        <div class="col-xs-9">
                            <input name="harjul_grosir" class="harjul form-control" type="text" placeholder="Harga Jual..."  required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Stok <span class="text-danger">*</span></label>
                        <div class="col-xs-9">
                            <input name="stok" class="form-control" type="number" placeholder="Stok..." value="0">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Minimal Stok <span class="text-danger">*</span> </label>
                        <div class="col-xs-9">
                            <input name="min_stok" class="form-control" type="number" placeholder="Minimal Stok..."  required>
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
                        $id=$a['barang_id'];
                        $nm=$a['barang_nama'];
                        $satuan=$a['barang_satuan'];
                        $harpok=$a['barang_harpok'];
                        $stok=$a['barang_stok'];
                        $min_stok=$a['barang_min_stok'];
                        $kat_id=$a['barang_kategori_id'];
                        $kat_nama=$a['kategori_nama'];
                    ?>
                <div id="modalEditPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Edit Barang</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/barang/edit_barang'?>">
                        <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Kode Barang</label>
                            <div class="col-xs-9">
                                <input name="kobar" class="form-control" type="text" value="<?php echo $id;?>" placeholder="Kode Barang..." readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Nama Barang</label>
                            <div class="col-xs-9">
                                <input name="nabar" class="form-control" type="text" value="<?php echo $nm;?>" placeholder="Nama Barang..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Kategori</label>
                            <div class="col-xs-9">
                                <select name="kategori" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Kategori" data-width="80%" placeholder="Pilih Kategori" required>
                                <?php foreach ($kat2->result_array() as $k2) {
                                    $id_kat=$k2['kategori_id'];
                                    $nm_kat=$k2['kategori_nama'];
                                    if($id_kat==$kat_id)
                                        echo "<option value='$id_kat' selected>$nm_kat</option>";
                                    else
                                        echo "<option value='$id_kat'>$nm_kat</option>";
                                }
                                ?>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Satuan</label>
                            <div class="col-xs-9">
                                <select name="satuan" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih satuani" data-width="80%" placeholder="Pilih satuani" required>
                                <?php foreach ($data2->result_array() as $k2) {
                                    $nm_kat=$k2['satuan_nama'];
                                    if($id_kat==$kat_id)
                                        echo "<option>$nm_kat</option>";
                                    else
                                        echo "<option>$nm_kat</option>";
                                }
                                ?>
                                    
                                </select>
                            </div>
                        </div>

    
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Harga Pokok</label>
                            <div class="col-xs-9">
                                <input name="harpok" class="harpok form-control" type="text" value="<?php echo $harpok;?>" placeholder="Harga Pokok..." required>
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Harga Jual</label>
                            <div class="col-xs-9">
                                <input name="harjul_grosir" class="harjul form-control" type="text" value="<?php echo $harjul_grosir;?>" placeholder="Harga Jual Grosir..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Stok</label>
                            <div class="col-xs-9">
                                <input name="stok" class="form-control" type="number" value="<?php echo $stok;?>" placeholder="Stok..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Minimal Stok</label>
                            <div class="col-xs-9">
                                <input name="min_stok" class="form-control" type="number" value="<?php echo $min_stok;?>" placeholder="Minimal Stok..." required>
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
                        $id=$a['barang_id'];
                        $nm=$a['barang_nama'];
                        $harpok=$a['barang_harpok'];
                        $harjul=$a['barang_harjul'];
                        $stok=$a['barang_stok'];
                        $min_stok=$a['barang_min_stok'];
                        $kat_id=$a['barang_kategori_id'];
                        $kat_nama=$a['kategori_nama'];
                    ?>
                <div id="modalHapusPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Hapus Barang</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/barang/hapus_barang'?>">
                        <div class="modal-body">
                            <p>Yakin mau menghapus data barang ini <b><?php echo $nm; ?></b> ?</p>
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
			</body>
			</html>


