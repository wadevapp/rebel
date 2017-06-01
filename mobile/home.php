<?php
require_once 'Library/kohana/include.php';
$product = ORM::factory('product',22);
?>
<!DOCTYPE html>
<html >
	<head>
		<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
		<meta name="keywords" content="M-Food by Mfikri.com">
		<meta name="author" content="M Fikri Setiadi">
		<meta name="description" content="M-Food by Mfikri.com">
		<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />

		<title>Home</title>
		<link href="<?php echo 'assets/img/logo.png'?>" rel="shortcut icon" type="image/x-icon">

		<link type="text/css" rel="stylesheet" href="<?php echo 'mobile/css/jquery.mmenu.all.css'?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo 'mobile/css/style.css'?>" />
		<link rel='stylesheet' id='camera-css'  href="<?php echo 'mobile/css/camera.css'?>" type='text/css' media='all'> 
		
		
		
		<script type="text/javascript" src="<?php echo 'mobile/js/jquery.min.js'?>"></script>
		<script type="text/javascript" src="<?php echo 'mobile/js/jquery.mmenu.min.all.js'?>"></script>
		<script type="text/javascript" src="<?php echo 'mobile/js/o-script.js'?>"></script>
		
		<script type='text/javascript' src="<?php echo 'mobile/js/slider/jquery.mobile.customized.min.js'?>"></script>
		<script type='text/javascript' src="<?php echo 'mobile/js/slider/jquery.easing.1.3.js'?>"></script> 
		<script type='text/javascript' src="<?php echo 'mobile/js/slider/camera.min.js'?>"></script> 
		
		<script>
			jQuery(function(){
				
				jQuery('#camera_wrap_4').camera({
					height: 'auto',
					loader: 'bar',
					pagination: false,
					thumbnails: false,
					hover: false,
					opacityOnGrid: false
				});

			});
		</script>
	</head>
	<body class="o-page p-home">
		<div id="page">
			<!-- Header -->
			<div id="header">
				<div class="header-content">
					<a href="#menu" class="p-link-home"><i class="fa fa-bars"></i></a>					
				</div>
			</div>
			<!-- Content -->
			<div id="content">
				<div class="home-content">
					<span id="Logo" class="svg">
						<img src="<?php echo 'assets/img/logo.png'?>" />
					</span>
				</div>
				<div class="fluid_container">
					<div class="camera_wrap camera_black_skin camera_emboss pattern_1" id="camera_wrap_4">
						<div data-thumb="<?php echo $product->ImgUrl;?>" data-src="<?php echo $product->ImgUrl;?>">
							<div class="bannerContent fadeFromBottom">
								<div class="b-c-textpane">
									<h1>11</h1>
									<p><a href="<?php echo 'mobile/menu/detail_menu/';?>" style="color:#fff;text-decoration:none;">Pesan Sekarang</a></p>
									<a href="<?php echo 'mobile/menu'?>" class="home-scl-icon gplus">
										<i class="fa fa-arrow-right"></i>
										<div>Lihat Menu lain nya</div>
									</a>
								</div>
							</div>
						</div>

						
					</div><!-- #camera_wrap_3 -->

				</div><!-- .fluid_container -->
				
				<!-- <a href="#" class="home-footer">
					About us
				</a> -->
			</div>
			
			<!-- Menu navigation -->
			<nav id="menu">
				<ul>
					<li class="Selected">
						<a href="#close">
							<i class="fa fa-times-circle"></i>
						</a>
					</li>
					<li>
						<a href="<?php echo 'mobile/menu/cart'?>">
							<i class="fa fa-shopping-cart"></i>Keranjang Belanja (12)
						</a>
					</li>
					<li>
						<a href="<?php echo 'mobile/menu/makanan'?>">
							<i class="fa fa-cutlery"></i>Makanan
						</a>
					</li>

					<li>
						<a href="<?php echo 'mobile/menu/minuman'?>">
							<i class="fa fa-glass"></i>Minuman
						</a>
					</li>
					<li>
						<a href="<?php echo 'mobile/menu/favorite'?>">
							<i class="fa fa-star"></i>Favorite
						</a>
					</li>
					<li>
						<a href="<?php echo 'mobile/menu'?>">
							<i class="fa fa-fire"></i>Hot Promo
						</a>
					</li>
					
					<li>
						<a href="<?php echo 'mobile/tracker'?>">
							<i class="fa fa-crosshairs"></i>Tracker
						</a>
					</li>
					<li>
						<a href="<?php echo 'mobile/member/register'?>">
							<i class="fa fa-user"></i>Mendaftar
						</a>
					</li>
					<li>
						<a href="<?php echo 'mobile/gallery'?>">
							<i class="fa fa-camera-retro"></i>Gallery
						</a>
					</li>									
				</ul>
			</nav>
			
		</div>
	</body>
</html>