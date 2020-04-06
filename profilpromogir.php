

<?php include 'header.php';
if (isset($_POST['promokodigir'])) {
	$userkod=$_POST['userkod_kod'];
	$promokodsor=$db->prepare("SELECT * FROM site_userkod where userkod_kod=:id");
	$promokodsor->execute(array(
		'id'=>$userkod
	));
	$promokodcek=$promokodsor->fetch(PDO::FETCH_ASSOC);


	$usersorgula=$db->prepare("SELECT * FROM site_userkodkullanan where userkodkullanan_kod=:id");
	$usersorgula->execute(array(
		'id'=>$userkod
	));
	$usersorgulacek=$usersorgula->fetch(PDO::FETCH_ASSOC);


	$promokodadet = $promokodcek['userkod_adet'];


			 if(!$usersorgulacek['userkodkullanan_user'] == $usercek['user_username']){

			 		if($promokodadet >= 1){
			 			$promokodadet = $promokodadet - 1;
			 			$ayarkaydet=$db->prepare("UPDATE site_userkod SET
			 				userkod_adet=:userkod_adet
			 				WHERE userkod_kod='{$userkod}'");
			 			$update=$ayarkaydet->execute(array(
			 				'userkod_adet' => $promokodadet
			 				));
			 			if ($update) {
			 				$promourunsor=$db->prepare("SELECT * FROM site_urun where urun_id=:id");
			 				$promourunsor->execute(array(
			 					'id'=>$promokodcek['userkod_urun']
			 				));
			 				$promouruncek=$promourunsor->fetch(PDO::FETCH_ASSOC);
			 				$depoekle=$db->prepare("INSERT INTO site_depo SET
			 					depo_urunbaslik=:depo_urunbaslik,
			 					depo_userid=:depo_userid,
			 					depo_sunucuid=:depo_sunucuid
			 					");

			 				$insert=$depoekle->execute(array(
			 					'depo_urunbaslik' => $promouruncek['urun_baslik'],
			 					'depo_userid' => $usercek['users_id'],
			 					'depo_sunucuid' => $promouruncek['urun_kategori']
			 					));
			 					if ($insert) {
			 					

			 						$query = $db->prepare("INSERT INTO site_marketgecmis SET
			 							marketgecmis_urunbaslik=:marketgecmis_urunbaslik,
			 							marketgecmis_userid =:marketgecmis_userid,
			 							marketgecmis_kategori =:marketgecmis_kategori,
			 							marketgecmis_fiyat =:marketgecmis_fiyat
			 							");
			 							$insertmarket = $query->execute(array(
			 								'marketgecmis_urunbaslik' => $promouruncek['urun_baslik'],
			 								'marketgecmis_userid' => $usercek['users_id'],
			 								'marketgecmis_kategori' => $promouruncek['urun_kategori'],
			 								'marketgecmis_fiyat' => $promouruncek['urun_fiyat']
			 							));
			 							if ($insertmarket) {

			 							}else {
											echo '<script type="text/javascript">
										 setTimeout(function() {
											swal({
													title: "Promo Kod Kullanımı",
													text: "Market geçmişi sırasında sorun meydana geldi. Lütfen bu ekranın fotoğrafını yöneticiye iletiniz!!",
													type: "error"
											}, function() {
													window.location = "profilpromogir.php";
											});
									 }, 500);
										 </script>';
			 							}

			 					}else {
									echo '<script type="text/javascript">
								 setTimeout(function() {
									swal({
											title: "Promo Kod Kullanımı",
											text: "Depo kayıdı sırasında sorun meydana geldi. Lütfen bu ekranın fotoğrafını yöneticiye iletiniz!!",
											type: "error"
									}, function() {
											window.location = "profilpromogir.php";
									});
							 }, 500);
								 </script>';
			 					}


			 					$kullananekle=$db->prepare("INSERT INTO site_userkodkullanan SET
			 						userkodkullanan_user=:userkodkullanan_user,
									userkodkullanan_kod=:userkodkullanan_kod
			 						");

			 					$insertkullan=$kullananekle->execute(array(
			 						'userkodkullanan_user' => $usercek['user_username'],
									'userkodkullanan_kod' => $userkod
			 						));

									echo '<script type="text/javascript">
								 setTimeout(function() {
									swal({
											title: "Promo Kod Kullanımı",
											text: "Promo kod başarıyla kullanıldı.",
											type: "success"
									}, function() {
											window.location = "depom.php";
									});
								}, 500);
								 </script>';
			 			} else {
							echo '<script type="text/javascript">
						 setTimeout(function() {
							swal({
									title: "Promo Kod Kullanımı",
									text: "Kullanıcı veritabanı kayıdı sırasında sorun meydana geldi. Lütfen bu ekranın fotoğrafını yöneticiye iletiniz!!",
									type: "error"
							}, function() {
									window.location = "profilpromogir.php";
							});
					 }, 500);
						 </script>';
										}
			 			}
			 		else {
						echo '<script type="text/javascript">
				 	 setTimeout(function() {
				 		swal({
				 				title: "Promo Kod Kullanımı",
				 				text: "Bu kodun kullanım hakkı bitmiştir!!",
				 				type: "warning"
				 		}, function() {
				 				window.location = "profilpromogir.php";
				 		});
				 }, 500);
				 	 </script>';
				 			 		}
			 		} else{

									echo '<script type="text/javascript">
									setTimeout(function() {
									 swal({
											 title: "Promo Kod Kullanımı",
											 text: "Bu kullanıcı daha önce bu kodu kullanmış!!",
											 type: "warning"
									 }, function() {
											 window.location = "profilpromogir.php";
									 });
							 }, 500);
									</script>';
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
<form action="" method="POST">
<h4>Promo Kodu</h4>
<div class="form-group">
<label>Lütfen Promo Kodunu Giriniz</label>
<input class="form-control" required="required" name="userkod_kod" id="isim" type="text">
<input type="hidden" name="user_username" value="<?php echo $usercek['user_username'] ?>">
</div>
<div style="text-align:center">
<button name="promokodigir" type="submit" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block">Kupon Kullan</button>
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
