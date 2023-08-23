<?php $this->load->view('header') ?>

<!-- Blog Details Section Begin -->
<section class="blog-details spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-5 order-md-1 order-2 border-top border-danger">
        <div class="blog__sidebar1">
          <div class="blog__sidebar__item">
            <h4>Kegiatan Terbaru</h4>
            <div class="blog__sidebar__recent">
              <?php
              foreach ($recentkegiatan as  $value) {
              ?>
                <div class="blog__sidebar__recent__item__pic">
                  <img width="90px" src="<?php echo base_url('fotokegiatan/' . $value->foto_kegiatan) ?>" alt="">
                </div>
                <div class="blog__sidebar__recent__item__text">
                  <h6><a href="<?php echo base_url('info_kegiatan/detail/').$value->kegiatan_id; ?>"><?php echo $value->judul_kegiatan ?></a></h6>
                  <span><i class="fa fa-calendar-o"></i> <?php echo dateFormat('d-m-Y',$value->tgl_kegiatan) ?></span>
                </div><br><br>
              <?php }; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8 col-md-7 order-md-1 order-1">
        <div class="blog__details__text">
          <img src="<?php echo base_url('fotokegiatan/' . $detail->foto_kegiatan) ?>" style="width:740px;height:500px;" alt="<?php echo $detail->judul_kegiatan ?>">
          <h3 class="text-center"><?php echo $detail->judul_kegiatan ?></h3>
          <p class="align-self-left">Kegiatan dilaksanakan pada : <?php echo dateFormat('d-m-Y',$value->tgl_kegiatan) ?><br>
          <?php echo $detail->ket_kegiatan ?></p>
        </div>
        <div class="blog__details__content">
          <div class="row">
            <div class="col-lg-6">
              <a class="blog__sidebar__recent__item">
                <div class="blog__details__author">
                  <div class="blog__details__author__pic">
                    <img src="<?php echo base_url() ?>aset/img/blog/details/details-author.jpg" alt="">
                  </div>
                  <div class="blog__details__author__text">
                    <h6>By Admin</h6>
                    <span><?php echo dateFormat('d-m-Y',$value->tgl_kegiatan) ?></span>
                  </div>
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
              <div class="blog__details__widget ">
                <div class="blog__details__social">
                  <a href="https://www.instagram.com/hipmikindo.sumsel/"><i class="fa fa-instagram"></i> : @Hipmikindo_sumsel</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Blog Details Section End -->

<?php $this->load->view('footer') ?>