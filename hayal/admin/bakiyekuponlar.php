
     <?php include 'header.php';
    include 'solblok.php';
    error_reporting(0);
    if ($_GET['yenikupon']=="ok") {
      echo '<script type="text/javascript">
      setTimeout(function() {
       swal({
           title: "Kupon Ekleme",
           text: "Başarılı bir şekilde eklendi",
           type: "success"
       }, function() {
           window.location = "bakiyekuponlar.php";
       });
    }, 500);
      </script>';

    }elseif ($_GET['yenikupon']=="no") {
      echo '<script type="text/javascript">
      swal("Kupon Ekleme", "Kupon Ekleme sırasında sorun meydana geldi!", "error");
      </script>';
    }elseif ($_GET['sil']=="ok") {
          echo '<script type="text/javascript">
          setTimeout(function() {
           swal({
               title: "Kupon Silme",
               text: "Başarılı bir şekilde silindi",
               type: "success"
           }, function() {
               window.location = "bakiyekuponlar.php";
           });
       }, 500);
          </script>';

        }elseif ($_GET['sil']=="no") {
          echo '<script type="text/javascript">
          swal("Kupon Silme", "Kupon Silme sırasında sorun meydana geldi!", "error");
          </script>';
        }

    ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Hediye Kuponları</h2>
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
                                            <th>Hediye Kodu</th>
                                            <th>Oluşturma Tarihi</th>
                                            <th>Hediye Miktarı</th>
                                            <th>Kod Durumu</th>
                                            <th>Düzenle</th>
                                            <th>Sil</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        while($hediyekuponcek=$hediyekuponsor->fetch(PDO::FETCH_ASSOC)){?>
                                        <tr>
                                            <td><?php echo $hediyekuponcek['hediyekod_id']?></td>
                                            <td><?php echo $hediyekuponcek['hediyekod_kod']?></td>
                                            <td><?php echo $hediyekuponcek['hediyekod_zaman']?></td>
                                            <td><?php
                                            if($hediyekuponcek['hediyekod_tur'] == "1"){
                                              echo $hediyekuponcek['hediyekod_hediyemiktar'];
                                            }elseif ($hediyekuponcek['hediyekod_tur']== "2") {
                                              $hediyeurunid = $hediyekuponcek['hediyekod_hediyemiktar'];
                                              $urunidsor=$db->prepare("SELECT * FROM site_urun WHERE urun_id LIKE $hediyeurunid");
                                              $urunidsor->execute();
                                              $urunidcek=$urunidsor->fetch(PDO::FETCH_ASSOC);
                                              echo $urunidcek['urun_baslik'];
                                            }

                                            ?></td>
                                            <td><?php
                                            if ($hediyekuponcek['hediyekod_durum'] == 0) {
                                              echo "Kod Pasif";
                                            }  if ($hediyekuponcek['hediyekod_durum'] == 1) {
                                                echo "Kod Aktif";
                                              }

                                            ?></td>

                                            <td><a href="<?php
                                            if($hediyekuponcek['hediyekod_tur'] == "1"){
                                              echo "bakiyekupon-duzenle";
                                            }elseif ($hediyekuponcek['hediyekod_tur'] == "2") {
                                              echo "urunkupon-duzenle";
                                            }
                                             ?>.php?hediyekod_id=<?php echo $hediyekuponcek['hediyekod_id']?>"><button class="btn btn-primary">Düzenle</button></a></td>
                                            <td><a href="../../db/islem.php?hediyekod_id=<?php echo $hediyekuponcek['hediyekod_id']?>&hediyekodsil=ok"><button class="btn btn-danger">Sil</button></a></td>
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
