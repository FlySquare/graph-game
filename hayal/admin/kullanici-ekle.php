<?php include 'header.php';
    include 'solblok.php';
    ?>
    <!-- #Top Bar -->
    
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Kullanıcı Ekle</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                    
                        <div class="body">
                            <form action="../../db/islem.php" method="POST">
                                <label for="email_address">İsim ve Soyisim</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="user_ad" class="form-control" >
                                    </div>
                                </div>
                                <label for="password">E-posta Adresi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="user_eposta" class="form-control" >
                                    </div>
                                </div>
                                <label for="password">Kullanıcı Adı</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="user_username" class="form-control" >
                                    </div>
                                </div>
                                <label for="password">Yaş</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="user_yas" class="form-control" >
                                    </div>
                                </div>
                                <label for="password">Discord</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text"  name="user_discord" class="form-control" >
                                    </div>
                                </div>
                                <label for="password">Kredi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text"  name="user_kredi" class="form-control" >
                                    </div>
                                </div>
                                <label for="password">Şifre</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="user_sifre" class="form-control" >
                                    </div>
                                </div>
                               
                                <br>
                                <button name="kullaniciekle" type="submit" class="btn btn-primary m-t-15 waves-effect">EKLE</button>
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
