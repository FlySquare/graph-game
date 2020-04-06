

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

if ($_GET['sil']=="ok") {
	echo '<script type="text/javascript">
	setTimeout(function() {
	 swal({
			 title: "Promo Kod",
			 text: "Başarılı bir şekilde kod silindi",
			 type: "success"
	 }, function() {
			 window.location = "promokodlarim.php";
	 });
}, 500);
	</script>';
}elseif ($_GET['sil']=="ok"){
	echo '<script type="text/javascript">
	setTimeout(function() {
	 swal({
			 title: "Promo Kod",
			 text: "Kod silinirken hata meydana geldi",
			 type: "error"
	 }, function() {
			 window.location = "promokodlarim.php";
	 });
}, 500);
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

<h4>Promo Kodlarım</h4>
<div id="market_islemleri">
<table class="nk-table">
<thead>
<tr>
<th>İşlem İD</th>
<th>Kod</th>
<th>Kullanım Hakkı</th>
<th>Oluşturma Zamanı</th>
<th>Ürün</th>
<th>Sil</th>
</tr>
</thead>
<?php while($promokodcek=$promokodsor->fetch(PDO::FETCH_ASSOC)){?>
<tr>
  <td><?php echo $promokodcek['userkod_id'] ?></td>
  <td><?php echo $promokodcek['userkod_kod'] ?></td>
  <td><?php echo $promokodcek['userkod_adet'] ?></td>
	<td><?php echo $promokodcek['userkod_zaman'] ?></td>
  <td><?php

	$promourun=$db->prepare("SELECT * FROM site_urun where urun_id=:id");
	$promourun->execute(array(
		'id'=>$promokodcek['userkod_urun']
	));
	$promouruncek=$promourun->fetch(PDO::FETCH_ASSOC);
		echo substr($promouruncek['urun_baslik'],0,10)."...";

	?></td>

  <td><a href="db/islem.php?userkod_id=<?php echo $promokodcek['userkod_id']?>&promokodsil=ok" class="nk-btn nk-btn-rounded nk-btn-color-white">Sil - <span class="fa fa-warning"></span></a></td>
</tr>
<?php }?>

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
