
     <?php include 'header.php';
    include 'solblok.php';
    error_reporting(0);
    if ($_GET['yenibanka']=="ok") {
      echo '<script type="text/javascript">
      setTimeout(function() {
       swal({
           title: "Banka Ekleme",
           text: "Başarılı bir şekilde eklendi",
           type: "success"
       }, function() {
           window.location = "eftodeme.php";
       });
    }, 500);
      </script>';

    }elseif ($_GET['yenibanka']=="no") {
      echo '<script type="text/javascript">
      swal("Banka Ekleme", "Banka Ekleme sırasında sorun meydana geldi!", "error");
      </script>';
    }elseif ($_GET['sil']=="ok") {
          echo '<script type="text/javascript">
          setTimeout(function() {
           swal({
               title: "Banka Silme",
               text: "Başarılı bir şekilde silindi",
               type: "success"
           }, function() {
               window.location = "eftodeme.php";
           });
       }, 500);
          </script>';

        }elseif ($_GET['sil']=="no") {
          echo '<script type="text/javascript">
          swal("Banka Silme", "Banka Silme sırasında sorun meydana geldi!", "error");
          </script>';
        }
    ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Eft/Havale Ödeme</h2>
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
                                            <th>Banka Adı</th>
                                            <th>İban No</th>
                                            <th>Hesap Adı</th>
                                            <th>Şube No</th>
                                            <th>Ekleme Tarihi</th>
                                            <th>Banka Durumu</th>
                                            <th>Düzenle</th>
                                            <th>Sil</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        while($eftcek=$eftsor->fetch(PDO::FETCH_ASSOC)){?>
                                        <tr>
                                            <td><?php echo $eftcek['eft_id']?></td>
                                            <td><?php echo $eftcek['eft_bankaadi']?></td>
                                            <td><?php echo $eftcek['eft_ibanno']?></td>
                                            <td><?php echo $eftcek['eft_hesapsahip']?></td>
                                            <td><?php echo $eftcek['eft_subeno']?></td>
                                            <td><?php echo $eftcek['eft_tarih']?></td>

                                            <td><?php
                                            if ($eftcek['eft_durum'] == 0) {
                                              echo "Banka Pasif";
                                            }  if ($eftcek['eft_durum'] == 1) {
                                                echo "Banka Aktif";
                                              }

                                            ?></td>

                                            <td><a href="eft-duzenle.php?eft_id=<?php echo $eftcek['eft_id']?>"><button class="btn btn-primary">Düzenle</button></a></td>
                                            <td><a href="../../db/islem.php?eft_id=<?php echo $eftcek['eft_id']?>&bankasil=ok"><button class="btn btn-danger">Sil</button></a></td>
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
