

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
if (isset($_POST['hediyekupongir'])) {
$girilenhediyekupon=$_POST['hediyekod_kod'];
$users_id=$_POST['users_id'];
$query = $db->query("SELECT * FROM site_hediyekod WHERE hediyekod_kod = '{$girilenhediyekupon}'")->fetch(PDO::FETCH_ASSOC);
if ($query['hediyekod_tur'] == "1") {
	if ($query['hediyekod_durum']==1) {
	  if ($query){
	   $hediyemiktar=$query['hediyekod_hediyemiktar'];
	   $userkredi = $db->query("SELECT * FROM site_user WHERE users_id = '{$users_id}'")->fetch(PDO::FETCH_ASSOC);
	   $kulkredi = $userkredi['user_kredi'];
	   $kulguncellenecekkredi = $kulkredi + $hediyemiktar;
	   $ayarkaydet=$db->prepare("UPDATE site_user SET
	          user_kredi=:user_kredi
	     WHERE users_id='{$users_id}'");

	   $update=$ayarkaydet->execute(array(
	         'user_kredi' => $kulguncellenecekkredi
	     ));
	     if ($update) {
	       $kodkaydet=$db->prepare("UPDATE site_hediyekod SET
	              hediyekod_durum=:hediyekod_durum
	         WHERE hediyekod_kod='{$girilenhediyekupon}'");

	       $update=$kodkaydet->execute(array(
	             'hediyekod_durum' => 0
	         ));
	       Header("Location:../profilhediyegir.php?hediye=ok");
	     }else {
	       Header("Location:../profilhediyegir.php?hediye=no");
	     }
	  }else {
	    echo "kod yanlış";
	  }
	}else {
	  Header("Location:../profilhediyegir.php?hediyekodpasif=no");
	}
}elseif ($query['hediyekod_tur'] == "2") {
 $urunid = $query['hediyekod_hediyemiktar'];
	$urunidsor=$db->prepare("SELECT * FROM site_urun where urun_id LIKE $urunid");
	$urunidsor->execute();
	$urunidcek=$urunidsor->fetch(PDO::FETCH_ASSOC);
	$urunbaslik=$urunidcek['urun_baslik'];
	 $sunucuid=$urunidcek['urun_kategori'];

	 $userid = $usercek['users_id'];


		$ayarekle=$db->prepare("INSERT INTO site_depo SET
			depo_urunbaslik=:depo_urunbaslik,
			depo_userid=:depo_userid,
			depo_sunucuid=:depo_sunucuid
			");

		$insert=$ayarekle->execute(array(
			'depo_urunbaslik' => $urunbaslik,
			'depo_userid' => $userid,
			'depo_sunucuid' => $sunucuid
			));



		if ($insert) {

			echo '<script type="text/javascript">
			setTimeout(function() {
			 swal({
					 title: "Hediye Kuponu Kullanma",
					 text: "Başarılı bir şekilde kupon kullanıldı",
					 type: "success"
			 }, function() {
					 window.location = "depom.php";
			 });
	 }, 1000);
			</script>';

		} else {
			echo '<script type="text/javascript">
			setTimeout(function() {
			 swal({
					 title: "Hediye Kuponu Kullanma",
					 text: "Kupon kullanma sırasında hata meydana geldi",
					 type: "error"
			 }, function() {
					 window.location = "profilhediyegir.php";
			 });
		}, 1000);
			</script>';
		}


}
}
?>
<?php

				  if($_GET['hediye']=='ok'){
				  	echo '<script type="text/javascript">
  					swal("Hediye Kupon", "Başarılı bir şekilde kupon kullanıldı", "success");
  					</script>';
  				}elseif ($_GET['hediyekodpasif']=='no') {
				  	echo '<script type="text/javascript">
  					swal("Hediye Kupon", "Bu Kupon Şu Anda Aktif Değil Veya Yanlış Kod Girdiniz", "warning");
  					</script>';
				  }elseif ($_GET['hediye']=='no') {
				  	echo '<script type="text/javascript">
  					swal("Hediye Kupon", "Kupon Kullanma sırasında sorun meydana geldi.", "error");
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
<h4>Hediye Kodu</h4>
<div class="form-group">
<label>Lütfen Hediye Kodunu Giriniz</label>
<input class="form-control" required="required" name="hediyekod_kod" id="isim" type="text">
<input type="hidden" name="users_id" value="<?php echo $usercek['users_id'] ?>">
</div>
<div style="text-align:center">
<button name="hediyekupongir" type="submit" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block">Kupon Kullan</button>
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
