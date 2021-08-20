<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!--Counter Inbox-->
    <!--     <?php
$query = $this->db->query("SELECT * FROM tb_inbox WHERE status='1'");
$query2 = $this->db->query("SELECT * FROM tb_komentar WHERE status='0'");
$jum_comment = $query2->num_rows();
$jum_pesan = $query->num_rows();
?> -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
    <?php $h=$this->session->userdata('akses'); ?>
    <?php $u=$this->session->userdata('user'); ?>
    <?php
$id_admin = $this->session->userdata('idadmin');
$q = $this->db->query("SELECT * FROM tb_customer WHERE id='$id_admin'");
$c = $q->row_array();
?>
    <?php if($h=='4'){ ?>

      <li class="header">Menu Utama</li>
      <li class="<?php if ($this->uri->segment(2) == "dashboard") {echo "active";}?>">
        <a href="<?php echo base_url() . 'pelanggan/dashboard' ?>">
          <i class="fa fa-home"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
     
      <li class="header">Data Harian</li>
          <li class="<?php if ($this->uri->segment(2) == "nofaktur" && $this->uri->segment(3) == null) {echo "active";}?>">
          <a href="<?php echo base_url() . 'pelanggan/profile/nofaktur/' ?><?php echo($u); ?>"><i class="fa fa-list"></i> Profile</a></li>

          <li class="<?php if ($this->uri->segment(3) == "nofaktur") {echo "active";}?>">
          <a href="<?php echo base_url() . 'pelanggan/service/nofaktur/' ?><?php echo($u); ?>"><i class="fa fa-globe"></i>  Service</a></li>
          <li class="<?php if ($this->uri->segment(3) == "data") {echo "active";}?>">
          <a href="<?php echo base_url() . 'pelanggan/service/data/' ?><?php echo $c['nopol']; ?>"><i class="fa fa-globe"></i> Lihat Data Service</a></li>
      

      <?php }?>


      <li class="header">Log Out</li>
      <li>
        <a href="<?php echo base_url('pelanggan/login/logout') ?>">
          <i class="fa fa-sign-out"></i> <span>Sign Out</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>