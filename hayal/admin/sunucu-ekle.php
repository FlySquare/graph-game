<?php include 'header.php';
    include 'solblok.php';

    ?>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Sunucu Ekle</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="body">
                            <form action="../../db/islem.php" method="POST">
                            <label for="email_address">Sunucu İsim</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="sunucu_isim" class="form-control">
                                    </div>
                                </div>
                                <label for="email_address">Sunucu İp</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="sunucu_ip" class="form-control" >
                                    </div>
                                </div>
                                <label for="password">Sunucu Port</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="sunucu_port" class="form-control">
                                    </div>
                                </div>
                                <label for="email_address">Konsol Port(Sabit Değer)</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input readonly="yes" type="text" name="sunucu_konsolport" value="1410" class="form-control" >
                                    </div>
                                </div>
                                <label for="password">Konsol Şifre</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" name="sunucu_konsolsifre" class="form-control">
                                    </div>
                                </div>

                                <br>
                                <button name="sunucuekle" type="submit" class="btn btn-primary m-t-15 waves-effect">EKLE</button>
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
