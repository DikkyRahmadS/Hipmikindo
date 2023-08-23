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
                  <p class="text-sm text-center" style="color: white; font-size:small;">Mau Join Hipmikindo Sumsel ?</p>
                  <h4 class="text-bolder text-center" style="color: white; font-size:larger;">Syarat dan Ketentuan</h4>
                </div>
              </div>
            </div>
            <div class="card-body">
              <p class="card-text" style="color: black;"> <?php echo $row->syarat_anggota ?></p>
              <a href="<?php echo base_url('anggota/tambahanggota'); ?>"><button type="button" class="btn btn-sm btn-block" style="background-color: #cc7f0b; color : white;">Daftar</button></a>
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
            <h2>Edit Data UMKM</h2>
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
                <form data-parsley-validate method="post" action="<?php echo base_url('anggota/simpan_edit') ?>" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form_group p-2">
                        <input type="hidden" name="anggota_id" value="<?php echo $anggota[0]->anggota_id ?>">
                        <label style="color: black;">Nama UMKM <span>*</span></label><br>
                        <input type="text" name="nama_umkm" class="form-control" value="<?php echo $anggota[0]->nama_umkm ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form_group p-2">
                        <label style="color: black;">Nama Owner <span>*</span></label><br>
                        <input type="text" class="form-control" name="owner" value="<?php echo $anggota[0]->owner ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form_group p-2">
                        <label style="color: black;">Logo UMKM <span>*</span></label><br>
                        <img width="50%" class="mb-3" src="<?php echo base_url('fotoanggota/' . $anggota[0]->logo_umkm) ?>" alt="">
                        <input type="file" class="form-control" name="logo_umkm" accept="image/*">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form_group p-2">
                        <label style="color: black;">Email UMKM<span>*</span></label><br>
                        <input type="text" class="form-control" name="email_umkm" value="<?php echo $anggota[0]->email_umkm ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form_group p-2">
                        <label style="color: black;">No WhatsApp <span>*</span></label><br>
                        <input type="text" class="form-control" name="nowa" value="<?php echo $anggota[0]->nowa ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form_group p-2">
                        <label style="color: black;">Username Instagram <span>*</span></label><br>
                        <input type="text" class="form-control" name="username_ig" value="<?php echo $anggota[0]->username_ig ?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg">
                      <div class="form_group p-2">
                        <label style="color: black;">Alamat <span>*</span></label><br>
                        <textarea name="alamat_umkm" id="summernote" cols="" rows=""><?php echo $anggota[0]->alamat_umkm ?></textarea>
                        <script>
                          $('#summernote').summernote({
                            placeholder: 'Hello Bootstrap 4',
                            tabsize: 2,
                            height: 100
                          });
                        </script>
                      </div>
                    </div>

                  </div>
                  <div class="row justify-content-center mt-4">
                    <div class="col">
                      <a><button type="submit" class="btn btn-sm" style="background-color: #cc7f0b; color : white;">Perbarui</button></a>
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4">
                    <label for="">Foto List Menu</label>
                    <img width="50%" class="mb-3" src="<?php echo base_url('fotoanggota/' . $anggota[0]->list_menu) ?>" alt="">

                    <form action="<?php echo base_url('anggota/simpan_edit') ?>" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="anggota_id" value="<?php echo $anggota[0]->anggota_id ?>">
                      <input type="hidden" name="nama_umkm" value="<?php echo $anggota[0]->nama_umkm ?>">
                      <input type="hidden" name="email_umkm" value="<?php echo $anggota[0]->email_umkm ?>">
                      <input type="hidden" name="owner" value="<?php echo $anggota[0]->owner ?>">
                      <input type="hidden" name="alamat_umkm" value="<?php echo $anggota[0]->alamat_umkm ?>">
                      <input type="hidden" name="nowa" value="<?php echo $anggota[0]->nowa ?>">
                      <input type="hidden" name="username_ig" value="<?php echo $anggota[0]->username_ig ?>">
                      <input class="form-control" type="file" name="list_menu">
                      <button type="submit" class="btn btn-sm mt-2" style="background-color: #cc7f0b; color : white;">Perbarui</button>
                    </form>
                  </div>
                  <div class="col-sm-4">
                    <label for="">Foto Tentang UMKM</label>
                    <img width="40%" class="mb-3" src="<?php echo base_url('fotoanggota/' . $anggota[0]->tempat_dalam_umkm) ?>" alt="">
                    <form action="<?php echo base_url('anggota/simpan_edit') ?>" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="anggota_id" value="<?php echo $anggota[0]->anggota_id ?>">
                      <input type="hidden" name="nama_umkm" value="<?php echo $anggota[0]->nama_umkm ?>">
                      <input type="hidden" name="email_umkm" value="<?php echo $anggota[0]->email_umkm ?>">
                      <input type="hidden" name="owner" value="<?php echo $anggota[0]->owner ?>">
                      <input type="hidden" name="alamat_umkm" value="<?php echo $anggota[0]->alamat_umkm ?>">
                      <input type="hidden" name="nowa" value="<?php echo $anggota[0]->nowa ?>">
                      <input type="hidden" name="username_ig" value="<?php echo $anggota[0]->username_ig ?>">
                      <input class="form-control" type="file" name="tempat_dalam_umkm">
                      <button type="submit" class="btn btn-sm mt-2" style="background-color: #cc7f0b; color : white;">Perbarui</button>
                    </form>
                  </div>

                  <div class="col-sm-4">
                    <label for="">Foto Produk Halal MUI/BPOM</label>
                    <img width="40%" class="mb-3" src="<?php echo base_url('fotoanggota/' . $anggota[0]->halal_produk) ?>" alt="">

                    <form action="<?php echo base_url('anggota/simpan_edit') ?>" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="anggota_id" value="<?php echo $anggota[0]->anggota_id ?>">
                      <input type="hidden" name="nama_umkm" value="<?php echo $anggota[0]->nama_umkm ?>">
                      <input type="hidden" name="email_umkm" value="<?php echo $anggota[0]->email_umkm ?>">
                      <input type="hidden" name="owner" value="<?php echo $anggota[0]->owner ?>">
                      <input type="hidden" name="alamat_umkm" value="<?php echo $anggota[0]->alamat_umkm ?>">
                      <input type="hidden" name="nowa" value="<?php echo $anggota[0]->nowa ?>">
                      <input type="hidden" name="username_ig" value="<?php echo $anggota[0]->username_ig ?>">
                      <input class="form-control" type="file" name="halal_produk">
                      <button type="submit" class="btn btn-sm mt-2" style="background-color: #cc7f0b; color : white;">Perbarui</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Hero Section End -->



<?php $this->load->view('footer') ?>