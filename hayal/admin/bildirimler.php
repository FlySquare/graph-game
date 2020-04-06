
     <?php include 'header.php';
    include 'solblok.php';
    error_reporting(0);
    if ($_GET['sil']=="ok") {
          echo '<script type="text/javascript">
          setTimeout(function() {
           swal({
               title: "Bildirim Silme",
               text: "Başarılı bir şekilde silindi",
               type: "success"
           }, function() {
               window.location = "bildirimler.php";
           });
       }, 500);
          </script>';

        }elseif ($_GET['sil']=="no") {
          echo '<script type="text/javascript">
          swal("Bildirim Silme", "Bildirim Silme sırasında sorun meydana geldi!", "error");
          </script>';
        }
    ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Bildirimler</h2>
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
                                            <th>Mail yada Discord</th>
                                            <th>İsim</th>
                                            <th>İçerik</th>
                                            <th>Tarih</th>
                                            <th>Görüntüle</th>
                                            <th>Sil</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        while($destekcek=$desteksor->fetch(PDO::FETCH_ASSOC)){?>
                                        <tr>
                                            <td><?php echo $destekcek['destek_id']?></td>
                                            <td><?php echo $destekcek['destek_email']?></td>
                                            <td><?php echo $destekcek['destek_adsoyad']?></td>
                                            <td><?php echo substr($destekcek['destek_icerik'],0,85)?>...</td>
                                            <td><?php echo $destekcek['destek_tarih']?></td>
                                            <td><a href="bildirim-oku.php?destek_id=<?php echo $destekcek['destek_id']?>"><button class="btn btn-primary">Görüntüle</button></a></td>
                                            <td><a href="../../db/islem.php?destek_id=<?php echo $destekcek['destek_id']?>&desteksil=ok"><button class="btn btn-danger">Sil</button></a></td>
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
