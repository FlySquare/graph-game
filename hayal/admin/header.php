<?php
ob_start();
session_start();

include '../../db/db.php';


$useradminsor=$db->prepare("SELECT * FROM site_admin where admin_mail=:mail");
$useradminsor->execute(array(
	'mail'=> $_SESSION['admin_mail']
));
$say=$useradminsor->rowCount();
$useradmincek=$useradminsor->fetch(PDO::FETCH_ASSOC);
if($say == 0){
    header("Location:login.php?durum=yetkisiz");
    exit;
}

$sorgu = $db->prepare("SELECT COUNT(*) FROM site_user");
$sorgu->execute();
$kulsayisi = $sorgu->fetchColumn();

$sorgu = $db->prepare("SELECT COUNT(*) FROM site_marketgecmis");
$sorgu->execute();
$satissay = $sorgu->fetchColumn();

$hediyekuponsor = $db->prepare("SELECT * FROM site_hediyekod ORDER BY hediyekod_id DESC");
$hediyekuponsor->execute();

$ininalsor = $db->prepare("SELECT * FROM site_ininal ORDER BY ininal_id DESC");
$ininalsor->execute();

$eftsor = $db->prepare("SELECT * FROM site_eft ORDER BY eft_id DESC");
$eftsor->execute();

$sosyalmedyasor = $db->prepare("SELECT * FROM site_sosyalmedya ORDER BY sosyalmedya_id DESC");
$sosyalmedyasor->execute();

$desteksor = $db->prepare("SELECT * FROM site_destek ORDER BY destek_id DESC");
$desteksor->execute();
$sorgu = $db->prepare("SELECT COUNT(*) FROM site_destek");
$sorgu->execute();
$bildirimsay = $sorgu->fetchColumn();

$kullanicisor=$db->prepare("SELECT * FROM site_urun");
$kullanicisor->execute();

$habersor=$db->prepare("SELECT * FROM site_haber ORDER BY haber_id DESC");
$habersor->execute();

$yorumsork=$db->prepare("SELECT * FROM site_yorum ORDER BY yorum_id DESC");
$yorumsork->execute();

$kullanicisor=$db->prepare("SELECT * FROM site_user ORDER BY users_id DESC");
$kullanicisor->execute();

$usersor=$db->prepare("SELECT * FROM site_user ORDER BY users_id DESC LIMIT 6");
$usersor->execute();


$sunucusor=$db->prepare("SELECT * FROM site_sunucu");
$sunucusor->execute();

$kategorisor=$db->prepare("SELECT * FROM site_haberkategori");
$kategorisor->execute();

$menusor=$db->prepare("SELECT * FROM site_menu");
$menusor->execute();

$slidersor=$db->prepare("SELECT * FROM site_slider ORDER BY slider_id DESC");
$slidersor->execute();

$urunsor=$db->prepare("SELECT * FROM site_urun ORDER BY urun_id DESC");
$urunsor->execute();


$adminsor=$db->prepare("SELECT * FROM site_admin ORDER BY admin_id DESC");
$adminsor->execute();

$ayarsor=$db->prepare("SELECT * FROM site_ayar where ayar_id=:id");
$ayarsor->execute(array(
	'id'=>1
));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

$hakkimizdasor=$db->prepare("SELECT * FROM site_hakkimizda where hakkimizda_id=:id");
$hakkimizdasor->execute(array(
	'id'=>1
));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);

$siteiceriksor=$db->prepare("SELECT * FROM site_icerik where icerik_id=:id");
$siteiceriksor->execute(array(
	'id'=>1
));
$siteicerikcek=$siteiceriksor->fetch(PDO::FETCH_ASSOC);


$indexmarketgecmis=$db->prepare("SELECT * FROM site_marketgecmis order by marketgecmis_id DESC LIMIT 6");
$indexmarketgecmis->execute();

$ayliktoplam = $db->prepare("SELECT SUM(marketgecmis_fiyat) AS sayi FROM site_marketgecmis where marketgecmis_fiyat");
$ayliktoplam->execute();
																																																		$ayliktoplamcek=$ayliktoplam->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Bolfps | Admin Panel</title>
        <!-- Favicon-->
        <link rel="icon" href="favicon.ico" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

<!-- Bootstrap Core Css -->
<link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<!-- Waves Effect Css -->
<link href="plugins/node-waves/waves.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<!-- Animation Css -->
<link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/b2aeef6d36.js" crossorigin="anonymous"></script>
<!-- Custom Css -->
<link href="css/style.css" rel="stylesheet">
<link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

<link href="plugins/waitme/waitMe.css" rel="stylesheet" />



<link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->

    <!-- #END# Page Loader -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->

    <!-- #END# Search Bar -->
    <!-- Top Bar -->
<nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php">Bolfps | Admin Panel</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <!-- #END# Call Search -->
                    <li><a href=""><i class="material-icons">home</i></a></li>
                    <!-- Notifications -->
                    <li class="dropdown">

                        <ul class="dropdown-menu">
                            <li class="header"><?php echo $_SESSION['admin_mail']; ?></li>


                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <!-- Tasks -->

                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
