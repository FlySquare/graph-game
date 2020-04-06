

<?php include 'header.php';
error_reporting(0);
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

<h4>Depom</h4>
<div id="market_islemleri">
<table class="nk-table">
<thead>
<tr>
<th>İşlem İD</th>
<th>Ürün Adı</th>
<th>Alım Tarihi</th>
<th>Kullan</th>
<th>Sil</th>
</tr>
</thead>
<?php while($eskiuruncek=$depourun->fetch(PDO::FETCH_ASSOC)){?>
<tr>
  <td><?php echo $eskiuruncek['depo_id'] ?></td>
  <td><?php echo $eskiuruncek['depo_urunbaslik'] ?></td>
  <td><?php echo $eskiuruncek['depo_zaman'] ?></td>
  <td><a href="depom.php?depo_id=<?php echo $eskiuruncek['depo_sunucuid']?>&depokullan=ok&urun_ad=<?php echo $eskiuruncek['depo_urunbaslik'] ?>&depo_idd=<?php echo $eskiuruncek['depo_id'] ?>" class="nk-btn nk-btn-rounded nk-btn-color-white">Kullan - <span class="fa fa-check"></span></a></td>
  <td><a href="db/islem.php?depo_id=<?php echo $eskiuruncek['depo_id']?>&deposil=ok" class="nk-btn nk-btn-rounded nk-btn-color-white">Sil - <span class="fa fa-warning"></span></a></td>
</tr>
<?php }
if ($_GET['depokullan']=="ok") {
 $depoid=$_GET['depo_id'];
  $sunucusor=$db->prepare("SELECT * FROM site_sunucu where sunucu_id=:id");
	$sunucusor->execute(array(
		'id'=> $depoid
	));
	$sunucucek=$sunucusor->fetch(PDO::FETCH_ASSOC);

  $anlikurunsor=$db->prepare("SELECT * FROM site_urun where urun_baslik=:id");
	$anlikurunsor->execute(array(
		'id'=> $_GET['urun_ad']
	));
	$anlikuruncek=$anlikurunsor->fetch(PDO::FETCH_ASSOC);
  $user = $usercek['user_username'];
  $user2 = " ".$user." ";
  $komut = $anlikuruncek['urun_komut'];
  $komut1 = $anlikuruncek['urun_komut2'];
  require_once 'mc/Websend.php';
  $ws = new Websend($sunucucek['sunucu_ip']);
  $ws->password = $sunucucek['sunucu_konsolsifre'];

  if($ws->connect()){
      $ws->doCommandAsConsole($komut.$user2.$komut1);
      $sil=$db->prepare("DELETE from site_depo where depo_id=:id");
      $kontrol=$sil->execute(array(
        'id' => $_GET['depo_idd']
        ));
				echo '<script type="text/javascript">
				setTimeout(function() {
				 swal({
						 title: "Depo Ürün Kullanma",
						 text: "Başarılı bir şekilde ürün kullanıldı",
						 type: "success"
				 }, function() {
						 window.location = "depom.php";
				 });
		 }, 1000);
				</script>';
  }else{
		echo '<script type="text/javascript">
		swal("Depo Ürün Kullanma", "Ürünü Kullanma sırasında sorun meydana geldi. Sunucu kapalı olabilir!", "error");
		</script>';
  }
  $ws->disconnect();
}
?>
<?php

				 if ($_GET['depokullan']=='no') {
				  	echo '<script type="text/javascript">
  					swal("Depo Ürün Kullanma", "Ürünü Kullanma sırasında sorun meydana geldi.", "error");
  					</script>';
				  }
          elseif ($_GET['sil']=='ok') {
				  	echo '<script type="text/javascript">
  					swal("Depo Ürün Kullanma", "Ürün başarılı bir şekilde silinmiştir.", "success");
  					</script>';
				  }

				  ?>
</table>
<div style="text-align:center">
<div class="pagination-container"><ul class="pagination"></ul></div>
</div>
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
