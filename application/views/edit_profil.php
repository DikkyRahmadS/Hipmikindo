<?php $this->load->view('header') ?>

<!-- Hero Section Begin -->
<section class="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 align-self-center">
        <div class="card border border-danger">
          <div class="card-body" style="background:linear-gradient( rgba(204, 127, 11, 0.784) 100%, rgba(204, 127, 11, 0.784)100%),url('<?php echo base_url() ?>aset/img/songket7.jpg'); ">
            <div class="row">
              <div class="col-lg">
                <div class="blog__details__hero__text">
                  <h2>Edit Data Profil</h2>
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
              <?php if (validation_errors() == true) {
              ?>

                <div class="alert alert-danger" role="alert">
                  <?php echo validation_errors(); ?>
                </div>
                <form data-parsley-validate method="post" action="<?php echo base_url('profil/simpan_edit') ?>" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-lg">
                      <div class="form_group p-2">
                        <label style="color: black;">Informasi Umum Tentang Asosiasi</label><br>
                        <input type="hidden" name="profil_id" class="form-control <?php echo (form_error('ket_umum')) ? 'is-invalid' : ''; ?>" value="<?php echo (!empty($profil['profil_id'])) ? $profil['profil_id'] : '' ?>">
                        <textarea name="ket_umum" id="summernote" cols="" rows="" value="<?php echo (!empty($profil['ket_umum'])) ? $profil['ket_umum'] : '' ?>"></textarea>
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
                  <div class="row">
                    <div class="col-lg">
                      <div class="form_group p-2">
                        <label style="color: black;">Sejarah Asosiasi</label><br>
                        <input type="text" name="sejarah" class="form-control <?php echo (form_error('sejarah')) ? 'is-invalid' : ''; ?>" value="<?php echo (!empty($profil['sejarah'])) ? $profil['sejarah'] : '' ?>">
                        <p><small class="text-danger"><?php echo form_error('sejarah'); ?></small></p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg">
                      <div class="form_group p-2">
                        <label style="color: black;">Visi Misi Asosiasi</label><br>
                        <input type="text" name="visi_misi" class="form-control <?php echo (form_error('visi_misi')) ? 'is-invalid' : ''; ?>" value="<?php echo (!empty($profil['visi_misi'])) ? $profil['visi_misi'] : '' ?>">
                        <p><small class="text-danger"><?php echo form_error('visi_misi'); ?></small></p>

                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg">
                      <div class="form_group p-2">
                        <label style="color: black;">Struktur Organisasi Asosiasi</label><br>
                        <input type="text" name="struktur" class="form-control <?php echo (form_error('struktur')) ? 'is-invalid' : ''; ?>" value="<?php echo (!empty($profil['struktur'])) ? $profil['struktur'] : '' ?>">
                        <p><small class="text-danger"><?php echo form_error('struktur'); ?></small></p>

                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg">
                      <div class="form_group p-2">
                        <label style="color: black;">Program Kerja Asosiasi</label><br>
                        <input type="text" name="proker" class="form-control <?php echo (form_error('proker')) ? 'is-invalid' : ''; ?>" value="<?php echo (!empty($profil['proker'])) ? $profil['proker'] : '' ?>">
                        <p><small class="text-danger"><?php echo form_error('proker'); ?></small></p>

                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg">
                      <div class="form_group p-2">
                        <label style="color: black;">Cabang Asosiasi</label><br>
                        <input type="text" name="cabang" class="form-control <?php echo (form_error('cabang')) ? 'is-invalid' : ''; ?>" value="<?php echo (!empty($profil['cabang'])) ? $profil['cabang'] : '' ?>">
                        <p><small class="text-danger"><?php echo form_error('cabang'); ?></small></p>

                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg">
                      <div class="form_group p-2">
                        <label style="color: black;">Logo Asosiasi</label><br>
                        <input type="file" name="logo_aspenku" accept="image/*" required>
                        <?php if (!empty($kegiatan[0]->foto_kegiatan)) : ?>
                          <img src="<?php echo base_url('fotoprofil/' . $kegiatan[0]->foto_kegiatan); ?>" width="100" alt="">
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg">
                      <div class="form_group p-2">
                        <label style="color: black;">Nama Asosiasi</label><br>
                        <input type="text" name="nama_aspenku" class="form-control <?php echo (form_error('nama_aspenku')) ? 'is-invalid' : ''; ?>" value="<?php echo (!empty($profil['nama_aspenku'])) ? $profil['nama_aspenku'] : '' ?>">
                        <p><small class="text-danger"><?php echo form_error('nama_aspenku'); ?></small></p>

                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg">
                      <div class="form_group p-2">
                        <label style="color: black;">Nama Singkatan Asosiasi</label><br>
                        <input type="text" name="singkatan_asosiasi" class="form-control <?php echo (form_error('singkatan_asosiasi')) ? 'is-invalid' : ''; ?>" value="<?php echo (!empty($profil['singkatan_asosiasi'])) ? $profil['singkatan_asosiasi'] : '' ?>">
                        <p><small class="text-danger"><?php echo form_error('singkatan_asosiasi'); ?></small></p>

                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg">
                      <div class="form_group p-2">
                        <label style="color: black;">Alamat Asosiasi</label><br>
                        <input type="text" name="alamat_aspenku" class="form-control <?php echo (form_error('alamat_aspenku')) ? 'is-invalid' : ''; ?>" value="<?php echo (!empty($profil['alamat_aspenku'])) ? $profil['alamat_aspenku'] : '' ?>">
                        <p><small class="text-danger"><?php echo form_error('alamat_aspenku'); ?></small></p>

                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center mt-4">
                    <div class="col">
                      <div class="form_group p-2">
                        <button class="btn float-left" style="background-color: #cc7f0b; color : white;" type="submit">Edit</button>
                        <a class="btn btn-secondary float-right" href="<?php echo base_url('admin') ?>">Kembali</a>
                      </div>
                    </div>
                  </div>
                </form>
              <?php
              } else {
              ?>
                <?= $this->session->flashdata('msg'); ?>

                <form data-parsley-validate method="post" action="<?php echo base_url('profil/simpan_edit') ?>" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-lg">
                      <div class="form_group p-2">
                        <label style="color: black;">Informasi Umum Tentang Asosiasi</label><br>
                        <input type="hidden" name="profil_id" class="form-control" value="<?php echo (!empty($profil[0]->profil_id)) ? $profil[0]->profil_id : '' ?>">
                        <textarea name="ket_umum" id="summernote" cols="" rows=""><?php echo (!empty($profil[0]->ket_umum)) ? $profil[0]->ket_umum : '' ?></textarea>
                        <script>
                          $('#summernote').summernote({
                            tabsize: 2,
                            height: 100
                          });
                        </script>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg">
                      <div class="form_group p-2">
                        <?php echo form_error('sejarah'); ?>
                        <label style="color: black;">Sejarah Asosiasi</label><br>
                        <textarea name="sejarah" id="summernote2" cols="" rows=""><?php echo (!empty($profil[0]->sejarah)) ?  $profil[0]->sejarah : '' ?></textarea>
                        <script>
                          $('#summernote2').summernote({
                            tabsize: 2,
                            height: 100
                          });
                        </script>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg">
                      <div class="form_group p-2">
                        <label style="color: black;">Visi Misi Asosiasi</label><br>
                        <textarea name="visi_misi" id="summernote3" cols="" rows=""><?php echo (!empty($profil[0]->visi_misi)) ?  $profil[0]->visi_misi : '' ?></textarea>
                        <script>
                          $('#summernote3').summernote({
                            tabsize: 2,
                            height: 100
                          });
                        </script>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg">
                      <div class="form_group p-2">
                        <label style="color: black;">Struktur Organisasi Asosiasi</label><br>
                        <textarea name="struktur" id="summernote4" cols="" rows=""><?php echo (!empty($profil[0]->struktur)) ?  $profil[0]->struktur : '' ?></textarea>
                        <script>
                          $('#summernote4').summernote({
                            tabsize: 2,
                            height: 100
                          });
                        </script>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg">
                      <div class="form_group p-2">
                        <label style="color: black;">Program Kerja Asosiasi</label><br>
                        <textarea name="proker" id="summernote5" cols="" rows=""><?php echo (!empty($profil[0]->proker)) ?  $profil[0]->proker : '' ?></textarea>
                        <script>
                          $('#summernote5').summernote({
                            tabsize: 2,
                            height: 100
                          });
                        </script>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg">
                      <div class="form_group p-2">
                        <label style="color: black;">Cabang Asosiasi</label><br>
                        <textarea name="cabang" id="summernote6" cols="" rows=""><?php echo (!empty($profil[0]->cabang)) ?  $profil[0]->cabang : '' ?></textarea>
                        <script>
                          $('#summernote6').summernote({
                            tabsize: 2,
                            height: 100
                          });
                        </script>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg">
                      <div class="form_group p-2">
                        <label style="color: black;">Logo Asosiasi</label><br>
                        <input type="file" name="logo_aspenku" accept="image/*">

                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg">
                      <div class="form_group p-2">
                        <label style="color: black;">Nama Asosiasi</label><br>
                        <textarea name="nama_aspenku" id="summernote7" cols="" rows=""><?php echo (!empty($profil[0]->nama_aspenku)) ?  $profil[0]->nama_aspenku : '' ?></textarea>
                        <script>
                          $('#summernote7').summernote({
                            tabsize: 2,
                            height: 100
                          });
                        </script>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg">
                      <div class="form_group p-2">
                        <label style="color: black;">Nama Singkatan Asosiasi</label><br>
                        <textarea name="singkatan_asosiasi" id="summernote8" cols="" rows=""><?php echo (!empty($profil[0]->singkatan_asosiasi)) ?  $profil[0]->singkatan_asosiasi : '' ?></textarea>
                        <script>
                          $('#summernote8').summernote({
                            tabsize: 2,
                            height: 100
                          });
                        </script>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg">
                      <div class="form_group p-2">
                        <label style="color: black;">Alamat Asosiasi</label><br>
                        <textarea name="alamat_aspenku" id="summernote9" cols="" rows=""><?php echo (!empty($profil[0]->alamat_aspenku)) ?  $profil[0]->alamat_aspenku : '' ?></textarea>
                        <script>
                          $('#summernote9').summernote({
                            tabsize: 2,
                            height: 100
                          });
                        </script>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg">
                      <div class="form_group p-2">
                        <label style="color: black;">Syarat Pendaftaran Anggota</label><br>
                        <textarea name="syarat_anggota" id="summernotes" cols="" rows=""><?php echo (!empty($profil[0]->syarat_anggota)) ?  $profil[0]->syarat_anggota : '' ?></textarea>
                        <script>
                          $('#summernotes').summernote({
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
                        <button class="btn float-left" style="background-color: #cc7f0b; color : white;" type="submit">Edit</button>
                        <a class="btn btn-secondary float-right" href="<?php echo base_url('admin') ?>">Kembali</a>
                      </div>
                    </div>
                  </div>
                </form>
              <?php
              } ?>



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