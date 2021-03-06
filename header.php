<?php
error_reporting(E_ALL & ~E_NOTICE);

ob_start();
session_start();
include 'db/db.php';
$ayarsor=$db->prepare("SELECT * FROM site_ayar where ayar_id=:id");
$ayarsor->execute(array(
	'id'=>1
));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

$dssc = "discord";
$discordsor=$db->prepare("SELECT * FROM site_sosyalmedya where sosyalmedya_isim=:id");
$discordsor->execute(array(
	'id'=>$dssc
));
$discordcek=$discordsor->fetch(PDO::FETCH_ASSOC);


$hakkimizdasor=$db->prepare("SELECT * FROM site_hakkimizda where hakkimizda_id=:id");
$hakkimizdasor->execute(array(
	'id'=>1
));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);

$menusor=$db->prepare("SELECT * FROM site_menu");
$menusor->execute();
$sosyalmedyasor=$db->prepare("SELECT * FROM site_sosyalmedya");
$sosyalmedyasor->execute();
$slidersor=$db->prepare("SELECT * FROM site_slider LIMIT 4");
$slidersor->execute();
$kategorikartsor=$db->prepare("SELECT * FROM site_kategorikart");
$kategorikartsor->execute();
$habersor=$db->prepare("SELECT * FROM site_haber ORDER BY haber_id DESC");
$habersor->execute();
$ininalsor=$db->prepare("SELECT * FROM site_ininal where ininal_durum=1");
$ininalsor->execute();
$eftsor=$db->prepare("SELECT * FROM site_eft where eft_durum=1");
$eftsor->execute();

$sonurunsor=$db->prepare("SELECT * FROM site_urun ORDER BY urun_id");
$sonurunsor->execute();
$urunsor=$db->prepare("SELECT * FROM site_urun ORDER BY urun_id DESC LIMIT 2");
$urunsor->execute();

if (isset($_SESSION['user_username'])) {


		$usersor=$db->prepare("SELECT * FROM site_user where user_username=:mail");
		$usersor->execute(array(
			'mail'=> $_SESSION['user_username']
		));
		$say=$usersor->rowCount();
		$usercek=$usersor->fetch(PDO::FETCH_ASSOC);



	$eskiurun=$db->prepare("SELECT * FROM site_marketgecmis where marketgecmis_userid=:id ORDER BY marketgecmis_id DESC LIMIT 20");
	$eskiurun->execute(array(
		'id'=> $usercek['users_id']
	));


	$depourun=$db->prepare("SELECT * FROM site_depo where depo_userid=:id ORDER BY depo_id DESC");
	$depourun->execute(array(
		'id'=> $usercek['users_id']
	));
	$urungecmissor=$db->prepare("SELECT * FROM site_marketgecmis where marketgecmis_userid=:id");
	$urungecmissor->execute(array(
		'id'=> $usercek['users_id']
	));
	$urungecmiscek=$urungecmissor->fetch(PDO::FETCH_ASSOC);

	$promokodsor=$db->prepare("SELECT * FROM site_userkod where userkod_sahip=:id ORDER BY userkod_id DESC");
	$promokodsor->execute(array(
		'id'=> $usercek['user_username']
	));




		$eskigonderim=$db->prepare("SELECT * FROM site_krediaktar where krediaktar_gonderenid=:id ORDER BY krediaktar_id DESC LIMIT 20");
		$eskigonderim->execute(array(
			'id'=> $usercek['users_id']
		));

		$eskigonderimsor=$db->prepare("SELECT * FROM site_krediaktar where krediaktar_gonderenid=:id");
		$eskigonderimsor->execute(array(
			'id'=> $usercek['users_id']
		));
		$eskigonderimcek=$eskigonderimsor->fetch(PDO::FETCH_ASSOC);
		if (isset($eskigonderimcek['krediaktar_usersid'])) {
			$gecmisaktarmasor=$db->prepare("SELECT * FROM site_user where users_id=:id");
			$gecmisaktarmasor->execute(array(
				'id'=> $eskigonderimcek['krediaktar_usersid']
			));
			$gecmiskredicek=$gecmisaktarmasor->fetch(PDO::FETCH_ASSOC);
		}
}


?>
<!DOCTYPE html>
<!--
    Name: DarkGame
    Version: 1.0.8
    Author: BolFps.Com
    Website: https://bolfps.com/
    Purchase: https://bolfps.com/
    Support: https://bolfps.com/
    License: MIT
    Copyright 2020.
-->

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title><?php echo $ayarcek['ayar_title']?></title>
    <meta name="description" content="<?php echo $ayarcek['ayar_description']?>">
    <meta name="keywords" content="<?php echo $ayarcek['ayar_keywords']?>">
    <meta name="author" content="<?php echo $ayarcek['ayar_author']?>">
    <link rel="icon" type="image/png" href="<?php echo $ayarcek['ayar_favicon']?>">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7cOpen+Sans:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/vendor/bootstrap/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/b2aeef6d36.js" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link rel="stylesheet" href="assets/css/goodgames.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
</head>
<body>
<header class="nk-header nk-header-opaque">

<style media="screen">
/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}
</style>

<!-- START: Top Contacts -->
<div class="nk-contacts-top">
    <div class="container">
        <div class="nk-contacts-left">
            <ul class="nk-social-links">
            <?php
                 while($sosyalmedyacek=$sosyalmedyasor->fetch(PDO::FETCH_ASSOC)){?>
                <li><a class="nk-social-<?php echo $sosyalmedyacek['sosyalmedya_isim'] ?>" href="<?php echo $sosyalmedyacek['sosyalmedya_link'] ?>"><i class="<?php echo $sosyalmedyacek['sosyalmedya_icon'] ?>"></i></a></li>
                 <?php }?>
            </ul>
        </div>
				<div class="nk-contacts-right">
            <ul class="nk-contacts-icons">

                <li>
                    <a href="#" data-toggle="modal" data-target="#modalSearch">
                        <span class="fa fa-search"></span>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>
<!-- END: Top Contacts -->



    <nav class="nk-navbar nk-navbar-top nk-navbar-sticky nk-navbar-autohide">
        <div class="container">
            <div class="nk-nav-table">

                <a href="index.php" class="nk-nav-logo">
                    <img src="<?php echo $ayarcek['ayar_logo'] ?>" alt="GoodGames" width="199">
                </a>

                <ul class="nk-nav nk-nav-right d-none d-lg-table-cell" data-nav-mobile="#nk-nav-mobile">


        <?php
                 while($menucek=$menusor->fetch(PDO::FETCH_ASSOC)){?>
                 <li>
            <a href="<?php echo $menucek['menu_link'] ?>">
            <i class="<?php echo $menucek['menu_icon'] ?>"></i>  <?php echo $menucek['menu_isim'] ?>

            </a>
        </li>
                 <?php }?>
        </li>
                </ul>
                <ul class="nk-nav nk-nav-right nk-nav-icons">

                        <li class="single-icon d-lg-none">
                            <a href="#" class="no-link-effect" data-nav-toggle="#nk-nav-mobile">
                                <span class="nk-icon-burger">
                                    <span class="nk-t-1"></span>
                                    <span class="nk-t-2"></span>
                                    <span class="nk-t-3"></span>
                                </span>
                            </a>
                        </li>


                </ul>
            </div>
        </div>
    </nav>
    <!-- END: Navbar -->

</header>
