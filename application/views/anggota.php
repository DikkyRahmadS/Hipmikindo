<?php $this->load->view('header') ?>

<!-- Hero Section Begin -->
<section class="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
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
              <a href="<?php echo base_url('home/daftarakun'); ?>"><button type="button" class="btn btn-sm btn-block" style="background-color: #cc7f0b; color : white;">Daftar</button></a>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="col-lg-9 mt-3">
        <div class="row justify-content-center">
          <div class="section-title mt-1">
            <style>
              h2 {
                font-size: 28px;
              }
            </style>
            <h2>Anggota</h2>
          </div>
        </div>
        <div class="row">
          <?php foreach ($anggotas as $row) { ?>
            <div class="col-xl-6 pb-3">
              <div class="card-deck">
                <div class="card border-danger">
                  <div class="card-body border-danger">
                    <div class="row">
                      <div class="col-5  ">
                        <img class="rounded-circle" src="<?php echo base_url('fotoanggota/' . $row->logo_umkm) ?>">
                      </div>
                      <div class="col-7">
                        <div class="row mt-4">
                          <h5 class="card-title "><?php echo $row->nama_umkm ?></h5>
                        </div>
                        <div class="row">
                          <p class="text-sm "><?php echo $row->owner ?></p>
                        </div>
                      </div>
                    </div>
                    <p class="card-text text-center mt-3" style="color: black;"><?php echo $row->alamat_umkm ?></p>
                    <p class="card-text text-center mt-3" style="color: black;"><?php echo $row->namakabupaten ?></p>
                    <div class="row justify-content-center">
                      <div class="btn-group " role="group" aria-label="First group">
                        <a href="<?php echo base_url('anggota/lihatanggota/') . $row->anggota_id; ?>"><button type="button" class="btn text-center" style="background-color: #cc7f0b; color:white;">Lihat Detail</button></a>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer border-danger">
                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                      <div class="btn-group" role="group" aria-label="First group">
                        <a href="https://api.whatsapp.com/send?phone=<?= $row->nowa ?>&text=Silahkan Hubungi Contact Person UMKM untuk Mengetahui Info lebih Lanjut" target="_blank"><button type="button" class="btn btn-success">WhatsApp</button></a>
                      </div>
                      <div class="btn-group" role="group" aria-label="First group">
                        <a href="https://www.instagram.com/<?= $row->username_ig ?>/" target="_blank"><button type="button" class="btn" style="background-color: #e61258; color:white;">Instagram</button></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div><br>
        <div class="card border border-danger">
          <div class="card-footer text-center" style="background-color: #cc7f0b;">
            <div class="col-lg-12">
              <div class="product__pagination blog__pagination" style="color: white;">
                <?= $this->pagination->create_links(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>




    </div>
</section>
<!-- Hero Section End -->



<?php $this->load->view('footer') ?>