    <?php $this->load->view('header') ?>
<!-- Hero Section Begin -->
<section class="hero hero-normal">
  <div class="container">
    <div class="row mt-3">
      <div class="col-lg-3">
        <div class="row-lg-3 mb-5">
          <div class="hero__categories">
            <div class="hero__categories__all" style="background-color: #cc7f0b;">
              <i class="fa fa-bars"></i>
              <span>Profil</span>
            </div>
            <ul class="border-danger">
              <li><a href="#sejarah">Sejarah</a></li>
              <li><a href="#visimisi">Visi Misi</a></li>
              <li><a href="#struktur">Struktur</a></li>
              <li><a href="#proker">Program Kerja</a></li>
              <li><a href="#cabang">Cabang</a></li>
            </ul>
          </div>
        </div><br><br><br><br><br><br><br>
        <div class="row mt-5">
          <img src="<?php echo base_url() ?>aset/img/logoaspenku2.jpeg" alt="">
        </div><br><br><br><br> 
      </div>
      <div class="col-lg-9 mb-2 ">
        <div class="blog__details__text">
          <?php foreach ($profillama as $key => $row) { ?>
            <div class="row ml-3">
              <div class="col-4 align-self-center">
                <img class="rounded-circle" src="<?php echo base_url('fotoprofil/' . $row->logo_aspenku) ?>" >
              </div>
              <div class="col-8 align-self-center text-center">
                <div class="row mt-3">
                  <h2 class="text-bolder align-self-center text-center"><?php echo $row->singkatan_asosiasi ?></h2>
                </div>
                <div class="row mt-2">
                  <p class="text-sm"><?php echo $row->nama_aspenku ?></p>
                </div>
              </div>
            </div>
            <div class="row ml-1">
              <p class="text-center ml-3" style="color: black;"><?php echo $row->alamat_aspenku ?></p>
            </div>
            <hr class="border-danger mr-1">
            <div class="row p-3">
              <div class="col-sm-12">
                <p class="text-justify mr-1"><?php echo $row->ket_umum ?></p>
              </div><br>
              <div class="col-sm-12">
                <h3 class="text-justify" id="sejarah">Sejarah</h3>
                <p class="text-justify"><?php echo $row->sejarah ?></p>
              </div>
              <div class="col-sm-12">
                <h3 class="text-justify" id="visimisi">Visi Misi</h3>
                <p class="text-justify"><?php echo $row->visi_misi ?></p>
              </div>
              <div class="col-sm-12">
                <h3 class="text-justify" id="struktur">Struktur Hipmikindo Sumsel</h3>
                <p class="text-justify"><?php echo $row->struktur ?></p>
              </div>
              <div class="col-sm-12">
                <h3 class="text-justify" id="proker">Program Kerja</h3>
                <p class="text-justify"><?php echo $row->proker ?></p>
              </div>
              <div class="col-sm-12">
                <h3 class="text-justify" id="cabang">Cabang Hipmikindo Sumsel</h3>
                <p class="text-justify"><?php echo $row->cabang ?></p>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Hero Section End -->
<?php $this->load->view('footer') ?>
