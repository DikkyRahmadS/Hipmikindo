<?php $this->load->view('header') ?>
<link rel="stylesheet" href="<?php echo base_url() ?>aset/simplelightbox-master/dist/simple-lightbox.css?v2.10.3" />

<!-- Blog Details Hero Begin -->
<section class="blog-details-hero" style="
background:linear-gradient( rgba(204, 127, 11, 0.784) 100%, rgba(204, 127, 11, 0.784)100%),url('<?php echo base_url() ?>aset/img/songket7.jpg'); ">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="blog__details__hero__text">
					<h2>A Good Snapshot Stops A Moment</h2>
					<h2>From Running Away</h2>
					<ul>
						<li>- Eudora Welty -</li>
					</ul>
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

		
		<div class="row" style="width: 100%;">
			<div class="col-lg col-md-7">
				<div class="product__discount">
					<div class="section-title product__discount__title">
						<h2>Galeri</h2>
					</div>
					<div class="row">
						<?php
						foreach ($infokegiatans as  $value) {
						?>
							<div class="col-lg-4 col-md-6 col-sm-6">
								<div class="product__item">
									<div class="product__item__pic set-bg small-demo ml-4">
										<img id="myImg" src="<?php echo base_url('fotokegiatan/' . $value->foto_kegiatan) ?>" alt="<?php echo $value->judul_kegiatan ?>">
										<ul class="product__item__pic__hover">
											<li><a rel="rel4" href="<?php echo base_url('fotokegiatan/' . $value->foto_kegiatan) ?>"><i class="fa fa-search-plus"></i></a></li>
										</ul>
									</div>
									<div class="product__item__text">
										<h6><a href="<?php echo base_url('fotokegiatan/' . $value->foto_kegiatan) ?>" target="_blank"><?php echo $value->judul_kegiatan ?></a></h6>
									</div>
								</div>
							</div>
						<?php   }; ?>
					</div>
					<div class="card" style="border: none;">
						<div class="card-footer text-center ml-4" style="background-color: #cc7f0b;">
							<div class="col-lg-12">
								<div class="product__pagination blog__pagination ml-4" style="color: white;">
									<?= $this->pagination->create_links(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
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