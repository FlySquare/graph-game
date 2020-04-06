

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

<div class="nk-gap-1"></div>

<div class="container">
<div class="row vertical-gap">
<div class="col-lg-8">


<hr />

<div class="">
<div class="nk-box-2 bg-dark-2" style="padding:0px">
<br />
<br />
<div class="row">
<div class="col-md-4 col-sm-4 add_bottom_30">
</div>
<div class="col-md-4 col-sm-4 add_bottom_30">
<form action="" method="POST">
<input name="__RequestVerificationToken" type="hidden" value="D7LxJwzviYqm7zPESEKZ3poAmOFpRA-tSNFbAUGJxfNy37wYGoPkAlyRxCh2hC2iFyImpWUPaDDP--LPvtP9yrhscl1jpBUUi2Kp6Tl593I1" />
<h4>Kredi Aktar</h4>
<div class="form-group">
<label>Kredinin aktarılacağı hesap</label>
<input class="form-control" required="required" name="krediaktar_usersid" id="isim" type="text">
</div>
<div class="form-group">
<label>Aktarılacak miktar</label>
<input class="form-control" required="required" name="krediaktar_miktar" id="miktar" type="number">
</div>
<div class="form-group">
<label>Açıklama</label>
<input class="form-control" required="required" name="krediaktar_aciklama" id="aciklama" type="text">
<input class="form-control" name="krediaktar_gonderenid" value="<?php echo $usercek['user_username'] ?>" type="hidden">
</div>
<div style="text-align:center">
<button name="kredigonder" type="submit" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block">Kredi Aktar - <span class="fa fa-credit-card"></span></button>
</div>
</form>
</div>
<div class="col-md-4 col-sm-4 add_bottom_30">
</div>
</div>

<br />
<br />
</div>
<br />
<br />
</div>





<script src="/Scripts/jquery.unobtrusive-ajax.min.js"></script>
</div>
<div class="col-lg-4">

</div>
</div>
</div>
<div class="nk-gap-2"></div>
<?php include 'footer.php'; ?>
