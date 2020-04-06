
      <?php include 'header.php';
    include 'solblok.php';
    error_reporting(0);
    if ($_GET['eklendi']=="ok") {
      echo '<script type="text/javascript">
      setTimeout(function() {
       swal({
           title: "Menü Ekleme",
           text: "Başarılı bir şekilde eklendi",
           type: "success"
       }, function() {
           window.location = "menuler.php";
       });
    }, 500);
      </script>';

    }elseif ($_GET['eklendi']=="no") {
      echo '<script type="text/javascript">
      swal("Menü Ekleme", "Menü Ekleme sırasında sorun meydana geldi!", "error");
      </script>';
    }elseif ($_GET['sil']=="ok") {
          echo '<script type="text/javascript">
          setTimeout(function() {
           swal({
               title: "Menü Silme",
               text: "Başarılı bir şekilde silindi",
               type: "success"
           }, function() {
               window.location = "menuler.php";
           });
       }, 500);
          </script>';

        }elseif ($_GET['sil']=="no") {
          echo '<script type="text/javascript">
          swal("Menü Silme", "Menü Silme sırasında sorun meydana geldi!", "error");
          </script>';
        }
    ?>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Menüler</h2>
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
                                            <th>İcon</th>
                                            <th>İsim</th>
                                            <th>Link</th>
                                            <th>Düzenle</th>
                                            <th>Sil</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                        while($menucek=$menusor->fetch(PDO::FETCH_ASSOC)){?>
                                        <tr>

                                            <td><?php echo $menucek['menu_id']?></td>
                                            <td><i class="<?php echo $menucek['menu_icon']?>"></i> </td>
                                            <td><?php echo $menucek['menu_isim']?></td>
                                            <td><?php echo $menucek['menu_link']?></td>

                                            <td><a href="menu-duzenle.php?menu_id=<?php echo $menucek['menu_id']?>"><button class="btn btn-primary">Düzenle</button></a></td>
                                            <td><a href="../../db/islem.php?menu_id=<?php echo $menucek['menu_id']?>&menusil=ok"><button class="btn btn-danger">Sil</button></a></td>
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
