<style>
		.masuk-bg {
			background-image: url(http://localhost/barkiespeed/assetss/images/backgroud.jpg);
		}
		</style>

<body class="hold-transition skin-green sidebar-mini fixed skin-dark-light" style="font-size:12px;">
  <div class="wrapper">
<!--Counter Inbox-->
<?php
$query = $this->db->query("SELECT * FROM tb_inbox WHERE status='1'");
$query2 = $this->db->query("SELECT * FROM tb_komentar WHERE status='0'");
$jum_comment = $query2->num_rows();
$jum_pesan = $query->num_rows();
?>
<header class="main-header fixed-top bg-primary">

  <!-- Logo -->
  <a href="<?php echo site_url('admin_web/dashboard') ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">WEB</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">Admin Web Site</span>
  </a>

  <!-- Header Navbar: style can be found in header.less -->
  
  <nav class="navbar navbar-static-top ">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            <span class="label label-success"><?php echo $jum_pesan; ?></span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">Anda memiliki <span id="li-notif"></span> pesan</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">

                <?php
$inbox = $this->db->query("SELECT tb_inbox.*,DATE_FORMAT(tanggal,'%d %M %Y') AS tanggal FROM tb_inbox WHERE status='1' ORDER BY id DESC LIMIT 5");
foreach ($inbox->result_array() as $in):
	$inbox_id = $in['id'];
	$inbox_nama = $in['nama'];
	$inbox_tgl = $in['tanggal'];
	$inbox_pesan = $in['pesan'];

	?>
																							                 <li><!-- start message -->
																							                   <a href="<?php echo base_url() . 'admin_web/inbox' ?>">
																							                     <div class="pull-left">
																							                       <img src="<?php echo base_url() . 'assets/images/user_blank.png' ?>" class="img-circle" alt="User Image">
																							                     </div>
																							                     <h4>
																							                       <?php echo $inbox_nama; ?>
																							                       <small><i class="fa fa-clock-o"></i> <?php echo $inbox_tgl; ?></small>
																							                     </h4>
																							                     <p><?php echo $inbox_pesan; ?></p>
																							                   </a>
																							                 </li>
																							                 <!-- end message -->
																							               <?php endforeach;?>
             </ul>
           </li>
           <li class="footer"><a href="<?php echo base_url() . 'admin_web/inbox' ?>">Lihat Semua Pesan</a></li>
         </ul>
       </li>
       <li>
          <a href="<?php echo base_url() . 'dashboard' ?>" title="Menu Kasir"><i class="fa fa-book"></i></a>
        </li>
       <?php
$id_admin = $this->session->userdata('idadmin');
$q = $this->db->query("SELECT * FROM tbl_user WHERE id='$id_admin'");
$c = $q->row_array();
?>
       <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="<?php echo base_url() . 'assets/images/' . $c['photo']; ?>" class="user-image" alt="">
          <span class="hidden-xs"><?php echo $c['nama']; ?></span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            <img src="<?php echo base_url() . 'assets/images/' . $c['photo']; ?>" class="img-circle" alt="">

            <p>
              <?php echo $c['nama']; ?>
              <?php if ($c['level'] == '1'): ?>
                <small>Administrator</small>
                <?php else: ?>
                  <small>Author</small>
                <?php endif;?>
              </p>
            </li>
            <!-- Menu Body -->

            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-light">

                <a href="<?php echo base_url() . 'administrator/logout' ?>" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="<?php echo base_url() . 'beranda' ?>" target="_blank" title="Lihat Website"><i class="fa fa-globe"></i></a>
        </li>
      </ul>
    </div>

  </nav>
</header>
