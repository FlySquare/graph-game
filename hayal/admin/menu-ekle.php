<?php include 'header.php';
    include 'solblok.php';

    ?>
    <!-- #Top Bar -->
    
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Menü Ekle</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                    
                        <div class="body">
                            <form action="../../db/islem.php" method="POST">
                            <label for="email_address">İcon</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="menu_icon" class="form-control">
                                    </div>
                                </div>
                                <label for="email_address">İsim</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="menu_isim" class="form-control" >
                                    </div>
                                </div>
                                <label for="password">Link</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="menu_link" class="form-control">
                                    </div>
                                </div>
                                
                                <br>
                                <button name="menuekle" type="submit" class="btn btn-primary m-t-15 waves-effect">EKLE</button>
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
