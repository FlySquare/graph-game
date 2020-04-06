<?php include 'header.php';
    include 'solblok.php';
    error_reporting(0);
    if(!$_GET['haber_id']){
      Header("Location:haberler.php");
    }
    if ($_GET['durum']=="ok") {
      echo '<script type="text/javascript">
      setTimeout(function() {
       swal({
           title: "Haber Düzenleme",
           text: "Başarılı bir şekilde düzenlendi",
           type: "success"
       }, function() {
           window.location = "haberler.php";
       });
   }, 500);
      </script>';

    }elseif ($_GET['durum']=="no") {
      echo '<script type="text/javascript">
      swal("Haber Düzenleme", "Haber Düzenleme sırasında sorun meydana geldi!", "error");
      </script>';
    }


    $habersor=$db->prepare("SELECT * FROM site_haber where haber_id=:id");
    $habersor->execute(array(
      'id'=> $_GET['haber_id']
    ));
    $habercek=$habersor->fetch(PDO::FETCH_ASSOC);

    ?>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Haber Düzenle</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="body">
                            <form action="../../db/islem.php" method="POST">
                            <img src="<?php echo $habercek['haber_foto']?>" class="w3-round-small" alt="Norway" style="width:50px;">
                            <label for="email_address">Fotoğraf</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="haber_foto" class="form-control" value="<?php echo $habercek['haber_foto']?>">
                                    </div>
                                </div>
                                <label for="email_address">Başlık</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="haber_baslik" class="form-control" value="<?php echo $habercek['haber_baslik']?>">
                                    </div>
                                </div>
                                <label for="email_address">Kategori</label>
                                <div class="form-group">
                                    <div class="form-line">
                                <select name="haber_kategori" class="form-control show-tick">

                                    <?php
                                             while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)){?>
                                    <option  value="<?php echo $kategoricek['haberkategori_isim']; ?>"><?php echo $kategoricek['haberkategori_isim']; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                          </div>
                                <label for="password">Yazar</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" readonly="yes" name="haber_sahip" class="form-control" value="<?php echo $habercek['haber_sahip']?>">
                                    </div>
                                </div>
                                <label for="password">İçerik</label>
                                <div class="form-group">
                                    <div class="form-line">

                                    <textarea name="editor1"><?php echo $habercek['haber_icerik']?></textarea>

                                    </div>
                                </div>

                                <input type="hidden" name="haber_id" value="<?php echo $habercek['haber_id']?>">
                                <br>
                                <button name="haberduzenle" type="submit" class="btn btn-primary m-t-15 waves-effect">GÜNCELLE</button>
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
