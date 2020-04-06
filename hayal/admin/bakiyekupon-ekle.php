<?php include 'header.php';
    include 'solblok.php';



    ?>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Bakiye Kupon Ekle</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="body">
                            <form action="../../db/islem.php" method="POST">
                            <label for="email_address">Kupon Kodu</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="hediyekod_kod" class="form-control">
                                    </div>
                                </div>
                                <label for="email_address">Hediye Miktarı</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="hediyekod_hediyemiktar" class="form-control">
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
<input type="hidden" name="hediyekod_tur" value="1">

                                <br>
                                <button name="bakiyekuponekle" type="submit" class="btn btn-primary m-t-15 waves-effect">EKLE</button>
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
