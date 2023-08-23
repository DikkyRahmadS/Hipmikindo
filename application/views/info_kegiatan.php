<?php $this->load->view('header') ?>

<section class="breadcrumb-section">
  <div class="container">
    <form action="<?= base_url('info_kegiatan/index'); ?>" method="get">

      <div class="row justify-content-center">
        <div class="col-sm-10 mb-3">
          <input type="text" name="search" class="form-control" placeholder="Search…">
        </div>
        <div class="col-sm-1">
          <button type="submit" class="btn" style="background-color: #a5240e; color:white">Search</button>
        </div>
      </div>
    </form>
    <div class="col col-sm-12">
      <div class="card border border-danger">

        <div class="card-header justify-content-center border-bottom border-danger" style="background-color: #cc7f0b;">
          <div class="row">
            <div class="col-lg-12 text-center">
              <?php foreach ($profillama as $key => $row) { ?>
                <h2 style="color: white;">Kegiatan</h2>
              <?php   }; ?>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <?php
            foreach ($infokegiatans as  $value) {
            ?>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                  <div class="blog__item__pic">
                    <img src="<?php echo base_url('fotokegiatan/' . $value->foto_kegiatan) ?>" alt="">
                  </div>
                  <div class="blog__item__text">
                    <ul>
                      <li>Kegiatan dilaksanakan pada :</li>
                      <li><i class="fa fa-calendar-o"></i> <?php echo dateFormat('d-m-Y', $value->tgl_kegiatan) ?></li>
                    </ul>
                    <h5><a href="<?php echo base_url('info_kegiatan/detail/') . $value->kegiatan_id; ?>"><?php echo $value->judul_kegiatan ?></a></h5>
                    <p><?= substr($value->ket_kegiatan, 0, 100); ?><a href="<?php echo base_url('info_kegiatan/detail/') . $value->kegiatan_id; ?>">... read more</a></p>
                    <a href="<?php echo base_url('info_kegiatan/detail/') . $value->kegiatan_id; ?>" class="blog__btn btn-sm border-danger">Read More <span class="arrow_right"></span></a>
                  </div>
                </div>
              </div>
            <?php }; ?>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12">
          </div>
        </div>
        <div class="card-footer text-center" style="background-color: #cc7f0b;">
          <div class="col-lg-12">
            <div class="product__pagination blog__pagination" style="color: white;">
              <?= $this->pagination->create_links(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
<!-- Blog Section End -->
<?php $this->load->view('footer') ?>