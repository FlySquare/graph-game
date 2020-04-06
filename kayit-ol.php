
<?php
ob_start();
session_start();
error_reporting(0);
include 'db/db.php';
$useradminsor=$db->prepare("SELECT * FROM site_user where user_username=:mail");
$useradminsor->execute(array(
	'mail'=> $_SESSION['user_username']
));
$say=$useradminsor->rowCount();
$useradmincek=$useradminsor->fetch(PDO::FETCH_ASSOC);
if($say == 1){
    header("Location:index.php?durum=yetkisiz");
    exit;
}
$ayarsor=$db->prepare("SELECT * FROM site_ayar where ayar_id=:id");
$ayarsor->execute(array(
	'id'=>1
));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

if ($_GET['kayit'] == "ok") {
  echo '<script type="text/javascript">
  setTimeout(function() {
   swal({
       title: "Kayıt Oluşturma",
       text: "Başarılı bir şekilde Kayıt Oluşturuldu. Siteye Yönlendiriliyorsunuz",
       type: "success"
   }, function() {
       window.location = "index.php";
   });
}, 500);
  </script>';
}elseif ($_GET['kayit'] == "no") {
  echo '<script type="text/javascript">
  setTimeout(function() {
   swal({
       title: "Kayıt Oluşturma",
       text: "Kayıt Oluşturma sırasında hata meydana geldi!",
       type: "error"
   }, function() {

   });
  }, 500);
  </script>';
}elseif ($_GET['bilgiler'] == "no") {
  echo '<script type="text/javascript">
  setTimeout(function() {
   swal({
       title: "Kayıt Oluşturma",
       text: "Lütfen tüm bilgilerinizi eksiksiz doldurun!",
       type: "error"
   }, function() {

   });
  }, 500);
  </script>';
}elseif ($_GET['username'] == "no") {
  echo '<script type="text/javascript">
  setTimeout(function() {
   swal({
       title: "Kayıt Oluşturma",
       text: "Bu kullanıcı adı kullanımda. Lütfen kontrol ediniz!",
       type: "error"
   }, function() {

   });
  }, 500);
  </script>';
}elseif ($_GET['usermail'] == "no") {
  echo '<script type="text/javascript">
  setTimeout(function() {
   swal({
       title: "Kayıt Oluşturma",
       text: "Bu Mail Adresi kullanımda. Lütfen kontrol ediniz!",
       type: "error"
   }, function() {

   });
  }, 500);
  </script>';
}




?>
<!DOCTYPE html>
<!--
    Name: DarkGame
    Version: 1.0.8
    Author: BolFps.Com
    Website: https://bolfps.com/
    Purchase: https://bolfps.com/
    Support: https://bolfps.com/
    License: MIT
    Copyright 2020.
-->

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title><?php echo $ayarcek['ayar_title']?></title>
    <meta name="description" content="<?php echo $ayarcek['ayar_description']?>">
    <meta name="keywords" content="<?php echo $ayarcek['ayar_keywords']?>">
    <meta name="author" content="<?php echo $ayarcek['ayar_author']?>">
    <link rel="icon" type="image/png" href="<?php echo $ayarcek['ayar_favicon']?>">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7cOpen+Sans:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/vendor/bootstrap/dist/css/bootstrap.min.css">
    <script defer src="assets/vendor/fontawesome-free/js/all.js"></script>
    <script src="https://kit.fontawesome.com/b2aeef6d36.js" crossorigin="anonymous"></script>
    <script defer src="assets/vendor/fontawesome-free/js/v4-shims.js"></script>
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link rel="stylesheet" href="assets/css/goodgames.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
</head>
<body>



    <div class="nk-main">



<div class="nk-fullscreen-block">



  <br />
  <br />
  <div class="row">
  <div class="col-md-4 col-sm-4 add_bottom_30">
  </div>
  <div class="col-md-4 col-sm-4 add_bottom_30">
  <form action="db/islem.php" method="POST">
  <h4 style="text-align:center">Kayıt Ol</h4>
  <div class="form-group">
  <label>İsim & Soyisim</label>
  <input class="form-control" name="user_ad" type="text" >

  </div>
  <div class="form-group">
  <label>E-posta Adresi</label>
  <input class="form-control"  name="user_eposta" type="text">

  </div>
  <div class="form-group">
  <label>Oyun İçi Kullanıcı Adınız</label>
  <input class="form-control"  name="user_username" type="text">

  </div>
  <div class="form-group">
  <label>Şifreniz</label>
  <input class="form-control"  name="user_sifre" type="password">
  <input class="form-control"  value="0" name="user_yas" type="hidden">
  <input class="form-control"  value="0" name="user_discord" type="hidden">
  <input class="form-control"  value="0" name="user_kredi" type="hidden">

  </div>
  <div style="text-align:center">
  <button name="kayitol" type="submit" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block">Kayıt Ol - <span class="fa fa-user"></span></button>
  <br>
  <button name="" onclick="window.location.href='index.php'" type="button" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block">Anasayfaya Dön <span class="fa fa-home"></span></button>

  </div>
  </form>
  </div>
  <div class="col-md-4 col-sm-4 add_bottom_30">
  </div>
  </div>

  <br />
  <br />
  </div>
  <br />
  <br />
    </div>




        <!-- START: Page Background -->

    <div class="nk-page-background-fixed" style="background-image: url('assets/images/bg-fixed-2.jpg');"></div>

                <!-- START: Footer -->
                <footer class="nk-footer">


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


    <script src="assets/js/goodgames.min.js"></script>
    <script src="assets/js/goodgames-init.js"></script>



    </body>
    </html>
