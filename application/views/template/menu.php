<?php $idend = $iden->row_array()?>
<header>
  <!-- /navabr -->
  <nav class="navbar navbar-expand-xl navbar-dark fixed-top bg-primary">
    <div class="container">
    <div>
    <a href="<?php echo base_url() . 'pelanggan/login'; ?>" class="btn btn-sm btn-danger" ><span class="fa fa-user"></span> Login</a>
  </div>

      <a class="navbar-brand" href="<?php echo site_url() ?>">
      
        <img src="<?php echo 'assetss/favicon/logo.png' ?>" width="150" height="40" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li <?php echo (($this->uri->segment(1) == "beranda" || $this->uri->segment(1) == "") ? 'class="nav-item active"' : 'class="nav-item"') ?>>
            <a class="nav-link text-white" href="<?php echo base_url() . 'beranda'; ?>"><b>Beranda</b><span class="sr-only">(current)</span></a>
          </li>
      <li class="nav-item dropdown  <?php if ($this->uri->segment(1) == "artikel" || $this->uri->segment(1) == "pengumuman") {
	echo 'active';}?>">
       <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <b>artikel</b>
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a <?php echo (($this->uri->segment(1) == "artikel") ? 'class="dropdown-item active"' : 'class="dropdown-item "') ?> href="<?php echo base_url() . 'artikel'; ?>">artikel</a>
        <a <?php echo (($this->uri->segment(1) == "pengumuman") ? 'class="dropdown-item active"' : 'class="dropdown-item "') ?> href="<?php echo base_url() . 'pengumuman'; ?>">Pengumuman</a>
        <a <?php echo (($this->uri->segment(1) == "potensi") ? 'class="dropdown-item active"' : 'class="dropdown-item "') ?> href="<?php echo base_url() . 'potensi'; ?>">Potensi Otomotif</a>
      </div>
    </li>
   
  <li <?php echo (($this->uri->segment(1) == "potensi") ? 'class="nav-item active"' : 'class="nav-item "') ?>>

    <li <?php echo (($this->uri->segment(1) == "kontak") ? 'class="nav-item active"' : 'class="nav-item "') ?>>
    <a class="nav-link text-white" href="<?php echo base_url() . 'kontak'; ?>"><b>Kontak</b></a>
  </li>
</ul>
<form class="form-inline mt-2 mt-md-0"  action="<?php echo site_url('artikel/search'); ?>" method="get" >
  <input class="form-control mr-sm-2" type="text" placeholder="Cari disini..." aria-label="Search" name="keyword">
  <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Cari</button>
</form>

</div>
</div>
</nav>
</header>