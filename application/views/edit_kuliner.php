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
                  <h2>Edit Data Kuliner</h2>
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
              <form data-parsley-validate method="post" action="<?php echo base_url('kuliner/simpan_edit') ?>" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg">
                    <div class="form_group p-2">
                      <label style="color: black;">Nama Kuliner</label><br>
                      <input type="hidden" name="kuliner_id" value="<?php echo (!empty($kuliner[0]->kuliner_id)) ? $kuliner[0]->kuliner_id : '' ?>">
                      <input type="text" name="nama_kuliner" class="form-control" value="<?php echo (!empty($kuliner[0]->nama_kuliner)) ? $kuliner[0]->nama_kuliner : '' ?>" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg">
                    <div class="form_group p-2">
                      <select name="kabupaten_id">
                        <?php foreach ($kabupaten as $row) : ?>
                          <?php
                          // Cek apakah kabupaten_id saat ini sama dengan id_kabupaten pada opsi
                          $selected = ($row->id_kabupaten == $kuliner[0]->kabupaten_id) ? 'selected' : '';
                          ?>
                          <option value="<?php echo $row->id_kabupaten; ?>" <?php echo $selected; ?>><?php echo $row->namakabupaten; ?></option>
                        <?php endforeach; ?>
                      </select>

                      <!-- <input type="text" value="<?php echo (!empty($kuliner[0]->kabupaten_id)) ? $kuliner[0]->kabupaten_id : '' ?>"> -->
                    </div>
                  </div>
                </div>


            </div>
            <div class="row">
              <div class="col-lg">
                <div class="form_group p-2">
                  <label style="color: black;">Foto Kuliner</label><br>
                  <input type="file" name="foto_kuliner" accept="image/*">
                  <img src="<?php echo base_url('fotokuliner/' . $kuliner[0]->foto_kuliner); ?>" width="100" alt="">
                  <input type="hidden" name="old_img" value="<?php echo $kuliner[0]->foto_kuliner ?>">
                </div>
              </div>
            </div>
            <div class="row justify-content-center mt-2">
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