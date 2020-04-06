<?php include 'header.php';
    include 'solblok.php';
    if(!$_GET['destek_id']){
      Header("Location:bildirimler.php");
    }


    $urunsor=$db->prepare("SELECT * FROM site_destek where destek_id=:id");
    $urunsor->execute(array(
      'id'=> $_GET['destek_id']
    ));
    $destekcek=$urunsor->fetch(PDO::FETCH_ASSOC);

    ?>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Bildirim Oku</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="body">
                                <label for="email_address">Gönderen Mail veya Discord Adresi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" disabled name="urun_baslik" class="form-control" value="<?php echo $destekcek['destek_email']?>">
                                    </div>
                                </div>
                                <label for="password">Gönderen İsmi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" disabled name="urun_kategori" class="form-control" value="<?php echo $destekcek['destek_adsoyad']?>">
                                    </div>
                                </div>
                                <label for="password">Destek Tarihi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" disabled name="urun_stok" class="form-control" value="<?php echo $destekcek['destek_tarih']?>">
                                    </div>
                                </div>
                                <label for="password">Destek içeriği</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" disabled name="urun_etiket" class="form-control" value="<?php echo $destekcek['destek_icerik']?>">
                                    </div>
                                </div>
                                <br>
                                <button onClick="location.href='bildirimler.php'" class="btn btn-primary">Kapat</button>
                                <td><a href="../../db/islem.php?destek_id=<?php echo $destekcek['destek_id']?>&desteksil=ok"><button class="btn btn-danger">Sil</button></a></td>
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
