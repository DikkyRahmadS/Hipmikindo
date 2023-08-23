<?php $this->load->view('header') ?>
<link rel="stylesheet" href="<?php echo base_url() ?>aset/DataTables/datatables.min.css" type="text/css">
<!-- Hero Section Begin -->
<section class="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card border border-danger">
          <div class="card-header justify-content-center border-bottom border-danger" style="background-color: #cc7f0b;">
            <div class="row">
              <div class="col">
                <h4 class="text-bolder text-center" style="color: white; font-size:larger;">Data Akun Admin</h4>
              </div>
            </div>
          </div>
          <div class="card-body">
            <?php
            foreach ($admins as $rows) {
            ?>
              <div class="row">
                <div class="col-lg">
                  <div class="checkout__input">
                    <div class="d-flex mb-2">
                      <div class="text-sm mr-2">Email |</div>
                      <div class="badge badge-dark p-2"><?php echo $rows->email ?></div>
                    </div>
                  </div>
                </div>
              </div>
              <form data-parsley-validate method="post" action="<?php echo base_url('admin/simpan_edit') ?>" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-lg">
                    <div class="checkout__input">
                      <div class="d-flex mb-2">
                        <div class="text-sm mr-2">Username |</div>
                        <div class="badge badge-dark p-2"><?php echo $rows->username ?></div>
                      </div>
                      <input type="hidden" name="admin_id" value="<?php echo $rows->admin_id ?>">
                      <input type="hidden" name="user_id" value="<?php echo $rows->user_id ?>">
                      <input type="text" name="username" placeholder="Silahkan Isi Username Terbaru..." required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg">
                    <div class="checkout__input">
                      <div class="d-flex mb-2">
                        <div class="text-sm mr-2">Password Baru |</div>
                        <div class="badge badge-dark p-2">***</div>
                      </div>
                      <input type="password" name="newpassword" placeholder="Silahkan Isi Password Terbaru..." required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg">
                    <div class="checkout__input">
                      <div class="d-flex mb-2">
                        <div class="text-sm mr-2">Nama |</div>
                        <div class="badge badge-dark p-2"><?php echo $rows->nama_lengkap ?></div>
                      </div>
                      <input type="text" name="nama_lengkap" placeholder="Silahkan Isi Nama Terbaru..." required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg">
                    <div class="checkout__input">
                      <div class="d-flex mb-2">
                        <div class="text-sm mr-2">No HP |</div>
                        <div class="badge badge-dark p-2"><?php echo $rows->nohp ?></div>
                      </div>
                      <input type="text" name="nohp" placeholder="Silahkan Isi No HP Terbaru..." required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg">
                    <div class="checkout__input">
                      <div class="d-flex mb-2">
                        <div class="text-sm mr-2">Jabatan |</div>
                        <div class="badge badge-dark p-2"><?php echo $rows->jabatan ?></div>
                      </div>
                      <input type="text" name="jabatan" placeholder="Silahkan Isi Jabatan Terbaru..." required>
                    </div>
                  </div>
                </div>
                <a href=""><button type="submit" class="btn btn-sm btn-block" style="background-color: #cc7f0b; color : white;">Perbarui</button></a>
              </form>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="col-lg-8 pt-2">
        <div class="row-lg pl-3 pr-3 pb-3">
          <div class="card border-danger">
            <div class="card-body">
              <?= $this->session->flashdata('msg'); ?>
              <?php if (validation_errors() == true) : ?>
                <div class="alert alert-danger" role="alert">
                  <?php echo validation_errors(); ?>
                </div>
              <?php endif; ?>
              <div class="row mb-4">
                <div class="col text-left">
                  <h4>Data Profil</h4>
                </div>

                <div class="col text-right">
                  <?php foreach ($profil as $post) : ?>
                    <a href=" <?= base_url('profil/edit/') . $post->profil_id; ?>" class="btn btn-sm" style="background-color: #cc7f0b; color : white;">Edit</a>
                  <?php endforeach ?>
                </div>
              </div>
              <hr>
              <div class="row mb-2">
                <div class="col text-left">
                  <h4>Data Info Kegiatan</h4>
                </div>
                <div class="col text-right">
                  <a href="<?php echo base_url('info_kegiatan/tambahinfokegiatan'); ?>"><button type="button" class="btn btn-sm btn-success" style="color : white;">Tambah</button></a>
                </div>
              </div>
              <div class="row pl-3 pr-3">
                <div class="table-responsive">
                  <table id="dtkegiatan" class="table table-striped table-bordered display dt-responsive nowrap  table-sm" width="100%">
                    <thead>
                      <tr>
                        <th class="th-sm">No</th>
                        <th class="th-sm">Judul Kegiatan</th>
                        <th class="th-sm">Tgl Kegiatan</th>
                        <th class="th-sm">Ket</th>
                        <th class="th-sm">Foto Kegiatan</th>
                        <th class="th-sm">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($kegiatan)) :
                        foreach ($kegiatan as $key => $keg) {
                          $no = $key + 1;
                          echo '<tr>';
                          echo '<td>' . $no . '</td>';
                          echo '<td>' . $keg->judul_kegiatan . '</td>';
                          echo '<td>' . $keg->tgl_kegiatan . '</td>';
                          echo '<td>' . $keg->ket_kegiatan . '</td>'; ?>
                          <td><img width="100px" src="<?php echo base_url('fotokegiatan/' . $keg->foto_kegiatan) ?>"></td>
                      <?php
                          echo '<td>
                                  <a href="' . base_url('info_kegiatan/edit/' . $keg->kegiatan_id) . '"class="btn btn-sm" style="background-color: #cc7f0b; color : white;">Edit</a>
                                  <a href="' . base_url('info_kegiatan/hapus/' . $keg->kegiatan_id) . '" class="btn btn-danger btn-sm">Hapus</a>              
                                </td>';
                          echo '</tr>';
                        }
                      endif; ?>
                    </tbody>
                  </table>
                </div>
              </div><br>
              <hr>
              <div class="row mb-2">
                <div class="col text-left">
                  <h4>Data Anggota</h4>
                </div>
                <!-- <div class="col text-right-zahro-ilbatul">
                  <a href="<?php echo base_url('anggota/tambahanggota'); ?>"><button type="button" class="btn btn-sm btn-success" style="color : white;">Tambah</button></a>
                </div> -->
              </div>
              <div class="row pl-3 pr-3">
                <div class="table-responsive">
                  <table id="dtanggota" class="table table-striped table-bordered display dt-responsive nowrap table-sm" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th class="th-sm">No</th>
                        <th class="th-sm">Nama UMKM</th>
                        <th class="th-sm">Nama Owner</th>
                        <th class="th-sm">Logo UMKM</th>
                        <th class="th-sm">Konfirmasi</th>
                        <th class="th-sm">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php if (!empty($anggota)) :
                        foreach ($anggota as $key => $ang) {
                          $no = $key + 1;
                      ?>
                          <tr>
                            <td> <?php echo $no ?> </td>
                            <td> <?php echo $ang->nama_umkm ?> </td>
                            <td> <?php echo $ang->owner ?></td>
                            <td><img width="100px" src=" <?php echo base_url('fotoanggota/' . $ang->logo_umkm) ?>"></td>
                            <?php if ($ang->status == 0) { ?>
                              <td>

                                <form id="acc" action="<?php echo base_url('anggota/respon/' . $ang->anggota_id) ?>" method="POST">
                                  <input type="hidden" value="2" name="status">
                                  <button type="submit" class="btn btn-success btn-sm mb-1" href="#">
                                    ACC
                                  </button>
                                </form>

                                <form id="tolak" action="<?php echo base_url('anggota/respon/' . $ang->anggota_id) ?>" method="POST">
                                  <input type="hidden" value="1" name="status">
                                  <button type="submit" class="btn btn-danger btn-sm" href="#">
                                    TOLAK
                                  </button>
                                </form>
                              </td>
                            <?php } else {
                              if ($ang->status == 1) {
                                $status = '<td><div class="badge badge-danger">Ditolak</div></td>';
                              } elseif ($ang->status == 2) {
                                $status = '<td><div class="badge badge-success">Diterima</div></td>';
                              } else {
                                $status = '<td><div class="badge badge-warning">Menunggu Konfirmasi</div></td>';
                              }
                              echo $status;
                            }
                            ?>
                            <td>
                              <a href="<?php echo base_url('anggota/detailanggota/' . $ang->anggota_id) ?>" class="btn btn-info btn-sm">Detail</a>
                              <a href="<?php echo base_url('admin/hapusanggota/' . $ang->anggota_id) ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                          </tr>
                      <?php   }
                      endif; ?>
                      <script>
                        $('#button_acc').on('click', function() {
                          $('#acc').submit();
                        });
                        $('#button_tolak').on('click', function() {
                          $('#tolak').submit();
                        });
                      </script>
                    </tbody>
                  </table>
                </div>
              </div><br>
              <hr>
              <div class="row mb-2">
                <div class="col text-left">
                  <h4>Data Admin</h4>
                </div>
                <div class="col text-right">
                  <a href="<?php echo base_url('admin/tambahadmin'); ?>"><button type="button" class="btn btn-sm btn-success" style="color : white;">Tambah</button></a>
                </div>
              </div>
              <div class="row pl-3 pr-3">
                <div class="table-responsive">
                  <table id="dtadmin" class="table table-striped table-bordered display dt-responsive nowrap  table-sm" style="width: 100%;">
                    <thead>
                      <tr>
                        <th class="th-sm">No</th>
                        <th class="th-sm">Nama Admin</th>
                        <th class="th-sm">Email</th>
                        <th class="th-sm">Jabatan</th>
                        <th class="th-sm">No HP</th>
                        <th class="th-sm">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($admin)) :
                        foreach ($admin as $key => $adm) {
                          $no = $key + 1;
                          echo '<tr>';
                          echo '<td>' . $no . '</td>';
                          echo '<td>' . $adm->nama_admin . '</td>';
                          echo '<td>' . $adm->email_admin . '</td>';
                          echo '<td>' . $adm->jabatan . '</td>';
                          echo '<td>' . $adm->nohp . '</td>';
                          echo '<td>
                                    <a href="' . base_url('admin/hapus/' . $adm->user_id) . '" class="btn btn-danger btn-sm">Hapus</a>              
                                  </td>';
                          echo '</tr>';
                        }
                      endif; ?>
                    </tbody>
                  </table>
                </div>
              </div><br>
              <hr>
              <div class="row mb-2">
                <div class="col text-left">
                  <h4>Data Makanan dan Budaya</h4>
                </div>
                <div class="col text-right">
                  <a href="<?php echo base_url('kuliner/tambahkuliner'); ?>"><button type="button" class="btn btn-sm btn-success" style="color : white;">Tambah</button></a>
                </div>
              </div>
              <div class="row pl-3 pr-3">
                <div class="table-responsive">
                  <table id="dtkuliner" class="table table-striped table-bordered table-sm display dt-responsive nowrap " cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th class="th-sm">No</th>
                        <th class="th-sm">Nama Kuliner</th>
                        <th class="th-sm">Kabupaten</th>
                        <th class="th-sm">Foto Kuliner</th>
                        
                        <th class="th-sm">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($kuliner)) :
                        foreach ($kuliner as $key => $kul) {
                          $no = $key + 1;
                          echo '<tr>';
                          echo '<td>' . $no . '</td>';
                          echo '<td>' . $kul->nama_kuliner . '</td>';
                          echo '<td>' . $kul->namakabupaten . '</td>';
                          ?>
                          <td><img width="100px" src="<?php echo base_url('fotokuliner/' . $kul->foto_kuliner) ?>"></td>
                      <?php
                          echo '<td>
                                    <a href="' . base_url('kuliner/edit/' . $kul->kuliner_id) . '"class="btn btn-sm" style="background-color: #cc7f0b; color : white;">Edit</a>
                                    <a href="' . base_url('kuliner/hapus/' . $kul->kuliner_id) . '" class="btn btn-danger btn-sm">Hapus</a>              
                                  </td>';
                          echo '</tr>';
                        }
                      endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>

              <!-- <script type="text/javascript">
                $('#dtBasicExample').DataTable();
              </script> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="modal_profil" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Profil Hipmikindo</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <form class="" action="<?php echo base_url('data_kategori_sewa/simpan') ?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label>Informasi Umum Tentang Asosiasi</label>
                <input type="hidden" name="profil_id" id="profil_id" class="form-control">
                <input type="text" name="ket_umum" id="ket_umum" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Sejarah Asosiasi</label>
                <input type="hidden" name="profil_id" id="profil_id" class="form-control">
                <input type="text" name="sejarah" id="sejarah" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Visi Misi Asosiasi</label>
                <input type="hidden" name="profil_id" id="profil_id" class="form-control">
                <input type="text" name="visi_misi" id="visi_misi" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Struktur Organisasi Asosiasi</label>
                <input type="hidden" name="profil_id" id="profil_id" class="form-control">
                <input type="text" name="struktur" id="struktur" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Program Kerja Asosiasi</label>
                <input type="hidden" name="profil_id" id="profil_id" class="form-control">
                <input type="text" name="proker" id="proker" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Cabang Asosiasi</label>
                <input type="hidden" name="profil_id" id="profil_id" class="form-control">
                <input type="text" name="cabang" id="cabang" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Logo Asosiasi</label>
                <input type="hidden" name="profil_id" id="profil_id" class="form-control">
                <input type="text" name="logo_aspenku" id="logo_aspenku" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Nama Asosiasi</label>
                <input type="hidden" name="profil_id" id="profil_id" class="form-control">
                <input type="text" name="nama_aspenku" id="nama_aspenku" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Alamat Asosiasi</label>
                <input type="hidden" name="profil_id" id="profil_id" class="form-control">
                <input type="text" name="alamat_aspenku" id="alamat_aspenku" class="form-control" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
              <button type="button" class="btn btn-dander" data-dismiss="modal">Tutup</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Hero Section End -->
<script src="<?php echo base_url('aset/DataTables/datatables.min.js'); ?>"></script>

<script>
  $('#example').DataTable();
  $('#dtkegiatan').DataTable({
    responsive: true
  });
  $('#dtadmin').DataTable();
  $('#dtanggota').DataTable();
  $('#dtkuliner').DataTable();
</script>
<script type="text/javascript">
  $('#example1').DataTable();

  function edit_profil(id) {
    $('#modal_profil').modal('toggle');
    $('#profil_id').val($('#' + id).data('id'));
    $('#ket_umum').val($('#' + id).data('ket_umum'));
    $('#sejarah').val($('#' + id).data('sejarah'));
    $('#visi_misi').val($('#' + id).data('visi_misi'));
    $('#struktur').val($('#' + id).data('struktur'));
    $('#proker').val($('#' + id).data('proker'));
    $('#cabang').val($('#' + id).data('cabang'));
    $('#logo_aspenku').val($('#' + id).data('logo_aspenku'));
    $('#nama_aspenku').val($('#' + id).data('nama_aspenku'));
    $('#alamat_aspenku').val($('#' + id).data('alamat_aspenku'));
  }
</script>

<!-- Hero Section End 
//Table Pagination
    $(document).ready(function () {
        $('#dtBasicExample').DataTable({
            "paging": true // true to disable pagination (or any other option)
          });
        $('.dataTables_length').addClass('bs-select');
    });-->



<?php $this->load->view('footer') ?>