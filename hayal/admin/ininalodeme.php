
     <?php include 'header.php';
    include 'solblok.php';
    error_reporting(0);
    if ($_GET['yenikupon']=="ok") {
      echo '<script type="text/javascript">
      setTimeout(function() {
       swal({
           title: "İninal Ekleme",
           text: "Başarılı bir şekilde eklendi",
           type: "success"
       }, function() {
           window.location = "ininalodeme.php";
       });
    }, 500);
      </script>';

    }elseif ($_GET['yenikupon']=="no") {
      echo '<script type="text/javascript">
      swal("İninal Ekleme", "İninal Ekleme sırasında sorun meydana geldi!", "error");
      </script>';
    }elseif ($_GET['sil']=="ok") {
          echo '<script type="text/javascript">
          setTimeout(function() {
           swal({
               title: "İninal Silme",
               text: "Başarılı bir şekilde silindi",
               type: "success"
           }, function() {
               window.location = "ininalodeme.php";
           });
       }, 500);
          </script>';

        }elseif ($_GET['sil']=="no") {
          echo '<script type="text/javascript">
          swal("İninal Silme", "İninal Silme sırasında sorun meydana geldi!", "error");
          </script>';
        }
    ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>İninal Ödeme</h2>
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
                                            <th>Barko No</th>
                                            <th>Oluşturma Tarihi</th>
                                            <th>Kod Durumu</th>
                                            <th>Düzenle</th>
                                            <th>Sil</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        while($ininalcek=$ininalsor->fetch(PDO::FETCH_ASSOC)){?>
                                        <tr>
                                            <td><?php echo $ininalcek['ininal_id']?></td>
                                            <td><?php echo $ininalcek['ininal_barkodno']?></td>
                                            <td><?php echo $ininalcek['ininal_tarih']?></td>

                                            <td><?php
                                            if ($ininalcek['ininal_durum'] == 0) {
                                              echo "Barkod Pasif";
                                            }  if ($ininalcek['ininal_durum'] == 1) {
                                                echo "Barkod Aktif";
                                              }

                                            ?></td>

                                            <td><a href="ininal-duzenle.php?ininal_id=<?php echo $ininalcek['ininal_id']?>"><button class="btn btn-primary">Düzenle</button></a></td>
                                            <td><a href="../../db/islem.php?ininal_id=<?php echo $ininalcek['ininal_id']?>&ininalsil=ok"><button class="btn btn-danger">Sil</button></a></td>
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
