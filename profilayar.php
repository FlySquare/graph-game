

<?php include 'header.php';
error_reporting(E_ALL & ~E_NOTICE);
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
if (isset($_POST['newsifrekaydet'])) {
echo $yenisifre1=md5($_POST['kullanici_passwordone']);
echo $yenisifre2=md5($_POST['kullanici_passwordtwo']);
echo $eskisifre=$usercek['user_sifre'];
$girileneskisifre=md5($_POST['eski_sifre']);
if ($eskisifre==$girileneskisifre) {
if ($yenisifre1==$yenisifre2) {
  $ayarkaydet=$db->prepare("UPDATE site_user SET
    user_sifre=:user_sifre
    WHERE users_id={$_POST['users_id']}");

  $update=$ayarkaydet->execute(array(
    'user_sifre' =>$yenisifre1
    ));
  if ($update) {
    Header("Location:../profilayar.php?sifredurum=ok");
  } else {
    Header("Location:../profilayar.php?sifredurum=no");
  }
}
}else {
  Header("Location:../profilayar.php?eskisifre=no");
}
}
///////////////////////////////////////////////////////////////////
if (isset($_POST['newepostakaydet'])) {
echo $girileneskimail=$_POST['girileneskimail'];
echo $suankimail=$usercek['user_eposta'];
echo $girileneskisifre=md5($_POST['girileneskisifre']);
echo $suankisifre=$usercek['user_sifre'];
echo $girilenyenimail=$_POST['girilenyenimail'];
if ($girileneskisifre==$suankisifre) {
if ($suankimail==$girileneskimail) {
  $ayarkaydet=$db->prepare("UPDATE site_user SET
    user_eposta=:user_eposta
    WHERE users_id={$_POST['users_id']}");

  $update=$ayarkaydet->execute(array(
    'user_eposta' =>$girilenyenimail
    ));
  if ($update) {
    Header("Location:../profilayar.php?epostadegis=ok");
  } else {
    Header("Location:../profilayar.php?epostadegis=no");
  }
}else {
  Header("Location:../profilayar.php?eskieposta=no");
}
}else {
  Header("Location:../profilayar.php?eskisifremail=no");
}
}
///////////////////////////////////////////////////////
if (isset($_POST['kullanicibilgi'])) {
echo $user_ad=$_POST['user_ad'];
echo $user_yas=$_POST['user_yas'];
echo $user_discord=$_POST['user_discord'];

  $ayarkaydet=$db->prepare("UPDATE site_user SET
    user_ad=:user_ad,
    user_yas=:user_yas,
    user_discord=:user_discord
    WHERE users_id={$_POST['users_id']}");

  $update=$ayarkaydet->execute(array(
    'user_ad' =>$user_ad,
    'user_yas' =>$user_yas,
    'user_discord' =>$user_discord
    ));
  if ($update) {
    Header("Location:../profilayar.php?userduzenle=ok");
  } else {
    Header("Location:../profilayar.php?userduzenle=no");
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
<a href="profilkredi" class="nk-btn nk-btn-rounded nk-btn-color-white">Kredi Yükle - <span class="fa fa-credit-card"></span></a> &nbsp;&nbsp;
<a href="depom.php" class="nk-btn nk-btn-rounded nk-btn-color-white">Depom - <span class="fa fa-inbox"></span></a>
</div>
<hr />
<link href="/Content/PagedList.css" rel="stylesheet" />
<div class="row">
  <div class="col-md-6">
  <form action="" method="POST">
  <h4>Şifreni değiştir</h4>
  <div class="form-group">
  <label>Şuanki şifre</label>
  <input class="form-control" required="required" name="eski_sifre" id="old_password" type="password">
  </div>
  <div class="form-group">
  <label>Yeni şifre</label>
  <input class="form-control" required="required" name="kullanici_passwordone" id="new_password" type="password">
  </div>
  <div class="form-group">
  <label>Yeni şifre tekrar</label>
  <input class="form-control" required="required" name="kullanici_passwordtwo" id="confirm_new_password" type="password">
  <input class="form-control"  name="users_id" value="<?php echo $usercek['users_id']; ?>" type="hidden">
  </div>
  <button name="newsifrekaydet" type="submit" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block">Şifreni Değiştir - <span class="fa fa-cog"></span></button>
  </form>

  </div>
  <div class="col-md-6">
  <h4>E-Mail adresini değiştir</h4>
  <form action="" method="POST">
  <div class="form-group">
  <label>Şuanki E-Mail adresin</label>
  <input class="form-control" required="required" name="girileneskimail" type="text">
  </div>
  <div class="form-group">
  <label>Şuanki Şifren</label>
  <input class="form-control" required="required" name="girileneskisifre" type="password">
  </div>
  <div class="form-group">
  <label>Yeni E-Mail adresin</label>
  <input class="form-control" required="required" name="girilenyenimail" type="text">
  <input class="form-control"  name="users_id" value="<?php echo $usercek['users_id']; ?>" type="hidden">
  </div>
  <button name="newepostakaydet" type="submit" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block">E-Mail Adresini Değiştir - <span class="fa fa-cog"></span></button>
  </form>
  </div>
  </div>
  <br />
  <br />
  <form action="" method="POST">
  <div class="row">
  <div class="col-md-6">
  <h4>Profil Bilgilerini Güncelle</h4>
  <div class="form-group">
  <label>Ad</label>
  <input class="form-control" required name="user_ad" value="<?php echo $usercek['user_ad']; ?>" type="text">
  </div>

  <br />
  <button name="kullanicibilgi" type="submit" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block">Güncelle - <span class="fa fa-cog"></span></button>
  </div>
  <div class="col-md-6">
  <h4>&nbsp;</h4>
  <div class="form-group">
  <label>Yaş (yıl)</label>
  <input class="form-control" required name="user_yas" value="<?php echo $usercek['user_yas']; ?>" max="100">
  </div>
  <div class="form-group">
  <label>Discord adres</label>
  <input class="form-control" required name="user_discord" value="<?php echo $usercek['user_discord']; ?>" type="text">
  <input class="form-control"  name="users_id" value="<?php echo $usercek['users_id']; ?>" type="hidden">

  </div>
  </div>

</div>

<?php

				  if($_GET['sifredurum']=='ok'){
				  	echo '<script type="text/javascript">
  					swal("Şifre Değiştirme", "Başarılı bir şekilde değiştirildi", "success");
  					</script>';
  				}elseif ($_GET['eskisifre']=='no') {
				  	echo '<script type="text/javascript">
  					swal("Şifre Değiştirme", "Girdiğiniz eski şifre hatalı", "warning");
  					</script>';
				  }elseif ($_GET['sifredurum']=='no') {
				  	echo '<script type="text/javascript">
  					swal("Şifre Değiştirme", "Şifreniz Değiştirilemedi", "error");
  					</script>';
				  }

          if($_GET['epostadegis']=='ok'){
           echo '<script type="text/javascript">
           swal("E-Posta Değiştirme", "Başarılı bir şekilde değiştirildi", "success");
           </script>';
         }elseif ($_GET['epostadegis']=='no') {
           echo '<script type="text/javascript">
           swal("E-Posta Değiştirme", "E-postanız Değiştirilemedi", "error");
           </script>';
         }elseif ($_GET['eskieposta']=='no') {
           echo '<script type="text/javascript">
           swal("E-Posta Değiştirme", "Girdiğiniz eski e-mail hatalı", "warning");
           </script>';
         }elseif ($_GET['eskisifremail']=='no') {
           echo '<script type="text/javascript">
           swal("E-Posta Değiştirme", "Girdiğiniz eski şifre hatalı", "warning");
           </script>';
         }

         if($_GET['userduzenle']=='ok'){
           echo '<script type="text/javascript">
           swal("Bilgi Değiştirme", "Başarılı bir şekilde değiştirildi", "success");
           </script>';
         }elseif ($_GET['userduzenle']=='no') {
           echo '<script type="text/javascript">
           swal("Bilgi Değiştirme", "Profil Bilgileriniz Değiştirilemedi", "error");
           </script>';
         }
				  ?>





<script src="/Scripts/jquery.unobtrusive-ajax.min.js"></script>
</div>
<div class="col-lg-4">
<?php include 'sagblok.php'; ?>
</div>
</div>
</div>
<div class="nk-gap-2"></div>
<?php include 'footer.php'; ?>
