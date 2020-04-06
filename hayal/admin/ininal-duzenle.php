<?php include 'header.php';
    include 'solblok.php';
    if(!$_GET['ininal_id']){
      Header("Location:ininalodeme.php");
    }
    error_reporting(0);
        if ($_GET['ininalduzenle']=="ok") {
          echo '<script type="text/javascript">
          setTimeout(function() {
           swal({
               title: "İninal Düzenleme",
               text: "Başarılı bir şekilde düzenlendi",
               type: "success"
           }, function() {
               window.location = "ininalodeme.php";
           });
       }, 500);
          </script>';

        }elseif ($_GET['ininalduzenle']=="no") {
          echo '<script type="text/javascript">
          swal("İninal Düzenleme", "İninal Düzenleme sırasında sorun meydana geldi!", "error");
          </script>';
        }


    $urunsor=$db->prepare("SELECT * FROM site_ininal where ininal_id=:id");
    $urunsor->execute(array(
      'id'=> $_GET['ininal_id']
    ));
    $kuponcek=$urunsor->fetch(PDO::FETCH_ASSOC);

    ?>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>İninal Düzenle</h2>
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
                                        <input type="text" name="ininal_barkodno" class="form-control" value="<?php echo $kuponcek['ininal_barkodno']?>">
                                    </div>
                                </div>
                                <label for="password">Kupon Durumu:</label>
                                <div class="form-group">
                                  <div class="form-line">
                              <select name="ininal_durum" class="form-control show-tick">
                                  <option  value="<?php echo $kuponcek['ininal_durum']; ?>"><?php
                                  if($kuponcek['ininal_durum']=="1"){
                                    echo 'Aktif';
                                  }elseif ($kuponcek['ininal_durum']==0) {
                                    echo 'Pasif';
                                  }


                                 ?></option>
                                <?php
                                if($kuponcek['ininal_durum']=="1"){
                                  echo '<option  value="0">Pasif</option>';
                                }elseif ($kuponcek['ininal_durum']==0) {
                                  echo '<option  value="1">Aktif</option>';
                                }


                                 ?>
                              </select>
                            </div>
                                </div>


                                  <input type="hidden" name="ininal_id" value="<?php echo $kuponcek['ininal_id']?>">
                                <br>
                                <button name="ininalguncelle" type="submit" class="btn btn-primary m-t-15 waves-effect">GÜNCELLE</button>
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
