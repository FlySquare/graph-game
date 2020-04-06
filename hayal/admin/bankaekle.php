<?php include 'header.php';
    include 'solblok.php';



    ?>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Banka Ekle</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="body">
                            <form action="../../db/islem.php" method="POST">
                            <label for="email_address">Banka Adı</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="eft_bankaadi" class="form-control">
                                    </div>
                                </div>
                                <label for="email_address">İban No</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="eft_ibanno" class="form-control">
                                        </div>
                                    </div>
                                    <label for="email_address">Hesap Adı</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="eft_hesapsahip" class="form-control">
                                            </div>
                                        </div>
                                        <label for="email_address">Şube No</label>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" name="eft_subeno" class="form-control">
                                                </div>
                                            </div>
                                <label for="password">Banka Durumu:</label>
                                <div class="form-group">
                                    <div class="form-line">
                                      <select name="eft_durum" class="form-control show-tick">
                                          <option  value="1">Aktif</option>
                                          <option  value="0">Pasif</option>
                                      </select>
                                    </div>
                                </div>


                                <br>
                                <button name="bankaekle" type="submit" class="btn btn-primary m-t-15 waves-effect">EKLE</button>
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
