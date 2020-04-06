<?php include 'header.php';?>


    <div class="nk-main">

            <!-- START: Breadcrumbs -->
<div class="nk-gap-1"></div>
<div class="container">
    <ul class="nk-breadcrumbs">


        <li><a href="index.php">Anasayfa</a></li>


        <li><span class="fa fa-angle-right"></span></li>

        <li><a href="store-catalog-alt.php">Mağaza</a></li>


        <li><span class="fa fa-angle-right"></span></li>

        <li><span>Mağaza</span></li>

    </ul>
</div>
<div class="nk-gap-1"></div>
<!-- END: Breadcrumbs -->




<div class="container">


    <!-- START: Products Filter -->
    <div class="nk-gap-2"></div>
    <div class="row vertical-gap">
        <div class="col-lg-8">
            <div class="row vertical-gap">

                <div class="col-md-8">
                    <div class="nk-input-slider-inline">

                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">

        </div>
    </div>
    <!-- END: Products Filter -->

    <div class="nk-gap-2"></div>
    <!-- START: Products -->
    <div class="row vertical-gap">
    <?php
                 while($uruncek=$sonurunsor->fetch(PDO::FETCH_ASSOC)){?>
        <div class="col-lg-6">
            <div class="nk-product-cat-2">
                <a class="nk-product-image" href="store-product.php?urun_id=<?php echo $uruncek['urun_id'] ?>">
                    <img src="<?php echo $uruncek['urun_foto'] ?>" alt="So saying he unbuckled">
                </a>
                <div class="nk-product-cont">
                    <h3 class="nk-product-title h5"><a href="store-product.php?urun_id=<?php echo $uruncek['urun_id'] ?>"><?php echo $uruncek['urun_baslik'] ?></a></h3>
                    <div class="nk-gap-1"></div>
                    <?php echo substr($uruncek['urun_ozellikler'],0,180)."..."?>
                    <div class="nk-gap-2"></div>
                    <div class="nk-product-price">₺ <?php echo $uruncek['urun_fiyat'] ?></div>
                    <div class="nk-gap-1"></div>
                    <a href="store-product.php?urun_id=<?php echo $uruncek['urun_id'] ?>" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1">Satın al</a>
                </div>
            </div>
        </div>

        <?php }?>



    </div>
    <!-- END: Products -->




</div>

<div class="nk-gap-2"></div>



<?php include 'footer.php'?>
