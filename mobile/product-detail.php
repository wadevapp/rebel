<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
		<meta name="keywords" content="M-Food by Mfikri.com">
		<meta name="author" content="M Fikri Setiadi">
		<meta name="description" content="M-Food by Mfikri.com">
		<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />

		<title>Detail Menu</title>
		<link href="<?php echo 'assets/img/logo.png'?>" rel="shortcut icon" type="image/x-icon">

		<link type="text/css" rel="stylesheet" href="<?php echo 'mobile/css/jquery.mmenu.all.css'?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo 'mobile/css/style.css'?>" />

		<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
		<link rel="apple-touch-startup-image" href="img/apple-touch-startup-image.png">
		
		<script type="text/javascript" src="<?php echo 'mobile/js/jquery.min.js'?>"></script>
		<script type="text/javascript" src="<?php echo 'mobile/js/jquery.mmenu.min.all.js'?>"></script>
		<script type="text/javascript" src="<?php echo 'mobile/js/jquery.easy-pie-chart.js'?>"></script>
		<script type="text/javascript" src="<?php echo 'mobile/js/o-script.js'?>"></script>

		<meta property="fb:app_id" content="966242223397117" />
		<meta property="og:locale" content="id_id" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="inibaju" />
		<meta property="og:description" content="keren lah pokonamah" />
		<meta property="og:url" content="uwuw" />
		<meta property="og:site_name" content="" />

		<meta property="article:section" content="Mfood" />
		<meta property="og:image" content="uiuaw" />
		<meta property="og:image:width" content="1024" />
		<meta property="og:image:height" content="900" />

		<script>
        jQuery(document).ready(function($) {
         $('.popup').click(function(event) {
         var width = 575,
         height = 400,
         left = ($(window).width() - width) / 2,
         top = ($(window).height() - height) / 2,
         url = this.href,
         opts = 'status=1' +
         ',width=' + width +
         ',height=' + height +
         ',top=' + top +
         ',left=' + left;
          
         window.open(url, 'twitter', opts);
          
         return false;
         });
         });
        jQuery(document).ready(function($) {
          $('.popup2').click(function(event) {
            var width  = 575,
                height = 400,
                left   = ($(window).width()  - width)  / 2,
                top    = ($(window).height() - height) / 2,
                url    = this.href,
                opts   = 'status=1' +
                         ',width='  + width  +
                         ',height=' + height +
                         ',top='    + top    +
                         ',left='   + left; 
            window.open(url, 'facebook', opts);
            return false;
          });
        });
        </script>

	</head>
	
	<body class="o-page">
		<div id="page">
			<div id="header">
				<div class="header-content">
					<a href="#menu" class="p-link-home"><i class="fa fa-bars"></i></a>
					<a href="javascript:history.back();" class="p-link-back"><i class="fa fa-arrow-left"></i></a>
				</div>
			</div>
			<img src="<?php echo $product->ImgUrl; ?>" />
			<div id="content">
				
				<article>
					
					
					<div class="prod-single-content-h">
						<div class="prod-pricePane">
						
							<span class="current-price" style="font-size:20px;"><?php echo $product->Price; ?></span>
						
							<!-- <span class="current-price" style="font-size:20px;"><?php  $product->PriceDiscount; ?></span> -->
							<span class="last-price" style="font-size:12px;"><?php echo $product->PriceDiscount; ?></span>
						
						</div>
						
						<div class="products-ratings">
							<a href="22" style="text-decoration:none;"><div class="subFooter"><span class="fa fa-shopping-cart"></span> Beli</div></a>
						</div>
					</div>
					<div class="prod-single-content">
						<h2><a href="#"><?php echo $product->Name; ?></a></h2>
						<br/>
						<p>
							<?php echo $product->Descriptions; ?>
						</p>
					</div>
					<div class="product-single-meta">
						<div class="p-single-meta-likes">
							<h4>Like</h4>
							<a href="11"><i class="fa fa-thumbs-up"></i></a> 110
						</div>
						
						<div class="p-single-meta-share">
							<h4>Share</h4>
							<a class="popup2" target="_parent" href="https://www.facebook.com/dialog/share?app_id=966242223397117&display=popup&href=1"><i class="fa fa-facebook"></i></a>
							<a class="popup" href="http://twitter.com/share?source=sharethiscom&text=1&url=1&via=efood"><i class="fa fa-twitter"></i></a>
							<a href="javascript:void(0);" onclick="popUp=window.open('https://plus.google.com/share?url=1 ','popupwindow','scrollbars=yes,width=800,height=400');popUp.focus();return false"><i class="fa fa-google-plus"></i></a>
						</div>
						
					</div>
				</article>

			</div>
			<div class="subFooter">Copyright <?php echo date('Y');?>. All rights reserved.</div>
			
			<!-- Menu navigation -->
			<nav id="menu">
				<ul>
					<li class="Selected">
						<a href="#close">
							<i class="fa fa-times-circle"></i>
						</a>
					</li>
					<li>
						<a href="<?php echo 'mobile/home'?>">
							<i class="fa fa-home"></i>Home
						</a>
					</li>
					<li>
						<a href="<?php echo 'mobile/menu/cart'?>">
							<i class="fa fa-shopping-cart"></i>Keranjang Belanja (1)
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