
      <?php include 'header.php';
    include 'solblok.php';
    error_reporting(0);
    if ($_GET['yenisunucu']=="ok") {
      echo '<script type="text/javascript">
      setTimeout(function() {
       swal({
           title: "Sunucu Ekleme",
           text: "Başarılı bir şekilde eklendi",
           type: "success"
       }, function() {
           window.location = "sunucular.php";
       });
    }, 500);
      </script>';

    }elseif ($_GET['yenisunucu']=="no") {
      echo '<script type="text/javascript">
      swal("Sunucu Ekleme", "Sunucu Ekleme sırasında sorun meydana geldi!", "error");
      </script>';
    }elseif ($_GET['sil']=="ok") {
          echo '<script type="text/javascript">
          setTimeout(function() {
           swal({
               title: "Sunucu Silme",
               text: "Başarılı bir şekilde silindi",
               type: "success"
           }, function() {
               window.location = "sunucular.php";
           });
       }, 500);
          </script>';

        }elseif ($_GET['sil']=="no") {
          echo '<script type="text/javascript">
          swal("Sunucu Silme", "Sunucu Silme sırasında sorun meydana geldi!", "error");
          </script>';
        }

    ?>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>SUNUCULAR</h2>
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
                                            <th>Sunucu Adı</th>
                                            <th>Sunucu ip:port</th>
                                            <th>Konsol Tipi</th>
                                            <th>Konsol Port</th>
                                            <th>Düzenle</th>
                                            <th>Sil</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                        while($sunucucek=$sunucusor->fetch(PDO::FETCH_ASSOC)){?>
                                        <tr>

                                            <td><?php echo $sunucucek['sunucu_id']?></td>
                                            <td><?php echo $sunucucek['sunucu_isim']?></td>
                                            <td><?php echo $sunucucek['sunucu_ip'].":".$sunucucek['sunucu_port']?></td>
                                            <td>WebSend</td>
                                            <td><?php echo $sunucucek['sunucu_konsolport']?></td>

                                            <td><a href="sunucu-duzenle.php?sunucu_id=<?php echo $sunucucek['sunucu_id']?>"><button class="btn btn-primary">Düzenle</button></a></td>
                                            <td><a href="../../db/islem.php?sunucu_id=<?php echo $sunucucek['sunucu_id']?>&sunucusil=ok"><button class="btn btn-danger">Sil</button></a></td>
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
