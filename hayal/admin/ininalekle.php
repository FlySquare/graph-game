<?php include 'header.php';
    include 'solblok.php';



    ?>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>İninal Barkod Ekle</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="body">
                            <form action="../../db/islem.php" method="POST">
                            <label for="email_address">Barkod No</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="ininal_barkodno" class="form-control">
                                    </div>
                                </div>

                                <label for="password">İninal Durumu:</label>
                                <div class="form-group">
                                  <div class="form-line">
                                    <select name="ininal_durum" class="form-control show-tick">
                                        <option  value="1">Aktif</option>
                                        <option  value="0">Pasif</option>
                                    </select>
                                  </div>
                                </div>


                                <br>
                                <button name="ininalekle" type="submit" class="btn btn-primary m-t-15 waves-effect">EKLE</button>
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
