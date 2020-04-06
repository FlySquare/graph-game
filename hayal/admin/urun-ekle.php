<?php include 'header.php';
    include 'solblok.php';



    ?>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Ürün Ekle</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="body">

                            <form action="../../db/islem.php" data-parsley-validate method="post" enctype="multipart/form-data"  method="POST">
                              <label for="email_address">Ürün Fotoğrafı</label>
                                <div class="form-group">


                                      <input type="file" name="urun_foto" value="">




                                </div>
                            <label for="email_address">Ürün Fotoğrafı</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="urun_foto" class="form-control">
                                    </div>
                                </div>
                                <label for="email_address">Ürün İsmi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="urun_baslik" class="form-control">
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
                                        <input type="text" name="urun_stok" class="form-control">
                                    </div>
                                </div>
                                <label for="password">Ürün Etiket</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="urun_etiket" class="form-control">
                                    </div>
                                </div>
                                <label for="password">Ürün Fiyat</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="urun_fiyat" class="form-control">
                                    </div>
                                </div>
                                <label for="password">Ürün Konsol Komut(Kullanıcı Adından Önce)</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="urun_komut" class="form-control">
                                    </div>
                                </div>

                                <label for="password">Ürün Konsol Komut(Kullanıcı Adından Sonra)</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="urun_komut2" class="form-control">
                                    </div>
                                </div>
                                <label for="password">Ürün Kısa Açıklama</label>
                                <div class="form-group">
                                    <div class="form-line">

                                    <textarea name="editor1"></textarea>

                                    </div>
                                </div>




                                <label for="password">Ürün Açıklama</label>
                                <div class="form-group">
                                    <div class="form-line">

                                    <textarea name="editor2"></textarea>

                                    </div>
                                </div>


                                <br>
                                <button name="urunekle" type="submit" class="btn btn-primary m-t-15 waves-effect">EKLE</button>
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
