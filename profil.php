

<?php include 'header.php';
error_reporting(0);
if ($_GET['durum']=="yes") {
      echo '<script type="text/javascript">
      setTimeout(function() {
       swal({
           title: "Giriş",
           text: "Güvenli Şekilde Giriş Yapıldı",
           type: "success"
       }, function() {
           window.location = "profil.php";
       });
   }, 500);
      </script>';

    }
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

$userget = $_GET['searchuser'];
$aramauser=$db->prepare("SELECT * FROM site_user where user_username=:id");
$aramauser->execute(array(
	'id'=>$userget
));
$aramausercek=$aramauser->fetch(PDO::FETCH_ASSOC);
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
<li><a href="profil"><?php

if ($_GET['searchuser']) {
  if ($aramausercek['user_yetki']=="5") {
    echo $aramausercek["user_username"].'  <i class="fas fa-check-circle"></i>';
  }elseif ($aramausercek['user_yetki']=="1") {
    echo $aramausercek["user_username"];
  }
}else {
  echo "Profil";
}

 ?></a></li>
</ul>
</div>
<div class="nk-gap-1"></div>

<div class="container">
<div class="row vertical-gap">
<div class="col-lg-8">

<?php
if (!$_GET['searchuser']) {?>
  <div style="text-align:center">
  <a href="profil" class="nk-btn nk-btn-rounded nk-btn-color-white">Profil - <span class="fa fa-user"></span></a> &nbsp;&nbsp;
  <a href="profilayar.php" class="nk-btn nk-btn-rounded nk-btn-color-white">Ayarlar - <span class="fa fa-cog"></span></a> &nbsp;&nbsp;
  <a href="profilkredi" class="nk-btn nk-btn-rounded nk-btn-color-white">Kredi Aktar - <span class="icon ion-paper-airplane"></span></a> &nbsp;&nbsp;
  <a href="profilkrediyukle" class="nk-btn nk-btn-rounded nk-btn-color-white">Kredi Yükle - <span class="fa fa-credit-card"></span></a> &nbsp;&nbsp;
  <a href="depom.php" class="nk-btn nk-btn-rounded nk-btn-color-white">Depom - <span class="fa fa-inbox"></span></a>
  </div>
<?php } ?>


<hr />
<link href="/Content/PagedList.css" rel="stylesheet" />
<?php
if ($_GET['searchuser']) {?>
  <div class="row">
  <div class="col-md-6 col-sm-6">
  <table class="nk-table">
  <thead>
  <tr>
  <th colspan="3">Kullanıcı Bilgileri</th>
  </tr>
  </thead>
  <tbody>
  <tr>
  <th>K. Adı:</th>
  <td><?php
  if ($aramausercek['user_yetki']=="5") {
    echo $aramausercek["user_username"].'  <i class="fas fa-check-circle"></i>';
  }elseif ($aramausercek['user_yetki']=="1") {
    echo $aramausercek["user_username"];
  }
   ?></td>
  </tr>
  <tr>
  <th>Email:</th>
  <td><?php echo $aramausercek["user_eposta"]; ?></td>
  </tr>
  <tr>
  <th>Ad/Soyad:</th>
  <td><?php echo $aramausercek["user_ad"]; ?></td>
  </tr>
  <tr>
  <th>Yaş:</th>
  <td><?php echo $aramausercek["user_yas"]; ?></td>
  </tr>
  <tr>
  <th>Discord:</th>
  <td><?php echo $aramausercek["user_discord"]; ?></td>
  </tr>
  <tr>
  <th>Kredi:</th>
  <td><?php echo $aramausercek["user_kredi"]; ?></td>
  </tr>
  <tr>
  <th>Kayıt Tarihi:</th>
  <td><?php echo $aramausercek["user_tarih"]; ?></td>
  </tr>
  </tbody>
  </table>
  </div>
  <div style="text-align:center" class="col-md-6 col-sm-6">
  <br />
  <br />
  <img src="https://cravatar.eu/head/<?php echo $aramausercek["user_username"]; ?>/280.png" alt="avatar" class="img-responsive styled profile_pic">
  </div>
</div>
<?php }else{?>

  <div class="row">
  <div class="col-md-6 col-sm-6">
  <table class="nk-table">
  <thead>
  <tr>
  <th colspan="3">Bilgilerin</th>
  </tr>
  </thead>
  <tbody>
  <tr>
  <th>K. Adı:</th>
  <td><?php
  if ($usercek['user_yetki']=="5") {
    echo $usercek["user_username"].'  <i class="fas fa-check-circle"></i>';
  }elseif ($usercek['user_yetki']=="1") {
    echo $usercek["user_username"];
  }
  ?></td>
  </tr>
  <tr>
  <th>Email:</th>
  <td><?php echo $usercek["user_eposta"]; ?></td>
  </tr>
  <tr>
  <th>Ad/Soyad:</th>
  <td><?php echo $usercek["user_ad"]; ?></td>
  </tr>
  <tr>
  <th>Yaş:</th>
  <td><?php echo $usercek["user_yas"]; ?></td>
  </tr>
  <tr>
  <th>Discord:</th>
  <td><?php echo $usercek["user_discord"]; ?></td>
  </tr>
  </tbody>
  </table>
  </div>
  <div style="text-align:center" class="col-md-6 col-sm-6">
  <br />
  <br />
  <img src="https://cravatar.eu/head/<?php echo $usercek["user_username"]; ?>/280.png" alt="avatar" class="img-responsive styled profile_pic">
  </div>
</div>
<?php }?>


<hr>

<?php
if ($_GET['searchuser']) {
  // code...
}else {?>
  <h4>Market Geçmişin</h4>
  <div id="market_islemleri">
  <table class="nk-table">
  <thead>
  <tr>
  <th>İşlem İD</th>
  <th>Sunucu</th>
  <th>Ürün isim</th>
  <th>Fiyat</th>
  <th>İşlem tarihi</th>
  </tr>
  </thead>
  <?php while($eskiuruncek=$eskiurun->fetch(PDO::FETCH_ASSOC)){?>
  <tr>
  <td><?php echo $eskiuruncek["marketgecmis_id"] ?></td>
  <td><?php
  $sunucuurunsor = $db->prepare("SELECT * FROM site_sunucu where sunucu_id=:id");
  $sunucuurunsor->execute(array(
    "id"=>$eskiuruncek["marketgecmis_kategori"]
  ));
  $sunucuuruncek=$sunucuurunsor->fetch(PDO::FETCH_ASSOC);
  echo $sunucuuruncek["sunucu_isim"];
   ?></td>
  <td><?php echo $eskiuruncek["marketgecmis_urunbaslik"] ?></td>
  <td><?php echo $eskiuruncek["marketgecmis_fiyat"] ?>₺</td>
  <td><?php echo $eskiuruncek["marketgecmis_tarih"] ?></td>
  </tr>
  <?php } ?>
  </table>
  <div style="text-align:center">
  <div class="pagination-container"><ul class="pagination"></ul></div>
  </div>
  </div>

  <hr>
  <h4>Kredi Yükleme Geçmişin</h4>
  <div id="kredi_yuklemeler">
  <table class="nk-table">
  <thead>
  <tr>
  <th>İşlem İD</th>
  <th>İşlem Tarihi</th>
  <th>Miktar</th>
  <th>Ödeme Türü</th>
  <th>Durum</th>
  </tr>
  </thead>
  </table>
  <div style="text-align:center">
  <div class="pagination-container"><ul class="pagination"></ul></div>
  </div>
  </div>
  <hr>
  <h4>Kredi Aktarma Geçmişin</h4>
  <div id="kredi_aktarma_islemleri">
  <table class="nk-table">
  <thead>
  <tr>
  <th>İşlem İD</th>
  <th>Tarihi</th>
  <th>Aktaran</th>
  <th>Aktarılan</th>
  <th>Miktar</th>
  <th>Açıklama</th>
  </tr>
  </thead>
  <?php while($eskigonderimcek=$eskigonderim->fetch(PDO::FETCH_ASSOC)){?>
  <tr>
  <td><?php echo $eskigonderimcek["krediaktar_id"] ?></td>
  <td><?php echo $eskigonderimcek["krediaktar_tarih"] ?></td>
  <td><?php echo $usercek["user_username"] ?></td>
  <td><?php echo $gecmiskredicek["user_username"] ?></td>
  <td><?php echo $eskigonderimcek["krediaktar_miktar"] ?></td>
  <td><?php echo $eskigonderimcek["krediaktar_aciklama"] ?></td>
  </tr>
  <?php } ?>
  </table>
  <div style="text-align:center">
  <div class="pagination-container"><ul class="pagination"></ul></div>
  </div>
  </div>

  <hr></hr>
  <h4>İstatistiklerin</h4>
  <table class="nk-table">
  <thead>
  <tr>
  <th>Sunucu</th>
  <th>Öldürme</th>
  <th>Ölme</th>
  <th>Kazanma</th>
  <th>Kaybetme</th>
  <th>Mob öldürme</th>
  </tr>
  </thead>
  <tr>
  <td>God Faction</td>
  <td>0</td>
  <td>0</td>
  <td>#</td>
  <td>#</td>
  <td>0</td>
  </tr>

  </table>
<?php } ?>

<script src="/Scripts/jquery.unobtrusive-ajax.min.js"></script>
</div>
<div class="col-lg-4">
<?php include 'sagblok.php'; ?>
</div>
</div>
</div>
<div class="nk-gap-2"></div>
<?php include 'footer.php'; ?>
