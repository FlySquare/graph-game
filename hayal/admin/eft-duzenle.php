<?php include 'header.php';
    include 'solblok.php';

    if(!$_GET['eft_id']){
      Header("Location:eftodeme.php");
    }
        error_reporting(0);
            if ($_GET['bankaduzenle']=="ok") {
              echo '<script type="text/javascript">
              setTimeout(function() {
               swal({
                   title: "Banka Düzenleme",
                   text: "Başarılı bir şekilde düzenlendi",
                   type: "success"
               }, function() {
                   window.location = "eftodeme.php";
               });
           }, 500);
              </script>';

            }elseif ($_GET['bankaduzenle']=="no") {
              echo '<script type="text/javascript">
              swal("Banka Düzenleme", "Banka Düzenleme sırasında sorun meydana geldi!", "error");
              </script>';
            }

    $urunsor=$db->prepare("SELECT * FROM site_eft where eft_id=:id");
    $urunsor->execute(array(
      'id'=> $_GET['eft_id']
    ));
    $kuponcek=$urunsor->fetch(PDO::FETCH_ASSOC);

    ?>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Banka Düzenle</h2>
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
                                      <input type="text" name="eft_bankaadi" value="<?php echo $kuponcek['eft_bankaadi']; ?>" class="form-control">
                                  </div>
                              </div>
                              <label for="email_address">İban No</label>
                                  <div class="form-group">
                                      <div class="form-line">
                                          <input type="text" name="eft_ibanno" value="<?php echo $kuponcek['eft_ibanno']; ?>" class="form-control">
                                      </div>
                                  </div>
                                  <label for="email_address">Hesap Adı</label>
                                      <div class="form-group">
                                          <div class="form-line">
                                              <input type="text" name="eft_hesapsahip" value="<?php echo $kuponcek['eft_hesapsahip']; ?>" class="form-control">
                                          </div>
                                      </div>
                                      <label for="email_address">Şube No</label>
                                          <div class="form-group">
                                              <div class="form-line">
                                                  <input type="text" name="eft_subeno" value="<?php echo $kuponcek['eft_subeno']; ?>" class="form-control">
                                              </div>
                                          </div>
                              <label for="password">Banka Durumu:</label>
                              <div class="form-group">
                                <div class="form-line">
                            <select name="eft_durum" class="form-control show-tick">
                                <option  value="<?php echo $kuponcek['eft_durum']; ?>"><?php
                                if($kuponcek['eft_durum']=="1"){
                                  echo 'Aktif';
                                }elseif ($kuponcek['eft_durum']==0) {
                                  echo 'Pasif';
                                }


                               ?></option>
                              <?php
                              if($kuponcek['eft_durum']=="1"){
                                echo '<option  value="0">Pasif</option>';
                              }elseif ($kuponcek['eft_durum']==0) {
                                echo '<option  value="1">Aktif</option>';
                              }


                               ?>
                            </select>
                          </div>
                              </div>
                              <input type="hidden" name="eft_id" value="<?php echo $kuponcek['eft_id']; ?>">

                              <br>
                              <button name="bankaguncelle" type="submit" class="btn btn-primary m-t-15 waves-effect">GÜNCELLE</button>
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
