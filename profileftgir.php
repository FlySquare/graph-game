

<?php include 'header.php';

?>

<div id="nk-nav-mobile" class="nk-navbar nk-navbar-side nk-navbar-right-side nk-navbar-overlay-content d-lg-none">
<div class="nano">
<div class="nano-content">
<a href="/index.html" class="nk-nav-logo">
<img src="/assets/images/logo.png" alt="" width="120">
</a>
<div class="nk-navbar-mobile-content">
<ul class="nk-nav">

</ul>
</div>
</div>
</div>
</div>

<div class="nk-main">

<div class="nk-gap-1"></div>
<div class="container">
<ul class="nk-breadcrumbs">
<li><a href="../">Ana Sayfa &gt;</a></li>
<li><a href="../profil">Profil</a></li>
</ul>
</div>
<div class="nk-gap-1"></div>

<div class="container">
<div class="row vertical-gap">
<div class="col-lg-8">

<div style="text-align:center">
<a href="profil" class="nk-btn nk-btn-rounded nk-btn-color-white">Profil - <span class="fa fa-user"></span></a> &nbsp;&nbsp;
<a href="profilayar" class="nk-btn nk-btn-rounded nk-btn-color-white">Ayarlar - <span class="fa fa-cog"></span></a> &nbsp;&nbsp;
<a href="profilkredi" class="nk-btn nk-btn-rounded nk-btn-color-white">Kredi Aktar - <span class="icon ion-paper-airplane"></span></a> &nbsp;&nbsp;
<a href="profilkrediyukle" class="nk-btn nk-btn-rounded nk-btn-color-white">Kredi Yükle - <span class="fa fa-credit-card"></span></a> &nbsp;&nbsp;
<a href="depom.php" class="nk-btn nk-btn-rounded nk-btn-color-white">Depom - <span class="fa fa-inbox"></span></a>
</div>
<hr />

<div class="">
<div class="nk-box-2 bg-dark-2" style="padding:0px">
<br />
<br />
<div class="row">
<div class="col-md-4 col-sm-4 add_bottom_30">
</div>
<div class="col-md-4 col-sm-4 add_bottom_30">
<h4>Banka Hesapları Kod:</h4>
<div class="form-group">
  <?php
               while($eftcek=$eftsor->fetch(PDO::FETCH_ASSOC)){?>
<label>Banka Adı: <?php echo $eftcek['eft_bankaadi']; ?></label><br>
<label>İban No: <?php echo $eftcek['eft_ibanno']; ?></label><br>
<label>Hesap Sahibi: <?php echo $eftcek['eft_hesapsahip']; ?></label><br>
<label>Şube No: <?php echo $eftcek['eft_subeno']; ?></label><br>
<hr>

<?php } ?>

</div>


</div>
<div class="col-md-4 col-sm-4 add_bottom_30">
</div>
</div>
<label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspÖdeme yaptıktan sonra sayfanın en altında bulunan formdan iletişime geçininiz.</label><br>

<br />
<br />
</div>
<br />
<br />
</div>





<script src="/Scripts/jquery.unobtrusive-ajax.min.js"></script>
</div>
<div class="col-lg-4">
<?php include 'sagblok.php'; ?>
</div>
</div>
</div>
<div class="nk-gap-2"></div>
<?php include 'footer.php'; ?>
