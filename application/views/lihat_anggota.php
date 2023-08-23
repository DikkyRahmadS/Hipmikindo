<?php $this->load->view('header') ?>
<link rel="stylesheet" href="<?php echo base_url() ?>aset/simplelightbox-master/dist/simple-lightbox.css?v2.10.3" />

<!-- Hero Section Begin -->
<section class="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="card border border-danger">
          <?php foreach ($profillama as $key => $row) { ?>
            <div class="card-header justify-content-center border-bottom border-danger" style="background-color: #cc7f0b;">
              <div class="row">
                <div class="col">
                  <p class="text-sm text-center" style="color: white; font-size:small;">Mau Join Hipmikindo Sumsel ?
                  <h4 class="text-bolder text-center" style="color: white; font-size:larger;">Syarat dan Ketentuan</h4>
                </div>
              </div>
            </div>
            <div class="card-body">
              <p class="card-text" style="color: black;"> <?php echo $row->syarat_anggota ?></p>
              <a href="<?php echo base_url('home/daftaranggota'); ?>"><button type="button" class="btn btn-sm btn-block" style="background-color: #cc7f0b; color : white;">Daftar</button></a>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="col-lg-9 mt-3">
        <div class="row justify-content-center">
          <div class="section-title mt-1">
            <style>
              h2 {
                font-size: 28px;
              }
            </style>
            <h2>Lihat Detail Anggota</h2>
          </div>
        </div>
        <div class="row p-3 justify-content-center">
          <div class="card-deck">
            <div class="card border-danger">
              <div class="card-body border-danger">
                <div class="row">
                  <div class="col ">
                    <img class="rounded-circle float-right" src="<?php echo base_url('fotoanggota/' . $detail->logo_umkm) ?>" style="width:110px;height:100px;" alt="">
                  </div>
                  <div class="col float-left">
                    <div class="row mt-4">
                      <h5 class="card-title align-self-center"><?php echo $detail->nama_umkm ?></h5>
                    </div>
                    <div class="row">
                      <p class="text-sm align-self-center"><?php echo $detail->owner ?></p>
                    </div>
                  </div>
                </div><br>
                <p class="card-text align-self-center mt-3" style="color: black;"><?php echo $detail->alamat_umkm ?></p>
                <p class="card-text align-self-center mt-3" style="color: black;">e-mail : <?php echo $detail->email_umkm ?></p><br>
                <div class="row justify-content-center">
                  <div class="col align-self-center">
                    <div class="product__item">
                      <div class="product__item__pic set-bg small-demo">
                        <img src="<?php echo base_url('fotoanggota/' . $detail->list_menu) ?>" alt="">
                        <ul class="product__item__pic__hover">
                          <li><a rel="rel2" href="<?php echo base_url('fotoanggota/' . $detail->list_menu) ?>"><i class="fa fa-search-plus"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col align-self-center">
                    <div class="product__item">
                      <div class="product__item__pic set-bg small-demo">
                        <img src="<?php echo base_url('fotoanggota/' . $detail->halal_produk) ?>" alt="">
                        <ul class="product__item__pic__hover ">
                          <li><a rel="rel2" href="<?php echo base_url('fotoanggota/' . $detail->halal_produk) ?>"><i class="fa fa-search-plus"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col align-self-center">
                    <div class="product__item">
                      <div class="product__item__pic set-bg small-demo">
                        <img src="<?php echo base_url('fotoanggota/' . $detail->tempat_dalam_umkm) ?>" alt="">
                        <ul class="product__item__pic__hover">
                          <li><a rel="rel2" href="<?php echo base_url('fotoanggota/' . $detail->tempat_dalam_umkm) ?>"><i class="fa fa-search-plus"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer border-danger">
                  <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group" role="group" aria-label="First group">
                      <a href="https://api.whatsapp.com/send?phone=<?= $detail->nowa ?>&text=Silahkan Hubungi Contact Person UMKM untuk Mengetahui Info lebih Lanjut" target="_blank"><button type="button" class="btn btn-success">WhatsApp</button></a>
                    </div>
                    <div class="btn-group" role="group" aria-label="First group">
                      <a href="https://www.instagram.com/<?= $detail->username_ig ?>/" target="_blank"><button type="button" class="btn" style="background-color: #e61258; color:white;">Instagram</button></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="btn-group " role="group" aria-label="First group">
            <a class="text-center" href="<?php echo base_url('anggota'); ?>"><button type="button" class="btn btn-secondary">Kembali</button></a>
          </div>
        </div>
      </div>
</section>
<!-- Hero Section End -->
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