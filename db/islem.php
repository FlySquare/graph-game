<?php
ob_start();
session_start();
include 'db.php';

if (isset($_POST['usersearch'])) {
	$gelen=$_POST['usersearch'];
	$cek = $db->query("SELECT * FROM site_user WHERE user_username LIKE '$gelen'",PDO::FETCH_ASSOC);
	if($cek->rowCount()){
	foreach($cek as $kayit){
	Header("Location:../profil.php?searchuser=$gelen");
	}
	}


}







if (isset($_POST['kayitol'])) {
	$username = $_POST['user_username'];
	$usermail = $_POST['user_eposta'];
	$userad = $_POST['user_ad'];
	$userpas = $_POST['user_sifre'];
  if ($username == null || $usermail == null || $userad == null || $userpas == null) {
		header("Location:../kayit-ol.php?bilgiler=no");
  }else {
		$kontrol = $db->prepare("SELECT * FROM site_user WHERE user_username=?");//E-Posta ile daha önce kayıt olunmuşmu?
			 $kontrol->execute(array($username));
			 $kontrolmail = $db->prepare("SELECT * FROM site_user WHERE user_eposta=?");//E-Posta ile daha önce kayıt olunmuşmu?
					$kontrolmail->execute(array($usermail));
			 if($kontrol->rowCount()){
				 header("Location:../kayit-ol.php?username=no");
			 }elseif($kontrolmail->rowCount()){
				 header("Location:../kayit-ol.php?usermail=no");
			 } else {

	 		 $ayarekle=$db->prepare("INSERT INTO site_user SET
		 user_ad=:user_ad,
		 user_eposta=:user_eposta,
		 user_username=:user_username,
		 user_yas=:user_yas,
		 user_discord=:user_discord,
		 user_kredi=:user_kredi,
		 user_sifre=:user_sifre
		 ");

	 $insert=$ayarekle->execute(array(
		 'user_ad' => $_POST['user_ad'],
		 'user_eposta' => $_POST['user_eposta'],
		 'user_username' => $_POST['user_username'],
		 'user_yas' => $_POST['user_yas'],
		 'user_discord' => $_POST['user_discord'],
		 'user_kredi' => $_POST['user_kredi'],
		 'user_sifre' => md5($_POST['user_sifre'])
		 ));
		 if ($insert) {
			 Header("Location:../kayit-ol.php?kayit=ok");
		 } else {
			 Header("Location:../kayit-ol.php?kayit=no");
		 }

			 }
  }

}

if (isset($_POST['genelayarkaydet'])) {


		$uploads_dir = '../dimg';

		@$tmp_name = $_FILES['ayar_logo']["tmp_name"];
		@$name = $_FILES['ayar_logo']["name"];

		$benzersizsayi4=rand(20000,32000);
		$refimgyol=substr($uploads_dir, 3)."/".$benzersizsayi4.$name;

		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE site_ayar SET
		ayar_logo=:logo,
		ayar_title=:ayar_title,
		ayar_description=:ayar_description,
		ayar_keywords=:ayar_keywords,
		ayar_author=:ayar_author,
		ayar_parabirimi=:ayar_parabirimi
		WHERE ayar_id=1");

	$update=$ayarkaydet->execute(array(
		'logo' => $refimgyol,
		'ayar_title' => $_POST['ayar_title'],
		'ayar_description' => $_POST['ayar_description'],
		'ayar_keywords' => $_POST['ayar_keywords'],
		'ayar_author' => $_POST['ayar_author'],
			'ayar_parabirimi' => $_POST['ayar_parabirimi']
		));


	if ($update) {
		$resimsilunlink=$_POST['eski_yol'];
		unlink("../$resimsilunlink");

		header("Location:../hayal/admin/genelayar.php?durum=ok");

	} else {

		header("Location:../hayal/admin/genelayar.php?durum=no");
	}

}


if (isset($_POST['apiayarkaydet'])) {

	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE site_ayar SET

		ayar_analystic=:ayar_analystic,
		ayar_maps=:ayar_maps,
		ayar_zoppim=:ayar_zoppim,
        ayar_smtpport=:ayar_smtpport,
		ayar_smtppassword=:ayar_smtppassword,
		ayar_smtphost=:ayar_smtphost
		WHERE ayar_id=1");

	$update=$ayarkaydet->execute(array(

		'ayar_analystic' => $_POST['ayar_analystic'],
		'ayar_maps' => $_POST['ayar_maps'],
        'ayar_zoppim' => $_POST['ayar_zoppim'],
        'ayar_smtpport' => $_POST['ayar_smtpport'],
		'ayar_smtppassword' => $_POST['ayar_smtppassword'],
		'ayar_smtphost' => $_POST['ayar_smtphost']
		));


	if ($update) {

		header("Location:../hayal/admin/apiayar.php?durum=ok");

	} else {

		header("Location:../hayal/admin/apiayar.php?durum=no");
	}

}
if (isset($_POST['hakkimizdaayarkaydet'])) {

	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE site_hakkimizda SET

		hakkimizda_baslik=:hakkimizda_baslik,
		hakkimizda_icerik=:hakkimizda_icerik
		WHERE hakkimizda_id=1");

	$update=$ayarkaydet->execute(array(

		'hakkimizda_baslik' => $_POST['hakkimizda_baslik'],
		'hakkimizda_icerik' => $_POST['hakkimizda_icerik']
		));


	if ($update) {

		header("Location:../hayal/admin/hakkimizdaayar.php?durum=ok");

	} else {

		header("Location:../hayal/admin/hakkimizdaayar.php?durum=no");
	}

}



if (isset($_POST['admingiris'])) {

$admin_mail=$_POST['admin_mail'];
$admin_sifre=md5($_POST['admin_sifre']);

$kullanicisor=$db->prepare("SELECT * FROM site_admin where admin_mail=:mail and admin_sifre=:password");
	$kullanicisor->execute(array(
		'mail' => $admin_mail,
		'password' => $admin_sifre

		));

	echo $say=$kullanicisor->rowCount();

	if ($say==1) {

		$_SESSION['admin_mail']=$admin_mail;
		header("Location:../hayal/admin/index.php");
		exit;



	} else {

		header("Location:../hayal/admin/login.php?durum=no");
		exit;
	}

}
	if (isset($_POST['kullanicigiris'])) {

		$user_username=htmlspecialchars($_POST['user_username']);
		$user_sifre=md5($_POST['user_sifre']);

		$kullanicisor=$db->prepare("SELECT * FROM site_user where user_username=:mail and user_sifre=:password");
			$kullanicisor->execute(array(
				'mail' => $user_username,
				'password' => $user_sifre

				));

			 $say=$kullanicisor->rowCount();

			if ($say==1) {

				 $_SESSION['user_username']=$user_username;
				header("Location:../profil.php?durum=yes");
				exit;



			} else {

				header("Location:../index.php?durum=no");
				exit;
			}

}
if (isset($_POST['kullaniciduzenle'])) {

	$users_id=$_POST['users_id'];

	$ayarkaydet=$db->prepare("UPDATE site_user SET
		user_ad=:user_ad,
		user_eposta=:user_eposta,
		user_username=:user_username,
		user_yas=:user_yas,
		user_discord=:user_discord,
		user_kredi=:user_kredi
		WHERE users_id={$_POST['users_id']}");

	$update=$ayarkaydet->execute(array(
		'user_ad' => $_POST['user_ad'],
		'user_eposta' => $_POST['user_eposta'],
		'user_username' => $_POST['user_username'],
		'user_yas' => $_POST['user_yas'],
		'user_discord' => $_POST['user_discord'],
		'user_kredi' => $_POST['user_kredi']
		));


	if ($update) {

		Header("Location:../hayal/admin/kullanici-duzenle.php?users_id=$users_id&durum=ok");

	} else {

		Header("Location:../hayal/admin/kullanici-duzenle.php?users_id=$users_id&durum=no");
	}

}

if (isset($_POST['adminduzenle'])) {

	$admin_id=$_POST['admin_id'];

	$ayarkaydet=$db->prepare("UPDATE site_admin SET
		admin_foto=:admin_foto,
		admin_isim=:admin_isim,
		admin_mail=:admin_mail,
		admin_rutbe=:admin_rutbe
		WHERE admin_id={$_POST['admin_id']}");

	$update=$ayarkaydet->execute(array(
		'admin_foto' => $_POST['admin_foto'],
		'admin_isim' => $_POST['admin_isim'],
		'admin_mail' => $_POST['admin_mail'],
		'admin_rutbe' => $_POST['admin_rutbe']
		));


	if ($update) {

		Header("Location:../hayal/admin/admin-duzenle.php?admin_id=$admin_id&durum=ok");

	} else {

		Header("Location:../hayal/admin/admin-duzenle.php?admin_id=$admin_id&durum=no");
	}

}
if ($_GET['sosyalmedyasil']=="ok") {

	$sil=$db->prepare("DELETE from site_sosyalmedya where sosyalmedya_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['sosyalmedya_id']
		));
	if ($kontrol) {
		header("location:../hayal/admin/socialmedia.php?sil=ok");
	} else {
		header("location:../hayal/admin/socialmedia.php?sil=no");
	}
}
if ($_GET['onayver']=="ok") {



		$haber_id=$_GET['users_id'];

		$ayarkaydet=$db->prepare("UPDATE site_user SET
			user_yetki=:user_yetki
			WHERE users_id={$_GET['users_id']}");

		$update=$ayarkaydet->execute(array(
			'user_yetki' => 5
			));


		if ($update) {

			Header("Location:../hayal/admin/kullanicilar.php?onayver=ok");

		} else {

			Header("Location:../hayal/admin/kullanicilar.php?onayver=no");
		}


}
if ($_GET['onayal']=="ok") {



		$haber_id=$_GET['users_id'];

		$ayarkaydet=$db->prepare("UPDATE site_user SET
			user_yetki=:user_yetki
			WHERE users_id={$_GET['users_id']}");

		$update=$ayarkaydet->execute(array(
			'user_yetki' => 1
			));


		if ($update) {

			Header("Location:../hayal/admin/kullanicilar.php?onayal=ok");

		} else {

			Header("Location:../hayal/admin/kullanicilar.php?onayal=no");
		}


}
if ($_GET['promokodsil']=="ok") {

	$sil=$db->prepare("DELETE from site_userkod where userkod_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['userkod_id']
		));
	if ($kontrol) {
		header("location:../promokodlarim.php?sil=ok");
	} else {
		header("location:../promokodlarim.php?sil=no");
	}
}
if ($_GET['yorumsil']=="ok") {

	$sil=$db->prepare("DELETE from site_yorum where yorum_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['yorum_id']
		));
	if ($kontrol) {
		header("location:../hayal/admin/yorumlar.php?sil=ok");
	} else {
		header("location:../hayal/admin/yorumlar.php?sil=no");
	}
}
if ($_GET['menusil']=="ok") {

	$sil=$db->prepare("DELETE from site_menu where menu_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['menu_id']
		));
	if ($kontrol) {
		header("location:../hayal/admin/menuler.php?sil=ok");
	} else {
		header("location:../hayal/admin/menuler.php?sil=no");
	}
}
if ($_GET['bankasil']=="ok") {

	$sil=$db->prepare("DELETE from site_eft where eft_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['eft_id']
		));
	if ($kontrol) {
		header("location:../hayal/admin/eftodeme.php?sil=ok");
	} else {
		header("location:../hayal/admin/eftodeme.php?sil=no");
	}
}


if ($_GET['deposil']=="ok") {

	$sil=$db->prepare("DELETE from site_depo where depo_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['depo_id']
		));
	if ($kontrol) {
		header("location:../depom.php?sil=ok");
	} else {
		header("location:../depom.php?sil=no");
	}
}
if ($_GET['ininalsil']=="ok") {

	$sil=$db->prepare("DELETE from site_ininal where ininal_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['ininal_id']
		));
	if ($kontrol) {
		header("location:../hayal/admin/ininalodeme.php?sil=ok");
	} else {
		header("location:../hayal/admin/ininalodeme.php?sil=no");
	}
}
if ($_GET['sunucusil']=="ok") {

	$sil=$db->prepare("DELETE from site_sunucu where sunucu_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['sunucu_id']
		));
	if ($kontrol) {
		header("location:../hayal/admin/sunucular.php?sil=ok");
	} else {
		header("location:../hayal/admin/sunucular.php?sil=no");
	}
}
if ($_GET['marketgecmis']=="ok") {

	$sil=$db->prepare("DELETE from site_marketgecmis where marketgecmis_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['marketgecmis_id']
		));
	if ($kontrol) {
		header("location:../hayal/admin/magaza-gecmis.php?sil=ok");
	} else {
		header("location:../hayal/admin/magaza-gecmis.php?sil=no");
	}
}
if ($_GET['hediyekodsil']=="ok") {

	$sil=$db->prepare("DELETE from site_hediyekod where hediyekod_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['hediyekod_id']
		));
	if ($kontrol) {
		header("location:../hayal/admin/bakiyekuponlar.php?sil=ok");
	} else {
		header("location:../hayal/admin/bakiyekuponlar.php?sil=no");
	}
}
if ($_GET['desteksil']=="ok") {

	$sil=$db->prepare("DELETE from site_destek where destek_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['destek_id']
		));
	if ($kontrol) {
		header("location:../hayal/admin/bildirimler.php?sil=ok");
	} else {
		header("location:../hayal/admin/bildirimler.php?sil=no");
	}
}
if ($_GET['usersil']=="ok") {

	$sil=$db->prepare("DELETE from site_user where users_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['users_id']
		));
	if ($kontrol) {
		header("location:../hayal/admin/kullanicilar.php?sil=ok");
	} else {
		header("location:../hayal/admin/kullanicilar.php?sil=no");
	}
}
if ($_GET['slidersil']=="ok") {

	$sil=$db->prepare("DELETE from site_slider where slider_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['slider_id']
		));
	if ($kontrol) {
		header("location:../hayal/admin/sliderlar.php?slider_id=ok");
	} else {
		header("location:../hayal/admin/sliderlar.php?slider_id=no");
	}
}
if ($_GET['urunsil']=="ok") {

	$sil=$db->prepare("DELETE from site_urun where urun_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['urun_id']
		));
	if ($kontrol) {
		header("location:../hayal/admin/urunler.php?urun_id=ok");
	} else {
		header("location:../hayal/admin/urunler.php?urun_id=no");
	}
}
if ($_GET['habersil']=="ok") {

	$sil=$db->prepare("DELETE from site_haber where haber_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['haber_id']
		));
	if ($kontrol) {
		header("location:../hayal/admin/haberler.php?sil=ok");
	} else {
		header("location:../hayal/admin/haberler.php?sil=no");
	}
}
if ($_GET['adminsil']=="ok") {

	$sil=$db->prepare("DELETE from site_admin where admin_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['admin_id']
		));
	if ($kontrol) {
		header("location:../hayal/admin/adminler.php?admin_id=ok");
	} else {
		header("location:../hayal/admin/adminler.php?admin_id=no");
	}
}


if ($_GET['yorumpasif']) {

	$haber_id=$_GET['yorum_id'];

	$ayarkaydet=$db->prepare("UPDATE site_yorum SET
		yorum_durum=:yorum_durum
		WHERE yorum_id={$_GET['yorum_id']}");

	$update=$ayarkaydet->execute(array(
		'yorum_durum' => 0
		));


	if ($update) {

		Header("Location:../hayal/admin/yorumlar.php?yorumpasif=ok");

	} else {

		Header("Location:../hayal/admin/yorumlar.php?yorumpasif=no");
	}

}
if ($_GET['yorumaktif']) {

	$haber_id=$_GET['yorum_id'];

	$ayarkaydet=$db->prepare("UPDATE site_yorum SET
		yorum_durum=:yorum_durum
		WHERE yorum_id={$_GET['yorum_id']}");

	$update=$ayarkaydet->execute(array(
		'yorum_durum' => 1
		));


	if ($update) {

		Header("Location:../hayal/admin/yorumlar.php?yorumaktif=ok");

	} else {

		Header("Location:../hayal/admin/yorumlar.php?yorumaktif=no");
	}

}



if (isset($_POST['haberduzenle'])) {

	$haber_id=$_POST['haber_id'];

	$ayarkaydet=$db->prepare("UPDATE site_haber SET
		haber_foto=:haber_foto,
		haber_baslik=:haber_baslik,
		haber_kategori=:haber_kategori,
		haber_sahip=:haber_sahip,
		haber_icerik=:editor1
		WHERE haber_id={$_POST['haber_id']}");

	$update=$ayarkaydet->execute(array(
		'haber_foto' => $_POST['haber_foto'],
		'haber_baslik' => $_POST['haber_baslik'],
		'haber_kategori' => $_POST['haber_kategori'],
		'haber_sahip' => $_POST['haber_sahip'],
		'editor1' => $_POST['editor1']
		));


	if ($update) {

		Header("Location:../hayal/admin/haber-duzenle.php?haber_id=$haber_id&durum=ok");

	} else {

		Header("Location:../hayal/admin/haber-duzenle.php?haber_id=$haber_id&durum=no");
	}

}

if (isset($_POST['urunduzenle'])) {

	$urun_id=$_POST['urun_id'];
	$uploads_dir = '../dimg';

	@$tmp_name = $_FILES['urun_foto']["tmp_name"];
	@$name = $_FILES['urun_foto']["name"];

	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 3)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");
	$ayarkaydet=$db->prepare("UPDATE site_urun SET
		urun_foto=:urun_foto,
		urun_baslik=:urun_baslik,
		urun_kategori=:urun_kategori,
		urun_stok=:urun_stok,
		urun_etiket=:urun_etiket,
		urun_fiyat=:urun_fiyat,
		urun_komut=:urun_komut,
			urun_komut2=:urun_komut2,
		urun_ozellikler=:editor1,
		urun_genelaciklama=:editor2
		WHERE urun_id={$_POST['urun_id']}");

	$update=$ayarkaydet->execute(array(
		'urun_foto' => $refimgyol,
		'urun_baslik' => $_POST['urun_baslik'],
		'urun_kategori' => $_POST['urun_kategori'],
		'urun_stok' => $_POST['urun_stok'],
		'urun_etiket' => $_POST['urun_etiket'],
		'urun_fiyat' => $_POST['urun_fiyat'],
		'urun_komut' => $_POST['urun_komut'],
				'urun_komut2' => $_POST['urun_komut2'],
		'editor1' => $_POST['editor1'],
		'editor2' => $_POST['editor2']
		));


	if ($update) {

		Header("Location:../hayal/admin/urun-duzenle.php?urun_id=$urun_id&durum=ok");

	} else {

		Header("Location:../hayal/admin/urun-duzenle.php?urun_id=$urun_id&durum=no");
	}

}



if (isset($_POST['yorumgonder'])) {

	$haberid=$_POST['yorum_blogid'];
	$ayarekle=$db->prepare("INSERT INTO site_yorum SET
		yorum_username=:yorum_username,
		yorum_durum=:yorum_durum,
		yorum_blogid=:yorum_blogid,
		yorum_icerik=:yorum_icerik
		");

	$insert=$ayarekle->execute(array(
		'yorum_username' => $_POST['yorum_username'],
		'yorum_durum' => $_POST['yorum_durum'],
		'yorum_blogid' => $_POST['yorum_blogid'],
		'yorum_icerik' => $_POST['yorum_icerik']
		));



	if ($insert) {

		Header("Location:../blog-article.php?haber_id=$haberid&yorum=ok");

	} else {

		Header("Location:../blog-article.php?haber_id=$haberid&yorum=no");
	}

}




if (isset($_POST['bankaekle'])) {

	$ayarekle=$db->prepare("INSERT INTO site_eft SET
		eft_bankaadi=:eft_bankaadi,
		eft_ibanno=:eft_ibanno,
		eft_hesapsahip=:eft_hesapsahip,
		eft_subeno=:eft_subeno,
		eft_durum=:eft_durum
		");

	$insert=$ayarekle->execute(array(
		'eft_bankaadi' => $_POST['eft_bankaadi'],
		'eft_ibanno' => $_POST['eft_ibanno'],
		'eft_hesapsahip' => $_POST['eft_hesapsahip'],
		'eft_subeno' => $_POST['eft_subeno'],
		'eft_durum' => $_POST['eft_durum']
		));



	if ($insert) {

		Header("Location:../hayal/admin/eftodeme.php?yenibanka=ok");

	} else {

		Header("Location:../hayal/admin/eftodeme.php?yenibanka=no");
	}

}




if (isset($_POST['urunekle'])) {

	$urun_id=$_POST['urun_id'];
	$uploads_dir = '../dimg';

	@$tmp_name = $_FILES['urun_foto']["tmp_name"];
	@$name = $_FILES['urun_foto']["name"];

	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 3)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

	$ayarekle=$db->prepare("INSERT INTO site_urun SET
		urun_foto=:urun_foto,
		urun_baslik=:urun_baslik,
		urun_kategori=:urun_kategori,
		urun_stok=:urun_stok,
		urun_etiket=:urun_etiket,
		urun_fiyat=:urun_fiyat,
			urun_komut=:urun_komut,
			urun_komut2=:urun_komut2,
		urun_ozellikler=:editor1,
		urun_genelaciklama=:editor2
		");

	$insert=$ayarekle->execute(array(
		'urun_foto' => $refimgyol,
		'urun_baslik' => $_POST['urun_baslik'],
		'urun_kategori' => $_POST['urun_kategori'],
		'urun_stok' => $_POST['urun_stok'],
		'urun_etiket' => $_POST['urun_etiket'],
		'urun_fiyat' => $_POST['urun_fiyat'],
			'urun_komut' => $_POST['urun_komut'],
				'urun_komut2' => $_POST['urun_komut2'],
		'editor1' => $_POST['editor1'],
		'editor2' => $_POST['editor2']
		));



	if ($insert) {

		Header("Location:../hayal/admin/urunler.php?yeniurun=ok");

	} else {

		Header("Location:../hayal/admin/urunler.php?yeniurun=no");
	}

}



if (isset($_POST['kullaniciekle'])) {

	$ayarekle=$db->prepare("INSERT INTO site_user SET
		user_ad=:user_ad,
		user_eposta=:user_eposta,
		user_username=:user_username,
		user_yas=:user_yas,
		user_discord=:user_discord,
		user_kredi=:user_kredi,
		user_sifre=:user_sifre
		");

	$insert=$ayarekle->execute(array(
		'user_ad' => $_POST['user_ad'],
		'user_eposta' => $_POST['user_eposta'],
		'user_username' => $_POST['user_username'],
		'user_yas' => $_POST['user_yas'],
		'user_discord' => $_POST['user_discord'],
		'user_kredi' => $_POST['user_kredi'],
		'user_sifre' => md5($_POST['user_sifre'])
		));



	if ($insert) {

		Header("Location:../hayal/admin/kullanicilar.php?eklendi=ok");

	} else {

		Header("Location:../hayal/admin/kullanicilar.php?eklendi=no");
	}

}

if (isset($_POST['adminekle'])) {

	$ayarekle=$db->prepare("INSERT INTO site_admin SET
		admin_foto=:admin_foto,
		admin_isim=:admin_isim,
		admin_mail=:admin_mail,
		admin_rutbe=:admin_rutbe,
		admin_sifre=:admin_sifre
	");

	$insert=$ayarekle->execute(array(
		'admin_foto' => $_POST['admin_foto'],
		'admin_isim' => $_POST['admin_isim'],
		'admin_mail' => $_POST['admin_mail'],
		'admin_rutbe' => $_POST['admin_rutbe'],
		'admin_sifre' => md5($_POST['admin_sifre'])
		));



	if ($insert) {

		Header("Location:../hayal/admin/adminler.php?eklendi=ok");

	} else {

		Header("Location:../hayal/admin/adminler.php?eklendi=no");
	}

}

if (isset($_POST['sliderduzenle'])) {

	$slider_id=$_POST['slider_id'];

	$uploads_dir = '../dimg';

	@$tmp_name = $_FILES['slider_foto']["tmp_name"];
	@$name = $_FILES['slider_foto']["name"];

	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 3)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");


	$ayarkaydet=$db->prepare("UPDATE site_slider SET
		slider_foto=:slider_foto,
		slider_baslik=:slider_baslik,
		slider_icerik=:slider_icerik
		WHERE slider_id={$_POST['slider_id']}");

	$update=$ayarkaydet->execute(array(
		'slider_foto' => $refimgyol,
		'slider_baslik' => $_POST['slider_baslik'],
		'slider_icerik' => $_POST['slider_icerik']
		));


	if ($update) {

		Header("Location:../hayal/admin/slider-duzenle.php?slider_id=$slider_id&durum=ok");

	} else {

		Header("Location:../hayal/admin/slider-duzenle.php?slider_id=$slider_id&durum=no");
	}

}

if (isset($_POST['sliderekle'])) {
	$uploads_dir = '../dimg';

	@$tmp_name = $_FILES['slider_foto']["tmp_name"];
	@$name = $_FILES['slider_foto']["name"];

	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 3)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");


	$ayarekle=$db->prepare("INSERT INTO site_slider SET
		slider_foto=:slider_foto,
		slider_baslik=:slider_baslik,
		slider_icerik=:slider_icerik
		");

	$insert=$ayarekle->execute(array(
		'slider_foto' => $refimgyol,
		'slider_baslik' => $_POST['slider_baslik'],
		'slider_icerik' => $_POST['slider_icerik']
		));



	if ($insert) {

		Header("Location:../hayal/admin/sliderlar.php?eklendi=ok");

	} else {

		Header("Location:../hayal/admin/sliderlar.php?eklendi=no");
	}

}

if (isset($_POST['menuduzenle'])) {

	$menu_id=$_POST['menu_id'];

	$ayarkaydet=$db->prepare("UPDATE site_menu SET
		menu_icon=:menu_icon,
		menu_isim=:menu_isim,
		menu_link=:menu_link
		WHERE menu_id={$_POST['menu_id']}");

	$update=$ayarkaydet->execute(array(
		'menu_icon' => $_POST['menu_icon'],
		'menu_isim' => $_POST['menu_isim'],
		'menu_link' => $_POST['menu_link']
		));


	if ($update) {

		Header("Location:../hayal/admin/menu-duzenle.php?menu_id=$menu_id&durum=ok");

	} else {

		Header("Location:../hayal/admin/menu-duzenle.php?menu_id=$menu_id&durum=no");
	}

}

if (isset($_POST['menuekle'])) {

	$ayarekle=$db->prepare("INSERT INTO site_menu SET
		menu_icon=:menu_icon,
		menu_isim=:menu_isim,
		menu_link=:menu_link
	");

	$insert=$ayarekle->execute(array(
		'menu_icon' => $_POST['menu_icon'],
		'menu_isim' => $_POST['menu_isim'],
		'menu_link' => $_POST['menu_link']
		));



	if ($insert) {

		Header("Location:../hayal/admin/menuler.php?eklendi=ok");

	} else {

		Header("Location:../hayal/admin/menuler.php?eklendi=no");
	}

}



if (isset($_POST['destekkaydet'])) {

	$ayarekle=$db->prepare("INSERT INTO site_destek SET
		destek_email=:destek_email,
		destek_adsoyad=:destek_adsoyad,
		destek_icerik=:destek_icerik
		");

	$insert=$ayarekle->execute(array(
		'destek_email' => $_POST['destek_email'],
		'destek_adsoyad' => $_POST['destek_adsoyad'],
		'destek_icerik' => $_POST['destek_icerik']
		));



	if ($insert) {

		Header("Location:../index.php?destekiletildi=ok");

	} else {

		Header("Location:../index.php?destekiletildi=no");
	}

}



if (isset($_POST['bakiyekuponguncelle'])) {


	$menu_id=$_POST['hediyekod_id'];

	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE site_hediyekod SET
         hediyekod_kod=:hediyekod_kod,
		hediyekod_hediyemiktar=:hediyekod_hediyemiktar,
		hediyekod_durum=:hediyekod_durum
		WHERE hediyekod_id={$_POST['hediyekod_id']}");

	$update=$ayarkaydet->execute(array(
        'hediyekod_kod' => $_POST['hediyekod_kod'],
		'hediyekod_hediyemiktar' => $_POST['hediyekod_hediyemiktar'],
		'hediyekod_durum' => $_POST['hediyekod_durum']
		));


	if ($update) {

		header("Location:../hayal/admin/bakiyekupon-duzenle.php?hediyekod_id=$menu_id&bakiyekuponduzenle=ok");

	} else {

		header("Location:../hayal/admin/bakiyekupon-duzenle.php?hediyekod_id=$menu_id&bakiyekuponduzenle=no");
	}

}

if (isset($_POST['urunkuponguncelle'])) {


	$menu_id=$_POST['hediyekod_id'];

	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE site_hediyekod SET
         hediyekod_kod=:hediyekod_kod,
		hediyekod_hediyemiktar=:hediyekod_hediyemiktar,
		hediyekod_durum=:hediyekod_durum
		WHERE hediyekod_id={$_POST['hediyekod_id']}");

	$update=$ayarkaydet->execute(array(
        'hediyekod_kod' => $_POST['hediyekod_kod'],
		'hediyekod_hediyemiktar' => $_POST['hediyekod_hediyemiktar'],
		'hediyekod_durum' => $_POST['hediyekod_durum']
		));


	if ($update) {

		header("Location:../hayal/admin/urunkupon-duzenle.php?hediyekod_id=$menu_id&urunkuponguncelle=ok");

	} else {

		header("Location:../hayal/admin/urunkupon-duzenle.php?hediyekod_id=$menu_id&urunkuponguncelle=no");
	}

}



if (isset($_POST['bankaguncelle'])) {


	$menu_id=$_POST['eft_id'];

	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE site_eft SET
         eft_bankaadi=:eft_bankaadi,
				 eft_ibanno=:eft_ibanno,
				 eft_hesapsahip=:eft_hesapsahip,
				 eft_subeno=:eft_subeno,
				 eft_durum=:eft_durum
				 WHERE eft_id={$_POST['eft_id']}");

				 $update=$ayarkaydet->execute(array(
        'eft_bankaadi' => $_POST['eft_bankaadi'],
				'eft_ibanno' => $_POST['eft_ibanno'],
				'eft_hesapsahip' => $_POST['eft_hesapsahip'],
				'eft_subeno' => $_POST['eft_subeno'],
				'eft_durum' => $_POST['eft_durum']
		));


	if ($update) {

		header("Location:../hayal/admin/eft-duzenle.php?eft_id=$menu_id&bankaduzenle=ok");

	} else {

		header("Location:../hayal/admin/eft-duzenle.php?eft_id=$menu_id&bankaduzenle=no");
	}

}



if (isset($_POST['ininalguncelle'])) {


	$menu_id=$_POST['ininal_id'];

	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE site_ininal SET
         ininal_barkodno=:ininal_barkodno,
		ininal_durum=:ininal_durum
		WHERE ininal_id={$_POST['ininal_id']}");

	$update=$ayarkaydet->execute(array(
        'ininal_barkodno' => $_POST['ininal_barkodno'],
		'ininal_durum' => $_POST['ininal_durum']
		));


	if ($update) {

		header("Location:../hayal/admin/ininal-duzenle.php?ininal_id=$menu_id&ininalduzenle=ok");

	} else {

		header("Location:../hayal/admin/ininal-duzenle.php?ininal_id=$menu_id&ininalduzenle=no");
	}

}


if (isset($_POST['bakiyekuponekle'])) {

	$ayarkaydet=$db->prepare("INSERT INTO site_hediyekod SET
				 hediyekod_kod=:hediyekod_kod,
		hediyekod_hediyemiktar=:hediyekod_hediyemiktar,
		hediyekod_durum=:hediyekod_durum,
			hediyekod_tur=:hediyekod_tur
		");

	$insert=$ayarkaydet->execute(array(
				'hediyekod_kod' => $_POST['hediyekod_kod'],
		'hediyekod_hediyemiktar' => $_POST['hediyekod_hediyemiktar'],
		'hediyekod_durum' => $_POST['hediyekod_durum'],
		'hediyekod_tur' => $_POST['hediyekod_tur']
		));



	if ($insert) {

		Header("Location:../hayal/admin/bakiyekuponlar.php?yenikupon=ok");

	} else {

		Header("Location:../hayal/admin/bakiyekuponlar.php?yenikupon=no");
	}

}



if (isset($_POST['urunkuponekle'])) {

	$ayarkaydet=$db->prepare("INSERT INTO site_hediyekod SET
				 hediyekod_kod=:hediyekod_kod,
		hediyekod_hediyemiktar=:hediyekod_hediyemiktar,
		hediyekod_durum=:hediyekod_durum,
		hediyekod_tur=:hediyekod_tur
		");

	$insert=$ayarkaydet->execute(array(
				'hediyekod_kod' => $_POST['hediyekod_kod'],
		'hediyekod_hediyemiktar' => $_POST['hediyekod_hediyemiktar'],
		'hediyekod_durum' => $_POST['hediyekod_durum'],
		'hediyekod_tur' => $_POST['hediyekod_tur']
		));



	if ($insert) {

		Header("Location:../hayal/admin/bakiyekuponlar.php?yenikupon=ok");

	} else {

		Header("Location:../hayal/admin/bakiyekuponlar.php?yenikupon=no");
	}

}



if (isset($_POST['ininalekle'])) {

	$ayarkaydet=$db->prepare("INSERT INTO site_ininal SET
				 ininal_barkodno=:ininal_barkodno,
		ininal_durum=:ininal_durum
		");

	$insert=$ayarkaydet->execute(array(
				'ininal_barkodno' => $_POST['ininal_barkodno'],
		'ininal_durum' => $_POST['ininal_durum']
		));



	if ($insert) {

		Header("Location:../hayal/admin/ininalodeme.php?yenikupon=ok");

	} else {

		Header("Location:../hayal/admin/ininalodeme.php?yenikupon=no");
	}

}



if (isset($_POST['sunucuekle'])) {

	$ayarekle=$db->prepare("INSERT INTO site_sunucu SET
		sunucu_isim=:sunucu_isim,
		sunucu_ip=:sunucu_ip,
		sunucu_port=:sunucu_port,
		sunucu_konsolport=:sunucu_konsolport,
		sunucu_konsolsifre=:sunucu_konsolsifre
		");

	$insert=$ayarekle->execute(array(
		'sunucu_isim' => $_POST['sunucu_isim'],
		'sunucu_ip' => $_POST['sunucu_ip'],
		'sunucu_port' => $_POST['sunucu_port'],
		'sunucu_konsolport' => $_POST['sunucu_konsolport'],
		'sunucu_konsolsifre' => $_POST['sunucu_konsolsifre']
		));



	if ($insert) {

		Header("Location:../hayal/admin/sunucular.php?yenisunucu=ok");

	} else {

		Header("Location:../hayal/admin/sunucular.php?yenisunucu=no");
	}

}


if (isset($_POST['sunucuguncelle'])) {


	$menu_id=$_POST['sunucu_id'];

	//Tablo güncelleme işlemi kodları...
	$ayarekle=$db->prepare("UPDATE site_sunucu SET
		sunucu_isim=:sunucu_isim,
		sunucu_ip=:sunucu_ip,
		sunucu_port=:sunucu_port,
		sunucu_konsolport=:sunucu_konsolport,
		sunucu_konsolsifre=:sunucu_konsolsifre
		WHERE sunucu_id={$_POST['sunucu_id']}");

	$update=$ayarekle->execute(array(
		'sunucu_isim' => $_POST['sunucu_isim'],
		'sunucu_ip' => $_POST['sunucu_ip'],
		'sunucu_port' => $_POST['sunucu_port'],
		'sunucu_konsolport' => $_POST['sunucu_konsolport'],
		'sunucu_konsolsifre' => $_POST['sunucu_konsolsifre']
		));


	if ($update) {

		header("Location:../hayal/admin/sunucu-duzenle.php?sunucu_id=$menu_id&sunucuduzenle=ok");

	} else {

		header("Location:../hayal/admin/sunucu-duzenle.php?sunucu_id=$menu_id&sunucuduzenle=no");
	}

}

if (isset($_POST['haberekle'])) {

	$ayarekle=$db->prepare("INSERT INTO site_haber SET
		haber_foto=:haber_foto,
		haber_baslik=:haber_baslik,
		haber_kategori=:haber_kategori,
		haber_sahip=:haber_sahip,
		haber_icerik=:editor1
		");

	$insert=$ayarekle->execute(array(
		'haber_foto' => $_POST['haber_foto'],
		'haber_baslik' => $_POST['haber_baslik'],
		'haber_kategori' => $_POST['haber_kategori'],
		'haber_sahip' => $_POST['haber_sahip'],
		'editor1' => $_POST['editor1']
		));



	if ($insert) {

		Header("Location:../hayal/admin/haberler.php?yenihaber=ok");

	} else {

		Header("Location:../hayal/admin/haberler.php?yenihaber=no");
	}

}


if (isset($_POST['socialmediaduzenle'])) {

	$socialmedia_id=$_POST['sosyalmedya_id'];

	$ayarkaydet=$db->prepare("UPDATE site_sosyalmedya SET
		sosyalmedya_icon=:sosyalmedya_icon,
		sosyalmedya_isim=:sosyalmedya_isim,
		sosyalmedya_link=:sosyalmedya_link
		WHERE sosyalmedya_id={$_POST['sosyalmedya_id']}");

	$update=$ayarkaydet->execute(array(
		'sosyalmedya_icon' => $_POST['sosyalmedya_icon'],
		'sosyalmedya_isim' => $_POST['sosyalmedya_isim'],
		'sosyalmedya_link' => $_POST['sosyalmedya_link']
		));


	if ($update) {

		Header("Location:../hayal/admin/socialmedia-duzenle.php?sosyalmedya_id=$socialmedia_id&durum=ok");

	} else {

		Header("Location:../hayal/admin/socialmedia-duzenle.php?sosyalmedya_id=$socialmedia_id&durum=no");
	}

}


?>
