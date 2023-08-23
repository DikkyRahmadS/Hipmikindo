<?php $this->load->view('header') ?>

<section class="breadcrumb-section2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-5 align-self-center">
                <img src="<?php echo base_url() ?>aset/img/logoaspenku2.jpeg" alt="">
            </div>
            <div class="col-sm-5 align-self-center">
                <?php if (validation_errors() == true) {
                    echo validation_errors();
                }
                ?>
                <?= $this->session->flashdata('message'); ?>

                <?= $this->session->flashdata('msg'); ?>
                <div class="card border border-danger ">
                    <div class="card-header justify-content-center border-bottom border-danger" style="background-color: #cc7f0b;">
                        <div class="row">
                            <div class="col text-center">
                                <h2 style="color: white;">Lupa Password </h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form data-parsley-validate method="post"  action="<?= base_url('home/lupa_password'); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <button class="btn btn-sm btn-block" style="background-color: #cc7f0b; color : white;" type="submit">Reset Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- Blog Section End -->
<?php $this->load->view('footer') ?>