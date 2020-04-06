

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
<?php

				  if($_GET['aktarildi']=='ok'){
				  	echo '<script type="text/javascript">
  					swal("Kredi Aktarıma", "Başarılı bir şekilde aktarıldı", "success");
  					</script>';
  				}elseif ($_GET['yetersizbakiye']=='no') {
				  	echo '<script type="text/javascript">
  					swal("Kredi Aktarıma", "Bakiyeniz Yetersiz", "warning");
  					</script>';
				  }elseif ($_GET['aktarildi']=='no') {
				  	echo '<script type="text/javascript">
  					swal("Kredi Aktarıma", "Aktarma sırasında sorun meydana geldi. Girilen Hesap Adı Yanlış Olabilir!", "error");
  					</script>';
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
<form action="" method="POST">
<input name="__RequestVerificationToken" type="hidden" value="D7LxJwzviYqm7zPESEKZ3poAmOFpRA-tSNFbAUGJxfNy37wYGoPkAlyRxCh2hC2iFyImpWUPaDDP--LPvtP9yrhscl1jpBUUi2Kp6Tl593I1" />
<h4>Kredi Aktar</h4>
<div class="form-group">
<label>Kredinin aktarılacağı hesap</label>
<input class="form-control" required="required" name="krediaktar_usersid" id="isim" type="text">
</div>
<div class="form-group">
<label>Aktarılacak miktar</label>
<input class="form-control" required="required" name="krediaktar_miktar" id="miktar" type="number">
</div>
<div class="form-group">
<label>Açıklama</label>
<input class="form-control" required="required" name="krediaktar_aciklama" id="aciklama" type="text">
<input class="form-control" name="krediaktar_gonderenid" value="<?php echo $usercek['user_username'] ?>" type="hidden">
</div>
<div style="text-align:center">
<button name="kredigonder" type="submit" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block">Kredi Aktar - <span class="fa fa-credit-card"></span></button>
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





<script src="/Scripts/jquery.unobtrusive-ajax.min.js"></script>
</div>
<div class="col-lg-4">
<?php include 'sagblok.php'; ?>
</div>
</div>
</div>
<div class="nk-gap-2"></div>
<?php include 'footer.php'; ?>
