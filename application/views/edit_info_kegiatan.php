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
                  <h2>Edit Info Kegiatan</h2>
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
              <form data-parsley-validate method="post" action="<?php echo base_url('info_kegiatan/simpan_edit') ?>" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg">
                    <div class="form_group p-2">
                      <label style="color: black;">Judul Kegiatan</label><br>
                      <input type="hidden" name="kegiatan_id" value="<?php echo (!empty($kegiatan[0]->kegiatan_id)) ? $kegiatan[0]->kegiatan_id : '' ?>">
                      <input type="text" name="judul_kegiatan" class="form-control" value="<?php echo (!empty($kegiatan[0]->judul_kegiatan)) ? $kegiatan[0]->judul_kegiatan : '' ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg">
                    <div class="form_group p-2">
                      <label style="color: black;">Tanggal Kegiatan</label><br>
                      <input type="date" name="tgl_kegiatan" class="form-control" value="<?php echo (!empty($kegiatan[0]->tgl_kegiatan)) ? $kegiatan[0]->tgl_kegiatan : '' ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg">
                    <div class="form_group p-2">
                      <label style="color: black;">Foto Kegiatan</label><br>
                      <img src="<?php echo base_url('fotokegiatan/' . $kegiatan[0]->foto_kegiatan); ?>" width="100" alt="">
                      <input type="hidden" name="old_img" value="<?php echo $kegiatan[0]->foto_kegiatan ?>">
                      <input type="file" name="foto_kegiatan" accept="image/*">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg">
                    <div class="form_group p-2">
                      <label style="color: black;">Keterangan Kegiatan</label><br>
                      <textarea name="ket_kegiatan" id="summernote" cols="" rows=""><?php echo $kegiatan[0]->ket_kegiatan ?></textarea>
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