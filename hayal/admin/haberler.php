
      <?php include 'header.php';
    include 'solblok.php';
    error_reporting(0);

    if ($_GET['yenihaber']=="ok") {
      echo '<script type="text/javascript">
      setTimeout(function() {
       swal({
           title: "Haber Ekleme",
           text: "Başarılı bir şekilde eklendi",
           type: "success"
       }, function() {
           window.location = "haberler.php";
       });
   }, 500);
      </script>';

    }elseif ($_GET['yenihaber']=="no") {
      echo '<script type="text/javascript">
      swal("Haber Ekleme", "Haber Ekleme sırasında sorun meydana geldi!", "error");
      </script>';
    }elseif ($_GET['sil']=="ok") {
          echo '<script type="text/javascript">
          setTimeout(function() {
           swal({
               title: "Haber Silme",
               text: "Başarılı bir şekilde silindi",
               type: "success"
           }, function() {
               window.location = "haberler.php";
           });
       }, 500);
          </script>';

        }elseif ($_GET['sil']=="no") {
          echo '<script type="text/javascript">
          swal("Haber Silme", "Haber Silme sırasında sorun meydana geldi!", "error");
          </script>';
        }

    ?>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>HABERLER</h2>
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
                                            <th>Foto</th>
                                            <th>Başlık</th>
                                            <th>Kategori</th>
                                            <th>İçerik</th>
                                            <th>Tarih</th>
                                            <th>Yazar</th>

                                            <th>Düzenle</th>
                                            <th>Sil</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                        while($habercek=$habersor->fetch(PDO::FETCH_ASSOC)){?>
                                        <tr>

                                            <td><?php echo $habercek['haber_id']?></td>
                                            <td> <img src="<?php echo $habercek['haber_foto']?>" class="w3-round-small" alt="Norway" style="width:70px;"></td>
                                            <td><?php echo $habercek['haber_baslik']?></td>
                                            <td><?php echo $habercek['haber_kategori']?></td>
                                            <td><?php echo substr($habercek['haber_icerik'],0,100);?>...</td>
                                            <td><?php echo $habercek['haber_tarih']?></td>
                                            <td><?php echo $habercek['haber_sahip']?></td>


                                            <td><a href="haber-duzenle.php?haber_id=<?php echo $habercek['haber_id']?>"><button class="btn btn-primary">Düzenle</button></a></td>
                                            <td><a href="../../db/islem.php?haber_id=<?php echo $habercek['haber_id']?>&habersil=ok"><button class="btn btn-danger">Sil</button></a></td>
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
