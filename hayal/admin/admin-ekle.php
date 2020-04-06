<?php include 'header.php';
    include 'solblok.php';

    ?>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Admin Ekle</h2>
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
                                        <input type="text" name="admin_foto" class="form-control">
                                    </div>
                                </div>
                                <label for="email_address">İsim ve Soyisim</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="admin_isim" class="form-control" >
                                    </div>
                                </div>
                                <label for="password">E-posta Adresi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="admin_mail" class="form-control">
                                    </div>
                                </div>
                                <label for="password">Rütbe</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="admin_rutbe" class="form-control">
                                    </div>
                                </div>
                                <label for="password">Şifre</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" name="admin_sifre" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <button name="adminekle" type="submit" class="btn btn-primary m-t-15 waves-effect">EKLE</button>
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
