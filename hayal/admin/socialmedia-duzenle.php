<?php include 'header.php';
    include 'solblok.php';
    error_reporting(0);
    if(!$_GET['sosyalmedya_id']){
      Header("Location:socialmedia.php");
    }
    if ($_GET['durum']=="ok") {
      echo '<script type="text/javascript">
      setTimeout(function() {
       swal({
           title: "Sosyal Medya Düzenleme",
           text: "Başarılı bir şekilde düzenlendi",
           type: "success"
       }, function() {
           window.location = "socialmedia.php";
       });
   }, 500);
      </script>';

    }elseif ($_GET['durum']=="no") {
      echo '<script type="text/javascript">
      swal("Sosyal Medya Düzenleme", "Sosyal Medya Düzenleme sırasında sorun meydana geldi!", "error");
      </script>';
    }



    $urunsor=$db->prepare("SELECT * FROM site_sosyalmedya where sosyalmedya_id=:id");
    $urunsor->execute(array(
      'id'=> $_GET['sosyalmedya_id']
    ));
    $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

    ?>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Sosyal Medya Düzenle</h2>
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
                                        <input type="text" name="sosyalmedya_icon" class="form-control" value="<?php echo $uruncek['sosyalmedya_icon']?>">
                                    </div>
                                </div>

                                <label for="password">Başlık</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="sosyalmedya_isim" class="form-control" value="<?php echo $uruncek['sosyalmedya_isim']?>">
                                    </div>
                                </div>
                                <label for="password">Link</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="sosyalmedya_link" class="form-control" value="<?php echo $uruncek['sosyalmedya_link']?>">
                                    </div>
                                </div>
                                <input type="hidden" name="sosyalmedya_id" value="<?php echo $uruncek['sosyalmedya_id']?>">
                                <br>
                                <button name="socialmediaduzenle" type="submit" class="btn btn-primary m-t-15 waves-effect">GÜNCELLE</button>
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
