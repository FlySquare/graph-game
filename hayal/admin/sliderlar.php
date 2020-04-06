
      <?php include 'header.php';
    include 'solblok.php';
    error_reporting(0);
    if ($_GET['slider_id']=="ok") {
      echo '<script type="text/javascript">
      setTimeout(function() {
       swal({
           title: "Slider Silme",
           text: "Başarılı bir şekilde silindi",
           type: "success"
       }, function() {
           window.location = "sliderlar.php";
       });
   }, 500);
      </script>';

    }elseif ($_GET['slider_id']=="no") {
      echo '<script type="text/javascript">
      swal("Slider Silme", "Slider Silme sırasında sorun meydana geldi!", "error");
      </script>';
    }
    if ($_GET['eklendi']=="ok") {
      echo '<script type="text/javascript">
      setTimeout(function() {
       swal({
           title: "Slider Ekleme",
           text: "Başarılı bir şekilde eklendi",
           type: "success"
       }, function() {
           window.location = "sliderlar.php";
       });
   }, 500);
      </script>';

    }elseif ($_GET['eklendi']=="no") {
      echo '<script type="text/javascript">
      swal("Slider Ekleme", "Slider Ekleme sırasında sorun meydana geldi!", "error");
      </script>';
    }




    ?>
    <!-- #Top Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>SLİDERLAR</h2>
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
                                            <th>Açıklama</th>
                                            <th>Düzenle</th>
                                            <th>Sil</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                        while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)){?>
                                        <tr>

                                            <td><?php echo $slidercek['slider_id']?></td>
                                            <td> <img src="../../<?php echo $slidercek['slider_foto']?>" class="w3-round-small" alt="Norway" style="width:50px;"></td>
                                            <td><?php echo $slidercek['slider_baslik']?></td>
                                            <td><?php echo $slidercek['slider_icerik']?></td>

                                            <td><a href="slider-duzenle.php?slider_id=<?php echo $slidercek['slider_id']?>"><button class="btn btn-primary">Düzenle</button></a></td>
                                            <td><a href="../../db/islem.php?slider_id=<?php echo $slidercek['slider_id']?>&slidersil=ok"><button class="btn btn-danger">Sil</button></a></td>
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
