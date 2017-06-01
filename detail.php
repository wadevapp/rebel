<div class="row">						
	<div class="span9">
		<div class="row">
			<div class="span4"><br>
				<?php $p = ORM::factory('product',$_GET['id'])?>
				<a href="?category=<?php echo $_GET['category']; ?>&id=<?php echo $p->ProductId; ?>"><img src="<?php echo"$p->ImgUrl"?>"></a>			
			</div>
			<div class="span5"><br>
				<address>
					<strong>Kategori:</strong> <span><?php echo  $p->category->Name?></span><br>
					<strong>Ukuran:</strong> <span><?php echo BinaryHelper::serialize_string("$p->Sizes") ?></span><br>
					<strong>Warna:</strong> <span><?php echo BinaryHelper::serialize_string("$p->Colors") ?></span><br>
					<strong>Ketersediaan:</strong> <span>Dalam Persediaan</span><br>								
				</address>									
				<h4><strong>Harga: Rp. <?php echo BinaryHelper::NumberFormat("$p->Price")?></strong></h4>
			</div>						
		</div>
		<div class="row">
			<div class="span9">
				<ul class="nav nav-tabs" id="myTab">
					<li class="active">Description</li>
				</ul>							 
				<div class="tab-content">
					<div class="tab-pane active" id="home"><?php echo "$p->Descriptions";?></div>
					<div class="tab-pane" id="profile">
						<table class="table table-striped shop_attributes">	
							<tbody>
								<tr class="">
									<th>Size</th>
									<td>Large, Medium, Small, X-Large</td>
								</tr>		
								<tr class="alt">
									<th>Colour</th>
									<td>Orange, Yellow</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>							
			</div>
			<?php if ($_GET['category']!='Promo'): ?>						
			<div class="span9">	
				<br>
				<h4 class="title">
					<span class="pull-left"><span class="text"><strong>Related</strong> Products</span></span>
					<span class="pull-right">
						<a class="left button" href="#myCarousel-1" data-slide="prev"></a><a class="right button" href="#myCarousel-1" data-slide="next"></a>
					</span>
				</h4>
					
				<div id="myCarousel-1" class="carousel slide">
					<div class="carousel-inner">
						<div class="active item">
							<ul class="thumbnails listing-products">
							<?php 
								$query = "SELECT *,category.Name as CategoryName from product left join category on product.CategoryId = category.CategoryId where category.Name = '".$_GET['category']."' and product.ProductId NOT IN(".$_GET['id'].") limit 3";
								$product = DB::query(Database::SELECT,$query)->as_object()->execute();
							?>
							<?php foreach ($product as $p): ?>
								<li class="span3">
									<div class="product-box">
										<span class="sale_tag"></span>												
										<a href="?category=<?php echo $_GET['category']; ?>&id=<?php echo $p->ProductId; ?>"><img src="<?php echo"$p->ImgUrl"?>"></a><br/>
										<a href="product_detail.html" class="title"><?php echo"$p->Name"?></a><br/>
										<a href="#" class="category"><?php echo $p->CategoryName ?></a>
										<p class="price"><?php echo"$p->Price" ?></p>
									</div>
								</li>
							<?php endforeach ?>												
							</ul>
						</div>
					</div>
				</div>
			</div>
			<?php endif ?>
		</div>
	</div>
</div>