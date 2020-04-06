<?php include 'header.php';
    include 'solblok.php';?>
    <!-- #Top Bar -->
    
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Hakkımızda Ayarları</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                    
                        <div class="body">
                            <form action="../../db/islem.php" method="POST">
                                <label for="email_address">Hakkımızda Başlık</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="hakkimizda_baslik" class="form-control" value="<?php echo $hakkimizdacek['hakkimizda_baslik']?>">
                                    </div>
                                </div>
                                <label for="password">Hakkımızda İçerik</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="hakkimizda_icerik" class="form-control" value="<?php echo $hakkimizdacek['hakkimizda_icerik']?>">
                                    </div>
                                </div>
                                
                                
                                
                                
                                <br>
                                <button name="hakkimizdaayarkaydet" type="submit" class="btn btn-primary m-t-15 waves-effect">KAYDET</button>
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
