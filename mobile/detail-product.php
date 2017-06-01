<?php 
$product = ORM::factory('product',$_GET['id']);
if('hot-promo' == $_GET['category'])
{
	
}
else if(strtolower($product->category->Name) == $_GET['category'])
{
	
}
else
{	
	header('location:?category='.$_GET['category']);
	die();
}
$productIsLike = ORM::factory('visitorproduct')->where('VisitorIpAddress','=',$_SESSION['visitordetect'])->and_where('ProductId','=',$product->ProductId)->find();
$like = '';
if($productIsLike->loaded())
{
	$like = "style='color:blue'";
}
?>
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
		<meta property="og:title" content="<?php echo $product->Name; ?>" />
		<meta property="og:description" content="<?php echo $product->Descriptions; ?>" />
		<meta property="og:url" content="<?php echo "http://".$_SERVER['HTTP_HOST']."/?category=".$_GET['category']."&id=".$_GET['id']; ?>" />
		<meta property="og:site_name" content="" />

		<meta property="article:section" content="<?php echo ORM::factory('setting',1)->Name; ?>" />
		<meta property="og:image" content="<?php echo "http://".$_SERVER['HTTP_HOST'].$product->ImgUrl; ?>" />
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
						<div class="prod-pricePane" style="text-align: left">
							<?php if($product->IsDiscount == true): ?>
							<span class="current-price" style="font-size:20px;"><?php echo BinaryHelper::NumberFormat($product->PriceDiscount); ?></span>		
							<span class="last-price" style="font-size:12px;"><?php echo BinaryHelper::NumberFormat($product->Price); ?></span>
							<?php else: ?> 
							<span class="current-price" style="font-size:20px;"><?php echo BinaryHelper::NumberFormat($product->Price); ?></span>
							<?php endif ?> 
						</div>
						
						<div class="products-ratings">
							<a href="#" style="text-decoration:none;"><div class="subFooter"><span class="fa fa-shopping-cart"></span> Beli</div></a>
						</div>
					</div>
					<div class="prod-single-content">
						<span style="font-weight: bold;text-align: left;font-size: 18px"><a href="#" style="text-decoration: none"><?php echo $product->Name; ?></a></span>
						<br/><br/>
						<p>
							<?php echo $product->Descriptions; ?>
						</p>
						<br>
						<span style="font-weight: bold;text-align: left;">Stock:</span> Available<br/>
						<span style="font-weight: bold;text-align: left;">Category:</span> <i class="fa fa-tag"></i> <?php echo $product->category->Name; ?><br/>
						<span style="font-weight: bold;text-align: left;">Sizes:</span> <?php echo BinaryHelper::serialize_string($product->Sizes); ?><br/>
						<span style="font-weight: bold">Colors:</span> <?php echo BinaryHelper::serialize_string($product->Colors); ?>
					</div>
					<div class="product-single-meta">
						<div class="p-single-meta-likes">
							<h4>Like</h4>
							<a id="like" href="javascript:onclickFunction('<?php echo $product->ProductId; ?>','<?php echo $_SESSION['visitordetect']; ?>')"><i class="falike fa fa-thumbs-up" <?php if($like != ''){echo $like;} ?>></i></a> <span id="totalLike"><?php echo $product->Like; ?></span>
						</div>
						
						<div class="p-single-meta-share">
							<h4>Share</h4>
							<a class="popup2" target="_parent" href="https://www.facebook.com/dialog/share?app_id=966242223397117&display=popup&href=<?php echo "http://".$_SERVER['HTTP_HOST']."/?category=".$_GET['category']."&id=".$_GET['id']; ?>"><i class="fa fa-facebook"></i></a>
							<a class="popup" href="http://twitter.com/share?source=sharethiscom&text=<?php echo $product->Name; ?>&url=<?php echo "http://".$_SERVER['HTTP_HOST']."/?category=".$_GET['category']."&id=".$_GET['id']; ?>&via=efood"><i class="fa fa-twitter"></i></a>
							<a href="javascript:void(0);" onclick="popUp=window.open('https://plus.google.com/share?url=<?php echo "http://".$_SERVER['HTTP_HOST']."/?category=".$_GET['category']."&id=".$_GET['id']; ?> ','popupwindow','scrollbars=yes,width=800,height=400');popUp.focus();return false"><i class="fa fa-google-plus"></i></a>
						</div>
						
					</div>
				</article>

			</div>