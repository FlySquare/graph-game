
            <!-- START: Footer -->
            <footer class="nk-footer">

<div class="container">
    <div class="nk-gap-3"></div>
    <div class="row vertical-gap">
    <div class="col-md-6">
            <div class="nk-widget">
                <h4 class="nk-widget-title"><span class="text-main-1"><?php echo $hakkimizdacek['hakkimizda_baslik']?></span></h4>
                <div class="nk-widget-content">
                    <div class="row vertical-gap sm-gap">

                        <div class="col-lg-6">
                        <?php echo $hakkimizdacek['hakkimizda_icerik']?>
                        </div>



                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-6">
<div class="nk-widget">
<h4 class="nk-widget-title"><span class="text-main-1">İletişime</span> Geç</h4>
<div class="nk-widget-content">
<form action="db/islem.php" method="post" class="nk-form">
<div class="row vertical-gap sm-gap">
<div class="col-md-6">
<input type="text" class="form-control required" name="destek_email" placeholder="Email veya Discord *">
</div>
<div class="col-md-6">
<input type="text" class="form-control required" name="destek_adsoyad" placeholder="İsim *">
</div>
</div>
<div class="nk-gap"></div>
<textarea class="form-control required" name="destek_icerik" rows="5" placeholder="Mesaj *"></textarea>
<div class="nk-gap-1"></div>
<button name="destekkaydet" type="submit" class="nk-btn nk-btn-outline nk-btn-color-warning">
<span>Gönder</span>
<span class="icon"><i class="ion-paper-airplane"></i></span>
</button>
</form>
</div>
</div>
</div>

    </div>
    <div class="nk-gap-3"></div>
</div>

<div class="nk-copyright">
    <div class="container">
        <div class="nk-copyright-left">
            Copyright &copy; 2020 - Tüm hakları saklıdır. |&nbsp
            <a href="https://bolfps.com" target="_blank">BolFps.Com Tarafından Yapılmıştır</a>
        </div>

    </div>
</div>
</footer>
<!-- END: Footer -->


</div>




    <!-- START: Page Background -->

<img class="nk-page-background-top" src="assets/images/bg-top.png" alt="">
<img class="nk-page-background-bottom" src="assets/images/bg-bottom.png" alt="">

<!-- END: Page Background -->




    <!-- START: Search Modal -->
<div class="nk-modal modal fade" id="modalSearch" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="ion-android-close"></span>
            </button>

            <h4 class="mb-0">Kullanıcı Arama</h4>

            <div class="nk-gap-1"></div>
            <form action="db/islem.php" method="post" class="nk-form nk-form-style-1">
                <input type="text" value="" name="usersearch" class="form-control" placeholder="Kullanıcı Adını Giriniz" autofocus>
            </form>
        </div>
    </div>
</div>
</div>
<!-- END: Search Modal -->





<?php
error_reporting(E_ALL & ~E_NOTICE);
if ($_GET['destekiletildi']=="ok") {
  echo '<script type="text/javascript">
  swal("Destek Bildirimi", "Destek Bildirimi Gönderildi.", "success");
  </script>';
}elseif ($_GET['destekiletildi']=="no") {
  echo '<script type="text/javascript">
  swal("Destek Bildirimi", "Destek Bildirimi Gönderilemedi.", "error");
  </script>';
  // code...
}

 ?>



<!-- START: Scripts -->


<!-- Object Fit Polyfill -->
<script src="assets/vendor/object-fit-images/dist/ofi.min.js"></script>

<!-- GSAP -->
<script src="assets/vendor/gsap/src/minified/TweenMax.min.js"></script>
<script src="assets/vendor/gsap/src/minified/plugins/ScrollToPlugin.min.js"></script>

<!-- Popper -->
<script src="assets/vendor/popper.js/dist/umd/popper.min.js"></script>

<!-- Bootstrap -->
<script src="assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Sticky Kit -->
<script src="assets/vendor/sticky-kit/dist/sticky-kit.min.js"></script>

<!-- Jarallax -->
<script src="assets/vendor/jarallax/dist/jarallax.min.js"></script>
<script src="assets/vendor/jarallax/dist/jarallax-video.min.js"></script>

<!-- imagesLoaded -->
<script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>

<!-- Flickity -->
<script src="assets/vendor/flickity/dist/flickity.pkgd.min.js"></script>

<!-- Photoswipe -->
<script src="assets/vendor/photoswipe/dist/photoswipe.min.js"></script>
<script src="assets/vendor/photoswipe/dist/photoswipe-ui-default.min.js"></script>

<!-- Jquery Validation -->
<script src="assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>

<!-- Jquery Countdown + Moment -->
<script src="assets/vendor/jquery-countdown/dist/jquery.countdown.min.js"></script>
<script src="assets/vendor/moment/min/moment.min.js"></script>
<script src="assets/vendor/moment-timezone/builds/moment-timezone-with-data.min.js"></script>

<!-- Hammer.js -->
<script src="assets/vendor/hammerjs/hammer.min.js"></script>

<!-- NanoSroller -->
<script src="assets/vendor/nanoscroller/bin/javascripts/jquery.nanoscroller.js"></script>

<!-- SoundManager2 -->
<script src="assets/vendor/soundmanager2/script/soundmanager2-nodebug-jsmin.js"></script>

<!-- Seiyria Bootstrap Slider -->
<script src="assets/vendor/bootstrap-slider/dist/bootstrap-slider.min.js"></script>

<!-- Summernote -->
<script src="assets/vendor/summernote/dist/summernote-bs4.min.js"></script>

<!-- nK Share -->
<script src="assets/plugins/nk-share/nk-share.js"></script>

<!-- GoodGames -->
<script src="assets/js/goodgames.min.js"></script>
<script src="assets/js/goodgames-init.js"></script>
<!-- END: Scripts -->

</body>
</html>
