
      <?php include 'header.php';
    include 'solblok.php';
    error_reporting(0);

if ($_GET['sil']=="ok") {
          echo '<script type="text/javascript">
          setTimeout(function() {
           swal({
               title: "Yorum Silme",
               text: "Başarılı bir şekilde silindi",
               type: "success"
           }, function() {
               window.location = "yorumlar.php";
           });
       }, 500);
          </script>';

        }elseif ($_GET['sil']=="no") {
          echo '<script type="text/javascript">
          swal("Yorum Silme", "Yorum Silme sırasında sorun meydana geldi!", "error");
          </script>';
        }elseif ($_GET['yorumpasif']=="ok") {
                  echo '<script type="text/javascript">
                  setTimeout(function() {
                   swal({
                       title: "Yorum Pasif",
                       text: "Başarılı bir şekilde pasife alındı",
                       type: "success"
                   }, function() {
                       window.location = "yorumlar.php";
                   });
               }, 500);
                  </script>';

                }elseif ($_GET['yorumpasif']=="no") {
                  echo '<script type="text/javascript">
                  swal("Yorum Pasif", "Yorum pasife alınma sırasında sorun meydana geldi!", "error");
                  </script>';
                }elseif ($_GET['yorumaktif']=="ok") {
                          echo '<script type="text/javascript">
                          setTimeout(function() {
                           swal({
                               title: "Yorum Aktif",
                               text: "Başarılı bir şekilde Aktife alındı",
                               type: "success"
                           }, function() {
                               window.location = "yorumlar.php";
                           });
                       }, 500);
                          </script>';

                        }elseif ($_GET['yorumaktif']=="no") {
                          echo '<script type="text/javascript">
                          swal("Yorum Aktif", "Yorum Aktif alınma sırasında sorun meydana geldi!", "error");
                          </script>';
                        }

    ?>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>YORUMLAR</h2>
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
                                            <th>Sahibi</th>
                                            <th>İçeriği</th>
                                            <th>Haber</th>
                                            <th>Durum</th>
                                            <th>Tarih</th>


                                            <th>Onayla</th>
                                            <th>Pasif</th>
                                            <th>Sil</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                        while($yorumsor=$yorumsork->fetch(PDO::FETCH_ASSOC)){?>
                                        <tr>

                                            <td><?php echo $yorumsor['yorum_id']?></td>
                                            <td> <img src="https://cravatar.eu/head/<?php echo $yorumsor['yorum_username'];?>/30.png" class="w3-round-small" alt="Norway" style="width:30px;"><?php echo $yorumsor['yorum_username']; ?></td>
                                            <td><?php echo $yorumsor['yorum_icerik'];?></td>
                                            <td><?php
                                            $haberid = $yorumsor['yorum_blogid'];
                                            $habersor=$db->prepare("SELECT * FROM site_haber WHERE haber_id = '{$haberid}'");
                                            $habersor->execute();
                                            $habercekk=$habersor->fetch(PDO::FETCH_ASSOC);
                                            echo $habercekk['haber_baslik'];
                                            ?></td>
                                            <td>
                                              <?php
                                              if ($yorumsor['yorum_durum'] == 0) {
                                                echo "Yorum Pasif";
                                              }  if ($yorumsor['yorum_durum'] == 1) {
                                                  echo "Yorum Aktif";
                                                }

                                              ?>
                                            </td>

                                            <td><?php echo $yorumsor['yorum_zaman']?></td>



                                            <td><a href="../../db/islem.php?yorum_id=<?php echo $yorumsor['yorum_id']?>&yorumaktif=ok"><button class="btn btn-primary">Onayla</button></a></td>
                                            <td><a href="../../db/islem.php?yorum_id=<?php echo $yorumsor['yorum_id']?>&yorumpasif=ok"><button class="btn btn-warning">Pasif Yap</button></a></td>
                                            <td><a href="../../db/islem.php?yorum_id=<?php echo $yorumsor['yorum_id']?>&yorumsil=ok"><button class="btn btn-danger">Sil</button></a></td>
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
