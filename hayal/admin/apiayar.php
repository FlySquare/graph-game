<?php include 'header.php';
    include 'solblok.php';?>
    <!-- #Top Bar -->
    
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>İletişim Ayarları</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                    
                        <div class="body">
                            <form action="../../db/islem.php" method="POST">
                                <label for="email_address">Google Maps</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="ayar_maps" class="form-control" value="<?php echo $ayarcek['ayar_maps']?>">
                                    </div>
                                </div>
                                <label for="password">Google Analystic</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="ayar_analystic" class="form-control" value="<?php echo $ayarcek['ayar_analystic']?>">
                                    </div>
                                </div>
                                <label for="password">Zopim</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="ayar_zoppim" class="form-control" value="<?php echo $ayarcek['ayar_zoppim']?>">
                                    </div>
                                </div>
                                <label for="password">Smtp Port</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="ayar_smtpport" class="form-control" value="<?php echo $ayarcek['ayar_smtpport']?>">
                                    </div>
                                </div>
                                <label for="password">Smtp Şifre</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="ayar_smtppassword" class="form-control" value="<?php echo $ayarcek['ayar_smtppassword']?>">
                                    </div>
                                </div>
                                <label for="email_address">Smtp Hosting</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="ayar_smtphost" class="form-control" value="<?php echo $ayarcek['ayar_smtphost']?>">
                                    </div>
                                </div>
                                
                                
                                <br>
                                <button name="apiayarkaydet" type="submit" class="btn btn-primary m-t-15 waves-effect">KAYDET</button>
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
