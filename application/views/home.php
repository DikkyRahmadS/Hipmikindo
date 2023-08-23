<?php $this->load->view('header') ?>
<link rel="stylesheet" href="<?php echo base_url() ?>aset/simplelightbox-master/dist/simple-lightbox.css?v2.10.3" />
<!-- Hero Section Begin -->

<section class="hero">
  <div class="container">
    <?= $this->session->flashdata('msg'); ?>

    <div class="row mt-3">
      <div class="col-lg-3">
        <div class="card border border-danger">
          <?php foreach ($profillama as $key => $row) { ?>
            <div class="card-header justify-content-center border-bottom border-danger" style="background-color: #cc7f0b;">
              <div class="row  justify-content-center ">
                <div class="col-lg-5 align-self-center">
                  <img class="rounded-circle text-center" src="<?php echo base_url() ?>aset/img/logoaspenku2.jpeg">
                </div>
                <div class="col-lg-7">
                  <div class="row mt-3">
                    <h5 class="text-bold text-center" style="color: white;">Hipmikindo Sumsel</h5>
                  </div>
                  <div class="row mt-2">
                    <p class="text-sm text-left" style="color: white; font-size:small;">Himpunan Mikro Kecil Indonesia</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <p class="card-text text-center" style="color: black;"> <?php echo $row->alamat_aspenku ?></p>
              <a href="<?php echo base_url('home/profil'); ?>"><button type="button" class="btn btn-sm btn-block" style="background-color: #cc7f0b; color : white;">Read More</button></a>
            </div>
          <?php } ?>
        </div>
      </div>

      <div class="col-lg-9">
        <div class="row justify-content-center">

          <div class="section-title mt-3">
            <style>
              h2 {
                font-size: 28px;
              }
            </style>
            <h2>Kue dan Kuliner Khas Palembang</h2>
          </div>
          <div class="categories__slider owl-carousel p-4">
            <?php foreach ($kuliner as  $value) {
              // Cek apakah kabupaten_id sama dengan 16
              if ($value->kabupaten_id == 16) {
            ?>
                <div class="col-lg-3 small-demo">
                  <div class="card border border-danger categories__item set-bg" data-setbg="<?php echo base_url('fotokuliner/' . $value->foto_kuliner) ?>">
                    <h5><a rel="rel2" href="<?php echo base_url('fotokuliner/' . $value->foto_kuliner) ?>"><?php echo $value->nama_kuliner ?></a></h5>
                  </div>
                </div>
            <?php
              }
            };
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-3">
        <div class="card border border-danger">
          <div class="card-header justify-content-center border-bottom border-danger" style="background-color: #cc7f0b;">
            <div class="row">
              <div class="col">
                <?php foreach ($profillama as $key => $row) { ?>
                  <h5 class="text-bold text-center" style="color: white;">Anggota Hipmikindo Sumsel</h5>
                <?php   }; ?>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <?php foreach ($anggota as $row) { ?>
                <div class="col-4">
                  <img src="<?php echo base_url('fotoanggota/' . $row->logo_umkm) ?>" class="rounded-circle" alt="...">
                  <p class="card-text text-center text-sm" style="color: black;"> <?php echo $row->nama_umkm ?></p>
                </div>
              <?php }; ?>
            </div>
          </div>
          <div class="card-footer">
            <div class="row justify-content-center mt-4">
              <div class="col">
                <a href="<?php echo base_url('Anggota'); ?>"><button type="button" class="btn btn-sm btn-block" style="background-color: #cc7f0b; color : white;">Read More</button></a>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="col-lg-9">
        <!-- Blog Section Begin -->
        <section class="from-blog spad p-4">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-title from-blog__title mt-2">
                  <h2>Info Kegiatan</h2>
                </div>
              </div>
            </div>
            <div class="row">
              <?php
              foreach ($kegiatan as  $value) {
              ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                  <div class="blog__item">
                    <div class="card border border-danger blog__item__pic">
                      <img src="<?php echo base_url('fotokegiatan/' . $value->foto_kegiatan) ?>" alt="">
                    </div>
                    <div class="blog__item__text">
                      <ul>
                        <li>Kegiatan dilaksanakan pada :</li>
                        <li><i class="fa fa-calendar-o mr-2"></i><?php echo dateFormat('d-m-Y', $value->tgl_kegiatan) ?></li>
                      </ul>
                      <h5><a href="<?php echo base_url('info_kegiatan/detail/') . $value->kegiatan_id; ?>"><?php echo $value->judul_kegiatan ?></a></h5>
                      <p><?= substr($value->ket_kegiatan, 0, 100); ?><a href="<?php echo base_url('info_kegiatan/detail/') . $value->kegiatan_id; ?>">... read more</a></p>
                      <a href="<?php echo base_url('info_kegiatan/detail/') . $value->kegiatan_id ?>" class="blog__btn btn-sm border-danger">Read More <span class="arrow_right"></span></a>
                    </div>
                  </div>
                </div>
              <?php   }; ?>
            </div>
            <div class="row justify-content-center">
              <div class="col">
                <a href="<?php echo base_url('info_kegiatan'); ?>"><button type="button" class="btn btn-sm btn-block border-danger" style="background-color: #cc7f0b; color : white;"><span class="text-bold">See More</span></button></a>
              </div>
            </div>
          </div>
        </section>
        <!-- Blog Section End -->
        <!-- Featured Section Begin -->
        <section class="featured spad p-4">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-title mt-2">
                  <h2>Galeri</h2>
                </div>
              </div>
            </div>
            <div class="row featured__filter">
              <?php
              foreach ($galeri as  $value) {
              ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                  <div class="featured__item">
                    <div class="card border border-danger featured__item__pic set-bg small-demo" data-setbg="<?php echo base_url('fotokegiatan/' . $value->foto_kegiatan) ?>">
                      <ul class="featured__item__pic__hover">
                        <li><a rel="rel3" href="<?php echo base_url('fotokegiatan/' . $value->foto_kegiatan) ?>" target="_blank"><i class="fa fa-search-plus"></i></a></li>
                      </ul>
                    </div>
                    <div class="featured__item__text">
                      <h6><?php echo $value->judul_kegiatan ?></a></h6>
                    </div>
                  </div>
                </div>
              <?php   }; ?>
            </div>
            <div class="row justify-content-center">
              <div class="col">
                <a href="<?php echo base_url('home/galeri'); ?>"><button type="button" class="btn btn-sm btn-block border-danger" style="background-color: #cc7f0b; color : white;"><span class="text-bold">See More</span></button></a>
              </div>
            </div>
          </div>
        </section>
        <!-- Featured Section End ZI-->
      </div>
    </div>
</section>
<!-- Hero Section End ZI-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="<?php echo base_url() ?>aset/simplelightbox-master/dist/simple-lightbox.js?v2.10.3"></script>
<script>
  (function() {


    let $gallery = new SimpleLightbox('.small-demo a', {});

    interval = window.setInterval(function() {
      $('.scrollwheel').animate({
        top: 14
      }, 400, function() {
        $('.scrollwheel').animate({
          top: 10
        }, 400);
      })
    }, 1000);

    $('.flyin-navi a').each(function(i, item) {
      var elem = $(this),
        item = {
          refElement: $(elem.attr('href')),
          parent: elem.parent()
        }
      inPageItems.push(item);
    });

    $(window).resize(function() {
      $('header').height(Math.max($(window).height(), 620));
    });

    $('.scrolllink').click(function(e) {
      e.preventDefault();
      var target = $(this).attr('href');
      $('html, body').animate({
        scrollTop: ($(target).offset().top - 50)
      }, 'slow');
    });

    $(window).scroll(function() {
      var top = $(document).scrollTop(),
        inpageNav = $('.flyin-navi');
      docStart = $('#documentation').offset().top;

      if (top > docStart) {
        inpageNav.fadeIn('fast');
      } else {
        inpageNav.fadeOut('fast');
      }

      $.each(inPageItems, function(i, item) {
        if (top > item.refElement.offset().top - 52) {
          if (!item.parent.hasClass('active')) {
            $('.flyin-navi li').removeClass('active');
            item.parent.addClass('active');
          }
        } else {
          item.parent.removeClass('active');
        }
      });
    });


  })();
</script>

<?php $this->load->view('footer') ?>