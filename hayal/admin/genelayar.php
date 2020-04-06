<?php include 'header.php';
    include 'solblok.php';
    error_reporting(0);
    if ($_GET['durum']=="no") {
          echo '<script type="text/javascript">
          setTimeout(function() {
           swal({
               title: "Ayar Kaydet",
               text: "Ayar kaydetme sırasında sorun meydana geldi!",
               type: "error"
           }, function() {
               window.location = "genelayar.php";
           });
       }, 500);
          </script>';

        }elseif ($_GET['durum']=="ok") {
              echo '<script type="text/javascript">
              setTimeout(function() {
               swal({
                   title: "Ayar Kaydet",
                   text: "Ayarlar başarı ile kaydedildi",
                   type: "success"
               }, function() {
                   window.location = "genelayar.php";
               });
           }, 500);
              </script>';

            }
    ?>
    <!-- #Top Bar -->


    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Genel Site Ayarları</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="card">

                                          <?php
                                          if (strlen($ayarcek['ayar_logo'])>0) {?>

                                            <center>
                                              <img style=""width="200"  src="../../<?php echo $ayarcek['ayar_logo']; ?>">

</center>
                                          <?php } else {?>


                                          <img width="200"  src="../../dimg/logo-yok.png">


                                          <?php } ?>

                                          <hr>

                                          <form action="../../db/islem.php" data-parsley-validate method="post" enctype="multipart/form-data" method="POST">

                        <div class="body">
                          <label for="password">Site Logo Yükle(Önerilen boyut: 200x50)</label>

                          <input type="file" name="ayar_logo" value="">
                          <input type="hidden" name="eski_yol" value="<?php echo $ayarcek['ayar_logo']; ?>">
                        
                          <br><br>
                              <br>
                                <label for="password">Site Başlık</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="ayar_title" class="form-control" value="<?php echo $ayarcek['ayar_title']?>">
                                    </div>
                                </div>
                                <label for="password">Site Hakkında</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="ayar_description" class="form-control" value="<?php echo $ayarcek['ayar_description']?>">
                                    </div>
                                </div>
                                <label for="password">Site Anahtar Kelimeler</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="ayar_keywords" class="form-control" value="<?php echo $ayarcek['ayar_keywords']?>">
                                    </div>
                                </div>
                                <label for="password">Site Yazar</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="ayar_author" class="form-control" value="<?php echo $ayarcek['ayar_author']?>">
                                    </div>
                                </div>
                                <label for="password">Site Para Birimi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="ayar_parabirimi" class="form-control" value="<?php echo $ayarcek['ayar_parabirimi']?>">
                                    </div>
                                </div>
                                <br>
                                <button name="genelayarkaydet" type="submit" class="btn btn-primary m-t-15 waves-effect">KAYDET</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->
        </div>
    </section>

    <?php include 'footer.php';
    ?>
