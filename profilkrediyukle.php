

<?php include 'header.php';
if (isset($_POST['kredigonder'])) {
$userkredi = $usercek['user_kredi'];
$krediaktarhesap=$_POST['krediaktar_usersid'];
 $krediaktarmiktar=$_POST['krediaktar_miktar'];
 $krediaktaraciklama=$_POST['krediaktar_aciklama'];
 $krediaktargonderenid=$usercek['users_id'];
if ($userkredi >=$krediaktarmiktar) {
  $query = $db->query("SELECT * FROM site_user WHERE user_username = '{$krediaktarhesap}'")->fetch(PDO::FETCH_ASSOC);
  $krediaktarid= $query['users_id'];
  $gidenuserkredi= $query['user_kredi'];
  	$ayarekle=$db->prepare("INSERT INTO site_krediaktar SET
  		krediaktar_usersid=:krediaktar_usersid,
  		krediaktar_miktar=:krediaktar_miktar,
  		krediaktar_aciklama=:krediaktar_aciklama,
      krediaktar_gonderenid=:krediaktar_gonderenid
  	");
  	$insert=$ayarekle->execute(array(
  		'krediaktar_usersid' => $krediaktarid,
  		'krediaktar_miktar' => $krediaktarmiktar,
  		'krediaktar_aciklama' => $krediaktaraciklama,
      'krediaktar_gonderenid' => $krediaktargonderenid
  		));
  	if ($insert) {
      $yeniuserkredi = $gidenuserkredi + $krediaktarmiktar;
      $userkredi = $userkredi - $krediaktarmiktar;
      $ayarkaydet=$db->prepare("UPDATE site_user SET
             user_kredi=:user_kredi
        WHERE users_id='{$krediaktargonderenid}'");

      $update=$ayarkaydet->execute(array(
            'user_kredi' => $userkredi
        ));
        $kredikaydet=$db->prepare("UPDATE site_user SET
               user_kredi=:user_kredi
          WHERE users_id='{$krediaktarid}'");

        $update=$kredikaydet->execute(array(
              'user_kredi' => $yeniuserkredi
          ));
  		Header("Location:../Profilkredi.php?aktarildi=ok");
  	} else {
      Header("Location:../Profilkredi.php?aktarildi=no");
  	}
}else {
  Header("Location:../Profilkredi.php?yetersizbakiye=no");
}
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
<center><h4>Bakiye Yükleme</h4></center>
<div style="text-align:center">
<button onclick="window.location='profilhediyegir.php';" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block">Hediye Kuponu - <span class="fa fa-gift"></span></button>
<br>
<button onclick="window.location='profilpromogir.php';" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block">Promo Kod - <span class="fa fa-telegram"></span></button>
<br>
<button onclick="window.location='profilininalgir.php';" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block">İninal Kod - <span class="fa fa-credit-card"></span></button>
<br>
<button onclick="window.location='profilkartgir.php';" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block">İninal/Banka Kartı - <span class="fa fa-credit-card"></span></button>
<br>
<button onclick="window.location='profileftgir.php';" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block">Eft/Havale - <span class="fa fa-plane"></span></button>
<br>
<button onclick="window.location='profilmobilgir.php';" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block">Mobil - <span class="fa fa-phone"></span></button>

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
