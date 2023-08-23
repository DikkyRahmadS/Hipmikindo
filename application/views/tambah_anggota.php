<?php $this->load->view('header') ?>

<!-- Hero Section Begin -->
<section class="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 align-self-center">
        <div class="card border border-danger">
          <div class="card-body" style="
background:linear-gradient( rgba(204, 127, 11, 0.784) 100%, rgba(204, 127, 11, 0.784)100%),url('<?php echo base_url() ?>aset/img/songket7.jpg'); ">
            <div class="row">
              <div class="col-lg">
                <div class="blog__details__hero__text">
                  <h2>Tambah Anggota</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <?php if (validation_errors() == true) {
          echo validation_errors();
        }
        ?>
        <?= $this->session->flashdata('message'); ?>

        <?= $this->session->flashdata('msg'); ?>
        <div class="row-lg pl-3 pr-3 pb-3">
          <div class="card border-danger">
            <div class="card-body">
              <form data-parsley-validate method="post" action="<?php echo base_url() ?>anggota/simpandatatambahanggota" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form_group p-2">
                      <label style="color: black;">Nama UMKM <span>*</span></label><br>
                      <input type="text" name="nama_umkm" required>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form_group p-2">
                      <label style="color: black;">Nama Owner <span>*</span></label><br>
                      <input type="text" name="owner" required>
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
                      <input type="text" name="email_umkm" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form_group p-2">
                      <label style="color: black;">No WhatsApp <span>*</span></label><br>
                      <input type="text" name="nowa" required>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form_group p-2">
                      <label style="color: black;">Username Instagram <span>*</span></label><br>
                      <input type="text" name="username_ig" required>
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
                      <textarea name="alamat_umkm" id="summernote" cols="" rows="" required></textarea>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form_group p-2">
                      <label style="color: black;">Foto Produk Halal MUI/BPOM <span></span></label><br>
                      <input type="file" name="halal_produk" accept="image/*">
                    </div>
                  </div>
                </div>
                <div class="row p-3">
                  <div class="form_group p-2">
                    <label style="color: black;">Catatan : </label>
                    <p>1. Tanda * berarti wajib diisi</p>
                    <p>2. Ukuran maksimal foto yang dapat diupload adalah 5 MB dengan format foto .png/jpg/jpeg/gif, jika tidak sesuai ketentuan ini maka data UMKM Anda tidak akan terdaftar</p>
                  </div>
                </div>
                <div class="row justify-content-center mt-4">
                  <div class="col">
                    <a><button type="submit" class="btn btn-sm btn-block" style="background-color: #cc7f0b; color : white;">Daftar</button></a>
                  </div>
                </div>
              </form>
              <!-- <script type="text/javascript">
                $('#dtBasicExample').DataTable();
              </script> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Hero Section End -->


<!-- Hero Section End 
//Table Pagination
    $(document).ready(function () {
        $('#dtBasicExample').DataTable({
            "paging": true // true to disable pagination (or any other option)
          });
        $('.dataTables_length').addClass('bs-select');
    });-->



<?php $this->load->view('footer') ?>