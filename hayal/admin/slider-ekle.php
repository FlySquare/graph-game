<?php include 'header.php';
    include 'solblok.php';

    ?>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Slider Ekle</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                    
                        <div class="body">

                            <form action="../../db/islem.php" data-parsley-validate method="post" enctype="multipart/form-data" method="POST">

                                <label for="password">Slider Logo</label>

                                <input type="file" name="slider_foto" value="">
                                <input type="hidden" name="eski_yol" >
                                <input type="hidden" name="slider_id" >
                                <br>


                                <label for="email_address">Başlık</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="slider_baslik" class="form-control" >
                                    </div>
                                </div>
                                <label for="password">İçerik</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="slider_icerik" class="form-control">
                                    </div>
                                </div>


                                <br>
                                <button name="sliderekle" type="submit" class="btn btn-primary m-t-15 waves-effect">EKLE</button>
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
