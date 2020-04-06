


<?php include 'header.php';
error_reporting(0);
if ($_GET['durum']=="exit") {
      echo '<script type="text/javascript">
      setTimeout(function() {
       swal({
           title: "Çıkış",
           text: "Güvenli Şekilde Çıkış Yapıldı",
           type: "success"
       }, function() {
           window.location = "index.php";
       });
   }, 500);
      </script>';

    }elseif ($_GET['durum'] == "yetkisiz") {
      echo '<script type="text/javascript">
      setTimeout(function() {
       swal({
           title: "Yetki İzini",
           text: "Ulaşmaya çalıştığınız sayfada yetkiniz bulunmuyor!",
           type: "error"
       }, function() {
           window.location = "index.php";
       });
    }, 500);
      </script>';
    }


    $fgc= file_get_contents("http://mcapi.tc/?".$ayarcek['site_anasunucuip']."/json");
    $json = json_decode($fgc,true);
?>


<div id="nk-nav-mobile" class="nk-navbar nk-navbar-side nk-navbar-right-side nk-navbar-overlay-content d-lg-none">
    <div class="nano">
        <div class="nano-content">
            <a href="index.html" class="nk-nav-logo">
                <img src="assets/images/logo.png" alt="" width="120">
            </a>
            <div class="nk-navbar-mobile-content">
                <ul class="nk-nav">

                </ul>
            </div>
        </div>
    </div>
</div>



    <div class="nk-main">

            <div class="nk-gap-2"></div>



<div class="container">

<div class="nk-image-slider" data-autoplay="8000">
<?php
                 while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)){?>
        <!-- Slider Baslangic -->
        <div class="nk-image-slider-item">
            <img src="<?php echo $slidercek['slider_foto'] ?>" alt="" class="nk-image-slider-img" data-thumb="<?php echo $slidercek['slider_foto'] ?>">

            <div class="nk-image-slider-content">

                    <h3 class="h4"><?php echo $slidercek['slider_baslik'] ?></h3>
                    <p class="text-white"><?php echo $slidercek['slider_icerik'] ?></p>

            </div>

        </div>
        <?php }?>


    </div>
    <!-- Slider Bitiş -->

    <!-- Kategori kutu başlangıç -->
    <div class="nk-gap-2"></div>
    <div class="row vertical-gap">

    <div class="col-lg-4">
            <div class="nk-feature-1">
                <div class="nk-feature-icon">
                <i class="fas fa-server"></i>
                </div>
                <div class="nk-feature-cont">
                    <h3 class="nk-feature-title">Sunucu Adresi</h3>
                    <h4 class="nk-feature-title text-main-1"><?php echo $ayarcek['site_anasunucuip']; ?></h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
                <div class="nk-feature-1">
                    <div class="nk-feature-icon">
                    <i class="fas fa-user"></i>
                    </div>
                    <div class="nk-feature-cont">
                        <h3 class="nk-feature-title">Online</h3>
                        <h4 class="nk-feature-title text-main-1">
                          <?php

                            echo $json['players']." KİŞİ";

                           ?>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                    <div class="nk-feature-1">
                        <div class="nk-feature-icon">
                        <i class="fas fa-cogs"></i>
                        </div>
                        <div class="nk-feature-cont">
                            <h3 class="nk-feature-title">Sunucu Sürümü</h3>
                            <h4 class="nk-feature-title text-main-1"><?php echo $json['version'];?></h4>
                        </div>
                    </div>
                </div>
    </div>
    <!-- Kategori kutu bitiş -->

    <div class="nk-gap-2"></div>
    <div class="row vertical-gap">
        <div class="col-lg-8">

            <!-- START: Latest Posts -->
            <h3 class="nk-decorated-h-2"><span><span class="text-main-1">SON</span> HABERLER</span></h3>
            <div class="nk-gap"></div>
            <div class="nk-blog-grid">
                <div class="row">
                <?php
                 while($habercek=$habersor->fetch(PDO::FETCH_ASSOC)){?>

                    <div class="col-md-6">
                        <!-- Post başlangıç -->
                        <div class="nk-blog-post">
                            <a href="blog-article.php?haber_id=<?php echo $habercek['haber_id'] ?>" class="nk-post-img">
                                <img src="<?php echo $habercek['haber_foto'] ?>" alt="<?php echo $habercek['haber_baslik'] ?>">

                            </a>
                            <div class="nk-gap"></div>
                            <h2 class="nk-post-title h4"><a href="blog-article.php?haber_id=<?php echo $habercek['haber_id'] ?>"><?php echo $habercek['haber_baslik'] ?></a></h2>

                            <div class="nk-post-text">
                                <p><?php echo substr($habercek['haber_icerik'],0,185);?>...</p>
                            </div>
                            <div class="nk-gap"></div>
                            <a href="blog-article.php?haber_id=<?php echo $habercek['haber_id'] ?>" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1">Devamını Oku</a>
                        </div>
                        <!-- Post bitiş-->
                    </div>
                    <?php }?>



                </div>
            </div>
            <!-- END: Latest Posts -->

 <!-- En iyi ürünler başlangıç -->
            <div class="nk-gap-3"></div>
            <h3 class="nk-decorated-h-2"><span><span class="text-main-1">EN İYİ</span> SATIŞLAR</span></h3>
            <div class="nk-gap"></div>
            <div class="row vertical-gap">



            <?php
                 while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)){?>


                <div class="col-md-6">
                    <div class="nk-product-cat">
                        <a class="nk-product-image" href="store-product.php?urun_id=<?php echo $uruncek['urun_id'] ?>">
                            <img src="<?php echo $uruncek['urun_foto']?>" alt="So saying he unbuckled">
                        </a>
                        <div class="nk-product-cont">
                            <h3 class="nk-product-title h5"><a href="store-product.php?urun_id=<?php echo $uruncek['urun_id'] ?>"><?php echo $uruncek['urun_baslik'] ?></a></h3>
                            <div class="nk-gap-1"></div>

                            <div class="nk-product-price"><?php echo $uruncek['urun_fiyat'] ?>₺</div>
                            <div class="nk-gap-1"></div>
                            <a href="store-product.php?urun_id=<?php echo $uruncek['urun_id'] ?>" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1">Satın Al</a>
                        </div>
                    </div>
                </div>
                <?php }?>



            </div>
            <!-- Enb iyi ürünler bitiş -->



        </div>
        <div class="col-lg-4">
        <?php include 'sagblok.php';?>
        </div>
    </div>
</div>

<div class="nk-gap-4"></div>


<?php include 'footer.php';?>
