<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="Ogani Template">
	<meta name="keywords" content="Ogani, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Hipmikindo Sumsel</title>
	<link rel="shortcut icon" href="<?php echo base_url() ?>aset/img/logoaspenku2.jpeg" />
	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Orienta&display=swap" rel="stylesheet">
	<!-- Css Styles -->
	<link rel="stylesheet" href="<?php echo base_url() ?>aset/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url() ?>aset/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url() ?>aset/css/elegant-icons.css" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url() ?>aset/css/nice-select.css" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url() ?>aset/css/jquery-ui.min.css" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url() ?>aset/css/owl.carousel.min.css" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url() ?>aset/css/slicknav.min.css" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url() ?>aset/css/style.css" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url() ?>aset/css/style2.css" type="text/css">

	<link rel="stylesheet" href="<?php echo base_url('aset/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('aset/summernote-0.8.18-dist/summernote-lite.min.css'); ?>">
	<script src="<?php echo base_url('aset/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?php echo base_url('aset/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>
	<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#date" ).datepicker({
      dateFormat: "dd-mm-yy"
    });
  } );
  </script> -->

	<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#summernote').summernote();
    });
  </script> -->

</head>

<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Humberger Begin -->
	<?php foreach ($profillama as $key => $row) { ?>
		<div class="humberger__menu__overlay"></div>
		<div class="humberger__menu__wrapper text-center">
			<div class="humberger__menu__logo">
				<a href="<?php echo base_url('home'); ?>"><img src="<?php echo base_url() ?>aset/img/logoaspenku2.jpeg" alt=""></a>
			</div>
			<div class="humberger__menu__widget">
				<div class="header__top__right__auth">
					<div class="header__top__right__language2">
						<?php if (userdata()) : ?>

							<a href="<?= base_url('logout'); ?>" onclick="return confirm('Apakah anda yakin ingin keluar ?')" style="color: black;"><i class="fa fa-sign-out" style="color: black;"></i> Logout</a>
						<?php else : ?>
							<a href="#" style="color: black;"><i class="fa fa-user" style="color: black;"></i> Login</a>
							<ul>
								<li style="color: black;"><a href="<?php echo base_url('login'); ?>">Login</a></li>
								<li style="color: black;"><a href="<?php echo base_url('home/daftarakun'); ?>">Daftar</a></li>
							</ul>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<nav class="humberger__menu__nav mobile-menu">
				<ul>
					<li><a href="<?php echo base_url('home'); ?>">Home</a></li>
					<li><a href="<?php echo base_url('profil'); ?>">Profil</a>
						<ul class="header__menu__dropdown">
							<li><a href="<?php echo base_url('profil'); ?>#sejarah">Sejarah</a></li>
							<li><a href="<?php echo base_url('profil'); ?>#visimisi">Visi Misi</a></li>
							<li><a href="<?php echo base_url('profil'); ?>#struktur">Struktur</a></li>
							<li><a href="<?php echo base_url('profil'); ?>#proker">Program Kerja</a></li>
							<li><a href="<?php echo base_url('profil'); ?>#cabang">Cabang</a></li>
						</ul>
					</li>
					<li><a href="<?php echo base_url('home/kegiatan'); ?>">Berita</a></li>
					<li><a href="<?php echo base_url('home/galeri'); ?>">Galeri</a></li>
					<li><a href="<?php echo base_url('home/kegiatan'); ?>">Kegiatan</a></li>
					<li><a href="<?php echo base_url('anggota'); ?>">Anggota</a></li>
					<?php if (userdata()) :
						if (userdata()->level == 2) : ?>
							<li><a href="<?php echo base_url('admin'); ?>">Admin</a></li>
						<?php else : ?>
							<li><a href="<?php echo base_url('anggota/akunanggota'); ?>">Akun</a></li>
					<?php endif;
					endif; ?>
				</ul>
			</nav>
			<div id="mobile-menu-wrap"></div>
			<div class="header__top__right__social">
				<img style="height: 20px;" src="<?php echo base_url() ?>aset/img/insta.png">
				<a href="#">@Hipmikindo_sumsel</a>
			</div>
			<div class="humberger__menu__contact text-center">
				<ul>
					<li>Hipmikindo Sumsel </li>
				</ul>
			</div>
		</div>
		<!-- Humberger End -->

		<!-- Header Section Begin -->
		<header class="header">
			<div class="header__top" style="background:linear-gradient( rgba(204, 127, 11, 0.784) 100%, rgba(204, 127, 11, 0.784)100%),url('<?php echo base_url() ?>aset/img/songket7.jpg'); ">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div class="header__top__left">
								<ul>


									<li id="clock-wrapper" style="color: white;"><?php date_default_timezone_set('Asia/Jakarta');
																					echo date('h:i:s'); ?></li>
									<li style="color: white;"><?php echo date('l, d-m-Y'); ?></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="header__top__right">
								<div class="header__top__right__language">
									<!-- <img src="<?php echo base_url() ?>aset/img/language.png" alt=""> -->
									<div style="color: white;">Sumatera Selatan</div>
									<!-- <span class="arrow_carrot-down" style="color: white;"></span>
                <ul>
                  <li style="color: white;"><a href="#">Spanis</a></li>
                  <li style="color: white;"><a href="#">English</a></li>
                </ul> -->
								</div>
								<div class="header__top__right__auth">
									<div class="header__top__right__language2">
										<?php if (userdata()) : ?>

											<a href="<?= base_url('logout'); ?>" onclick="return confirm('Apakah anda yakin ingin keluar ?')" style="color: white;"><i class="fa fa-sign-out" style="color: white;"></i> Logout</a>
										<?php else : ?>
											<a href="#" style="color: white;"><i class="fa fa-user" style="color: white;"></i> Login</a>
											<ul>
												<li style="color: white;"><a href="<?php echo base_url('login'); ?>">Login</a></li>
												<li style="color: white;"><a href="<?php echo base_url('home/daftarakun'); ?>">Daftar</a></li>
											</ul>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-1">
						<div class="header__logo text-center">
							<a href="<?php echo base_url('home'); ?>"><img src="<?php echo base_url() ?>aset/img/logoaspenku2.jpeg" alt=""></a>
						</div>
					</div>
					<div class="col-lg-3">
						<nav class="header__menu">
							<ul>
								<li><a style="font-size: 20px;" href="<?php echo base_url('home'); ?>">HIPMIKINDO SUMSEL</a></li>
							</ul>
						</nav>
					</div>
					<div class="col-lg-8">
						<nav class="header__menu text-right featured__controls">
							<ul>
								<style>
									a:hover {
										color: #a5240e;
									}
								</style>
								<li><a style="hover:black;" href="<?php echo base_url('home'); ?>">Home</a></li>
								<li><a href="<?php echo base_url('profil'); ?>">Profil</a>
									<ul class="header__menu__dropdown">
										<li><a href="<?php echo base_url('profil'); ?>#sejarah">Sejarah</a></li>
										<li><a href="<?php echo base_url('profil'); ?>#visimisi">Visi Misi</a></li>
										<li><a href="<?php echo base_url('profil'); ?>#struktur">Struktur</a></li>
										<li><a href="<?php echo base_url('profil'); ?>#proker">Program Kerja</a></li>
										<li><a href="<?php echo base_url('profil'); ?>#cabang">Cabang</a></li>
									</ul>
								</li>
								<li><a href="<?php echo base_url('home/berita'); ?>">Berita</a></li>
								<li><a href="<?php echo base_url('home/galeri'); ?>">Galeri</a></li>
								<li><a href="<?php echo base_url('home/kegiatan'); ?>">Kegiatan</a></li>
								<li><a href="<?php echo base_url('anggota'); ?>">Anggota</a></li>
								<?php if (userdata()) :
									if (userdata()->level == 2) : ?>
										<li><a href="<?php echo base_url('admin'); ?>">Admin</a></li>
									<?php else : ?>
										<li><a href="<?php echo base_url('anggota/akunanggota'); ?>">Akun</a></li>
								<?php endif;
								endif; ?>
							</ul>
						</nav>
					</div>
				</div>
				<div class="humberger__open">
					<i class="fa fa-bars"></i>
				</div>
			</div>
		<?php } ?>
		</header>
		<!-- Header Section End -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="<?php echo base_url('aset/summernote-0.8.18-dist/summernote-lite.min.js'); ?>"></script>

		<script type="text/javascript">
			setInterval(function() {
				var date = new Date();
				$('#clock-wrapper').html(
					date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds()
				);
			}, 500);
		</script>
