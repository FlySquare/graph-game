
      <?php include 'header.php';
    include 'solblok.php';
    error_reporting(0);
    if ($_GET['eklendi']=="ok") {
      echo '<script type="text/javascript">
      setTimeout(function() {
       swal({
           title: "Kullanıcı Ekleme",
           text: "Başarılı bir şekilde eklendi",
           type: "success"
       }, function() {
           window.location = "kullanicilar.php";
       });
   }, 500);
      </script>';

    }elseif ($_GET['eklendi']=="no") {
      echo '<script type="text/javascript">
      swal("Kullanıcı Ekleme", "Kullanıcı Ekleme sırasında sorun meydana geldi!", "error");
      </script>';
    }elseif ($_GET['sil']=="ok") {
          echo '<script type="text/javascript">
          setTimeout(function() {
           swal({
               title: "Kullanıcı Silme",
               text: "Başarılı bir şekilde silindi",
               type: "success"
           }, function() {
               window.location = "kullanicilar.php";
           });
       }, 500);
          </script>';

        }elseif ($_GET['sil']=="no") {
          echo '<script type="text/javascript">
          swal("Kullanıcı Silme", "Kullanıcı Silme sırasında sorun meydana geldi!", "error");
          </script>';
        }elseif ($_GET['onayver']=="ok") {
              echo '<script type="text/javascript">
              setTimeout(function() {
               swal({
                   title: "Onaylı Hesap",
                   text: "Başarılı bir şekilde onay tiki verildi",
                   type: "success"
               }, function() {
                   window.location = "kullanicilar.php";
               });
           }, 500);
              </script>';

            }elseif ($_GET['onayver']=="no") {
              echo '<script type="text/javascript">
              swal("Onaylı Hesap", "Onay Tiki Verme sırasında sorun meydana geldi!", "error");
              </script>';
            }elseif ($_GET['onayal']=="ok") {
                  echo '<script type="text/javascript">
                  setTimeout(function() {
                   swal({
                       title: "Onaylı Hesap",
                       text: "Başarılı bir şekilde onay tiki geri alındı",
                       type: "success"
                   }, function() {
                       window.location = "kullanicilar.php";
                   });
               }, 500);
                  </script>';

                }elseif ($_GET['onayal']=="no") {
                  echo '<script type="text/javascript">
                  swal("Onaylı Hesap", "Onay Tiki alma sırasında sorun meydana geldi!", "error");
                  </script>';
                }

    ?>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>KULLANICILAR</h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Kullanıcı Adı</th>
                                            <th>E-posta</th>
                                            <th>İsim</th>
                                            <th>Yaş</th>
                                            <th>Kredi</th>
                                            <th>Discord</th>
                                            <th>Kayıt Tarihi</th>
                                            <th>Düzenle</th>
                                            <th>Onaylı Hesap Yap</th>
                                            <th>Onaylı Hesap Sil</th>
                                            <th>Sil</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                        while($kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC)){?>
                                        <tr>
                                            <td><?php echo $kullanicicek['users_id']?></td>
                                            <td><?php
                                            if ($kullanicicek['user_yetki']=="5") {
                                              echo $kullanicicek["user_username"].'  <i class="fas fa-check-circle"></i>';
                                            }elseif ($kullanicicek['user_yetki']=="1") {
                                              echo $kullanicicek["user_username"];
                                            }
                                            ?></td>
                                            <td><?php echo $kullanicicek['user_eposta']?></td>
                                            <td><?php echo $kullanicicek['user_ad']?></td>
                                            <td><?php echo $kullanicicek['user_yas']?></td>
                                            <td><?php echo $kullanicicek['user_kredi']?></td>
                                            <td><?php echo $kullanicicek['user_discord']?></td>
                                            <td><?php echo $kullanicicek['user_tarih']?></td>
                                            <td> <a href="kullanici-duzenle.php?users_id=<?php echo $kullanicicek['users_id']?>"><button class="btn btn-primary">Düzenle</button></a> </td>
                                            <td> <a href="../../db/islem.php?users_id=<?php echo $kullanicicek['users_id']?>&onayver=ok"><button class="btn btn-warning">Onaylı Hesap Yap</button></a> </td>
                                            <td> <a href="../../db/islem.php?users_id=<?php echo $kullanicicek['users_id']?>&onayal=ok"><button class="btn btn-warning">Onaylı Hesap Sil</button></a> </td>
                                            <td><a href="../../db/islem.php?users_id=<?php echo $kullanicicek['users_id']?>&usersil=ok"><button class="btn btn-danger">Sil</button></a></td>
                                        </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>
