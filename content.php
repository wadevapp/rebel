<?php 
	
	if(isset($_GET['category'])){
		if ($_GET['category']=='Promo') {
			$product = ORM::factory('product')->where('IsDiscount','=',true)->find_all();
		}
		else{
			$categoryid = ORM::factory('category')->where('Name','=',$_GET['category'])->find()->CategoryId;
			$product = ORM::factory('product')->where('CategoryId','=',$categoryid)->limit(8)->find_all();
			
		}
	}
	// else{
		// $categoryid = ORM::factory('category')->where('Name','=',$_GET['category'])->find()->CategoryId;
		// $product = ORM::factory('product')->where('Category','=',$categoryid)->limit(8)->find_all();
	// }
	
	$productLatest = ORM::factory('product')->order_by('CreatedDate','desc')->limit(8)->find_all();

	
if(isset($_GET['category'])){
?>
<div class="row">
	<div class="span12">													
		<div class="row">
			<div class="span12">
				<h4 class="title">
					<span class="pull-left"><span class="text"><span class="line">Feature <strong>Products</strong></span></span></span>
					<span class="pull-right">
						<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
					</span>
				</h4>
				<div id="myCarousel" class="myCarousel carousel slide">
					<div class="carousel-inner">
						<div class="active item">
							<ul class="thumbnails">
							<?php foreach ($product as $p): ?>
								
								<li class="span3">
									<div class="product-box">
										<span class="sale_tag"></span>
										<p><a href="?category=<?php echo $_GET['category']; ?>&id=<?php echo $p->ProductId; ?>"><img src="<?php echo"$p->ImgUrl"?>"></a></p>
										<p><?php echo"$p->Name"?></p>
										<a href="?category=<?php echo $_GET['category']; ?>&id=<?php echo $p->ProductId; ?>" class="category"><?php echo $p->category->Name; ?></a><br>
										<?php if($p->IsDiscount == true): ?>
											<span class="current-price"  style="font-size:20px; text-decoration: line-through; font-size: 20px; color: #AAA;">Rp. <?php echo BinaryHelper::NumberFormat($p->PriceDiscount); ?></span>	<br>	
											<span class="last-price" style="font-size:12px;">Rp. <?php echo BinaryHelper::NumberFormat($p->Price); ?></span>
										<?php else: ?> 
											<span class="current-price" style="font-size:20px;">Rp. <?php echo BinaryHelper::NumberFormat($p->Price); ?></span>
										<?php endif ?> 
									</div>
								</li>												
							<?php endforeach ?>												
							</ul>
						</div>
						
					</div>							
				</div>
			</div>						
		</div>
		<br/>
		<div class="row">
			<div class="span12">
				<h4 class="title">
					<span class="pull-left"><span class="text"><span class="line">Latest <strong>Products</strong></span></span></span>
					<span class="pull-right">
						<a class="left button" href="#myCarousel-2" data-slide="prev"></a><a class="right button" href="#myCarousel-2" data-slide="next"></a>
					</span>
				</h4>
				<div id="myCarousel-2" class="myCarousel carousel slide">
					<div class="carousel-inner">
						<div class="active item">
							<ul class="thumbnails">
							<?php foreach ($productLatest as $pl): ?>
								<li class="span3">
									<div class="product-box">
										<span class="sale_tag"></span>
										<p><a href="?category=<?php echo $pl->category->Name; ?>&id=<?php echo $pl->ProductId; ?>"><img src="<?php echo"$pl->ImgUrl"?>"></a></p>
										<a href="?category=<?php echo $pl->category->Name; ?>&id=<?php echo $pl->ProductId; ?>" class="title"><?php echo"$pl->Name"?></a><br/>
										<a href="?category=<?php echo $pl->category->Name; ?>&id=<?php echo $pl->ProductId; ?>" class="category"><?php echo $pl->category->Name; ?></a><br>
										<?php if($p->IsDiscount == true): ?>
											<span class="current-price" style="font-size:20px; text-decoration: line-through; font-size: 20px; color: #AAA;">Rp. <?php echo BinaryHelper::NumberFormat($p->PriceDiscount); ?></span><br>	
											<span class="last-price" style="font-size:12px;">Rp. <?php echo BinaryHelper::NumberFormat($p->Price); ?></span>
										<?php else: ?> 
											<span class="current-price" style="font-size:20px;">Rp. <?php echo BinaryHelper::NumberFormat($p->Price); ?></span>
										<?php endif ?> 
									</div>
								</li>													
							<?php endforeach ?>												
								
								
							</ul>
						</div>
						
					</div>							
				</div>
			</div>						
		</div>
		<?php } ?>
		<div class="row feature_box">						
			<div class="span4">
				<div class="service">
					<div class="responsive">	
						<img src="themes/images/feature_img_2.png" alt="" />
						<h4>MODERN <strong>DESIGN</strong></h4>
						<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>									
					</div>
				</div>
			</div>
			<div class="span4">	
				<div class="service">
					<div class="customize">			
						<img src="themes/images/feature_img_1.png" alt="" />
						<h4>FREE <strong>SHIPPING</strong></h4>
						<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
					</div>
				</div>
			</div>
			<div class="span4">
				<div class="service">
					<div class="support">	
						<img src="themes/images/feature_img_3.png" alt="" />
						<h4>24/7 LIVE <strong>SUPPORT</strong></h4>
						<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
					</div>
				</div>
			</div>	
		</div>		
	</div>				
</div>

