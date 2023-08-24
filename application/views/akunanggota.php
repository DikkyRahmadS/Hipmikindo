<?php $this->load->view('header') ?>
<link rel="stylesheet" href="<?php echo base_url() ?>aset/DataTables/datatables.min.css" type="text/css">
<!-- Hero Section Begin -->
<section class="hero">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="card border border-danger">
					<div class="card-header justify-content-center border-bottom border-danger" style="background-color: #cc7f0b;">
						<div class="row">
							<div class="col">
								<h4 class="text-bolder text-center" style="color: white; font-size:larger;">Data Akun</h4>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-lg">
								<div class="checkout__input">
									<div class="d-flex mb-2">
										<div class="text-sm mr-2">Email |</div>
										<div class="badge badge-dark p-2"><?php echo userdata()->email ?></div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg">
								<div class="checkout__input">
									<div class="d-flex mb-2">
										<div class="text-sm mr-2">DPC |</div>
										<div class="badge badge-dark p-2"><?php echo userdata()->dpc ?></div>
									</div>
								</div>
							</div>
						</div>
						<form data-parsley-validate method="post" action="<?php echo base_url('anggota/simpan_edits') ?>" enctype="multipart/form-data">
							<div class="row">
								<div class="col-lg">
									<div class="checkout__input">
										<div class="d-flex mb-2">
											<div class="text-sm mr-2">Username |</div>
											<input type="hidden" name="user_id" value="<?php echo userdata()->user_id ?>">
											<div class="badge badge-dark p-2"><?php echo userdata()->username ?></div>
										</div>
										<input type="text" name="username" placeholder="Silahkan Isi Username Terbaru..." required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg">
									<div class="checkout__input">
										<div class="d-flex mb-2">
											<div class="text-sm mr-2">Password Baru |</div>
											<div class="badge badge-dark p-2">***</div>
										</div>
										<input type="password" name="newpassword" placeholder="Silahkan Isi Password Terbaru..." required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg">
									<div class="checkout__input">
										<div class="d-flex mb-2">
											<div class="text-sm mr-2">Name |</div>
											<div class="badge badge-dark p-2"><?php echo userdata()->nama_lengkap ?></div>
										</div>
										<input type="text" name="nama_lengkap" placeholder="Silahkan Isi Nama Terbaru..." required>

									</div>
								</div>
							</div>
							<a href=""><button type="submit" class="btn btn-sm btn-block" style="background-color: #cc7f0b; color : white;">Perbarui</button></a>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="row justify-content-center">
					<div class="section-title mt-1">
						<style>
							h2 {
								font-size: 28px;
							}
						</style>
						<h2>Data UMKM Anggota</h2>
					</div>
				</div>
				<div class="row pl-3 pr-3 pb-3 justify-content-center">
					<div class="col-12">
						<div class="card border-danger">
							<div class="card-body">
								<?= $this->session->flashdata('msg'); ?>
								<?php if (validation_errors() == true) : ?>
									<div class="alert alert-danger" role="alert">
										<?php echo validation_errors(); ?>
									</div>
								<?php endif; ?>
								<div class="row mb-2">
									<div class="col text-right">
										<a href="<?php echo base_url('anggota/tambahanggota'); ?>"><button type="button" class="btn btn-sm btn-success" style="color : white;">Tambah</button></a>
									</div>
								</div>
								<div class="row pl-3 pr-3">
									<div class="table-responsive">
										<table id="dtanggota" class="table table-striped table-bordered display dt-responsive nowrap table-sm" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th class="th-sm">No</th>
													<th class="th-sm">Nama UMKM</th>
													<th class="th-sm">Nama Owner</th>
													<th class="th-sm">Logo UMKM</th>
													<th class="th-sm">Status</th>
													<th class="th-sm">Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php if (!empty($anggota)) :
													foreach ($anggota as $key => $ang) {
														if ($ang->status == 1) {
															$status = '<td><div class="badge badge-danger">Ditolak</div></td>';
														} elseif ($ang->status == 2) {
															$status = '<td><div class="badge badge-success">Diterima</div></td>';
														} else {
															$status = '<td><div class="badge badge-warning">Menunggu Konfirmasi</div></td>';
														}
														$no = $key + 1;
														echo '<tr>';
														echo '<td>' . $no . '</td>';
														echo '<td>' . $ang->nama_umkm . '</td>';
														echo '<td>' . $ang->owner . '</td>';
														echo '<td><img src="' . base_url('fotoanggota/' . $ang->logo_umkm) . '" alt="">';
														echo $status;
														echo '<td>
                                    <a href="' . base_url('anggota/editanggota/' . $ang->anggota_id) . '"class="btn btn-sm"style="background-color: #cc7f0b; color : white;">Edit</a>
                                    <a href="' . base_url('anggota/hapus/' . $ang->anggota_id) . '" class="btn btn-danger btn-sm">Hapus</a>              
                                  </td>';
														echo '</tr>';
													}
												endif; ?>
											</tbody>
										</table>
									</div>
								</div><br>
								<div class="row p-3 text-justify">
									<p>Note : </p>
									<p>1. Setelah menambahkan data UMKM, silahkan menghubungi CP di no <a href="https://api.whatsapp.com/send?phone=<?= 628117388330 ?>&text=Selamat pagi/siang/sore, saya (nama Anda) selaku owner dari (nama usaha Anda) ingin mendaftar sebagai anggota Hipmikindo Sumsel, kira - kira kapan saya bisa bertemu bunda untuk melakukan wawancara pendaftaran ?" target="_blank">+628117388330</a> untuk menentukan waktu wawancara bersama Ketua Umum atau pengurus Hipmikindo Sumsel.</p>
									<p>2. Setelah proses wawancara dilakukan, maka stasus UMKM akan diperbarui (Lihat ketentuan sesuai poin 3 dan 4).</p>
									<p>3. Jika status UMKM diterima, maka UMKM anda telah terdaftar sebagai anggota Hipmikindo Sumsel.</p>
									<p>4. Jika status UMKM ditolak, maka UMKM anda tidak terdaftar sebagai anggota Hipmikindo Sumsel.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
</section>
<!-- Hero Section End ZI-->

<!-- Hero Section End ZI-->
<script src="<?php echo base_url('aset/DataTables/datatables.min.js'); ?>"></script>

<script>
	$('#example').DataTable();
	$('#dtkegiatan').DataTable({
		responsive: true
	});
	$('#dtadmin').DataTable();
	$('#dtanggota').DataTable();
	$('#dtkuliner').DataTable();
</script>
<script type="text/javascript">
	$('#example1').DataTable();

	function edit_profil(id) {
		$('#modal_profil').modal('toggle');
		$('#profil_id').val($('#' + id).data('id'));
		$('#ket_umum').val($('#' + id).data('ket_umum'));
		$('#sejarah').val($('#' + id).data('sejarah'));
		$('#visi_misi').val($('#' + id).data('visi_misi'));
		$('#struktur').val($('#' + id).data('struktur'));
		$('#proker').val($('#' + id).data('proker'));
		$('#cabang').val($('#' + id).data('cabang'));
		$('#logo_aspenku').val($('#' + id).data('logo_aspenku'));
		$('#nama_aspenku').val($('#' + id).data('nama_aspenku'));
		$('#alamat_aspenku').val($('#' + id).data('alamat_aspenku'));
	}
</script>



<?php $this->load->view('footer') ?>
