<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
include ("../config/koneksi.php");
session_start();
$id_barang = $_GET["id"];
$ambil = $koneksi->query("SELECT *FROM barang_dagang WHERE id_barang = $id_barang");
$detail = $ambil->fetch_assoc(); 
 ?>

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
		<div class="w3l_header_right1">
			
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
<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			   </div> 
			   <!-- Collect the nav links, forms, and other content for toggling -->
			   <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">
						<li></i> <a href="index_anggota.php"> Home</a></li>
						<li><a href="sayur.php"> Sayur</a></li>
						<li><a href="bumbu.php"> Bumbu</a></li>
						<li><a href="daging.php"> Daging</a></li>
						<li><a href="telur.php"> Telur</a></li>
						<li><a href="beras.php"> Beras</a></li>
						<li><a href="riwayatpembelian.php"> Riwayat Pembelian</a></li>
						<li><a href="simpanan.php"> Simpanan</a></li>
						<li><a href="pinjaman.php"> Pinjaman</a></li>
						<li><a href="iuran.php"> Iuran</a></li>
					</ul>
				 </div><!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="w3l_banner_nav_right">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
							<!--start: Container -->
    	<div class="container">  
    	<br>            
<div class="title"><h3> Detail Produk </h3></div>
<br> <br>
<div class="col-sm-6">
                    <?php                  
$query = mysqli_query($koneksi, "SELECT * FROM barang_dagang WHERE id_barang='$_GET[id]'");
$data  = mysqli_fetch_array($query);
?>
        		<!--<div class="span4">-->
          			<!--<div class="icons-box">-->
                    <div class="hero-unit" style="margin-left: 20px;">
                    <table>
                    <tr>
                        <td rowspan="7"><img width="200px" heigth="200px" src="../assets/img/barang/<?php echo $data ['gambar_barang']; ?>" /></td>
                        </tr>
                        <tr>
                        <td colspan="4"><div class="title"><h3><?php echo $data['nama_barang']; ?></h3></div></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td> Harga</td>
                        <td>:</td>
						<td><div><h3>Rp.<?php echo number_format($data['harga_kilo'],2,",",".");?></h3></div></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td>Stock</td>
                        <td>:</td>
                        <td><div><?php echo $data['jumlah_kilo'];?>.Kg</div></td>
                        </tr>
                        
					<!--	<p>
						
						</p> -->
                        <tr>
                        </tr>
     
                    </table>
                    <br>
                    <br>
                    <br>
                    <form method="post">
                        	<div class="form-group">
                        		<div class="input-group">
                        			<input type="number" min="1" class="form-control" name="jumlah" max="<?php echo$data['br_stok']?>">
                        			<button class="btn btn-primary" name="beli">Beli</button>
                        		</div>
                        	</div>
                        </form>	
                        <?php 
                        if (isset($_POST["beli"]))
                        	{
                        		$jumlah = $_POST["jumlah"];
                        		$_SESSION['keranjang'][$id_barang] = $jumlah;
                        		echo "<script>alert('produk telah masuk ke keranjang');</script>";
                        		echo "<script>location='keranjang.php'</script>";
                        	}?>
                    </div>
                    <!--</div> -->



</div>


						
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

					</div>
				</div> 
				<div class="clearfix"> </div>
			</div>
		</div>
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
</body>
</html>
