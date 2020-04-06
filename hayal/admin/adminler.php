
      <?php include 'header.php';
    include 'solblok.php';
    error_reporting(0);
    if ($_GET['eklendi']=="ok") {
      echo '<script type="text/javascript">
      setTimeout(function() {
       swal({
           title: "Admin Ekleme",
           text: "Başarılı bir şekilde eklendi",
           type: "success"
       }, function() {
           window.location = "adminler.php";
       });
   }, 500);
      </script>';

    }elseif ($_GET['eklendi']=="no") {
      echo '<script type="text/javascript">
      swal("Admin Ekleme", "Admin Ekleme sırasında sorun meydana geldi!", "error");
      </script>';
    }elseif ($_GET['admin_id']=="ok") {
          echo '<script type="text/javascript">
          setTimeout(function() {
           swal({
               title: "Admin Silme",
               text: "Başarılı bir şekilde silindi",
               type: "success"
           }, function() {
               window.location = "adminler.php";
           });
       }, 500);
          </script>';

        }elseif ($_GET['admin_id']=="no") {
          echo '<script type="text/javascript">
          swal("Admin Silme", "Admin Silme sırasında sorun meydana geldi!", "error");
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
                        <div class="header">

                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Foto</th>
                                            <th>İsim</th>
                                            <th>E-posta</th>
                                            <th>Şifre</th>
                                            <th>Rutbe</th>
                                            <th>Düzenli</th>
                                            <th>Sil</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                        while($admincek=$adminsor->fetch(PDO::FETCH_ASSOC)){?>
                                        <tr>

                                            <td><?php echo $admincek['admin_id']?></td>
                                            <td> <img src="<?php echo $admincek['admin_foto']?>" class="w3-round-small" alt="Norway" style="width:50px;"></td>
                                            <td><?php echo $admincek['admin_isim']?></td>
                                            <td><?php echo $admincek['admin_mail']?></td>
                                            <td><?php echo $admincek['admin_sifre']?></td>
                                            <td><?php echo $admincek['admin_rutbe']?></td>

                                            <td><a href="admin-duzenle.php?admin_id=<?php echo $admincek['admin_id']?>"><button class="btn btn-primary">Düzenle</button></a></td>
                                            <td><a href="../../db/islem.php?admin_id=<?php echo $admincek['admin_id']?>&adminsil=ok"><button class="btn btn-danger">Sil</button></a></td>
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
