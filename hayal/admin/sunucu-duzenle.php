<?php include 'header.php';
    include 'solblok.php';
    error_reporting(0);
    if(!$_GET['sunucu_id']){
      Header("Location:sunucular.php");
    }
    if ($_GET['sunucuduzenle']=="ok") {
      echo '<script type="text/javascript">
      setTimeout(function() {
       swal({
           title: "Sunucu Düzenleme",
           text: "Başarılı bir şekilde düzenlendi",
           type: "success"
       }, function() {
           window.location = "sunucular.php";
       });
   }, 500);
      </script>';

    }elseif ($_GET['sunucuduzenle']=="no") {
      echo '<script type="text/javascript">
      swal("Sunucu Düzenleme", "Sunucu Düzenleme sırasında sorun meydana geldi!", "error");
      </script>';
    }


    $urunsor=$db->prepare("SELECT * FROM site_sunucu where sunucu_id=:id");
    $urunsor->execute(array(
      'id'=> $_GET['sunucu_id']
    ));
    $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

  
    ?>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Sunucu Düzenle</h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                      <div class="body">
                          <form action="../../db/islem.php" method="POST">
                          <label for="email_address">Sunucu İsim</label>
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" name="sunucu_isim" value="<?php echo $uruncek['sunucu_isim']?>" class="form-control">
                                  </div>
                              </div>
                              <label for="email_address">Sunucu İp</label>
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" name="sunucu_ip" value="<?php echo $uruncek['sunucu_ip']?>" class="form-control" >
                                  </div>
                              </div>
                              <label for="password">Sunucu Port</label>
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" name="sunucu_port" value="<?php echo $uruncek['sunucu_port']?>" class="form-control">
                                  </div>
                              </div>
                              <label for="email_address">Konsol Port(Sabit Değer)</label>
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="text" readonly="yes" name="sunucu_konsolport" value="<?php echo $uruncek['sunucu_konsolport']?>" class="form-control" >
                                  </div>
                              </div>
                              <label for="password">Konsol Şifre</label>
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="password" name="sunucu_konsolsifre" value="<?php echo $uruncek['sunucu_konsolsifre']?>" class="form-control">
                                  </div>
                              </div>
                              <input type="hidden" name="sunucu_id" value="<?php echo $uruncek['sunucu_id']?>">
                              <br>

                              <button name="sunucuguncelle" type="submit" class="btn btn-primary m-t-15 waves-effect">GÜNCELLE</button>
                          </form>
                          <form method="post">
                              <button name="test" type="submit" class="btn btn-danger m-t-15 waves-effect">SUNUCUYU TEST ET</button>
                          </form>
                          <?php
                          if(isset($_POST['test'])){
                            require_once '../../mc/Websend.php';

                            $ws = new Websend($uruncek['sunucu_ip']);
                            $ws->password = $uruncek['sunucu_konsolsifre'];
                            if($ws->connect()){
                              echo '<script type="text/javascript">
                              setTimeout(function() {
                               swal({
                                   title: "Sunucu Bağlantısı",
                                   text: "Başarılı bir şekilde bağlanıldı",
                                   type: "success"
                               }, function() {

                               });
                           }, 500);
                              </script>';
                            }else{
                              echo '<script type="text/javascript">
                              swal("Sunucu Bağlantısı", "Sunucu bağlanma sırasında sorun meydana geldi!", "error");
                              </script>';
                            }
                            $ws->disconnect();
                          }

                          if(isset($_POST['sunucuyagonder'])){
                            $komut = $_POST['komut'];
                            require_once '../../mc/Websend.php';

                            $mc = new Websend($uruncek['sunucu_ip']);
                            $mc->password = $uruncek['sunucu_konsolsifre'];
                            if($mc->connect()){
                              $mc->doCommandAsConsole("$komut");
                              echo '<script type="text/javascript">
                              setTimeout(function() {
                               swal({
                                   title: "Komut Gönderme",
                                   text: "Başarılı bir şekilde gönderildi",
                                   type: "success"
                               }, function() {

                               });
                           }, 500);
                              </script>';
                            }else{
                              echo '<script type="text/javascript">
                              swal("Komut Gönderme", "Komut Gönderme sırasında sorun meydana geldi!", "error");
                              </script>';
                            }
                            $mc->disconnect();
                          }
                           ?>
                      </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->
            <!-- Textarea -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Sunucu Komut Bölümü</h2>

                        </div>
                        <div class="body">

                          <form action="" method="post">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea name="komut" rows="4" class="form-control no-resize" placeholder="Sunucuya göndermek istediğiniz kodu yazınız..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button name="sunucuyagonder" type="submit" class="btn btn-primary m-t-15 waves-effect">KOMUT GÖNDER</button>

                          </form>



                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Textarea -->
        </div>
    </section>

    <?php include 'footer.php';
    ?>
