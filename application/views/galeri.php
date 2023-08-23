<?php $this->load->view('header') ?>
<link rel="stylesheet" href="<?php echo base_url() ?>aset/simplelightbox-master/dist/simple-lightbox.css?v2.10.3" />

<style>
  h2 a{
    color: black;
  }
</style>
<!-- Blog Details Hero Begin -->
<section class="blog-details-hero" style="
background:linear-gradient( rgba(204, 127, 11, 0.784) 100%, rgba(204, 127, 11, 0.784)100%),url('<?php echo base_url() ?>aset/img/songket7.jpg'); ">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="blog__details__hero__text">
					<h2>Makanan Dan Budaya Sumsel </h2>
					
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Blog Details Hero End -->

<!-- Product Section Begin -->
<section class="product spad">
	<div class="container">
        </div>

		<div class="section-title mt-3">
            <style>
              h2 {
                font-size: 28px;
              }
            </style>
            <h2><a href="<?php echo site_url('home/banyuasin') ?>">Kue dan Kuliner Khas Banyuasin</a> </h2>
          </div>
          <div class="categories__slider owl-carousel p-4">
            <?php foreach ($kuliner as  $value) {
              // Cek apakah kabupaten_id sama dengan 16
              if ($value->kabupaten_id == 1) {
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
		  <div class="section-title mt-3">
            <style>
              h2 {
                font-size: 28px;
              }
            </style>
            <h2><a href="<?php echo site_url('home/empatlawang') ?>">Kue dan Kuliner Khas Empat Lawang</a> </h2>
          </div>
          <div class="categories__slider owl-carousel p-4">
            <?php foreach ($kuliner as  $value) {
              // Cek apakah kabupaten_id sama dengan 16
              if ($value->kabupaten_id == 2) {
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
		  <div class="section-title mt-3">
            <style>
              h2 {
                font-size: 28px;
              }
            </style>
          <h2><a href="<?php echo site_url('home/lahat') ?>">Kue dan Kuliner Khas Lahat</a> </h2>
          </div>
          <div class="categories__slider owl-carousel p-4">
            <?php foreach ($kuliner as  $value) {
              // Cek apakah kabupaten_id sama dengan 16
              if ($value->kabupaten_id == 3) {
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
		  <div class="section-title mt-3">
            <style>
              h2 {
                font-size: 28px;
              }
            </style>
            <h2><a href="<?php echo site_url('home/muaraenim') ?>">Kue dan Kuliner Khas Muara Enim</a> </h2>
          </div>
          <div class="categories__slider owl-carousel p-4">
            <?php foreach ($kuliner as  $value) {
              // Cek apakah kabupaten_id sama dengan 16
              if ($value->kabupaten_id == 4) {
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
		  <div class="section-title mt-3">
            <style>
              h2 {
                font-size: 28px;
              }
            </style>
            <h2><a href="<?php echo site_url('home/musibanyuasin') ?>">Kue dan Kuliner Khas Musi Banyuasin</a> </h2>
          </div>
          <div class="categories__slider owl-carousel p-4">
            <?php foreach ($kuliner as  $value) {
              // Cek apakah kabupaten_id sama dengan 16
              if ($value->kabupaten_id == 5) {
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
		  <div class="section-title mt-3">
            <style>
              h2 {
                font-size: 28px;
              }
            </style>
            <h2><a href="<?php echo site_url('home/musirawas') ?>">Kue dan Kuliner Khas Musi Rawas</a> </h2>
          </div>
          <div class="categories__slider owl-carousel p-4">
            <?php foreach ($kuliner as  $value) {
              // Cek apakah kabupaten_id sama dengan 16
              if ($value->kabupaten_id == 6) {
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
		  <div class="section-title mt-3">
            <style>
              h2 {
                font-size: 28px;
              }
            </style>
            <h2><a href="<?php echo site_url('home/musirawasutara') ?>">Kue dan Kuliner Khas Musi Rawas Utara</a> </h2>
          </div>
          <div class="categories__slider owl-carousel p-4">
            <?php foreach ($kuliner as  $value) {
              // Cek apakah kabupaten_id sama dengan 16
              if ($value->kabupaten_id == 7) {
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
		  <div class="section-title mt-3">
            <style>
              h2 {
                font-size: 28px;
              }
            </style>
            <h2><a href="<?php echo site_url('home/oganilir') ?>">Kue dan Kuliner Khas Ogan Ilir</a> </h2>
          </div>
          <div class="categories__slider owl-carousel p-4">
            <?php foreach ($kuliner as  $value) {
              // Cek apakah kabupaten_id sama dengan 16
              if ($value->kabupaten_id == 8) {
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
		  <div class="section-title mt-3">
            <style>
              h2 {
                font-size: 28px;
              }
            </style>
            <h2><a href="<?php echo site_url('home/ogankomeringilir') ?>">Kue dan Kuliner Khas Ogan Komering Ilir</a> </h2>
          </div>
          <div class="categories__slider owl-carousel p-4">
            <?php foreach ($kuliner as  $value) {
              // Cek apakah kabupaten_id sama dengan 16
              if ($value->kabupaten_id == 9) {
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
		  <div class="section-title mt-3">
            <style>
              h2 {
                font-size: 28px;
              }
            </style>
            <h2><a href="<?php echo site_url('home/ogankomeringulu') ?>">Kue dan Kuliner Khas Ogan Komering Ulu</a> </h2>
          </div>
          <div class="categories__slider owl-carousel p-4">
            <?php foreach ($kuliner as  $value) {
              // Cek apakah kabupaten_id sama dengan 16
              if ($value->kabupaten_id == 10) {
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
		  <div class="section-title mt-3">
            <style>
              h2 {
                font-size: 28px;
              }
            </style>
            <h2><a href="<?php echo site_url('home/ogankomeringuluselatan') ?>">Kue dan Kuliner Khas Ogan Komering Ulu Selatan</a> </h2>
          </div>
          <div class="categories__slider owl-carousel p-4">
            <?php foreach ($kuliner as  $value) {
              // Cek apakah kabupaten_id sama dengan 16
              if ($value->kabupaten_id == 11) {
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
		  <div class="section-title mt-3">
            <style>
              h2 {
                font-size: 28px;
              }
            </style>
            <h2><a href="<?php echo site_url('home/ogankomeringulutimur') ?>">Kue dan Kuliner Khas Ogan Komering Ulu Timur</a> </h2>
          </div>
          <div class="categories__slider owl-carousel p-4">
            <?php foreach ($kuliner as  $value) {
              // Cek apakah kabupaten_id sama dengan 16
              if ($value->kabupaten_id == 12) {
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
		  <div class="section-title mt-3">
            <style>
              h2 {
                font-size: 28px;
              }
            </style>
            <h2><a href="<?php echo site_url('home/penukalabablematangilir') ?>">Kue dan Kuliner Khas Penukal Abab Lematang Ilir</a> </h2>
          </div>
          <div class="categories__slider owl-carousel p-4">
            <?php foreach ($kuliner as  $value) {
              // Cek apakah kabupaten_id sama dengan 16
              if ($value->kabupaten_id == 13) {
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
		  <div class="section-title mt-3">
            <style>
              h2 {
                font-size: 28px;
              }
            </style>
            <h2><a href="<?php echo site_url('home/lubuklinggau') ?>">Kue dan Kuliner Khas Lubuk Linggau</a> </h2>
          </div>
          <div class="categories__slider owl-carousel p-4">
            <?php foreach ($kuliner as  $value) {
              // Cek apakah kabupaten_id sama dengan 16
              if ($value->kabupaten_id == 14) {
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
		  <div class="section-title mt-3">
            <style>
              h2 {
                font-size: 28px;
              }
            </style>
            <h2><a href="<?php echo site_url('home/pagaralam') ?>">Kue dan Kuliner Khas Pagaralam</a> </h2>
          </div>
          <div class="categories__slider owl-carousel p-4">
            <?php foreach ($kuliner as  $value) {
              // Cek apakah kabupaten_id sama dengan 16
              if ($value->kabupaten_id == 15) {
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
		  <div class="section-title mt-3">
            <style>
              h2 {
                font-size: 28px;
              }
            </style>
           <h2><a href="<?php echo site_url('home/palembang') ?>">Kue dan Kuliner Khas Palembang</a> </h2>
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
		  <div class="section-title mt-3">
            <style>
              h2 {
                font-size: 28px;
              }
            </style>
            <h2><a href="<?php echo site_url('home/prabumulih') ?>">Kue dan Kuliner Khas Prabumulih</a> </h2>
          </div>
          <div class="categories__slider owl-carousel p-4">
            <?php foreach ($kuliner as  $value) {
              // Cek apakah kabupaten_id sama dengan 16
              if ($value->kabupaten_id == 17) {
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

</section>
<!-- Product Section End -->
<!-- The Modal
<div id="myModal" class="modal">
	<span class="close">&times;</span>
	<img class="modal-content" id="img01">
	<div id="caption"></div>
</div>

<script>
	var modal = document.getElementById("myModal");

	var img = document.getElementById("myImg");
	var modalImg = document.getElementById("img01");
	var captionText = document.getElementById("caption");
	img.onclick = function() {
		modal.style.display = "block";
		modalImg.src = this.src;
		captionText.innerHTML = this.alt;
	}

	var span = document.getElementsByClassName("close")[0];

	span.onclick = function() {
		modal.style.display = "none";
	}
</script> -->

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