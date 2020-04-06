

<?php include 'header.php';
$useradminsor=$db->prepare("SELECT * FROM site_user where user_username=:mail");
$useradminsor->execute(array(
	'mail'=> $_SESSION['user_username']
));
$say=$useradminsor->rowCount();
$useradmincek=$useradminsor->fetch(PDO::FETCH_ASSOC);
if($say == 0){
    header("Location:index.php?durum=yetkisiz");
    exit;
}
?>

<div id="nk-nav-mobile" class="nk-navbar nk-navbar-side nk-navbar-right-side nk-navbar-overlay-content d-lg-none">
<div class="nano">
<div class="nano-content">
<a href="/index.html" class="nk-nav-logo">
<img src="/assets/images/logo.png" alt="" width="120">
</a>
<div class="nk-navbar-mobile-content">
<ul class="nk-nav">

</ul>
</div>
</div>
</div>
</div>

<div class="nk-main">

<div class="nk-gap-1"></div>
<div class="container">
<ul class="nk-breadcrumbs">
<li><a href="../">Ana Sayfa &gt;</a></li>
<li><a href="../profil">Profil</a></li>
</ul>
</div>
<div class="nk-gap-1"></div>

<div class="container">
<div class="row vertical-gap">
<div class="col-lg-8">

<div style="text-align:center">
<a href="profil" class="nk-btn nk-btn-rounded nk-btn-color-white">Profil - <span class="fa fa-user"></span></a> &nbsp;&nbsp;
<a href="profilayar" class="nk-btn nk-btn-rounded nk-btn-color-white">Ayarlar - <span class="fa fa-cog"></span></a> &nbsp;&nbsp;
<a href="profilkredi" class="nk-btn nk-btn-rounded nk-btn-color-white">Kredi Aktar - <span class="icon ion-paper-airplane"></span></a> &nbsp;&nbsp;
<a href="profilkrediyukle" class="nk-btn nk-btn-rounded nk-btn-color-white">Kredi Yükle - <span class="fa fa-credit-card"></span></a> &nbsp;&nbsp;
<a href="depom.php" class="nk-btn nk-btn-rounded nk-btn-color-white">Depom - <span class="fa fa-inbox"></span></a>
</div>
<hr />

<div class="">
<div class="nk-box-2 bg-dark-2" style="padding:0px">
<br />
<br />
<div class="row">
<div class="col-md-4 col-sm-4 add_bottom_30">
</div>
<div class="col-md-4 col-sm-4 add_bottom_30">
<h4>İninal Barkod Kod:</h4>
<div class="form-group">
  <?php
               while($ininalcek=$ininalsor->fetch(PDO::FETCH_ASSOC)){?>
<label>KOD: <?php echo $ininalcek['ininal_barkodno']; ?></label><br>
<?php } ?>
</div>


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


<div class="">
<div class="nk-box-2 bg-dark-2" style="padding:0px">
<br />
<br />
<div class="row">
<div class="col-md-4 col-sm-4 add_bottom_30">
</div>
<div class="col-md-4 col-sm-4 add_bottom_30">
<h4>Nasıl Para Gönderebilirim?</h4>
<div class="form-group">
<label>1) İninal Mobil Uygulamasına giriş yapınız.</label><br>
<label>2) Alt kısımdan "İşlemler" sekmesine geçinız.</label><br>
<label>3) "Para Gönder" butonuna tıklayınız.</label><br>
<label>4) "Alıcı Kart Barkodu"'na tıklayınız.</label><br>
<label>5) Açılan kamerada "Barkod numarasını kendim girmek istiyorum"'a tıklayınız.</label><br>
<label>6) Açılan sayfaya sitemizdeki Barkod NO'sunu yazınız ve "Devam Et" butonuna tıklayınız.</label><br>
<label>7) Miktar kısmına yükleyeceğiniz kredi miktarını yazınız.</label><br>
<label>8) Açıklama kısmına, yükleme yapılacak hesabın kullanıcı adını yazınız.</label><br>
<label>9) Ödeme yaptıktan sonra sayfanın en altında bulunan formdan iletişime geçininiz.</label><br>
</div>


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


<script src="/Scripts/jquery.unobtrusive-ajax.min.js"></script>
</div>
<div class="col-lg-4">
<?php include 'sagblok.php'; ?>
</div>
</div>
</div>
<div class="nk-gap-2"></div>
<?php include 'footer.php'; ?>
