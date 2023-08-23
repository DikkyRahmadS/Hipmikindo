<!-- Footer Section Begin -->
<footer class="footer spad" style="
background:linear-gradient( rgba(204, 127, 11, 0.784) 100%, rgba(204, 127, 11, 0.784)100%),url('<?php echo base_url() ?>aset/img/songket7.jpg'); ">
  <div class=" container">
    <?php foreach ($profillama as $key => $row) { ?>
      <div class="row">
        <div class="col">
          <div class="footer__about">
            <div class="footer__about__logo text-center">
              <h5 class="font-weight-bolder ml-5" style="color: white;"> Hipmikindo Sumsel</h5>
            </div>
            <ul class="ml-5">
              <li style="color: white;"><span class="font-weight-bold">Address : </span> Jalan Riau No.845 26 Ilir Kec.Ilir Barat 1, Kota Palembang, Sumatera Selatan 30114</li>
              <li style="color: white;"><span class="font-weight-bold">CP : </span> 0859106692850</li>
              <li style="color: white;"><span class="font-weight-bold">Email : </span> hipmikindodpdsumsel@gmail.com</li>
            </ul>
          </div>
        </div>
        <div class="col">
          <div class="footer__widget text-center align-self-center">
            <h6 style="color: white;">Useful Links</h6>
            <ul>
              <li><a href="<?php echo base_url('home'); ?>" style="color: white;">Home</a></li>
              <li><a href="<?php echo base_url('profil'); ?>" style="color: white;">Profil</a></li>
              <li><a href="<?php echo base_url('info_kegiatan'); ?>" style="color: white;">Berita</a></li>
            </ul>
            <ul>
              <li><a href="<?php echo base_url('home/galeri'); ?>" style="color: white;">Galeri</a></li>
              <li><a href="<?php echo base_url('anggota'); ?>" style="color: white;">Anggota</a></li>
              <li><a href="<?php echo base_url('home/daftarakun'); ?>" style="color: white;">Daftar</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="footer__copyright">
            <div class="footer__copyright__text justify-content-center ml-4">
              <p style="color: white;">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                  document.write(new Date().getFullYear());
                </script> Hipmikindo Sumsel
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. @zahro_il-->
              </p>
            </div>
            <div class="footer__copyright__payment mr-4">
  <div class="footer__widget">
    <div class="footer__widget__social">
      <p style="color: white;">
        <a href="https://www.instagram.com/hipmikindo.sumsel/">
          <i class="fa fa-instagram"></i>
        </a> @hipmikindo.sumsel
      </p>
    </div>
  </div>
</div>
          </div>
        </div>
      </div>
    <?php   }; ?>
  </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="<?php echo base_url() ?>aset/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url() ?>aset/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>aset/js/jquery.nice-select.min.js"></script>
<script src="<?php echo base_url() ?>aset/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>aset/js/jquery.slicknav.js"></script>
<script src="<?php echo base_url() ?>aset/js/mixitup.min.js"></script>
<script src="<?php echo base_url() ?>aset/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url() ?>aset/js/main.js"></script>


</body>

</html>
