
<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo $useradmincek['admin_foto']?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $useradmincek['admin_isim'] ?></div>
                    <div class="email"><?php echo $useradmincek['admin_mail'] ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logout.php"><i class="material-icons">input</i>Çıkış Yap</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="active">
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">slideshow</i>
                            <span>Slider</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="sliderlar.php">Sliderlar</a>
                                </li>
                                <li>
                                <a href="slider-ekle.php">Slider Ekle</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">store</i>
                            <span>Mağaza</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="urunler.php">Ürünler</a>
                                </li>
                                <li>
                                <a href="urun-ekle.php">Ürün Ekle</a>
                            </li>
                            <li>
                            <a href="magaza-gecmis.php">Alışveriş Geçmişi</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">event_note</i>
                            <span>Haber</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="haberler.php">Haberler</a>
                                </li>
                                <li>
                                <a href="haber-ekle.php">Haber Ekle</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">comment</i>
                            <span>Yorum</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="yorumlar.php">Yorumlar</a>
                                </li>


                        </ul>
                    </li>
                    <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">person</i>
                            <span>Kullanıcılar</span>
                            </a>
                        <ul class="ml-menu">
                            <li><a href="kullanicilar.php">Kullanıcılar</a></li>
                            <li><a href="kullanici-ekle.php">Kullanıcı Ekle</a></li>
                            <br>
                            <li><a href="adminler.php">Adminler</a></li>
                            <li><a href="admin-ekle.php">Admin Ekle</a></li>
                        </ul>

                    </li>
                    <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">memory</i>
                            <span>Sunucular</span>
                            </a>
                        <ul class="ml-menu">
                            <li><a href="sunucular.php">Sunucular</a></li>
                            <li><a href="sunucu-ekle.php">Sunucu Ekle</a></li>

                        </ul>

                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">money</i>
                            <span>Kuponlar</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="bakiyekuponlar.php">Hediye Kuponları</a>
                                </li>
                                <li>
                                <a href="bakiyekupon-ekle.php">Bakiye Kuponu Ekle</a>
                            </li>
                            <li>
                            <a href="urunkupon-ekle.php">Ürün Kuponu Ekle</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">menu</i>
                            <span>Menu Ayarları</span>
                        </a>
                        <ul class="ml-menu">
                        <li>
                                <a href="menuler.php">Menüler</a>
                            </li>
                            <li>
                                <a href="menu-ekle.php">Menü Ekle</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">credit_card</i>
                            <span>Ödeme Ayarları</span>
                        </a>
                        <ul class="ml-menu">
                          <li>
                                  <a href="ininalodeme.php">İninal Barkodlar</a>
                              </li>
                              <li>
                                      <a href="ininalekle.php">İninal Barkod Ekle</a>
                                  </li>
                              <hr>
                                  <li>
                                          <a href="eftodeme.php">Eft/Havale Bankaları</a>
                                      </li>
                                      <li>
                                              <a href="bankaekle.php">Banka Ekle</a>
                                          </li>
                                      <hr>
                                      <li>
                                              <a href="odemeyontemleri.php">Mobil</a>
                                          </li>
                        </ul>
                    </li>
                    <li>
                        <a href="bildirimler.php">
                            <i class="material-icons">report_problem</i>
                            <span>Bildirimler</span>
                        </a>
                    </li>



                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">settings</i>
                            <span>Site Ayarları</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="genelayar.php">Genel Site Ayarları</a>
                                </li>
                                <li>
                                    <a href="socialmedia.php">Sosyal Medya Ayarları</a>
                                    </li>
                            <li>
                                <a href="apiayar.php">Api Ayarları</a>
                            </li>

                        </ul>
                    </li>

                    <li class="header">LABELS</li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons col-red">donut_large</i>
                            <span>Important</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons col-amber">donut_large</i>
                            <span>Warning</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons col-light-blue">donut_large</i>
                            <span>Information</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2018 - 2020 <a target="_blank" href="https://www.bolfps.com">BolFps - Yazılım Çözümleri</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>

            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>
