<?php include 'header.php';
    include 'solblok.php';
error_reporting(0);
if(!$_GET['users_id']){
  Header("Location:kullanicilar.php");
}
    if ($_GET['durum']=="ok") {
      echo '<script type="text/javascript">
      setTimeout(function() {
       swal({
           title: "Kullanıcı Düzenleme",
           text: "Başarılı bir şekilde düzenlendi",
           type: "success"
       }, function() {
           window.location = "kullanicilar.php";
       });
   }, 500);
      </script>';

    }elseif ($_GET['durum']=="no") {
      echo '<script type="text/javascript">
      swal("Kullanıcı Düzenleme", "Kullanıcı Düzenleme sırasında sorun meydana geldi!", "error");
      </script>';
    }

    $kullanicisor=$db->prepare("SELECT * FROM site_user where users_id=:id");
    $kullanicisor->execute(array(
      'id'=> $_GET['users_id']
    ));
    $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

    ?>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Kullanıcı Düzenle</h2>
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
                                        <input type="text" name="user_ad" class="form-control" value="<?php echo $kullanicicek['user_ad']?>">
                                    </div>
                                </div>
                                <label for="password">E-posta Adresi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="user_eposta" class="form-control" value="<?php echo $kullanicicek['user_eposta']?>">
                                    </div>
                                </div>
                                <label for="password">Kullanıcı Adı</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="user_username" class="form-control" value="<?php echo $kullanicicek['user_username']?>">
                                    </div>
                                </div>
                                <label for="password">Yaş</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="user_yas" class="form-control" value="<?php echo $kullanicicek['user_yas']?>">
                                    </div>
                                </div>
                                <label for="password">Discord</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text"  name="user_discord" class="form-control" value="<?php echo $kullanicicek['user_discord']?>">
                                    </div>
                                </div>
                                <label for="password">Kredi</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text"  name="user_kredi" class="form-control" value="<?php echo $kullanicicek['user_kredi']?>">
                                    </div>
                                </div>


                                <input type="hidden" name="users_id" value="<?php echo $kullanicicek['users_id']?>">
                                <br>
                                <button name="kullaniciduzenle" type="submit" class="btn btn-primary m-t-15 waves-effect">GÜNCELLE</button>
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
