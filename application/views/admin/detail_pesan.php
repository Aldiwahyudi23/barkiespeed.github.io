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
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/daterangepicker/daterangepicker.css' ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/AdminLTE.min.css' ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/daterangepicker/daterangepicker.css' ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/timepicker/bootstrap-timepicker.min.css' ?>">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/datepicker/datepicker3.css' ?>">
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
        Komentar
        <small></small>
      </h1>
 <?php $this->load->view('template/v_bread')?>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="clearfix"></div>
          <?php echo $this->session->flashdata('msg'); ?>
          <div class="blogpost-tabs">
            <!-- Tab panes -->
            <div class="tab-content" >
              <div class="tab-pane active" id="comments" role="tabpanel">
                <?php
$colors = array(
	'#007bff',
	'#6610f2',
	'#6f42c1',
	'#e83e8c',
	'#dc3545',
	'#fd7e14',
	'#ffc107',
	'#28a745',
	'#20c997',
	'#17a2b8',
);
foreach ($show_pesan->result() as $row):
	shuffle($colors);
	?>
													                 <div class="row">
													                   <div class="col-md-30 offset-md-1">
													                     <div class="row">
													                       <div class="col-md-2">
													                         <div class="">
													                          
													                         </div>
													                       </div>
													                       <div class="col-md-1">
													                         <div class="blogpost-tab-description">
													                           <h6><?php echo $row->nama; ?></h6><small><em><?php echo date("d M Y H:i", strtotime($row->tanggal)); ?></em></small>
													                           <p><?php echo $row->isi; ?></p>
													                         </div>
													                         <hr>
													                       </div>
													                     </div>
													                   </div>
													                 </div>
													                 <?php

    $user_id=$this->session->userdata('idadmin');
	$query = $this->db->query("SELECT * FROM tb_pesan WHERE artikelid='15' AND tampil='1' AND parent='$user_id' ORDER BY id_p ASC");
	foreach ($query->result() as $res):
		shuffle($colors);
		?>
																										                  <div class="row">
																										                    <div class="col-md-12 offset-md-8">
																										                      <div class="row">
																										                        <div class="col-md-25">
																										                          <div class="">
																										                           
																										                          </div>
																										                        </div>
																										                        <div class="col-md-1">
																										                          <div class="blogpost-tab-description">
                                                                              <small> <h6><?php echo $res->nama; ?></h6><em><?php echo date("d M Y H:i", strtotime($res->tanggal)); ?></em></small>
																										                            <p><?php echo $res->isi; ?></p>
																										                          </div>
																										                        </div>
																										                      </div>
																										                    </div>
																										                  </div>
                                                                                                                        
																										                <?php endforeach;?>
													              <?php endforeach;?>
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





        <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Komentar</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url() . 'admin_web/komentar/hapus' ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
							       <input type="hidden" name="kode" value=""/>
                            <p>Apakah Anda yakin mau menghapus komentar ini?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Modal Relpy-->
        <div class="modal fade" id="ModalReply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Reply</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url() . 'admin_web/komentar/reply' ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
							       <input type="hidden" name="komenid" value=""/>
                     <input type="hidden" name="postid" value=""/>
                        <textarea name="komentar" class="form-control" rows="8" cols="80" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Relpy</button>
                    </div>
                    </form>
                </div>
            </div>
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
<script src="<?php echo base_url() . 'assets/plugins/datepicker/bootstrap-datepicker.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/timepicker/bootstrap-timepicker.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/plugins/daterangepicker/daterangepicker.js' ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url() . 'assets/plugins/fastclick/fastclick.js' ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() . 'assets/dist/js/app.min.js' ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() . 'assets/dist/js/demo.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.js' ?>"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });

    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('.datepicker3').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('.datepicker4').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $(".timepicker").timepicker({
      showInputs: true
    });

    $('#example1').on('click','.btn-reply',function(){
      var id = $(this).data('id');
      var post_id = $(this).data('post_id');
      $('#ModalReply').modal('show');
      $('[name="komenid"]').val(id);
      $('[name="postid"]').val(post_id);
    });

    $('#example1').on('click','.btn-hapus',function(){
      var id = $(this).data('id');
      $('#ModalHapus').modal('show');
      $('[name="kode"]').val(id);
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

    <?php elseif ($this->session->flashdata('msg') == 'info'): ?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "Komentar berhasil di Balas",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#00C9E6'
                });
        </script>
      <?php elseif ($this->session->flashdata('msg') == 'success'): ?>
          <script type="text/javascript">
                  $.toast({
                      heading: 'Success',
                      text: "Komentar Berhasil Publish.",
                      showHideTransition: 'slide',
                      icon: 'success',
                      hideAfter: false,
                      position: 'bottom-right',
                      bgColor: '#7EC857'
                  });
          </script>
    <?php elseif ($this->session->flashdata('msg') == 'success-hapus'): ?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Komentar Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else: ?>

    <?php endif;?>
</body>
</html>
