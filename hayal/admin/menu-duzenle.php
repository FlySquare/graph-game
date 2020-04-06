<?php include 'header.php';
    include 'solblok.php';

    error_reporting(0);
        if ($_GET['durum']=="ok") {
          echo '<script type="text/javascript">
          setTimeout(function() {
           swal({
               title: "Menü Düzenleme",
               text: "Başarılı bir şekilde düzenlendi",
               type: "success"
           }, function() {
               window.location = "menuler.php";
           });
       }, 500);
          </script>';

        }elseif ($_GET['durum']=="no") {
          echo '<script type="text/javascript">
          swal("Menü Düzenleme", "Menü Düzenleme sırasında sorun meydana geldi!", "error");
          </script>';
        }

    $menusor=$db->prepare("SELECT * FROM site_menu where menu_id=:id");
    $menusor->execute(array(
      'id'=> $_GET['menu_id']
    ));
    $menucek=$menusor->fetch(PDO::FETCH_ASSOC);

    ?>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Menü Düzenle</h2>
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
                                        <input type="text" name="menu_icon" class="form-control" value="<?php echo $menucek['menu_icon']?>">
                                    </div>
                                </div>
                                <label for="email_address">Başlık</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="menu_isim" class="form-control" value="<?php echo $menucek['menu_isim']?>">
                                    </div>
                                </div>
                                <label for="password">Link</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="menu_link" class="form-control" value="<?php echo $menucek['menu_link']?>">
                                    </div>
                                </div>


                                <input type="hidden" name="menu_id" value="<?php echo $menucek['menu_id']?>">
                                <br>
                                <button name="menuduzenle" type="submit" class="btn btn-primary m-t-15 waves-effect">GÜNCELLE</button>
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
