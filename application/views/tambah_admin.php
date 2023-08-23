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
                  <h2>Tambah Admin</h2>
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
              <?php if (validation_errors() == true) :
              ?>
                <div class="alert alert-danger" role="alert">
                  <?php echo validation_errors(); ?>
                </div>
              <?php endif; ?>
              <?= $this->session->flashdata('message'); ?>

              <?= $this->session->flashdata('msg'); ?>
              <form data-parsley-validate method="post" action="<?php echo base_url('admin/simpandatatambahadmin') ?>">
                <div class="row">
                  <div class="col-lg">
                    <div class="form_group p-2">
                      <label style="color: black;">Username</label><br>
                      <input type="text" name="username_admin" id="username_admin" value="<?=set_value('username_admin')?>" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg">
                    <div class="form_group p-2">
                      <label style="color: black;">Password</label><br>
                      <input type="password" name="password_admin" id="password_admin" value="<?=set_value('password_admin')?>" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg">
                    <div class="form_group p-2">
                      <label style="color: black;">Nama Admin</label><br>
                      <input type="text" name="nama_admin" id="nama_admin" value="<?=set_value('nama_admin')?>" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg">
                    <div class="form_group p-2">
                      <label style="color: black;">Email Admin</label><br>
                      <input type="text" name="email_admin" id="email_admin" value="<?=set_value('email_admin')?>" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg">
                    <div class="form_group p-2">
                      <label style="color: black;">No HP</label><br>
                      <input type="text" name="nohp" id="nohp" value="<?=set_value('nohp')?>" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg">
                    <div class="form_group p-2">
                      <label style="color: black;">Jabatan</label><br>
                      <input type="text" name="jabatan" id="jabatan" value="<?=set_value('jabatan')?>" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center mt-4">
                  <div class="col">
                    <button class="btn btn-success" type="submit">Simpan</button>
                    <a class="btn btn-secondary float-right" href="<?php echo base_url('admin') ?>">Kembali</a>
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