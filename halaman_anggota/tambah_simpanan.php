<?php require_once("../config/koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    } ?>


<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->


<!DOCTYPE html>
<html>
<head>
<title> Koperasi Pasar Kranji Baru</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="asset/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="asset/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="asset/css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="asset/js/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="asset/js/move-top.js"></script>
<script type="text/javascript" src="asset/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
	<div class="agileits_header">
		<div class="w3l_offers"><!--
			<a href="products.html">Today's special Offers !</a>-->
		</div>
		<div class="w3l_search">
			<!--<form action="#" method="post">
				<input type="text" name="Product" value="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">
				<input type="submit" value=" ">
			</form>-->
		</div>
	
				<div class="product_list_header">  
			<form action="keranjang.php" method="post" class="last">
                <fieldset>
                    <input type="submit" name="submit" value="" class="button" />
                </fieldset>
            </form>
		</div>

		<div class="w3l_header_right">
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
								<li><a> <?php $nama = $_SESSION['username'];?> <?php echo "<b style='color:black;'>". $_SESSION['nama']."</b>";?></a></li>
								<li><a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a></li> 
							</ul>
						</div>                  
					</div>	
				</li>
			</ul>
		</div>
		
		<div class="clearfix"> </div>
	</div>
<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop(); 
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });
		 
	});
	</script>
<!-- //script-for sticky-nav -->
	<div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left">
				<h1><a href="index_anggota.php"><span><img src="asset/images/logo1.png"></span></a></h1>
			</div>
			<div class="w3ls_logo_products_left1">
				<!--<ul class="special_items">
					<li><a href="events.html">Events</a><i>/</i></li>
					<li><a href="about.html">About Us</a><i>/</i></li>
					<li><a href="products.html">Best Deals</a><i>/</i></li>
					<li><a href="services.html">Services</a></li>
				</ul> -->
			</div>
			<div class="w3ls_logo_products_left1">
				<!--<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>(+0123) 234 567</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com">ocikyamin93@gmail.com</a></li>
				</ul> -->
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index_anggota.php">Home</a><span>|</span></li>
				<li> Selamat Datang di Koperasi Pasar Kranji Baru</li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!--
	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
Brand and toggle get grouped for better mobile display
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
				  </button>
			   </div> 
Collect the nav links, forms, and other content for toggling
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">
						<li></i> <a href="index.php"> Home</a></li>
						<li><a href="makanan.php"> Makanan</a></li>
					
					</ul>

				 </div>
			</nav>
		</div>
		<div class="w3l_banner_nav_right">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">-->
							<!--start: Container -->
  <div class="container">

			<!-- start: Table -->
                 <div class="table-responsive">
                 <div class="title"><h3>Form Simpanan</h3></div>
                 <div class="hero-unit">Harap isi form dibawah ini dengan lengkap dan benar </div>
    <form id="formku" method="post">
    <table class="table table-condensed">
    <tr>
        <td><label>Nama</label></td>
        <td><input class="form-control custom-select input-lg" type="text" name="anggota" readonly value="<?php echo $_SESSION['anggota']['nama_anggota'];?>" size="50" /> </td>
      </tr>
      <tr>
        <td><label>Jenis Simpanan</label></td>
        <td><select class="form-control custom-select input-lg" name="jenis_simpanan">
            <option disabled selected>-- Pilih Jenis Simpanan --</option>
            <?php $prd=mysqli_query($koneksi,"SELECT * from jenis_simpanan order by id_jenis_simpanan desc");
                while ($dataprd=mysqli_fetch_array($prd)){
            ?>
                <option value="<?php echo $dataprd['id_jenis_simpanan']; ?>" title="<?php echo $dataprd['id_jenis_simpanan'];?>"><?php echo $dataprd['jenis_simpanan']?></option>
                  <?php } ?>
            </select>
        </td>
      </tr>
      <tr>
        <td><label>Jumlah Simpanan</label></td>
        <td><input type="number" name="dana" class="form-control input-lg" placeholder="Masukan Jumlah Simpanan Rp."> </td>
      </tr>
      <tr>
        <td><label>Tanggal</label></td>
        <td><input type="date" class="form-control input-lg" id="exampleInputEmail1" name="tanggal" required> </td>
      </tr>
      <td></td>
        
        </tr>
    </table>
    <td><button class="btn btn-primary" name="simpan">Simpan </button></td>
    </form>
    <?php
              if (isset($_POST["simpan"])) {
                
                $idanggota = $_SESSION['anggota']['id_anggota'];
                $anggota  = $_POST['anggota'];
                $jenis_simpanan      = $_POST['jenis_simpanan'];
                $dana     = $_POST['dana'];
                $tanggal  = $_POST['tanggal'];
                
                $query_anggota = $koneksi->query("SELECT *FROM anggota WHERE id_anggota='$anggota'");
                $data_anggota  = $query_anggota->fetch_assoc();
                $nama_anggota  = $data_anggota['nama_anggota'];
              
                $koneksi->query("INSERT INTO simpanan(id_anggota,id_jenis_simpanan,jumlah_simpan) values('$idanggota','$jenis_simpanan','$dana')") or die (mysqli_error());
                
                $id_simpanan = $koneksi->insert_id;

                $koneksi->query("INSERT INTO simpanan_detail(id_simpanan,id_jenis_simpanan,id_anggota,tanggal_simpan,jumlah_simpan) values('$id_simpanan','$jenis_simpanan','$idanggota','$tanggal','$dana')") or die (mysqli_error());
              ?>
              <script type="text/javascript">
                alert("Sukses. Data Berhasil Di Simpan");
                window.location.href='simpanan.php';
              </script>
            <?php }; ?>
                   </div>

			<!-- end: Table -->

		</div>
		<!-- end: Container -->


						
					</ul>
				</div>

			</section>
		
		</div>
		<div class="clearfix">
			


		</div>
	</div>
<!-- banner -->
	<div class="banner_bottom">
			
			
		
	</div>


<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="clearfix"> </div>
			<div class="agile_footer_grids">
				<div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
					<div class="w3_footer_grid_bottom">
						<h4><p>© 2020 Koperasi Pasar Kranji Baru | Design by ALPHATESTER </p></h4>
						
					</div>
				</div>
				<div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
					<div class="w3_footer_grid_bottom">
						<h5>connect with us</h5>
						<ul class="agileits_social_icons">
							<li><a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
							<li><a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href="#" class="dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		
		</div>
	</div>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="asset/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="asset/js/minicart.js"></script>
<script>
		paypal.minicart.render();

		paypal.minicart.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});

	</script>
	<script>
	$(document).ready(function(){
		$.ajax({
			type:'post',
			url:'cek_kabupaten.php',
			success:function(hasilprovinsi)
			{
				$("select[name=nama_provinsi]").html(hasilprovinsi);
			}
		});
		 $("select[name=nama_provinsi]").on("change",function(){
		 	var id_provinsi_terpilih = $("option:selected",this).attr("id_provinsi");

		 	$.ajax({
			type:'post',
			url:'cek_kota.php',
			data:'id_provinsi='+id_provinsi_terpilih,
			success:function(hasilkota)
			{
				$("select[name=nama_kota]").html(hasilkota);
			}
		});
		 });
		 $.ajax({
		 	type:'post',
		 	url:'cek-ongkir.php',
		 	success:function(hasilongkir)
		 	{
		 		$("select[name=nama_kiriman]").html(hasilongkir);
		 	}
		 });
		 $("select[name=nama_kiriman]").on("change",function(){

		 	var kiriman_terpilih = $("select[name=nama_kiriman]").val();
		 	var kota_terpilih = $("option:selected","select[name=nama_kota]").attr("id_kota");
		 	var total_berat = $("input[name=berat]").val();
		 	$.ajax({
		 		type:'post',
		 		url:'cek_paket.php',
		 		data:'kiriman='+kiriman_terpilih+'&kota='+kota_terpilih+'&berat='+total_berat,
		 		success:function(hasilpaket)
		 		{
		 			//console.log(hasilpaket);
		 			$("select[name=nama_paket]").html(hasilpaket);
		 		}
		 	})
		 });
		 $("select[name=nama_kota]").on("change",function(){
		 	var kota = $("option:selected",this).attr("nama_kota");
		 	$("input[name=kota]").val(kota);
		 });
		 $("select[name=nama_paket]").on("change",function(){
		 	var paket = $("option:selected",this).attr("paket");
		 	var ongkir = $("option:selected",this).attr("ongkir");
		 	$("input[name=paket]").val(paket);
		 	$("input[name=ongkir]").val(ongkir);
		 })
	});
</script>
</body>
</html>
