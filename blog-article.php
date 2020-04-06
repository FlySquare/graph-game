<?php
include 'header.php';
if ($_GET['haber_id']==null) {
  header("Location:index.php");
}
$haber_id=$_GET['haber_id'];
$habersor = $db->query("SELECT * FROM site_haber WHERE haber_id = '{$haber_id}'");
$habercek=$habersor->fetch(PDO::FETCH_ASSOC);
$url = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

$yorumsay=$db->prepare("SELECT COUNT(*) FROM site_yorum WHERE yorum_blogid = '{$haber_id}' = yorum_durum = 1");
$yorumsay->execute();
$say = $yorumsay->fetchColumn();

$yorumsor=$db->prepare("SELECT * FROM site_yorum WHERE yorum_blogid = '{$haber_id}' = yorum_durum = 1");
$yorumsor->execute();

$userget=$_GET['haber_id'];
$kontrol = $db->prepare("SELECT * FROM site_haber WHERE haber_id=?");//E-Posta ile daha önce kayıt olunmuşmu?
   $kontrol->execute(array($userget));


  if(!$kontrol->rowCount()){
    Header("Location:404.php");
  }



if($_GET['yorum']== "ok"){
  echo '<script type="text/javascript">
  setTimeout(function() {
   swal({
       title: "Yorum Gönder",
       text: "Yorumunuz yönetici onayından sonra yayınlanacaktır",
       type: "success"
   }, function() {

   });
}, 1000);
  </script>';
}elseif($_GET['yorum']== "no"){
  echo '<script type="text/javascript">
  setTimeout(function() {
   swal({
       title: "Yorum Gönder",
       text: "Yorumunuz gönderilirken hata oluştu",
       type: "error"
   }, function() {

   });
}, 1000);
  </script>';
}
?>


    <head>
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    </head>





    <div class="nk-main">

            <!-- START: Breadcrumbs -->
<div class="nk-gap-1"></div>
<div class="container">
    <ul class="nk-breadcrumbs">


        <li><a href="index.php">Anasayfa</a></li>


        <li><span class="fa fa-angle-right"></span></li>

        <li><a href="blog-grid.php">Blog</a></li>
        <li><span class="fa fa-angle-right"></span></li>

        <li><a href="<?php $url?>"><?php echo $habercek['haber_baslik'] ?></a></li>



        <li><span><?php echo $habercek['haber_baslik'] ?></span></li>

    </ul>
</div>
<div class="nk-gap-1"></div>
<!-- END: Breadcrumbs -->




<div class="container">
    <div class="row vertical-gap">
        <div class="col-lg-8">
            <!-- START: Post -->
            <div class="nk-blog-post nk-blog-post-single">
                <!-- START: Post Text -->
                <div class="nk-post-text mt-0">
                    <div class="nk-post-img">
                        <img  src="<?php echo $habercek['haber_foto'] ?>" alt="Grab your sword and fight the Horde">
                    </div>
                    <div class="nk-gap-1"></div>
                    <div class="nk-post-by">
                        <!--<img src="assets/images/avatar-2.jpg" alt="Witch Murder" class="rounded-circle" width="35"> by <a href="https://nkdev.info">Witch Murder</a> <?php echo $habercek['haber_tarih'] ?>
-->

                        <div class="nk-post-categories">

                              <span onclick="window.location='blog-grid.php?kategori_ad=<?php echo $habercek['haber_kategori']?>';" class="bg-main-1"><?php echo $habercek['haber_kategori'] ?></span>



                        </div>

                    </div>
                    <div class="nk-gap"></div>

                    <?php echo $habercek['haber_icerik'] ?>



                    <div class="nk-gap"></div>
                    <div class="nk-post-share">
                        <span class="h5">Sosyal Medyada Paylaş:</span>
                        <ul class="nk-social-links-2">
                            <li><a href="https://www.facebook.com/sharer.php?u=<?php echo $habercek['haber_baslik']."%20".$url?>" target="_blank"><span class="nk-social-facebook" title="Share page on Facebook" data-share="facebook"><span class="fab fa-facebook"></span></span></a></li>
                            <li><a target="_blank" href="https://twitter.com/intent/tweet?via=&text=<?php echo $habercek['haber_baslik']."%20".$url?>"><span class="nk-social-twitter" title="Share page on Twitter" data-share="twitter"><span class="fab fa-twitter"></span></span></a></li>
                            <li><a target="_blank" href="https://api.whatsapp.com/send?text=<?php echo $habercek['haber_baslik']."%20".$url?>"><span class="nk-social-whatsapp" title="Share page on whatsapp" data-share="whatsapp"><span class="fab fa-whatsapp"></span></span></a></li>
                            <li><a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $url?>"><span class="nk-social-linkedin" title="Share page on linkedin" data-share="whatsapp"><span class="fab fa-linkedin"></span></span></a></li>
                        </ul>
                    </div>
                </div>
                <!-- END: Post Text -->

                <!--
                <div class="nk-gap-2"></div>
                <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Similar</span> Articles</span></h3>
                <div class="nk-gap"></div>
                <div class="row">

                    <div class="col-md-6">
                        <div class="nk-blog-post">
                            <a href="blog-article.html" class="nk-post-img">
                                <img src="assets/images/post-3-mid.jpg" alt="We found a witch! May we burn her?">
                                <span class="nk-post-comments-count">7</span>

                                <span class="nk-post-categories">
                                    <span class="bg-main-2">Adventure</span>
                                </span>

                            </a>
                            <div class="nk-gap"></div>
                            <h2 class="nk-post-title h4"><a href="blog-article.html">We found a witch! May we burn her?</a></h2>
                        </div>
                    </div>


                </div>
                -->
                <br>


                <div id="comments"></div>
                <h3 class="nk-decorated-h-2"><span><span class="text-main-1"><?php echo $say; ?></span> Yorumlar</span></h3>
                <div class="nk-gap"></div>
                <div class="nk-comments">

                <?php
                 while($yorumcek=$yorumsor->fetch(PDO::FETCH_ASSOC)){?>
                    <div class="nk-comment">
                        <div class="nk-comment-meta">
                            <img src="https://cravatar.eu/head/<?php echo $yorumcek['yorum_username']; ?>/128.png" alt="Wolfenstein" class="rounded-circle" width="35"><a href="profil.php?searchuser=<?php  echo $yorumcek['yorum_username']; ?>"><?php echo $yorumcek['yorum_username'];?></a> <?php echo  $yorumcek['yorum_zaman'];?>

                        </div>
                        <div class="nk-comment-text">
                            <p><?php echo $yorumcek['yorum_icerik'];?></p>
                        </div>
                    </div>
                    <?php }?>
                </div>


                <div class="nk-gap-2"></div>
                <h3 class="nk-decorated-h-2"><span><span class="text-main-1">YORUM</span> YAZ</span></h3>
                <div class="nk-gap"></div>
                <div class="nk-reply">
                    <form action="db/islem.php" class="nk-form" method="post" novalidate="novalidate">

                        <div class="nk-gap-1"></div>
                        <textarea class="form-control required" name="yorum_icerik" rows="5" placeholder="Mesajınız *" aria-required="true"></textarea>
                        <input type="hidden" name="yorum_username" value="<?php echo $usercek['user_username']; ?>">
                        <input type="hidden" name="yorum_durum" value="0">
                        <input type="hidden" name="yorum_blogid" value="<?php echo $haber_id; ?>">
                        <div class="nk-gap-1"></div>
                        <div class="nk-form-response-success"></div>
                        <div class="nk-form-response-error"></div>
                        <button type="submit" name="yorumgonder" class="nk-btn nk-btn-rounded nk-btn-color-main-1">Yorum Gönder</button>
                    </form>
                </div>

            </div>
            <!-- END: Post -->
        </div>
        <div class="col-lg-4">
<?php include 'sagblok.php';?>
        </div>
    </div>
</div>

<div class="nk-gap-2"></div>

<?php include 'footer.php';?>
