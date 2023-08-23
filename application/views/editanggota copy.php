<?php $this->load->view('header') ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

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
            <h2>Edit Data</h2>
          </div>
        </div>
        <div class="row pl-3 pr-3 pb-3 justify-content-center">
          <div class="col-12">
            <div class="card border-danger">
              <div class="card-body">
                <form data-parsley-validate method="post" action="<?php echo base_url('anggota/simpan_edit') ?>" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form_group p-2">
                        <input type="hidden" name="anggota_id" value="<?php echo $anggota[0]->anggota_id ?>">
                        <label style="color: black;">Nama UMKM <span>*</span></label><br>
                        <input type="text" name="nama_umkm" value="<?php echo $anggota[0]->nama_umkm ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form_group p-2">
                        <label style="color: black;">Nama Owner <span>*</span></label><br>
                        <input type="text" name="owner" value="<?php echo $anggota[0]->owner ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form_group p-2">
                        <label style="color: black;">Logo UMKM <span>*</span></label><br>
                        <input type="file" name="logo_umkm"  accept="image/*">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form_group p-2">
                        <label style="color: black;">Email UMKM<span>*</span></label><br>
                        <input type="text" name="email_umkm" value="<?php echo $anggota[0]->email_umkm ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form_group p-2">
                        <label style="color: black;">No WhatsApp <span>*</span></label><br>
                        <input type="text" name="nowa" value="<?php echo $anggota[0]->nowa ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form_group p-2">
                        <label style="color: black;">Username Instagram <span>*</span></label><br>
                        <input type="text" name="username_ig" value="<?php echo $anggota[0]->username_ig ?>">
                      </div>
                    </div>
                  </div>
                 
                  <div class="row">
                    <div class="col-lg">
                      <div class="form_group p-2">
                        <label style="color: black;">Alamat <span>*</span></label><br>
                     <textarea name="alamat_umkm" id="" cols="30" rows="10"></textarea>
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
                    <form action="<?php echo base_url('anggota/simpan_edit_fotolistmenu') ?>" method="post" enctype="multipart/form-data">
                      <input type="file">
                      <button type="submit" class="btn btn-sm mt-2" style="background-color: #cc7f0b; color : white;">Perbarui</button>
                    </form>
                  </div>
                  <div class="col-sm-4">
                    <label for="">Foto Tentang UMKM</label>
                    <input type="file">
                    <form action="">
                      <button type="submit" class="btn btn-sm mt-2" style="background-color: #cc7f0b; color : white;">Perbarui</button>
                    </form>
                  </div>

                  <div class="col-sm-4">
                    <label for="">Foto Lainnya Tentang UMKM</label>
                    <input type="file">
                    <form action="">
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


<script>
  $(document).ready(function() {
    $('#summernote').summernote();
  });
</script>
<?php $this->load->view('footer') ?>