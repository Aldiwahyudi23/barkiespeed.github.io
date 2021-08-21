
<?php 
$this->load->view('template/header');
$this->load->view('template/menu')?>
<main role="main">

<!--
<div class="slider_img layout_two js-flickity" data-flickity-options='{ "autoPlay": 5500 }'>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">

            <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <?php
$x = 0;
foreach ($slider->result_array() as $i):
	$x++;
	?>
			       <div class="carousel-item<?php if ($x == 1) {echo ' active';}?>">
			        <img style="z-index: -1; opacity: 0.8;" class="first-slide" src="<?php echo 'assets/images/slider/' . $i['gambar'] ?>" alt="First slide">
			        <div class="container" style="z-index: 1">
			          <div class="carousel-caption">

			          </div>
			        </div>
			      </div>
			    <?php endforeach;?>
  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
-->

<div class="marketing">
  <div class="container" style="background: light">
    <?php $r = $statis->row_array()?>
    <div class="row featurette">
      <div class="col-md-12">
        <h2 class="featurette-heading"><?php echo $r['judul'] ?></h2><br>
        <p style="text-align: justify;" class="lead"><?php echo limit_words($r['isi'], 20000); ?></p>
      </div>
    </div> 
    <div class="featurette-divider"></div>
    <div class="row featurette">
      <?php
$b = $ber_pertama->row_array();
?>
      <div class="col-md-8">
        <h4 class="p-title">ARTIKEL <span style="color:#DC3545;">TERBARU</span></h4>
        <div class="row">
          <div  class="col-12 col-md-6">
            <div class="single-blog-post">
              <!-- Post Thumbnail -->
              <div class="post-thumbnail">
                <img src="assets/images/<?php echo $b['gambar'] ?>" alt="" class="img-fluid" >
              </div>
              <!-- Post Content -->
              <div class="post-content">
                <a href="<?php echo site_url('artikel/detail/' . $b['slug']); ?>" class="headline">
                  <h5><?php echo $b['judul'] ?></h5>
                </a>
                <p><?php echo limit_words($b['isi'], 10) . '...'; ?></p>
                <!-- Post Meta -->
                <div class="post-meta">
                  <p><i class="fa fa-calendar"></i> Posted <?php echo $b['nama'] . ' pada ' . $b['tanggal1'] ?>  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-6">
            <!-- Single Blog Post -->
            <?php foreach ($artikel->result() as $row): ?>
             <a href="<?php echo site_url('artikel/vw-' . $row->slug); ?>">
               <div class="single-blog-post post-style-2 d-flex align-items-center">
                 <div class="post-thumbnail">
                   <img src="<?php echo base_url() . 'assets/images/' . $row->gambar; ?>" alt="" class="img-fluid" width="120">

                 </div>
                 <!-- Post Content -->
                 <div class="post-content">
                   <a href="<?php echo site_url('artikel/detail/' . $row->slug); ?>" class="headline">
                     <h5><?php echo $row->judul; ?></h5>
                   </a>
                   <!-- Post Meta -->
                   <div class="post-meta">
                    <p><i class="fa fa-calendar"></i>   Posted <?php echo $row->tanggal1; ?></p>
                  </div>
                </div>
              </div>
            </a>
          <?php endforeach;?>
          <br>
        </div>
      </div>
      <center>
        <a href="<?php echo site_url('artikel'); ?>" class="btn btn-outline-primary">Lihat Seluruh Artikel</a>
      </center>
    </div>
    <div class="col-md-4" style="background-color: #F7F7F9">
      <nav style="margin-bottom: 20px;">
        <div class="nav nav-tabs border-primary" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-pengumuman-tab" data-toggle="tab" href="#nav-pengumuman" role="tab" aria-controls="nav-pengumuman" aria-selected="true">Pengumuman</a>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-pengumuman" role="tabpanel" aria-labelledby="nav-pengumuman-tab">
         <?php foreach ($pengumuman->result() as $row): ?>
          <a href="<?php echo site_url('pengumuman/vw:' . $row->slug); ?>">
            <div class="single-blog-post post-style-2 d-flex align-items-center">
              <div class="post-thumbnail">
                <img src="assets/images/pengumuman.jpg" alt="" class="img-fluid" width="95" >

              </div>
              <!-- Post Content -->
              <div class="post-content">
                <a href="<?php echo site_url('pengumuman/vw:' . $row->slug); ?>" class="headline">
                  <h5><?php echo $row->judul; ?></h5>
                </a>
                <!-- Post Meta -->
                <div class="post-meta">
                  <p><i class="fa fa-calendar"></i> Posted <?php echo $row->tanggal1 ?>  </p>
                </div>
              </div>
            </div>
          </a>
        <?php endforeach;?>
        <br>
        <a href="<?php echo site_url('pengumuman'); ?>" class="btn btn-primary btn-block">Selengkapnya</a>
      </div>
     
  </div>
</div>
</div>
</div>
<div class="featurette-divider" ></div>
<!-- First Parallax Section -->
<div class="jumbotron-fluid paral paralsec">
  <div class="container ngeset">
    <div class="row">
     <div class="col-md-5">
       <h3 class="p-title1" style="margin-bottom: 70px;">POTENSI <span style="color:#DC3535;">DUNIA</span>
        <span style="color:#DC3535;">OTOMOTIF</span></h4>
       <a href="<?php echo site_url('potensi'); ?>" class="btn btn-primary">Lihat Selengkapnya</a>


     </div>
     <div class="col-md-7 ">
      <div class="grouppalsu row">
        <?php foreach ($potensi->result() as $row): ?>
          <a href="<?php echo site_url('potensi/vw:' . $row->slug); ?>">
            <div class="col-md-4 col-sm-4"  style="margin-bottom: 10px">
             <div class="card">
              <img class="card-img-top" src="<?php echo 'assets/images/potensi/' . $row->gambar ?>" alt="Card image cap">
              <div class="card-body">
                <a href="<?php echo site_url('potensi/vw:' . $row->slug); ?>"><h6 class="card-title"><?php echo $row->judul ?></h6></a>
              </div>
              <div class="card-footer">
                <small class="text-muted"><i class="fa fa-calendar"></i> Posted <?php echo $row->tanggal1 ?></small>
              </div>
            </div>
          </div>
        </a>
      <?php endforeach;?>
    </div>
  </div>
</div>
</div>
</div>

<!-- Gallery -->
<div class="section" id="media" style="background: blue">
 <!-- <h4 class="p-title"><span style="color:#DC3545;">GALLERY</span></h4> -->
 <!-- <div class="row"> -->
 <!--  <div class="col-sm-4 col-md-4">

 </div> -->
 <br>
 <div class="col-sm-12 col-md-12">
  <div class="row">
   <?php foreach ($galeri->result() as $row): ?>
    <div class="col-sm-2  col-md-2" >
      <div class="hovereffect">
        <a href="<?php echo site_url('gallery') ?>" class="media-item">
          <img src="<?php echo site_url('assets/images/') . $row->gambar ?>" alt="" class="img-fluid bg1">
          <i class="fa fa-camera icon fa-2x" style="color: gray;right: 10px;position: absolute;top: 7px;"></i>
          <div class="overlay">
            <h2><?php echo $row->judul ?></h2>
          </div>
        </a>
      </div>
    </div>
  <?php endforeach;?>
</div>


<div id="instafeed" class="row">
</div>
<br>

</div>
<!-- </div> -->
</div>

<!-- hubungi kami -->
<div class="section" id="contact">
  <div class="container">
    <div class="row row-contact">
      <div class="col-sm-6">
        <?php $a = $identitas->row_array()?>
        <div class="box">
          <h4>BENGKEL BARKIESPEED</h4>
          <br/>
          <div class="media">
            <div class="media-left"><i class="icons fa fa-map-marker"></i></div>
            <div class="media-body">
              <?php echo $a['alamat']; ?>
            </div>
          </div>
          <div class="media">
            <div class="media-left"><i class="icons fa fa-phone"></i></div>
            <div class="media-body">
              Phone : <?php echo $a['telepon'] ?>
            </div>
          </div>
          <div class="media">
            <div class="media-left"><i class="icons fa fa-envelope"></i></div>
            <div class="media-body">
              Email : <?php echo $a['email'] ?></div>
            </div>
            <br/>
            <div class="social-media-icons col-xs-12">
              <ul class="list-inline col-xs-12">
                <?php foreach ($socmed->result() as $socmed): ?>
                  <a href="<?php echo $socmed->url ?>"><i class="<?php echo $socmed->icon ?>  fa-2x"></i></a>
                <?php endforeach;?>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="box">
            <h4>KONTAK KAMI</h4>
            <br>
            <form id="myformBeranda" action="<?php echo site_url('kontak/kirim_pesan'); ?>" method="post">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="xemail" placeholder="name@example.com" required="true" name="xemail">
              </div>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="name" class="form-control" id="xnama" placeholder="Nama Anda" required="true" name="xnama">
              </div>
              <div class="form-group">
                <label for="example-tel-input">Telephone</label>

                <input class="form-control" type="tel" placeholder="08564211xxxx" id="hp" required name="xtelp">
              </div>
              <div class="form-group">
                <label for="pesan">Pesan</label>
                <textarea class="form-control" id="xpesan" rows="3" required="true" name="xpesan"></textarea>
              </div>
              <div class="form-group">
                <!-- button kirim -->
                <button class="btn btn-primary" type="submit">Kirim</button>
                <div><?php echo $this->session->flashdata('msg'); ?></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<?php $this->load->view('template/footer')?>