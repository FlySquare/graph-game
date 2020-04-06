
<?php include 'header.php';
if ($_GET['urun_id']==null) {
  header("Location:store-catalog-alt.php");
}
error_reporting(E_ALL & ~E_NOTICE);
$urun_id=$_GET['urun_id'];
$urunsor = $db->query("SELECT * FROM site_urun WHERE urun_id = '{$urun_id}'");
$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
$url = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];


$kontrol = $db->prepare("SELECT * FROM site_urun WHERE urun_id=?");//E-Posta ile daha önce kayıt olunmuşmu?
   $kontrol->execute(array($_GET['urun_id']));

   if($kontrol->rowCount()){

   }else {
     Header("Location:404.php");
   }
?>


    <div class="nk-main">

            <!-- START: Breadcrumbs -->
<div class="nk-gap-1"></div>
<div class="container">
    <ul class="nk-breadcrumbs">


        <li><a href="index.html">Anasayfa</a></li>


        <li><span class="fa fa-angle-right"></span></li>

        <li><a href="store-catalog-alt.php">Mağaza</a></li>

        <li><span class="fa fa-angle-right"></span></li>
        <li><a href="<?php $url?>"><?php echo $uruncek['urun_baslik'] ?></a></li>



        <li><span><?php echo $uruncek['urun_baslik'] ?> </span></li>

    </ul>
</div>
<div class="nk-gap-1"></div>
<!-- END: Breadcrumbs -->




<div class="container">
    <div class="row vertical-gap">
        <div class="col-lg-8">
            <div class="nk-store-product">
                <div class="row vertical-gap">
                    <div class="col-md-6">
                        <!-- START: Product Photos -->
                        <div class="nk-popup-gallery">
                            <div class="nk-gallery-item-box">

                              <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                              <img src="<?php echo $uruncek['urun_foto'] ?>" alt="<?php echo $uruncek['urun_baslik'] ?>">

                            </div>

                            <div class="nk-gap-1"></div>
                            <div class="row vertical-gap sm-gap">


                            </div>
                        </div>
                        <!-- END: Product Photos -->
                    </div>
                    <div class="col-md-6">

                        <h2 class="nk-product-title h3"><?php echo $uruncek['urun_baslik'] ?> </h2>


                        <div class="nk-product-description">
                            <p><?php echo $uruncek['urun_ozellikler'] ?></p>
                        </div>

                        <!-- START: Add to Cart -->
                        <div class="nk-gap-2"></div>
                        <form action="" method="POST" class="nk-product-addtocart">
                            <div class="nk-product-price">₺ <?php echo $uruncek['urun_fiyat'] ?></div>
                            <div class="nk-gap-1"></div>
                            <div class="input-group">
                                <input type="hidden" name="urun_fiyat" value="<?php echo $uruncek['urun_fiyat'] ?>">
                                <input type="hidden" name="user_kredi" value="<?php echo $usercek['user_kredi'] ?>">
                                <button name="satinal" class="nk-btn nk-btn-rounded nk-btn-color-main-1">Satın Al</button>
                            </div><br>
                          <a href="#" data-toggle="modal" data-target="#modalgift"> <button name="hediyeet" class="nk-btn nk-btn-rounded nk-btn-color-main-2">Hediye Et</button></a>
                            <br>
                            <br>
                            <a href="#" data-toggle="modal" data-target="#modalgiftcode"><button name="kodyap" class="nk-btn nk-btn-rounded nk-btn-color-main-3">Kod Oluştur</button></a>
                        </form>
                        <div class="nk-gap-3"></div>

                        <!-- END: Add to Cart -->
                        <?php
                        $marketgecmis_urunbaslik = $uruncek['urun_baslik'];
                        $marketgecmis_userid = $usercek['users_id'];
                        $marketgecmis_urunkategori = $uruncek['urun_kategori'];
                        $marketgecmis_fiyat = $uruncek['urun_fiyat'];
                          $marketgecmis_sunucuid = $uruncek['urun_kategori'];
                        $userkredi = $usercek['user_kredi'];
                        $urunfiyat = $uruncek['urun_fiyat'];
                        if(isset($_POST['satinal'])){
                        if ($userkredi >= $urunfiyat) {
                          $userkredi = $userkredi - $urunfiyat;
                          $users_id=$usercek['users_id'];
                          $ayarkaydet=$db->prepare("UPDATE site_user SET
                            user_kredi=:user_kredi
                            WHERE users_id={$users_id}");
                          $update=$ayarkaydet->execute(array(
                            'user_kredi' => $userkredi
                            ));
                          if ($update) {
                            $depokayit = $db->prepare("INSERT INTO site_depo SET
                              depo_urunbaslik =:depo_urunbaslik,
                              depo_userid =:depo_userid,
                              depo_sunucuid =:depo_sunucuid
                              ");
                              $insert = $depokayit->execute(array(
                                'depo_urunbaslik' => $marketgecmis_urunbaslik,
                                'depo_userid' => $marketgecmis_userid,
                                'depo_sunucuid' => $marketgecmis_sunucuid
                              ));

                            $query = $db->prepare("INSERT INTO site_marketgecmis SET
                              marketgecmis_urunbaslik=:marketgecmis_urunbaslik,
                              marketgecmis_userid =:marketgecmis_userid,
                              marketgecmis_kategori =:marketgecmis_kategori,
                              marketgecmis_fiyat =:marketgecmis_fiyat
                              ");
                              $insert = $query->execute(array(
                                'marketgecmis_urunbaslik' => $marketgecmis_urunbaslik,
                                'marketgecmis_userid' => $marketgecmis_userid,
                                'marketgecmis_kategori' => $marketgecmis_urunkategori,
                                'marketgecmis_fiyat' => $marketgecmis_fiyat
                              ));
                              if ( $insert ){
                                $last_id = $db->lastInsertId();
                              }
                              echo '<script type="text/javascript">
                              setTimeout(function() {
                               swal({
                                   title: "Ürün Satın Alma",
                                   text: "Başarılı bir şekilde ürün kullanıldı",
                                   type: "success"
                               }, function() {

                               });
                           }, 1000);
                    					</script>';
                          } else {
                            echo '<script type="text/javascript">
                            swal("Ürün Satın Alma", "Satın alma gerçekleştirilemedi.", "error");
                            </script>';
                          }
                        }else {
                          echo '<script type="text/javascript">
                          swal("Ürün Satın Alma", "Bakiyeniz Yetersiz.Lütfen kredi yükleyip tekrar deneyiniz.", "warning");
                          </script>';
                        }
}
                         ?>

                        <!-- START: Meta -->
                        <div class="nk-product-meta">
                            <div><strong>Stok Kodu</strong>: <?php echo $uruncek['urun_stok'] ?></div>
                            <div><strong>Sunucu</strong>: <a href=""><?php
                            $sunucuurunsor = $db->prepare("SELECT * FROM site_sunucu where sunucu_id=:id");
                            $sunucuurunsor->execute(array(
                              'id'=>$uruncek['urun_kategori']
                            ));
                            $sunucuuruncek=$sunucuurunsor->fetch(PDO::FETCH_ASSOC);
                            echo $sunucuuruncek['sunucu_isim'];
                             ?></a></div>
                            <div><strong>Etiket</strong>: <a href=""><?php echo $uruncek['urun_etiket'] ?></a> </div>
                        </div>
                        <!-- END: Meta -->
                    </div>
                </div>

                <!-- START: Share -->
                <div class="nk-gap-2"></div>
                <div class="nk-post-share">
                <span class="h5">Sosyal Medyada Paylaş:</span>
                        <ul class="nk-social-links-2">
                            <li><a href="https://www.facebook.com/sharer.php?u=<?php echo $uruncek['urun_baslik']."%20".$url?>" target="_blank"><span class="nk-social-facebook" title="Share page on Facebook" data-share="facebook"><span class="fab fa-facebook"></span></span></a></li>
                            <li><a target="_blank" href="https://twitter.com/intent/tweet?via=&text=<?php echo $uruncek['urun_baslik']."%20".$url?>"><span class="nk-social-twitter" title="Share page on Twitter" data-share="twitter"><span class="fab fa-twitter"></span></span></a></li>
                            <li><a target="_blank" href="https://api.whatsapp.com/send?text=<?php echo $uruncek['urun_baslik']."%20".$url?>"><span class="nk-social-whatsapp" title="Share page on whatsapp" data-share="whatsapp"><span class="fab fa-whatsapp"></span></span></a></li>
                            <li><a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $url?>"><span class="nk-social-linkedin" title="Share page on linkedin" data-share="whatsapp"><span class="fab fa-linkedin"></span></span></a></li>
                        </ul>
                </div>
                <!-- END: Share -->

                <div class="nk-gap-2"></div>
                <!-- START: Tabs -->
                <div class="nk-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tab-description" role="tab" data-toggle="tab">Genel Açıklama</a>
                        </li>

                    </ul>

                    <div class="tab-content">

                        <!-- START: Tab Description -->
                        <div role="tabpanel" class="tab-pane fade show active" id="tab-description">
                            <div class="nk-gap"></div>
                            <strong class="text-white">Yayınlanma Tarihi: <?php echo $uruncek['urun_tarih'] ?></strong>
                            <div class="nk-gap"></div>
                            <p><?php echo $uruncek['urun_genelaciklama'] ?></p>


                        </div>
                        <!-- END: Tab Description -->



                    </div>
                </div>
                <!-- END: Tabs -->
            </div>

        </div>
        <div class="col-lg-4">

<?php include 'sagblok.php';?>
        </div>
    </div>
</div>
<div class="nk-gap-2"></div>
<!-- START: Search Modal -->
<div class="nk-modal modal fade" id="modalgift" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
<div class="modal-content">
    <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="ion-android-close"></span>
        </button>

        <h4 class="mb-0">Hediye Gönderilecek Kullanıcı</h4>

        <div class="nk-gap-1"></div>
        <form action="" method="post" class="nk-form nk-form-style-1">
            <input type="text" value="" name="usergift" class="form-control" placeholder="Kullanıcı Adını Giriniz" autofocus>
            <input type="hidden" name="gonderen_id" value="<?php echo $usercek['users_id']; ?>">
            <input type="hidden" name="urun_id" value="<?php echo $urun_id; ?>">
        </form>
    </div>
</div>
</div>
</div>
<?php
if (isset($_POST['usergift'])) {
$alıcıname=$_POST['usergift'];
$gonderenid=$_POST['gonderen_id'];
$urunid=$_POST['urun_id'];
$gonderenkredi = $usercek['user_kredi'];
$urunkredi = $uruncek['urun_fiyat'];
$hediyeusersor=$db->prepare("SELECT * FROM site_user where user_username=:mail");
$hediyeusersor->execute(array(
  'mail'=> $alıcıname
));
$hediyeusercek=$hediyeusersor->fetch(PDO::FETCH_ASSOC);

if($gonderenkredi >= $urunkredi){
  $gonderenkredi = $gonderenkredi - $urunkredi;
  $ayarkaydet=$db->prepare("UPDATE site_user SET
    user_kredi=:user_kredi
    WHERE users_id={$gonderenid}");
  $update=$ayarkaydet->execute(array(
    'user_kredi' => $gonderenkredi
    ));
      if ($update) {

        $query = $db->prepare("INSERT INTO site_marketgecmis SET
          marketgecmis_urunbaslik=:marketgecmis_urunbaslik,
          marketgecmis_userid =:marketgecmis_userid,
          marketgecmis_kategori =:marketgecmis_kategori,
          marketgecmis_fiyat =:marketgecmis_fiyat
          ");
          $insert = $query->execute(array(
            'marketgecmis_urunbaslik' => $marketgecmis_urunbaslik,
            'marketgecmis_userid' => $marketgecmis_userid,
            'marketgecmis_kategori' => $marketgecmis_urunkategori,
            'marketgecmis_fiyat' => $marketgecmis_fiyat
          ));
          if ( $insert ){
            $last_id = $db->lastInsertId();
            $depokayit = $db->prepare("INSERT INTO site_depo SET
              depo_urunbaslik =:depo_urunbaslik,
              depo_userid =:depo_userid,
              depo_sunucuid =:depo_sunucuid
              ");
              $insert = $depokayit->execute(array(
                'depo_urunbaslik' => $marketgecmis_urunbaslik,
                'depo_userid' => $hediyeusercek['users_id'],
                'depo_sunucuid' => $marketgecmis_sunucuid
              ));
              echo '<script type="text/javascript">
              setTimeout(function() {
               swal({
                   title: "Hediye Gönderme",
                   text: "Başarılı bir şekilde hediye gönderildi",
                   type: "success"
               }, function() {

               });
           }, 1000);
              </script>';
          }else {
            echo '<script type="text/javascript">
            setTimeout(function() {
             swal({
                 title: "Hediye Gönderme",
                 text: "Hediye gönderme sırasında hat ameydana geldi",
                 type: "error"
             }, function() {

             });
         }, 1000);
            </script>';
          }


      } else {
        echo '<script type="text/javascript">
        swal("Ürün Satın Alma", "Satın alma gerçekleştirilemedi.", "error");
        </script>';
      }





}else {
  echo '<script type="text/javascript">
  setTimeout(function() {
   swal({
       title: "Hediye Gönderme",
       text: "Bakiyeniz bu ürünü almak için yeterli değil!",
       type: "error"
   }, function() {

   });
}, 1000);
  </script>';
}

}

if (isset($_POST['giftcode'])) {
  $alıcıname=$_POST['usergift'];
  $giftsayi=$_POST['usergiftcodehak'];
  $usergiftcode=$_POST['usergiftcode'];
  $gonderenid=$_POST['gonderen_id'];
  $urunid=$_POST['urun_id'];
  $codesahip = $_POST['codesahip'];
  $gonderenkredi = $usercek['user_kredi'];
  $urunkredi = $uruncek['urun_fiyat'];
  $fiyat = $giftsayi * $urunkredi;
  $hediyeusersor=$db->prepare("SELECT * FROM site_user where user_username=:mail");
  $hediyeusersor->execute(array(
    'mail'=> $alıcıname
  ));
  $hediyeusercek=$hediyeusersor->fetch(PDO::FETCH_ASSOC);
  if ($giftsayi == null || $usergiftcode == null) {
    echo '<script type="text/javascript">
    setTimeout(function() {
     swal({
         title: "Kod Oluşturma",
         text: "Lütfen boş veri bırakmayınız!",
         type: "error"
     }, function() {

     });
 }, 500);
    </script>';
  }else {
    $kontrol = $db->prepare("SELECT * FROM site_userkod WHERE userkod_kod=?");//E-Posta ile daha önce kayıt olunmuşmu?
     $kontrol->execute(array($usergiftcode));

    if($kontrol->rowCount()){
      echo '<script type="text/javascript">
      setTimeout(function() {
       swal({
           title: "Kod Oluşturma",
           text: "Bu kod zaten başkası tarafından kullanımda!",
           type: "error"
       }, function() {

       });
   }, 500);
      </script>';
    }elseif($gonderenkredi >= $fiyat){
    $gonderenkredi = $gonderenkredi - $fiyat;
    $ayarkaydet=$db->prepare("UPDATE site_user SET
      user_kredi=:user_kredi
      WHERE users_id={$gonderenid}");
    $update=$ayarkaydet->execute(array(
      'user_kredi' => $gonderenkredi
      ));
        if ($update) {
          $last_id = $db->lastInsertId();
          $depokayit = $db->prepare("INSERT INTO site_userkod SET
            userkod_kod =:userkod_kod,
            userkod_adet =:userkod_adet,
            userkod_sahip =:userkod_sahip,
            userkod_urun =:userkod_urun
            ");
            $insert = $depokayit->execute(array(
              'userkod_kod' => $usergiftcode,
              'userkod_adet' => $giftsayi,
              'userkod_sahip' => $usercek['user_username'],
              'userkod_urun' => $urunid
            ));
            echo '<script type="text/javascript">
            setTimeout(function() {
             swal({
                 title: "Kod Oluşturma",
                 text: "Başarılı bir şekilde kodunuz oluşturuldu",
                 type: "success"
             }, function() {

             });
         }, 500);
            </script>';
        }else {
          echo '<script type="text/javascript">
          setTimeout(function() {
           swal({
               title: "Kod Oluşturma",
               text: "Kod Oluşturma sırasında sistemsel bir hata meydana geldi. Lütfen yetkililere bu ekranın fotoğrafını çekerek bildiriniz!",
               type: "error"
           }, function() {

           });
       }, 500);
          </script>';
        }
      }else {
        echo '<script type="text/javascript">
        setTimeout(function() {
         swal({
             title: "Kod oluşturma",
             text: "Bakiyeniz bu kodu almak için yeterli değil!",
             type: "error"
         }, function() {

         });
      }, 500);
        </script>';
      }
}}

 ?>
 <div class="nk-modal modal fade" id="modalgiftcode" tabindex="-1" role="dialog" aria-hidden="true">
 <div class="modal-dialog modal-sm" role="document">
 <div class="modal-content">
     <div class="modal-body">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span class="ion-android-close"></span>
         </button>

         <h4 class="mb-0">Hediye kodunuzu oluşturun</h4>

         <div class="nk-gap-1"></div>
         <form action="" method="post" class="nk-form nk-form-style-1">
             <input type="text" value="" name="usergiftcode" class="form-control" placeholder="Kod oluşturun*" autofocus>
             <br>
             <input type="number" value="" name="usergiftcodehak" class="form-control" placeholder="Kullanım hakkını giriniz" autofocus>
             <input type="hidden" name="gonderen_id" value="<?php echo $usercek['users_id']; ?>">
             <input type="hidden" name="urun_id" value="<?php echo $urun_id; ?>">
             <input type="hidden" name="codesahip" value="<?php $usercek['user_username']; ?>">
             <br>
            <button name="giftcode" class="nk-btn nk-btn-rounded nk-btn-color-main-5">Kod Oluştur</button>
         </form>
     </div>
 </div>
 </div>
 </div>

<!-- END: Search Modal -->
<?php include 'footer.php';?>
