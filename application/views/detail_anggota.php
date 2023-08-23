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
                  <h2>Detail Anggota</h2>
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
              <form data-parsley-validate method="post" action="#">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form_group p-2">
                      <label style="color: black;"><strong>Nama UMKM :</strong></label><br>
                      <label style="color: black;"><?php echo $anggota[0]->nama_umkm ?></label><br>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form_group p-2">
                      <label style="color: black;"><strong>Nama Owner :</strong></label><br>
                      <label style="color: black;"><?php echo $anggota[0]->owner ?></label><br>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg">
                    <div class="form_group p-2">
                      <label style="color: black;"><strong>Alamat :</strong></label><br>
                      <label style="color: black;"><?php echo $anggota[0]->alamat_umkm ?></label><br>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form_group p-2">
                      <label style="color: black;"><strong>Email :</strong></label><br>
                      <label style="color: black;"><?php echo $anggota[0]->email_umkm ?></label><br>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form_group p-2">
                      <label style="color: black;"><strong>No WhatsApp :</strong></label><br>
                      <label style="color: black;"><?php echo $anggota[0]->nowa ?></label><br>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form_group p-2">
                      <label style="color: black;"><strong>Username Instagram :</strong></label><br>
                      <label style="color: black;"><?php echo $anggota[0]->username_ig ?></label><br>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form_group p-2">
                      <label style="color: black;"><strong>Logo UMKM :</strong></label><br>
                      <img width="50%" class="mb-3" src="<?php echo base_url('fotoanggota/' . $anggota[0]->logo_umkm) ?>" alt="">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form_group p-2">
                      <label style="color: black;"><strong>Foto List Menu Produk UMKM :</strong></label><br>
                      <img width="50%" class="mb-3" src="<?php echo base_url('fotoanggota/' . $anggota[0]->list_menu) ?>" alt="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form_group p-2">
                      <label style="color: black;"><strong>Foto Tentang UMKM :</strong></label><br>
                      <img width="50%" class="mb-3" src="<?php echo base_url('fotoanggota/' . $anggota[0]->tempat_dalam_umkm) ?>" alt="">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form_group p-2">
                      <label style="color: black;"><strong>Foto Produk Halal MUI/BPOM :</strong></label><br>
                      <img width="50%" class="mb-3" src="<?php echo base_url('fotoanggota/' . $anggota[0]->halal_produk) ?>" alt="">
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center mt-4">
                  <div class="col">
                    <a href="<?php echo base_url('admin'); ?>"><button type="button" class="btn btn-block btn-sm btn-secondary">Kembali</button></a>
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
        @zahro_il
    });-->



<?php $this->load->view('footer') ?>