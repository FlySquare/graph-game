     <?php

     $sosyalmedyasor=$db->prepare("SELECT * FROM site_sosyalmedya");
     $sosyalmedyasor->execute();
     ?>
     <head>
       <script src="https://kit.fontawesome.com/b2aeef6d36.js" crossorigin="anonymous"></script>
     </head>

            <aside class="nk-sidebar nk-sidebar-right nk-sidebar-sticky">
            <!-- Sağ blok başlangıç -->
        <?php if (isset($_SESSION['user_username'])){ ?>
          <div class="nk-widget nk-widget-highlighted">
          <h4 class="nk-widget-title"><span><span class="text-main-1"><?php

          if ($usercek['user_yetki']=="5") {
            echo $usercek["user_username"].'  <i class="fas fa-check-circle"></i>';
          }elseif ($usercek['user_yetki']=="1") {
            echo $usercek["user_username"];
          }

           ?></span> - Profil</span></h4>
          <div class="nk-widget-content">
          <div style="text-align:center">
          <img alt="avatar" style="border-radius: 10px;" src="https://cravatar.eu/head/<?php echo $usercek['user_username']; ?>/128.png" width="150" height="150">
          <h4><span><?php echo $usercek['user_kredi']; ?> <?php echo $ayarcek['ayar_parabirimi']; ?></span></h4>
          <div class="row">
          <div class="col-md-6">
          <a href="profil" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-info">Profil - <span class="fa fa-user"></span></a>
          </div>
          <div class="col-md-6">
          <a href="logout.php" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-warning">Çıkış Yap - <span class="fa fa-power-off"></span></a>
          </div>
          </div>
          <br />
          <a href="profilkrediyukle.php" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-info">Kredi Yükle - <span class="fa fa-shopping-basket"></span></a>
          <br /><br />
          <a href="promokodlarim.php" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-info">Promo Kodlarım - <span class="fa fa-bomb"></span></a>

          </div>
          </div>
          <h4 class="nk-widget-title">
          <span>
          <a style="color:white" href="store-catalog-alt.php">Market ></a>
          </span>
          </h4>
          </div>
        <?php }else{?>
          <!-- login başlangıç -->
          <div class="nk-widget nk-widget-highlighted">
   <h4 class="nk-widget-title"><span><span class="text-main-1">Giriş</span> Yap</span></h4>
   <div class="nk-widget-content">
   <form action="db/islem.php" method="post">
   <div class="form-group">
   <label>Kullanıcı Adı:</label>
   <input type="text" class="form-control" name="user_username" autocomplete="off" placeholder="Kullanıcı adı">
   </div>
   <div class="form-group">
   <label>Şifre:</label>
   <input type="password" class="form-control" name="user_sifre"  autocomplete="off" placeholder="Şifre">
   </div>
   <br />
   <div style="text-align:center" class="row">
   <div class="col-md-6">
   <input type="submit" name="kullanicigiris" value="Giriş yap" class="nk-btn nk-btn-color-primary">
   </div>
   <div class="col-md-6">
   <a href="kayit-ol.php" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-info"> <span class="icon ion-paper-airplane"> </span>Kayıt Ol</a>
   </div>
   </div>
   <br />
   </form>
   </div>
   <!-- login bitiş -->
      <?php } ?>
<br>
<div class="nk-widget nk-widget-highlighted">
    <h4 class="nk-widget-title"><span><span class="text-main-1">Sosyal</span> Medyada</span></h4>
    <div class="nk-widget-content">

        <ul class="nk-social-links-3 nk-social-links-cols-4">
        <?php
                 while($sosyalmedyacek=$sosyalmedyasor->fetch(PDO::FETCH_ASSOC)){?>
<li><a class="nk-social-<?php echo $sosyalmedyacek['sosyalmedya_isim'] ?>" href="<?php echo $sosyalmedyacek['sosyalmedya_link'] ?>"><span class="<?php echo $sosyalmedyacek['sosyalmedya_icon'];?>"></span></a></li>
<?php }?>


        </ul>
    </div>
</div>
<br>

            </aside>
            <!-- END: Sidebar -->
