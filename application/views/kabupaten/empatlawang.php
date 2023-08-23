<?php $this->load->view('header') ?>
<link rel="stylesheet" href="<?php echo base_url() ?>aset/simplelightbox-master/dist/simple-lightbox.css?v2.10.3" />
<!DOCTYPE html>
<div class="container">
    <?php foreach ($banyuasin as $kabupaten) { ?>
        <?php if ($kabupaten->namakabupaten === 'Empat Lawang') { ?>
            <header style="font-weight: bold; font-size: 28px; text-align: center; margin: 20px;"><?php echo $kabupaten->namakabupaten; ?></header>
            <p style="text-align: justify;"><?php echo $kabupaten->profil; ?></p>
        <?php } ?>
    <?php } ?>

    <div class="categories__slider owl-carousel p-4">
        <?php foreach ($kuliner as  $value) {
            // Cek apakah kabupaten_id sama dengan 16
            if ($value->kabupaten_id == 2) {
        ?>
                <div class="col-lg-3 small-demo">
                    <div class="card border border-danger categories__item set-bg" data-setbg="<?php echo base_url('fotokuliner/' . $value->foto_kuliner) ?>">
                        <h5><a rel="rel2" href="<?php echo base_url('fotokuliner/' . $value->foto_kuliner) ?>"><?php echo $value->nama_kuliner ?></a></h5>
                    </div>
                </div>
        <?php
            }
        };
        ?>
    </div>
</div>


<?php $this->load->view('footer') ?>