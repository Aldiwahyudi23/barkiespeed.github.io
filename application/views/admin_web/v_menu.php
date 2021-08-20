<aside class="main-sidebar bg-primary" style="font-size:12px;">
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
      <li class="header">Menu Utama</li>
      <li class="<?php if ($this->uri->segment(2) == "dashboard") {echo "active";}?>">
        <a href="<?php echo base_url() . 'admin_web/dashboard' ?>">
          <i class="fa fa-home"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="treeview <?php if ($this->uri->segment(2) == "profil" || $this->uri->segment(2) == "deskripsi" || $this->uri->segment(2) == "visimisi" || $this->uri->segment(2) == "struktur" || $this->uri->segment(2) == "pegawai" || $this->uri->segment(2) == "desa") {echo "active";}?>">
        <a href="#">
          <i class="fa fa-cog"></i>
          <span>Profil</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo $this->uri->segment(2) == 'deskripsi' ? 'active' : '' ?>">
            <a href="<?php echo base_url() . 'admin_web/deskripsi' ?>"><i class="fa fa-user"></i> Deskripsi</a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'visimisi' ? 'active' : '' ?>">
            <a href="<?php echo base_url() . 'admin_web/visimisi' ?>"><i class="fa fa-thumb-tack"></i> Visi dan Misi</a>
          </li>
          <li class="<?php if ($this->uri->segment(2) == "struktur") {echo "active";}?>">
            <a href="<?php echo base_url() . 'admin_web/struktur' ?>"><i class="fa fa-sitemap"></i> Strukutur Organisasi</a>
          </li>
          <li class="<?php if ($this->uri->segment(2) == "pegawai") {echo "active";}?>">
            <a href="<?php echo base_url() . 'admin_web/pegawai' ?>"><i class="fa fa-users"></i> Profil Pegawai</a>
          </li>
        </ul>
      </li>
      <li class="treeview <?php if ($this->uri->segment(2) == "artikel" || $this->uri->segment(2) == "kategori") {echo "active";}?>">
        <a href="#">
          <i class="fa fa-newspaper-o"></i>
          <span>artikel</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(2) == "artikel" && $this->uri->segment(3) == null) {echo "active";}?>"><a href="<?php echo base_url() . 'admin_web/artikel' ?>"><i class="fa fa-list"></i> List artikel</a></li>
          <li class="<?php if ($this->uri->segment(3) == "add_artikel") {echo "active";}?>"><a href="<?php echo base_url() . 'admin_web/artikel/add_artikel' ?>"><i class="fa fa-thumb-tack"></i> Post artikel</a></li>
          <li class="<?php if ($this->uri->segment(2) == "kategori") {echo "active";}?>"><a href="<?php echo base_url() . 'admin_web/kategori' ?>"><i class="fa fa-wrench"></i> Kategori</a></li>
        </ul>
      </li>
      <li class="treeview <?php if ($this->uri->segment(2) == "potensi") {echo "active";}?>">
        <a href="#">
          <i class="fa fa-map-signs"></i>
          <span>Potensi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(2) == "potensi" && $this->uri->segment(3) == null) {echo "active";}?>"><a href="<?php echo base_url() . 'admin_web/potensi' ?>"><i class="fa fa-list"></i> List Potensi</a></li>
          <li class="<?php if ($this->uri->segment(3) == "add_potensi") {echo "active";}?>"><a href="<?php echo base_url() . 'admin_web/potensi/add_potensi' ?>"><i class="fa fa-globe"></i> Post Potensi</a></li>
        </ul>
      </li>
      <li class="treeview <?php if ($this->uri->segment(2) == "identitas" || $this->uri->segment(2) == "waktu" || $this->uri->segment(2) == "slider" || $this->uri->segment(2) == "socmed") {echo "active";}?>">
        <a href="#">
          <i class="fa fa-fort-awesome"></i>
          <span>Identitas</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(2) == "identitas") {echo "active";}?>"><a href="<?php echo base_url() . 'admin_web/identitas' ?>"><i class="fa fa-list"></i>Identitas</a></li>
          <li class="<?php if ($this->uri->segment(2) == "waktu") {echo "active";}?>"><a href="<?php echo base_url() . 'admin_web/waktu' ?>"><i class="fa fa-clock-o"></i>Waktu Buka</a></li>
          <li class="<?php if ($this->uri->segment(2) == "slider") {echo "active";}?>"><a href="<?php echo base_url() . 'admin_web/slider' ?>"><i class="fa fa-image"></i>Slider</a></li>
          <li class="<?php if ($this->uri->segment(2) == "socmed") {echo "active";}?>"><a href="<?php echo base_url() . 'admin_web/socmed' ?>"><i class="fa fa-link"></i>Social Media</a></li>


        </ul>
      </li>
      <!--
      <li class="treeview <?php if ($this->uri->segment(2) == "denahlayanan" || $this->uri->segment(2) == "alurlayanan" || $this->uri->segment(2) == "jenispelayanan") {echo "active";}?>">
        <a href="#">
          <i class="fa fa-server"></i>
          <span>Layanan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(2) == "alurlayanan") {echo "active";}?>"><a href="<?php echo base_url() . 'admin_web/alurlayanan' ?>"><i class="fa fa-hand-o-right"></i>Alur Layanan</a></li>
          <li class="<?php if ($this->uri->segment(2) == "denahlayanan") {echo "active";}?>"><a href="<?php echo base_url() . 'admin_web/denahlayanan' ?>"><i class="fa fa-street-view"></i>Denah Layanan</a></li>
          <li class="<?php if ($this->uri->segment(2) == "jenispelayanan") {echo "active";}?>"><a href="<?php echo base_url() . 'admin_web/jenispelayanan' ?>"><i class="fa fa-tasks"></i>Jenis Layanan</a></li>
        </ul>
      </li>

      <li class="<?php if ($this->uri->segment(2) == "agenda") {echo "active";}?>">
        <a href="<?php echo base_url() . 'admin_web/agenda' ?>">
          <i class="fa fa-calendar"></i> <span>Agenda</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="<?php if ($this->uri->segment(2) == "pengumuman") {echo "active";}?>">
        <a href="<?php echo base_url() . 'admin_web/pengumuman' ?>">
          <i class="fa fa-volume-up"></i> <span>Pengumuman</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="header">Media</li>
      <li class="<?php if ($this->uri->segment(2) == "files") {echo "active";}?>">
        <a href="<?php echo base_url() . 'admin_web/files' ?>">
          <i class="fa fa-download"></i> <span>Download</span>
          <span class="pull-right-container">
            <small class="label pull-right"></small>
          </span>
        </a>
      </li>
      <li class="treeview <?php if ($this->uri->segment(2) == "album" || $this->uri->segment(2) == "galeri" || $this->uri->segment(2) == "instagram") {echo "active";}?>">
        <a href="#">
          <i class="fa fa-camera"></i>
          <span>Gallery</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <!--
        <ul class="treeview-menu">
          <li class="<?php if ($this->uri->segment(2) == "album") {echo "active";}?>"><a href="<?php echo base_url() . 'admin_web/album' ?>"><i class="fa fa-clone"></i> Album</a></li>
          <li class="<?php if ($this->uri->segment(2) == "galeri") {echo "active";}?>"><a href="<?php echo base_url() . 'admin_web/galeri' ?>"><i class="fa fa-picture-o"></i> Photos</a></li>
           <li class="<?php if ($this->uri->segment(2) == "instagram") {echo "active";}?>"><a href="<?php echo base_url() . 'admin_web/instagram' ?>"><i class="fa fa-instagram"></i>Instagram</a></li>
        </ul>
      </li> -->
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