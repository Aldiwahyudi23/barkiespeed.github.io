<!-- Widget -->
<div class="widgett" >
  <nav style="margin-bottom: 10px;">
    <div class="nav nav-tabs border-danger" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="nav-artikel-tab" data-toggle="tab" href="#nav-artikel" role="tab" aria-controls="nav-artikel" aria-selected="true">artikel</a>
      <a class="nav-item nav-link" id="nav-pengumuman-tab" data-toggle="tab" href="#nav-pengumuman" role="tab" aria-controls="nav-pengumuman" aria-selected="true">Pengumuman</a>
    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-artikel" role="tabpanel" aria-labelledby="nav-artikel-tab">
     <?php foreach ($artikelterbaru->result() as $row): ?>
       <a href="<?php echo site_url('artikel/detail/' . $row->slug); ?>">
        <div class="single-blog-post post-style-2 d-flex align-items-center">
          <div class="post-thumbnail">
            <img src="<?php echo base_url() . 'assets/images/' . $row->gambar; ?>" alt="" class="img-fluid" width="100">
          </div>
          <!-- Post Content -->
          <div class="post-content">
           <a href="<?php echo site_url('artikel/detail/' . $row->slug); ?>" class="headline">
             <h5><?php echo $row->judul; ?></h5>
           </a>
           <!-- Post Meta -->
           <div class="post-meta">
            <p><i class="fa fa-calendar"></i> Posted <?php echo date("d", strtotime($row->tanggal1)); ?> <?php echo date("M Y", strtotime($row->tanggal1)); ?></p>
          </div>
        </div>
      </div>
    </a>
  <?php endforeach;?>
  <br>
  <a href="<?php echo site_url('artikel'); ?>" class="btn btn-outline-primary btn-block">Selengkapnya</a>
</div>
<div class="tab-pane fade " id="nav-pengumuman" role="tabpanel" aria-labelledby="nav-pengumuman-tab">
 <?php foreach ($pengumumanterbaru->result() as $row): ?>
   <!-- <a href="<?php echo site_url('pengumuman/vw:' . $row->slug); ?>"> -->
    <div class="single-blog-post post-style-2 d-flex align-items-center">
      <div class="post-thumbnail">
        <img src="<?php echo base_url('assets/images/pengumuman.jpg') ?>" alt="" class="img-fluid" width="95" >

      </div>
      <!-- Post Content -->
      <div class="post-content">
       <a href="<?php echo site_url('pengumuman/vw:' . $row->slug); ?>" class="headline">
        <h5><?php echo $row->judul; ?></h5>
      </a>
      <div class="post-meta">
        <p><i class="fa fa-calendar"></i> Posted <?php echo date("d", strtotime($row->tanggal1)); ?> <?php echo date("M Y", strtotime($row->tanggal1)); ?></p>
      </div>
    </div>
  </div>
  <!-- </a> -->
<?php endforeach;?>
<br>
<a href="<?php echo site_url('pengumuman'); ?>" class="btn btn-outline-danger btn-block">Selengkapnya</a>
</div>

<!-- Populer -->
<div class="card my-4">
  <h5 class="card-header bg-primary text-white">artikel Populer</h5>
  <div class="card-body">
    <?php foreach ($populer->result() as $row): ?>
     <a href="<?php echo site_url('artikel/detail/' . $row->slug); ?>">
      <div class="single-blog-post post-style-2 d-flex align-items-center">
        <div class="post-thumbnail">
          <img src="<?php echo base_url() . 'assets/images/' . $row->gambar; ?>" alt="" class="img-fluid" width="100">
        </div>
        <!-- Post Content -->
        <div class="post-content">
          <a href="<?php echo site_url('artikel/detail/' . $row->slug); ?>" class="headline">
           <h5><?php echo $row->judul; ?></h5>
         </a>
         <!-- Post Meta -->
         <div class="post-meta">
          <p><i class="fa fa-calendar"></i> Posted <?php echo date("d", strtotime($row->tanggal1)); ?> <?php echo date("M Y", strtotime($row->tanggal1)); ?></p>
        </div>
      </div>
    </div>
  </a>
<?php endforeach;?>
</div>
<div class="card-footer">
  <a href="<?php echo site_url('artikel'); ?>" class="btn btn-outline-primary btn-block">Selengkapnya</a>

</div>
</div>


<!-- Side Widget -->
