<?php include 'header.php';
    include 'solblok.php';
  error_reporting(0);
  if(!$_GET['admin_id']){
    Header("Location:adminler.php");
  }

    $adminsor=$db->prepare("SELECT * FROM site_admin where admin_id=:id");
    $adminsor->execute(array(
      'id'=> $_GET['admin_id']
    ));
    $admincek=$adminsor->fetch(PDO::FETCH_ASSOC);

        if ($_GET['durum']=="ok") {
          echo '<script type="text/javascript">
          setTimeout(function() {
           swal({
               title: "Admin Düzenleme",
               text: "Başarılı bir şekilde düzenlendi",
               type: "success"
           }, function() {
               window.location = "adminler.php";
           });
       }, 500);
          </script>';

        }elseif ($_GET['durum']=="no") {
          echo '<script type="text/javascript">
          swal("Admin Düzenleme", "Admin Düzenleme sırasında sorun meydana geldi!", "error");
          </script>';
        }
    ?>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Admin Düzenle</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="body">
                            <form action="../../db/islem.php" method="POST">
                            <img src="<?php echo $admincek['admin_foto']?>" class="w3-round-small" alt="Norway" style="width:50px;">
                            <label for="email_address">Fotoğraf</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="admin_foto" class="form-control" value="<?php echo $admincek['admin_foto']?>">
                                    </div>
                                </div>
                                <label for="email_address">İsim ve Soyisim</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="admin_isim" class="form-control" value="<?php echo $admincek['admin_isim']?>">
                                    </div>
                                </div>
                                <label for="password">E-posta Adresi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="admin_mail" class="form-control" value="<?php echo $admincek['admin_mail']?>">
                                    </div>
                                </div>
                                <label for="password">Rütbe</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="admin_rutbe" class="form-control" value="<?php echo $admincek['admin_rutbe']?>">
                                    </div>
                                </div>


                                <input type="hidden" name="admin_id" value="<?php echo $admincek['admin_id']?>">
                                <br>
                                <button name="adminduzenle" type="submit" class="btn btn-primary m-t-15 waves-effect">GÜNCELLE</button>
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
