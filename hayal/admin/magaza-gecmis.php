
     <?php include 'header.php';
     error_reporting(0);
    include 'solblok.php';
    $magazagecmissor=$db->prepare("SELECT * FROM site_marketgecmis ORDER BY marketgecmis_id DESC");
    $magazagecmissor->execute();
    $magazagecmiscek=$magazagecmissor->fetch(PDO::FETCH_ASSOC);
    if ($_GET['sil']=="ok") {
      echo '<script type="text/javascript">
      setTimeout(function() {
       swal({
           title: "Market Geçmiş",
           text: "Başarılı bir şekilde silindi",
           type: "success"
       }, function() {
           window.location = "magaza-gecmis.php";
       });
   }, 500);
      </script>';

    }
    ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Geçmiş Alışverişler (Silinen veriler kullanıcıların profilinde de silinmektedir!)</h2>
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
                                            <th>Ürün Adı</th>
                                            <th>Satın Alan</th>
                                            <th>Fiyat</th>
                                            <th>Tarih</th>
                                            <th>Sil</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                      <?php while($magazagecmiscek=$magazagecmissor->fetch(PDO::FETCH_ASSOC)){?>
                                      <tr>
                                        <td><?php echo $magazagecmiscek['marketgecmis_id']; ?></td>
                                        <td><?php echo $magazagecmiscek['marketgecmis_urunbaslik']; ?></td>
                                        <td><?php



                                        $biusercek=$db->prepare("SELECT * FROM site_user where users_id=:id");
                                        $biusercek->execute(array(
                                          'id'=>$magazagecmiscek['marketgecmis_userid']
                                        ));
                                        $biuserssor=$biusercek->fetch(PDO::FETCH_ASSOC);
                                        echo $biuserssor['user_username']; ?></td>
                                        <td><?php echo $magazagecmiscek['marketgecmis_fiyat']; ?>₺</td>
                                        <td><?php echo $magazagecmiscek['marketgecmis_tarih']; ?></td>
                                        <td><a href="../../db/islem.php?marketgecmis_id=<?php echo $magazagecmiscek['marketgecmis_id']?>&marketgecmis=ok"><button style="width:60px;"class="btn btn-danger">Sil</button></a></td>
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
