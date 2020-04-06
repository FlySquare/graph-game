<?php include 'header.php';
    include 'solblok.php';
    error_reporting(0);
    if(!$_GET['urun_id']){
      Header("Location:urunler.php");
    }

    if ($_GET['durum']=="ok") {
      echo '<script type="text/javascript">
      setTimeout(function() {
       swal({
           title: "Ürün Düzenleme",
           text: "Başarılı bir şekilde düzenlendi",
           type: "success"
       }, function() {
           window.location = "urunler.php";
       });
   }, 500);
      </script>';

    }elseif ($_GET['durum']=="no") {
      echo '<script type="text/javascript">
      swal("Ürün Düzenleme", "Ürün Düzenleme sırasında sorun meydana geldi!", "error");
      </script>';
    }



    $urunsor=$db->prepare("SELECT * FROM site_urun where urun_id=:id");
    $urunsor->execute(array(
      'id'=> $_GET['urun_id']
    ));
    $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

    ?>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Ürün Düzenle</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="body">
                            <form action="../../db/islem.php" data-parsley-validate method="post" enctype="multipart/form-data" method="POST">
                              <?php
                              if (strlen($uruncek['urun_foto'])>0) {?>

                                <center>
                                  <img style=""width="200"  src="../../<?php echo $uruncek['urun_foto']; ?>">

                            </center>
                              <?php } else {?>


                              <img width="200"  src="../../dimg/logo-yok.png">


                              <?php } ?>

                              <hr>
                              <br>
                              <label for="email_address">Ürün Fotoğrafı</label>
                                <div class="form-group">
                                    

                                      <input type="file" name="urun_foto" value="">
                                      <input type="hidden" name="eski_yol" value="<?php echo $uruncek['urun_foto']; ?>">
                                      <input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id']; ?>">



                                </div>
                                <br>
                                <label for="email_address">Ürün İsmi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="urun_baslik" class="form-control" value="<?php echo $uruncek['urun_baslik']?>">
                                    </div>
                                </div>
                                <label for="email_address">Ürün Sunucu</label>
                                <div class="form-group">
                                    <div class="form-line">
                                <select name="urun_kategori" class="form-control show-tick">

                                    <?php
                                             while($sunucucek=$sunucusor->fetch(PDO::FETCH_ASSOC)){?>
                                    <option  value="<?php echo $sunucucek['sunucu_id']; ?>"><?php echo $sunucucek['sunucu_isim']; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                          </div>
                                <label for="password">Ürün Stok Kodu</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="urun_stok" class="form-control" value="<?php echo $uruncek['urun_stok']?>">
                                    </div>
                                </div>
                                <label for="password">Ürün Etiket</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="urun_etiket" class="form-control" value="<?php echo $uruncek['urun_etiket']?>">
                                    </div>
                                </div>
                                <label for="password">Ürün Fiyat</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="urun_fiyat" class="form-control" value="<?php echo $uruncek['urun_fiyat']?>">
                                    </div>
                                </div>

                                <label for="password">Ürün Konsol Komut(Kullanıcı Adından Önce)</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="urun_komut" class="form-control" value="<?php echo $uruncek['urun_komut']?>">
                                    </div>
                                </div>
                                <label for="password">Ürün Konsol Komut(Kullanıcı Adından Sonra)</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="urun_komut2" class="form-control" value="<?php echo $uruncek['urun_komut2']?>">
                                    </div>
                                </div>

                                <label for="password">Ürün Kısa Açıklama</label>
                                <div class="form-group">
                                    <div class="form-line">

                                    <textarea name="editor1"><?php echo $uruncek['urun_ozellikler']?></textarea>

                                    </div>
                                </div>




                                <label for="password">Ürün Açıklama</label>
                                <div class="form-group">
                                    <div class="form-line">

                                    <textarea name="editor2"><?php echo $uruncek['urun_genelaciklama']?></textarea>

                                    </div>
                                </div>

                                <input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id']?>">
                                <br>
                                <button name="urunduzenle" type="submit" class="btn btn-primary m-t-15 waves-effect">GÜNCELLE</button>
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
                                     CKEDITOR.replace( 'editor2' );

                                 </script>
    <?php include 'footer.php';
    ?>
