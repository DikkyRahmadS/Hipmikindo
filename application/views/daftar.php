<?php $this->load->view('header') ?>

<!-- Hero Section Begin -->
<section class="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card border border-danger">
          <?php foreach ($profillama as $key => $row) { ?>
            <div class="card-header justify-content-center border-bottom border-danger" style="background-color: #cc7f0b;">
              <div class="row">
                <div class="col">
                  <p class="text-sm text-center" style="color: white; font-size:small;">Ingin menjadi bagian dari <?php echo $row->singkatan_asosiasi ?></p>
                  <h4 class="text-bolder text-center" style="color: white; font-size:larger;">Syarat dan Ketentuan</h4>
                </div>
              </div>
            </div>
            <div class="card-body">
              <p class="card-text" style="color: black;"> <?php echo $row->syarat_anggota ?></p>
              <a href=""><button type="button" class="btn btn-sm btn-block" style="background-color: #cc7f0b; color : white;">Daftar</button></a>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="col-lg">
        <div class="row justify-content-center">
          <div class="section-title mt-1">
            <style>
              h2 {
                font-size: 28px;
              }
            </style>
            <h2>Daftar Sebagai Anggota</h2>
          </div>
        </div>
        <div class="row pl-3 pr-3 pb-3 justify-content-center">
          <div class="col-12">
            <?php if (validation_errors() == true) {
              echo validation_errors();
            }
            ?>
            <?= $this->session->flashdata('message'); ?>

            <?= $this->session->flashdata('msg'); ?>
            <div class="card border-danger">
              <div class="card-body">
                <form data-parsley-validate method="post" action="<?php echo base_url() ?>home/simpandatadaftaranggota" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form_group p-2">
                        <label style="color: black;">Nama UMKM <span>*</span></label><br>
                        <input type="text" name="nama_umkm">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form_group p-2">
                        <label style="color: black;">Nama Owner <span>*</span></label><br>
                        <input type="text" name="owner">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form_group p-2">
                        <label style="color: black;">Logo UMKM <span>*</span></label><br>
                        <input type="file" name="logo_umkm" accept="image/*" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form_group p-2">
                        <label style="color: black;">Email UMKM<span>*</span></label><br>
                        <input type="text" name="email_umkm">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form_group p-2">
                        <label style="color: black;">No WhatsApp <span>*</span></label><br>
                        <input type="text" name="nowa">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form_group p-2">
                        <label style="color: black;">Username Instagram <span>*</span></label><br>
                        <input type="text" name="username_ig">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form_group p-2">
                        <label style="color: black;">Foto List Menu Produk UMKM <span>*</span></label><br>
                        <input type="file" name="list_menu" accept="image/*" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form_group p-2">
                        <label style="color: black;">Foto Tentang UMKM <span>*</span></label><br>
                        <input type="file" name="tempat_dalam_umkm" accept="image/*" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg">
                      <div class="form_group p-2">
                        <label style="color: black;">Alamat <span>*</span></label><br>
                        <textarea name="alamat_umkm" id="summernote" cols="" rows=""></textarea>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form_group p-2">
                        <label style="color: black;">Foto Lainnya Tentang UMKM <span>*</span></label><br>
                        <input type="file" name="halal_produk" accept="image/*" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form_group">
                        <label for="text" style="color: black;">Pilih Kabupaten</label><br>
                          <select name="kabupaten_id" class="form-select">
                            <option value="">Pilih Kabupaten</option>
                            <?php foreach ($kabupaten as $row) : ?>
                              <option value="<?php echo $row->id_kabupaten; ?>"><?php echo $row->namakabupaten; ?></option>
                            <?php endforeach; ?>
                          </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form_group">
                        <label for="text" style="color: black;">Pilih Kategori</label><br>
                          <select name="kategori" class="form-select">
                            <option value="">Pilih Kategori</option>
                            <option value="Kuliner">Kuliner</option>
                            <option value="Wisata">Wisata</option>
                            <option value="Kerajinan">Kerajinan</option>
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center mt-4">
                    <div class="col">
                      <a><button type="submit" class="btn btn-sm" style="background-color: #cc7f0b; color : white;">Daftar</button></a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- Hero Section End -->



<?php $this->load->view('footer') ?>