<?php $this->load->view('header') ?>

<section class="breadcrumb-section2">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-5">
        <img src="<?php echo base_url() ?>aset/img/logoaspenku2.jpeg" alt="">
      </div>
      <div class="col-5 align-self-center">
        <div class="card border border-danger">
          <div class="card-header justify-content-center border-bottom border-danger" style="background-color: #cc7f0b;">
            <div class="row">
              <div class="col text-center">
                <h2 style="color: white;">Login Admin</h2>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form action="">
              <div class="row">
                <div class="col">
                  <div class="checkout__input">
                    <p>Username<span>*</span></p>
                    <input type="text">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="checkout__input">
                    <p>Password<span>*</span></p>
                    <input type="text">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                <div class="text-center">
                    <p><span class="text-bold"><a href="<?php echo base_url('home/daftaranggota'); ?>">Lupa Password ?</a></span></p>
                  </div>
                </div>
              </div>
              <div class="row justify-content-center mt-2">
                <div class="col">
                  <a href="<?php echo base_url('home'); ?>"><button type="button" class="btn btn-sm btn-block" style="background-color: #cc7f0b; color : white;">Login</button></a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Blog Section End -->
<?php $this->load->view('footer') ?>