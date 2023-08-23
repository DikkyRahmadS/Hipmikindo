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
                  <h2>Tambah Info Kegiatan</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="row-lg pl-3 pr-3 pb-3">
          <div class="card border-danger">
            <div class="card-body">
              <?= $this->session->flashdata('msg'); ?>

              <?php if (validation_errors() == true) : ?>
                <div class="alert alert-danger" role="alert">
                  <?php echo validation_errors(); ?>
                </div>
              <?php endif; ?>
              <form data-parsley-validate method="post" action="<?php echo base_url('info_kegiatan/simpan') ?>" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg">
                    <div class="form_group p-2">
                      <label style="color: black;">Judul Kegiatan</label><br>
                      <input type="text" name="judul_kegiatan" class="form-control" value="<?php echo (!empty($kegiatan[0]->judul_kegiatan)) ? $kegiatan[0]->judul_kegiatan : '' ?>" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg">
                    <div class="form_group p-2">
                      <label style="color: black;">Tanggal Kegiatan</label><br>
                      <input type="date" name="tgl_kegiatan" class="form-control" value="<?php echo (!empty($kegiatan[0]->tgl_kegiatan)) ? $kegiatan[0]->tgl_kegiatan : '' ?>" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg">
                    <div class="form_group p-2">
                      <label style="color: black;">Foto Kegiatan</label><br>
                      <input type="file" name="foto_kegiatan" accept="image/*" required>
                      <?php if (!empty($kegiatan[0]->foto_kegiatan)) : ?>
                        <img src="<?php echo base_url('upload/' . $kegiatan[0]->foto_kegiatan); ?>" width="100" alt="">
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg">
                    <div class="form_group p-2">
                      <label style="color: black;">Keterangan Kegiatan</label><br>
                      <textarea name="ket_kegiatan" id="summernote" cols="" rows="" value="<?php echo (!empty($kegiatan[0]->ket_kegiatan)) ? $kegiatan[0]->ket_kegiatan : '' ?>" required> </textarea>
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
                    <div class="form_group p-2">
                      <button class="btn btn-success" type="submit">Simpan</button>
                      <a class="btn btn-secondary float-right" href="<?php echo base_url('admin') ?>">Kembali</a>
                    </div>
                  </div>
                </div>
              </form>

              <!-- <script type="text/javascript/ZI">
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
          @zahro_il
        $('.dataTables_length').addClass('bs-select');
    });-->



<?php $this->load->view('footer') ?>