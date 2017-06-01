<?php
	require_once 'Library/kohana/include.php';
	require_once 'Library/BinaryHelper.php';	
	$product = ORM::factory('product',16);
	if(isset($_SESSION['visitordetect']))
	{

	}
	else
	{
		$visitor = ORM::factory('visitor')->where('IpAddress','=',BinaryHelper::get_client_ip())->find();	
		if($visitor->loaded())
		{
			$_SESSION['visitordetect'] = BinaryHelper::get_client_ip();
		}
		else
		{
			$Newvisitor = ORM::factory('visitor');
			$Newvisitor->IpAddress = BinaryHelper::get_client_ip();
			$Newvisitor->save();
			$_SESSION['visitordetect'] = BinaryHelper::get_client_ip();
		}		
	}	
	$category = ORM::factory('category')->find_all();
	if(isset($_GET['category']))
	{
		if(isset($_GET['id']))
		{

		}
		$titlePage = $_GET['category'];
	}
	else
	{
		$titlePage = 'Home';
	}
?>
<?php if(empty($_GET['id'])): ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
		<meta name="keywords" content="M-Food by Mfikri.com">
		<meta name="author" content="M Fikri Setiadi">
		<meta name="description" content="M-Food by Mfikri.com">
		<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />
		<title>Menu</title>
		<link href="<?php echo 'assets/img/logo.png'?>" rel="shortcut icon" type="image/x-icon">
		<link type="text/css" rel="stylesheet" href="<?php echo 'mobile/css/jquery.mmenu.all.css'?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo 'mobile/css/style.css'?>" />
		<link type="text/css" rel="stylesheet" href="<?php echo 'mobile/css/jquery.mobile-1.0rc2.min.css'?>" />
		<link rel="apple-touch-icon" href="<?php echo 'mobile/img/apple-touch-icon.png'?>">
		<link rel="apple-touch-startup-image" href="<?php echo 'mobile/img/apple-touch-startup-image.png'?>">		
		<script type="text/javascript" src="<?php echo 'mobile/js/jquery.min.js'?>"></script>
		<script type="text/javascript" src="<?php echo 'mobile/js/jquery.mmenu.min.all.js'?>"></script>
		<script type="text/javascript" src="<?php echo 'mobile/js/jquery.easy-pie-chart.js'?>"></script>
		<script type="text/javascript" src="<?php echo 'mobile/js/o-script.js'?>"></script>
	</head>
	<body class="o-page p-blog">		
		<div id="page">		
			<div id="header">
				<div class="header-content">
					<a href="#menu" class="p-link-home"><i class="fa fa-bars"></i></a>
					<a href="javascript:history.back();" class="p-link-back"><i class="fa fa-arrow-left"></i></a>
				</div>
			</div>		
				<div class="bannerPane banner-bg">
					<div class="overlay"></div>
					<div class="s-banner-content">				
						<?php echo $titlePage; ?>
					</div>
				</div>					
				<div id="content">					
					<!-- Content -->
					<?php include 'template.php'; ?>
				</div>
				<button class="more" style="width: 100%">Load more</button>
				<?php
					$productidArr = '';
					$lastarr = end($arrProductId);
					foreach ($arrProductId as $key => $value) {
						if($value == $lastarr)
							$productidArr .= $value;
						else
							$productidArr .= $value.',';
					}
				?>			
				<input type="text" name="productid" value='<?php echo $productidArr; ?>'>	
			<?php elseif(isset($_GET['category']) && (isset($_GET['id']))): ?>
				<?php include 'detail-product.php'; ?>
			<?php endif ?>			
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
						<a href="/">
							<i class="fa fa-home"></i>Home
						</a>
					</li>
					<?php foreach ($category as $c) { ?>					
					<li>
						<a href="<?php echo '/?category='.strtolower($c->Name);?>">
							<i class="fa fa-home"></i><?php echo $c->Name ?>
						</a>
					</li>
					<?php } ?>
					<li>
						<a href="?category=hot-promo">
							<i class="fa fa-fire"></i>Hot Promo
						</a>
					</li>					
				</ul>					
			</nav>			
		</div>
		<script>
			function onclickFunction(id,visitor){				
			$.ajax({
				type:'POST',
				url:'Library/ajax/ajax-like-product.php',
				data : {productid : id,visitor:visitor},
					success:function(result){
						if(result.IsLike == true){
							$(".falike").css('color','blue');
							$("#totalLike").text(result.like);
						}else{
							$(".falike").removeAttr('style');
							$("#totalLike").text(result.like);
						}
					}
			})
			return false;
		}		

		function element_in_scroll(elem)
		{
		    var docViewTop = $(window).scrollTop();
		    var docViewBottom = docViewTop + $(window).height() - 10;

		    var elemTop = $(elem).offset().top;
		    var elemBottom = elemTop + $(elem).height() - 10;

		    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
		}

		$(".more").click(function(){
				$.ajax({
				url: 'Library/ajax/ajax-load-product.php',
				type: 'POST',		
				cache: true,		
				data: {productid: $("input[name='productid']").val(),category:'<?php if(isset($_GET['category'])){echo $_GET['category'];}  ?>'},
			})
			.done(function(result) {
				$("input[name='productid']").val(result.productid);
				// alert(result.productid);
				$('.more').before(result.template).hide().fadeIn();
			})			
		})

		// $(window).scroll(function() {
		//   if ($(window).scrollTop() >= $(document).height() - $(window).height() - 20) {
		//     $('.art').append("<article><a href=\"\"><div class=\"article-img-pane\"><img src=\"/uploads/product/12/uyusfba60iy3tcrznmrn.jpg\" /></div><h2>Baju terbaik</h2><div class=\"prod-pricePane\"><span class=\"current-price pull-right\">12000</span></div></a><div class=\"a-meta\"><span><i class=\"fa fa-thumbs-up\">122</i></span><div class=\"products-ratings\"><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star-half-empty\"></i></div></div></article>");
		//   }
		// });
		</script>
	</body>
</html>