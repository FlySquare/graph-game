<?php include 'header.php';
    include 'solblok.php';
    ?>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Haber Ekle</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="body">
                            <form action="../../db/islem.php" method="POST">
                            <label for="email_address">Fotoğraf</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="haber_foto" class="form-control">
                                    </div>
                                </div>
                                <label for="email_address">Başlık</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="haber_baslik" class="form-control" >
                                    </div>
                                </div>
                                <label for="email_address">Kategori</label>
                                <div class="form-group">
                                    <div class="form-line">
                                <select name="haber_kategori" class="form-control show-tick">

                                    <?php
                                             while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)){?>
                                    <option  value="<?php echo $kategoricek['haberkategori_link']; ?>"><?php echo $kategoricek['haberkategori_isim']; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                          </div>
                                <label for="password">Yazar</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" readonly="yes" name="haber_sahip" value="<?php echo $useradmincek['admin_isim']; ?>" class="form-control">
                                    </div>
                                </div>
                                <label for="password">İçerik</label>
                                <div class="form-group">
                                    <div class="form-line">

                                    <textarea name="editor1"></textarea>

                                    </div>
                                </div>

                                <br>
                                <button name="haberekle" type="submit" class="btn btn-primary m-t-15 waves-effect">EKLE</button>
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
