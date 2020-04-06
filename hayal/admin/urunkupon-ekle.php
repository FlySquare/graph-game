<?php include 'header.php';
error_reporting(0);
    include 'solblok.php';
if ($_POST['sunucu_id']) {
  $sunucuid = $_POST['sunucu_id'];
  $urunidsor=$db->prepare("SELECT * FROM site_urun WHERE urun_kategori LIKE $sunucuid");
  $urunidsor->execute();


}


    ?>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Ürün Kupon Ekle</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="body">

                                                          <form action="" method="post">
                                                            <label for="email_address">Sunucu</label>
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                  <select name="sunucu_id" class="form-control show-tick">
                                                                    <?php   while($sunucucek=$sunucusor->fetch(PDO::FETCH_ASSOC)){?>
                                                                  <option  value="<?php echo $sunucucek['sunucu_id']; ?>"><?php echo $sunucucek['sunucu_isim']; ?></option>
                                                                <?php } ?>
                                                                  </select>

                                                                </div>
                                                                <button name="sunucuidcek" type="submit" class="btn btn-primary m-t-15 waves-effect">Ürünleri Çek</button>

                                                            </div>
                                                          </form>
                            <form action="../../db/islem.php" method="POST">
                            <label for="email_address">Kupon Kodu</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="hediyekod_kod" class="form-control">
                                    </div>
                                </div>

                                <label for="email_address">Ürün Seçiniz</label>
                                <div class="form-group">
                                    <div class="form-line">
                                      <select name="hediyekod_hediyemiktar" class="form-control show-tick">
                                        <?php   while($urunidcek=$urunidsor->fetch(PDO::FETCH_ASSOC)){?>
                                      <option  value="<?php echo $urunidcek['urun_id']; ?>"><?php echo $urunidcek['urun_baslik']; ?></option>
                                    <?php } ?>
                                      </select>
                                    </div>
                                </div>
                                <label for="password">Kupon Durumu:</label>
                                <div class="form-group">
                                    <div class="form-line">
                                      <select name="hediyekod_durum" class="form-control show-tick">
                                          <option  value="1">Aktif</option>
                                          <option  value="0">Pasif</option>
                                      </select>
                                    </div>
                                </div>

                                <input type="hidden" name="hediyekod_tur" value="2">
                                <br>
                                <button name="urunkuponekle" type="submit" class="btn btn-primary m-t-15 waves-effect">EKLE</button>
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
