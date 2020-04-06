<?php include 'header.php';
    include 'solblok.php';
error_reporting(0);
if(!$_GET['slider_id']){
  Header("Location:sliderlar.php");
}


    $slidersor=$db->prepare("SELECT * FROM site_slider where slider_id=:id");
    $slidersor->execute(array(
      'id'=> $_GET['slider_id']
    ));
    $slidercek=$slidersor->fetch(PDO::FETCH_ASSOC);

    if ($_GET['durum']=="ok") {
      echo '<script type="text/javascript">
      setTimeout(function() {
       swal({
           title: "Slider Düzenleme",
           text: "Başarılı bir şekilde düzenlendi",
           type: "success"
       }, function() {
           window.location = "sliderlar.php";
       });
   }, 500);
      </script>';

    }elseif ($_GET['durum']=="no") {
      echo '<script type="text/javascript">
  		swal("Slider Düzenleme", "Slider Düzenleme sırasında sorun meydana geldi!", "error");
  		</script>';
    }
    ?>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Slider Düzenle</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="body">
                            <form action="../../db/islem.php" data-parsley-validate method="post" enctype="multipart/form-data" method="POST">
                            <img src="../../<?php echo $slidercek['slider_foto']?>" class="w3-round-small" alt="Norway" style="width:600px;">

                                <br><br>
                                <label for="password">Slider Logo</label>

                                <input type="file" name="slider_foto" value="">
                                <input type="hidden" name="eski_yol" value="<?php echo $slidercek['slider_foto']; ?>">
                                <input type="hidden" name="slider_id" value="<?php echo $slidercek['slider_id']; ?>">
<br>
                                <label for="email_address">Başlık</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="slider_baslik" class="form-control" value="<?php echo $slidercek['slider_baslik']?>">
                                    </div>
                                </div>
                                <label for="password">İçerik</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="slider_icerik" class="form-control" value="<?php echo $slidercek['slider_icerik']?>">
                                    </div>
                                </div>

                                <input type="hidden" name="slider_id" value="<?php echo $slidercek['slider_id']?>">
                                <br>
                                <button name="sliderduzenle" type="submit" class="btn btn-primary m-t-15 waves-effect">GÜNCELLE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->
        </div>
    </section>
    <script>
                                     CKEDITOR.replace( 'editor1' );
                                 </script>
    <?php include 'footer.php';
    ?>
