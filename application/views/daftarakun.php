<?php $this->load->view('header') ?>

<section class="breadcrumb-section2">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-5 align-self-center">
				<img src="<?php echo base_url() ?>aset/img/logoaspenku2.jpeg" alt="">
			</div>
			<div class="col-sm-5">
				<?php if (validation_errors() == true) {
					echo validation_errors();
				}
				?>
				<?= $this->session->flashdata('msg'); ?>
				<div class="card border border-danger">
					<div class="card-header justify-content-center border-bottom border-danger" style="background-color: #cc7f0b;">
						<div class="row">
							<div class="col text-center">
								<h2 style="color: white;">Daftar Akun </h2>
							</div>
						</div>
					</div>
					<div class="card-body">
						<form data-parsley-validate method="post" action="<?php echo base_url() ?>home/registration" enctype="multipart/form-data">
							<div class="row">
								<div class="col">
									<div class="checkout__input">
										<p>Username<span>*</span></p>
										<input type="text" name="username" class="form-control" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="checkout__input">
										<p>Password<span>*</span></p>
										<input type="password" name="password" class="form-control" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="checkout__input">
										<p>Nama Lengkap<span>*</span></p>
										<input type="text" name="nama_lengkap" class="form-control" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="checkout__input">
										<p>Email<span>*</span></p>
										<input type="text" name="email" class="form-control" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="checkout__input">
										<p>Domisili DPC<span>*</span></p>
										<select name="dpc" class="col-md-12" required>
											<option value="">-- Pilih DPC --</option>
											<option value="DPC Kabupaten Ogan Komering Ulu">DPC Kabupaten Ogan Komering Ulu</option>
											<option value="DPC Kabupaten Ogan Komering Ilir">DPC Kabupaten Ogan Komering Ilir</option>
											<option value="DPC Kabupaten Muara Enim">DPCKabupaten Muara Enim</option>
											<option value="DPC Kabupaten Lahat">DPC Kabupaten Lahat</option>
											<option value="DPC Kabupaten Musi ">DPC Kabupaten Musi </option>
											<option value="DPC Kabupaten Musi Banyuasin">DPC Kabupaten Musi Banyuasin</option>
											<option value="DPC Kabupaten Banyuasin">DPC Kabupaten Banyuasin</option>
											<option value="DPC Kabupaten OKU Selatan">DPC Kabupaten OKU Selatan</option>
											<option value="DPC Kabupaten">DPC Kabupaten</option>
											<option value="DPC Kabupaten Ogan Ilir">DPC Kabupaten Ogan Ilir</option>
											<option value="DPC Kabupaten Empat Lawang">DPC Kabupaten Empat Lawang</option>
											<option value="DPC Kabupaten Penukal Abab Lematang Ilir">DPC Kabupaten Penukal Abab Lematang Ilir</option>
											<option value="DPC Kabupaten Musi Rawas Utara">DPC Kabupaten Musi Rawas Utara</option>
											<option value="DPC Kota Lubuklinggau">DPC Kota Lubuklinggau</option>
											<option value="DPC Kota Pagar Alam">DPC Kota Pagar Alam</option>
											<option value="DPC Kota Palembang">DPC Kota Palembang</option>
											<option value="DPC Kota Prabumulih">DPC Kota Prabumulih</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row justify-content-center mt-4">
								<div class="col">
									<button class="btn btn-sm btn-block" style="background-color: #cc7f0b; color : white;" type="submit">Daftar</button>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col">
									<div class="text-center">
										<p>Sudah punya akun? Silahkan klik <span class="text-bold"><a href="<?php echo base_url('login'); ?>">Login</a> ! </span></p>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>
<!-- Blog Section End -->
<?php $this->load->view('footer') ?>
