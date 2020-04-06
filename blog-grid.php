<?php include 'header.php';

$userget = $_GET['kategori_ad'];

$kontrol = $db->prepare("SELECT * FROM site_haber WHERE haber_kategori=?");//E-Posta ile daha önce kayıt olunmuşmu?
   $kontrol->execute(array($userget));

if ($_GET['kategori_ad']) {
  if(!$kontrol->rowCount()){
    Header("Location:404.php");
  }
}


$aramakategori=$db->prepare("SELECT * FROM site_haber where haber_kategori=:id ORDER BY haber_id DESC");
$aramakategori->execute(array(
  'id'=>$userget
));



?>




    <div class="nk-main">

            <!-- START: Breadcrumbs -->
<div class="nk-gap-1"></div>
<div class="container">
    <ul class="nk-breadcrumbs">


        <li><a href="index.php">Anasayfa</a></li>


        <li><span class="fa fa-angle-right"></span></li>

        <li><a href="blog-grid.php">Blog</a></li>
        <li><span class="fa fa-angle-right"></span></li>

        <li><span><?php
        if ($_GET['kategori_ad']) {
          echo $userget;
        }elseif(!$_GET['kategori_ad']) {
          echo "Blog";
        }

         ?></span></li>

    </ul>
</div>
<div class="nk-gap-1"></div>
<!-- END: Breadcrumbs -->




<div class="container">
    <div class="row vertical-gap">
        <div class="col-lg-8">

            <!-- START: Posts Grid -->
            <div class="nk-blog-grid">
            <div class="row">
                <?php
                if ($_GET['kategori_ad']){?>
                  <?php
                   while($aramakategoricek=$aramakategori->fetch(PDO::FETCH_ASSOC)){?>

                      <div class="col-md-6">
                          <!-- Post başlangıç -->
                          <div class="nk-blog-post">
                              <a href="blog-article.php?haber_id=<?php echo $aramakategoricek['haber_id'] ?>" class="nk-post-img">
                                  <img src="<?php echo $aramakategoricek['haber_foto'] ?>" alt="<?php echo $aramakategoricek['haber_baslik'] ?>">

                              </a>
                              <div class="nk-gap"></div>
                              <h2 class="nk-post-title h4"><a href="blog-article.php?haber_id=<?php echo $aramakategoricek['haber_id'] ?>"><?php echo $aramakategoricek['haber_baslik'] ?></a></h2>

                              <div class="nk-gap"></div>
                              <div class="nk-post-text">
                                  <p><?php echo substr($aramakategoricek['haber_icerik'],0,185);?>...</p>
                              </div>
                              <div class="nk-gap"></div>
                              <a href="blog-article.php?haber_id=<?php echo $aramakategoricek['haber_id'] ?>" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1">Devamını Oku</a>
                          </div>
                          <!-- Post bitiş-->
                      </div>
                      <?php }?>
                <?php }else {
                  ?>
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

                              <div class="nk-gap"></div>
                              <div class="nk-post-text">
                                  <p><?php echo substr($habercek['haber_icerik'],0,185);?>...</p>
                              </div>
                              <div class="nk-gap"></div>
                              <a href="blog-article.php?haber_id=<?php echo $habercek['haber_id'] ?>" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1">Devamını Oku</a>
                          </div>
                          <!-- Post bitiş-->
                      </div>
                      <?php }?>
                  <?php
                }
                 ?>



                </div>
            </div>
            <!-- END: Posts Grid -->

        </div>
        <div class="col-lg-4">
        <?php include 'sagblok.php'?>
        </div>
    </div>
</div>

<div class="nk-gap-2"></div>

<?php include 'footer.php'?>
