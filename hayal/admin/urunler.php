
     <?php include 'header.php';
    include 'solblok.php';
    error_reporting(0);
    if ($_GET['urun_id']=="ok") {
      echo '<script type="text/javascript">
      setTimeout(function() {
       swal({
           title: "Ürün Silme",
           text: "Başarılı bir şekilde silindi",
           type: "success"
       }, function() {
           window.location = "urunler.php";
       });
   }, 500);
      </script>';

    }elseif ($_GET['urun_id']=="no") {
      echo '<script type="text/javascript">
      swal("Ürün Silme", "Ürün Silme sırasında sorun meydana geldi!", "error");
      </script>';
    }elseif ($_GET['yeniurun']=="ok") {
          echo '<script type="text/javascript">
          setTimeout(function() {
           swal({
               title: "Ürün Ekleme",
               text: "Başarılı bir şekilde eklendi",
               type: "success"
           }, function() {
               window.location = "urunler.php";
           });
       }, 500);
          </script>';

        }elseif ($_GET['yeniurun']=="no") {
          echo '<script type="text/javascript">
          swal("Ürün Ekleme", "Ürün Ekleme sırasında sorun meydana geldi!", "error");
          </script>';
        }


    ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Ürünler</h2>
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
                                            <th>Stok Kodu</th>
                                            <th>Başlık</th>
                                            <th>Fiyat</th>
                                            <th>Açıklama</th>
                                            <th>Özellikler</th>
                                            <th>Sunucu</th>
                                            <th>Tarih</th>
                                            <th>Düzenle</th>
                                            <th>Sil</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)){?>
                                        <tr>
                                            <td><?php echo $uruncek['urun_id']?></td>
                                            <td><?php echo $uruncek['urun_stok']?></td>
                                            <td><?php echo $uruncek['urun_baslik']?></td>
                                            <td><?php echo $uruncek['urun_fiyat']?></td>
                                            <td><?php echo substr($uruncek['urun_genelaciklama'],0,15)?></td>
                                            <td><?php echo substr($uruncek['urun_ozellikler'],0,15)?></td>
                                            <td><?php
                                            $sunucuurunsor = $db->prepare("SELECT * FROM site_sunucu where sunucu_id=:id");
                                            $sunucuurunsor->execute(array(
                                              'id'=>$uruncek['urun_kategori']
                                            ));
                                            $sunucuuruncek=$sunucuurunsor->fetch(PDO::FETCH_ASSOC);
                                            echo $sunucuuruncek['sunucu_isim'];
                                            ?></td>
                                            <td><?php echo $uruncek['urun_tarih']?></td>
                                            <td><a href="urun-duzenle.php?urun_id=<?php echo $uruncek['urun_id']?>"><button class="btn btn-primary">Düzenle</button></a></td>
                                            <td><a href="../../db/islem.php?urun_id=<?php echo $uruncek['urun_id']?>&urunsil=ok"><button class="btn btn-danger">Sil</button></a></td>
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
