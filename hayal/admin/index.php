

    <?php include 'header.php';
    include 'solblok.php';
    $fgc= file_get_contents("http://mcapi.tc/?".$ayarcek['site_anasunucuip']."/json");
    $json = json_decode($fgc,true);


    ?>
    <!-- #Top Bar -->


    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>ANASAYFA</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box bg-orange hover-zoom-effect">
                      <div class="icon">
                          <i class="material-icons">shopping_cart</i>
                      </div>
                      <div class="content">
                          <div class="text">TOPLAM SATILAN ÜRÜN</div>
                          <div class="number"><?php echo $satissay ?></div>
                      </div>
                  </div>

              </div>
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box bg-blue hover-zoom-effect">
                      <div class="icon">
                          <i class="material-icons">person</i>
                      </div>
                      <div class="content">
                          <div class="text">KAYITLI KULLANICILAR</div>
                          <div class="number"><?php echo $kulsayisi?></div>
                      </div>
                  </div>

              </div>
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box bg-pink hover-zoom-effect">
                      <div class="icon">
                          <i class="material-icons">contact_support</i>
                      </div>
                      <div class="content">
                          <div class="text">TOPLAM BİLDİRİM</div>
                          <div class="number"><?php echo $bildirimsay?></div>
                      </div>
                  </div>

              </div>
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box bg-red hover-zoom-effect">
                      <div class="icon">
                          <i class="material-icons">attach_money</i>
                      </div>
                      <div class="content">
                          <div class="text">AYLIK KAZANÇ</div>
                          <div class="number"><?php echo $ayliktoplamcek['sayi']; ?></div>
                      </div>
                  </div>

              </div>


              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box bg-black hover-zoom-effect">
                      <div class="icon">
                          <i class="material-icons">cloud</i>
                      </div>
                      <div class="content">
                          <div class="text">SUNUCU İP</div>
                          <div class="number"><?php echo $ayarcek['site_anasunucuip']; ?></div>
                      </div>
                  </div>

              </div>
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box bg-purple hover-zoom-effect">
                      <div class="icon">
                          <i class="material-icons">person</i>
                      </div>
                      <div class="content">
                          <div class="text">SUNUCU ONLİNE</div>
                          <div class="number"><?php

                            echo $json['players']." KİŞİ";

                           ?></div>
                      </div>
                  </div>

              </div>
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box bg-brown hover-zoom-effect">
                      <div class="icon">
                          <i class="material-icons">signal_cellular_4_bar</i>
                      </div>
                      <div class="content">
                          <div class="text">SUNUCU SÜRÜM</div>
                          <div class="number"><?php echo $json['version'];?></div>
                      </div>
                  </div>

              </div>
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box bg-green hover-zoom-effect">
                      <div class="icon">
                          <i class="material-icons">attach_money</i>
                      </div>
                      <div class="content">
                          <div class="text">SUNUCU DURUM</div>
                          <div class="number">
                            <?php
                                require_once '../../mc/Websend.php';
                                $ws = new Websend($ayarcek['site_anasunucuip']);
                                $ws->password = $ayarcek['site_anasunucupassword'];
                                if($ws->connect()){
                                    echo "AKTİF";
                                }else{
                                    echo "PASİF";
                                }
                                $ws->disconnect();

                            ?>
                          </div>
                      </div>
                  </div>

              </div>

            </div>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            <!-- CPU Usage -->

            <!-- #END# CPU Usage -->
            <div class="row clearfix">
                <!-- Visitors -->

                <!-- #END# Visitors -->
                <!-- Latest Social Trends -->

                <!-- #END# Latest Social Trends -->
                <!-- Answered Tickets -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-teal">
                            <div class="font-bold m-b--35">Son Kayıt Olan Kullanıcılar</div>
                            <ul class="dashboard-stat-list">
                              <?php
                                  while($kullanicicek=$usersor->fetch(PDO::FETCH_ASSOC)){?>
                                <li>
                                    <b>#<?php echo $kullanicicek['users_id'] ?> </b> <b>Adı: </b> <?php echo $kullanicicek['user_username'] ?>
                                    <span  class="pull-right"><b><?php echo $kullanicicek['user_tarih'] ?></b></span>

                                </li>

<?php } ?>



                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Answered Tickets -->
            </div>

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">

                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Ürün Adı</th>
                                            <th>Satın Alan</th>
                                            <th>Fiyat</th>
                                            <th>Tarih</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php while($marketcek=$indexmarketgecmis->fetch(PDO::FETCH_ASSOC)){?>
                                      <tr>
                                          <td><?php echo $marketcek['marketgecmis_id'] ?></td>
                                          <td><?php echo $marketcek['marketgecmis_urunbaslik'] ?></td>
                                          <td><span class="label bg-green"><?php echo $biuserssor['user_username']; ?></span></td>
                                          <td><?php echo $marketcek['marketgecmis_fiyat'] ?></td>
                                          <td><?php echo $marketcek['marketgecmis_tarih'] ?></td>
                                      </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- #END# CPU Usage -->

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

    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>
