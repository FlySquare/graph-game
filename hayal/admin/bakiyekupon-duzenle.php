<?php include 'header.php';
    include 'solblok.php';
    error_reporting(0);
    if(!$_GET['hediyekod_id']){
      Header("Location:bakiyekuponlar.php");
    }
    if ($_GET['bakiyekuponduzenle']=="ok") {
      echo '<script type="text/javascript">
      setTimeout(function() {
       swal({
           title: "Kupon Düzenleme",
           text: "Başarılı bir şekilde düzenlendi",
           type: "success"
       }, function() {
           window.location = "bakiyekuponlar.php";
       });
   }, 500);
      </script>';

    }elseif ($_GET['bakiyekuponduzenle']=="no") {
      echo '<script type="text/javascript">
      swal("Kupon Düzenleme", "Kupon Düzenleme sırasında sorun meydana geldi!", "error");
      </script>';
    }


    $urunsor=$db->prepare("SELECT * FROM site_hediyekod where hediyekod_id=:id");
    $urunsor->execute(array(
      'id'=> $_GET['hediyekod_id']
    ));
    $kuponcek=$urunsor->fetch(PDO::FETCH_ASSOC);

    ?>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Kod Düzenle</h2>
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
                                        <input type="text" name="hediyekod_kod" class="form-control" value="<?php echo $kuponcek['hediyekod_kod']?>">
                                    </div>
                                </div>
                                <label for="password">Hediye Miktarı</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="hediyekod_hediyemiktar" class="form-control" value="<?php echo $kuponcek['hediyekod_hediyemiktar']?>">
                                    </div>
                                </div>
                                <label for="password">Kupon Durumu:</label>
                                <div class="form-group">
                                  <div class="form-line">
                              <select name="hediyekod_durum" class="form-control show-tick">
                                  <option  value="<?php echo $kuponcek['hediyekod_durum']; ?>"><?php
                                  if($kuponcek['hediyekod_durum']=="1"){
                                    echo 'Aktif';
                                  }elseif ($kuponcek['hediyekod_durum']==0) {
                                    echo 'Pasif';
                                  }


                                 ?></option>
                                <?php
                                if($kuponcek['hediyekod_durum']=="1"){
                                  echo '<option  value="0">Pasif</option>';
                                }elseif ($kuponcek['hediyekod_durum']==0) {
                                  echo '<option  value="1">Aktif</option>';
                                }


                                 ?>
                              </select>
                            </div>

                                  <input type="hidden" name="hediyekod_id" value="<?php echo $kuponcek['hediyekod_id']?>">
                                <br>
                                <button name="bakiyekuponguncelle" type="submit" class="btn btn-primary m-t-15 waves-effect">GÜNCELLE</button>
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
