			<?php $arrProductId = array(); ?>
			<article>
			<?php if(isset($_GET['category'])): ?>				
				<?php if($_GET['category'] == 'hot-promo'): ?>
					<?php $products = ORM::factory('product')->where('IsDiscount','=',true)->limit(10)->order_by('CreatedDate','DESC')->find_all(); ?>
				<?php else: ?>					
					<?php $findCategoryByName = ORM::factory('category')->where('Name','=',$_GET['category'])->find(); ?>
					<?php $products = ORM::factory('product')->where('CategoryId','=',$findCategoryByName)->limit(5)->order_by('CreatedDate','DESC')->find_all(); ?>
				<?php endif ?>				
				<?php foreach($products as $p) { ?>
					<a href="<?php echo '?category='.$_GET['category'].'&id='.$p->ProductId;?>">
						<div class="article-img-pane" style="height: 99px">
							<img src="<?php echo $p->ImgUrl;?>" />
						</div>
						<h2><?php echo $p->Name;?></h2>
						<div class="prod-pricePane">								
							<?php if($p->IsDiscount == true): ?>							
								<span class="current-price pull-right"><?php echo BinaryHelper::NumberFormat($p->PriceDiscount);?></span>
								<span class="last-price pull-right"><?php echo BinaryHelper::NumberFormat($p->Price);?></span>
							<?php else:?>
								<span class="current-price pull-right"><?php echo BinaryHelper::NumberFormat($p->Price);?></span>
							<?php endif ?>
						</div>
					</a>
					<div class="a-meta">
						<span><i class="fa fa-thumbs-up"></i> <?php echo BinaryHelper::NumberFormat($p->Like); ?></span> 
						
						<div class="products-ratings">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-half-empty"></i>
						</div>
					</div>				
					<?php $arrProductId[] = $p->ProductId ?>
				<?php } ?>
			<?php else: ?>
				<?php echo 'home'; ?>
			<?php endif ?>			
			</article>