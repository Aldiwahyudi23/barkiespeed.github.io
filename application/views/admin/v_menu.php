<aside class="main-sidebar" style="font-size:12px;">
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
    <?php if($h=='1'){ ?>
      <CENTER><h3><i class="fa fa-otomotif"></i> <span class="bg-primary">ADMIN</span></h3></CENTER> 

      <li class="header">Menu Utama</li>
      <li class="<?php if ($this->uri->segment(2) == "dashboard") {echo "active";}?>">
        <a href="<?php echo base_url() . 'dashboard' ?>">
          <i class="fa fa-home"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="treeview <?php if ($this->uri->segment(2) == "Data Master" || $this->uri->segment(2) == "barang" || $this->uri->segment(2) == "suplier" || $this->uri->segment(2) == "customer" || $this->uri->segment(2) == "pengguna" || $this->uri->segment(2) == "service" || $this->uri->segment(2) == "data_penjualan") {echo "active";}?>">
        <a href="#">
          <i class="fa fa-cog"></i>
          <span>Data Master</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo $this->uri->segment(2) == 'barang' ? 'active' : '' ?>">
            <a href="<?php echo base_url() . 'admin/barang' ?>"><i class="fa fa-sitemap"></i> Master Barang</a>
          </li>
          <li class="<?php if ($this->uri->segment(2) == "service") {echo "active";}?>">
            <a href="<?php echo base_url() . 'admin/service' ?>"><i class="fa fa-flag"></i> Master Jasa</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'suplier' ? 'active' : '' ?>">
            <a href="<?php echo base_url() . 'admin/suplier' ?>"><i class="fa fa-thumb-tack"></i> Master Supplier</a>
          </li>
          <li class="<?php if ($this->uri->segment(2) == "customer") {echo "active";}?>">
            <a href="<?php echo base_url() . 'admin/customer' ?>"><i class="fa fa-users"></i> Master Pelanggan</a>
          </li>
          <li class="<?php if ($this->uri->segment(2) == "pengguna") {echo "active";}?>">
            <a href="<?php echo base_url() . 'admin/pengguna' ?>"><i class="fa fa-user"></i> Master Karyawan</a>
          </li>
          <li class="<?php if ($this->uri->segment(3) == "data_penjualan") {echo "active";}?>">
            <a href="<?php echo base_url() . 'admin/transaksi/data_penjualan' ?>"><i class="fa fa-history"></i> Penjualan</a>
          </li>
          <li class="<?php if ($this->uri->segment(2) == "pembelian") {echo "active";}?>">
            <a href="<?php echo base_url() . 'admin/transaksi/data_pembelian' ?>"><i class="fa fa-history"></i> Pembelian</a>
          </li>
        </ul>
      </li>
      <li class="treeview <?php if ($this->uri->segment(2) == "Data Master" || $this->uri->segment(2) == "penjualan_grosir" || $this->uri->segment(2) == "pembelian" || $this->uri->segment(2) == "customer" || $this->uri->segment(2) == "pengguna" || $this->uri->segment(2) == "transaksi") {echo "active";}?>">
        <a href="#">
          <i class="fa fa-newspaper-o"></i>
          <span>Transaksi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo $this->uri->segment(2) == 'penjualan_grosir' ? 'active' : '' ?>">
            <a href="<?php echo base_url() . 'admin/penjualan_grosir' ?>"><i class="fa fa-user"></i> Penjualan</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'pembelian' ? 'active' : '' ?>">
            <a href="<?php echo base_url() . 'admin/pembelian' ?>"><i class="fa fa-thumb-tack"></i> Pembelian</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'transaksi' ? 'active' : '' ?>">
            <a href="<?php echo base_url() . 'admin/transaksi' ?>"><i class="fa fa-thumb-tack"></i> Service</a>
          </li>
         
        </ul>
      </li>
      
      <li class="header">Data Harian</li>
      <li class="<?php if ($this->uri->segment(2) == "dataharian" && $this->uri->segment(3) == null) {echo "active";}?>"><a href="<?php echo base_url() . 'admin/dataharian' ?>"><i class="fa fa-list"></i> List Data Harian</a></li>
          <li class="<?php if ($this->uri->segment(3) == "input") {echo "active";}?>"><a href="<?php echo base_url() . 'admin/dataharian/input' ?>"><i class="fa fa-globe"></i> Input Data</a></li>
      
       <li class="header">Laporan</li>
          <li class="treeview <?php if ($this->uri->segment(2) == "Data Master" || $this->uri->segment(2) == "laporan" || $this->uri->segment(2) == "suplier" || $this->uri->segment(2) == "customer" || $this->uri->segment(2) == "pengguna" || $this->uri->segment(2) == "service") {echo "active";}?>">
        <a href="#">
          <i class="fa fa-cog"></i>
          <span>Laporan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo $this->uri->segment(2) == 'laporan' ? 'active' : '' ?>">
            <a href="<?php echo base_url() . 'admin/laporan' ?>"><i class="fa fa-user"></i> Master Laporan</a>
         <!-- </li>
          <li class="<?php echo $this->uri->segment(2) == 'suplier' ? 'active' : '' ?>">
            <a href="<?php echo base_url() . 'admin/suplier' ?>"><i class="fa fa-thumb-tack"></i> Akuntansi</a>
          </li>-->

        </ul>
      </li>
      <li class="header">User</li>
      <li class="<?php if ($this->uri->segment(2) == "inbox") {echo "active";}?>">
        <a href="<?php echo base_url() . 'admin_web/inbox' ?>">
          <i class="fa fa-envelope"></i> <span>Inbox</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-red"><?php echo $jum_pesan; ?></small>
          </span>
        </a>
      </li>

      <li class="<?php if ($this->uri->segment(2) == "komentar") {echo "active";}?>">
        <a href="<?php echo base_url() . 'admin_web/komentar' ?>">
          <i class="fa fa-comments"></i> <span>Komentar</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-red"><?php echo $jum_comment; ?></small>
          </span>
        </a>
      </li>

      <?php }?>




      <?php if($h=='3'){ ?>
        <CENTER><h3><i class="fa fa-otomotif"></i> <span class="bg-primary">MONTIR</span></h3></CENTER> 
        <li class="header">Menu Utama</li>
      <li class="<?php if ($this->uri->segment(2) == "dashboard") {echo "active";}?>">
        <a href="<?php echo base_url() . 'dashboard' ?>">
          <i class="fa fa-home"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="treeview <?php if ($this->uri->segment(2) == "Data Master" || $this->uri->segment(2) == "barang" || $this->uri->segment(2) == "suplier" || $this->uri->segment(2) == "customer" || $this->uri->segment(2) == "pengguna" || $this->uri->segment(2) == "service") {echo "active";}?>">
        <a href="#">
          <i class="fa fa-cog"></i>
          <span>Data Master</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo $this->uri->segment(2) == 'barang' ? 'active' : '' ?>">
            <a href="<?php echo base_url() . 'admin/barang' ?>"><i class="fa fa-user"></i> Master Barang</a>
          </li>
          <li class="<?php if ($this->uri->segment(2) == "customer") {echo "active";}?>">
            <a href="<?php echo base_url() . 'admin/customer' ?>"><i class="fa fa-sitemap"></i> Master Customer</a>
          </li>
          <li class="<?php if ($this->uri->segment(2) == "service") {echo "active";}?>">
            <a href="<?php echo base_url() . 'admin/service' ?>"><i class="fa fa-flag"></i> Master Jasa</a>
          </li>
        </ul>
      </li>
      <li class="header">Data Harian</li>
      <li class="<?php if ($this->uri->segment(2) == "dataharian" && $this->uri->segment(3) == null) {echo "active";}?>"><a href="<?php echo base_url() . 'admin/dataharian' ?>"><i class="fa fa-list"></i> List Data Harian</a></li>
          <li class="<?php if ($this->uri->segment(3) == "input") {echo "active";}?>"><a href="<?php echo base_url() . 'admin/dataharian/input' ?>"><i class="fa fa-globe"></i> Input Data</a></li>


      <?php }?>
      <?php if($h=='2'){ ?>
        <CENTER><h3><i class="fa fa-otomotif"></i> <span class="bg-primary">KASIR</span></h3></CENTER> 
        <li class="header">Menu Utama</li>
      <li class="<?php if ($this->uri->segment(2) == "dashboard") {echo "active";}?>">
        <a href="<?php echo base_url() . 'dashboard' ?>">
          <i class="fa fa-home"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="treeview <?php if ($this->uri->segment(2) == "Data Master" || $this->uri->segment(2) == "barang" || $this->uri->segment(2) == "suplier" || $this->uri->segment(2) == "customer" || $this->uri->segment(2) == "pengguna" || $this->uri->segment(2) == "service" || $this->uri->segment(2) == "data_penjualan") {echo "active";}?>">
        <a href="#">
          <i class="fa fa-cog"></i>
          <span>Data Master</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo $this->uri->segment(2) == 'barang' ? 'active' : '' ?>">
            <a href="<?php echo base_url() . 'admin/barang' ?>"><i class="fa fa-sitemap"></i> Master Barang</a>
          </li>
          <li class="<?php if ($this->uri->segment(2) == "service") {echo "active";}?>">
            <a href="<?php echo base_url() . 'admin/service' ?>"><i class="fa fa-flag"></i> Master Jasa</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'suplier' ? 'active' : '' ?>">
            <a href="<?php echo base_url() . 'admin/suplier' ?>"><i class="fa fa-thumb-tack"></i> Master Supplier</a>
          </li>
          <li class="<?php if ($this->uri->segment(2) == "customer") {echo "active";}?>">
            <a href="<?php echo base_url() . 'admin/customer' ?>"><i class="fa fa-users"></i> Master Pelanggan</a>
          </li>
          <li class="<?php if ($this->uri->segment(2) == "pengguna") {echo "active";}?>">
            <a href="<?php echo base_url() . 'admin/pengguna' ?>"><i class="fa fa-user"></i> Master Karyawan</a>
          </li>
          <li class="<?php if ($this->uri->segment(3) == "data_penjualan") {echo "active";}?>">
            <a href="<?php echo base_url() . 'admin/transaksi/data_penjualan' ?>"><i class="fa fa-history"></i> Penjualan</a>
          </li>
          <li class="<?php if ($this->uri->segment(2) == "pembelian") {echo "active";}?>">
            <a href="<?php echo base_url() . 'admin/transaksi/data_pembelian' ?>"><i class="fa fa-history"></i> Pembelian</a>
          </li>
        </ul>
      </li>
      <li class="treeview <?php if ($this->uri->segment(2) == "Data Master" || $this->uri->segment(2) == "penjualan_grosir" || $this->uri->segment(2) == "pembelian" || $this->uri->segment(2) == "customer" || $this->uri->segment(2) == "pengguna" || $this->uri->segment(2) == "transaksi") {echo "active";}?>">
        <a href="#">
          <i class="fa fa-newspaper-o"></i>
          <span>Transaksi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo $this->uri->segment(2) == 'penjualan_grosir' ? 'active' : '' ?>">
            <a href="<?php echo base_url() . 'admin/penjualan_grosir' ?>"><i class="fa fa-user"></i> Penjualan</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'pembelian' ? 'active' : '' ?>">
            <a href="<?php echo base_url() . 'admin/pembelian' ?>"><i class="fa fa-thumb-tack"></i> Pembelian</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'transaksi' ? 'active' : '' ?>">
            <a href="<?php echo base_url() . 'admin/transaksi' ?>"><i class="fa fa-thumb-tack"></i> Service</a>
          </li>
         
        </ul>
      </li>
      
      <li class="header">Data Harian</li>
      <li class="<?php if ($this->uri->segment(2) == "dataharian" && $this->uri->segment(3) == null) {echo "active";}?>"><a href="<?php echo base_url() . 'admin/dataharian' ?>"><i class="fa fa-list"></i> List Data Harian</a></li>
          <li class="<?php if ($this->uri->segment(3) == "input") {echo "active";}?>"><a href="<?php echo base_url() . 'admin/dataharian/input' ?>"><i class="fa fa-globe"></i> Input Data</a></li>
      
       <li class="header">Laporan</li>
          <li class="treeview <?php if ($this->uri->segment(2) == "Data Master" || $this->uri->segment(2) == "laporan" || $this->uri->segment(2) == "suplier" || $this->uri->segment(2) == "customer" || $this->uri->segment(2) == "pengguna" || $this->uri->segment(2) == "service") {echo "active";}?>">
        <a href="#">
          <i class="fa fa-cog"></i>
          <span>Laporan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo $this->uri->segment(2) == 'laporan' ? 'active' : '' ?>">
            <a href="<?php echo base_url() . 'admin/laporan' ?>"><i class="fa fa-user"></i> Master Laporan</a>
         <!-- </li>
          <li class="<?php echo $this->uri->segment(2) == 'suplier' ? 'active' : '' ?>">
            <a href="<?php echo base_url() . 'admin/suplier' ?>"><i class="fa fa-thumb-tack"></i> Akuntansi</a>
          </li>-->

        </ul>
      </li>
      <li class="header">User</li>
      <li class="<?php if ($this->uri->segment(2) == "inbox") {echo "active";}?>">
        <a href="<?php echo base_url() . 'admin_web/inbox' ?>">
          <i class="fa fa-envelope"></i> <span>Inbox</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-red"><?php echo $jum_pesan; ?></small>
          </span>
        </a>
      </li>

      <li class="<?php if ($this->uri->segment(2) == "komentar") {echo "active";}?>">
        <a href="<?php echo base_url() . 'admin_web/komentar' ?>">
          <i class="fa fa-comments"></i> <span>Komentar</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-red"><?php echo $jum_comment; ?></small>
          </span>
        </a>
      </li>

      <?php }?>
      <li class="header">Log Out</li>
      <li>
        <a href="<?php echo base_url() . 'administrator/logout' ?>">
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