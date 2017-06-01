<?php
require_once '../kohana/include.php';
header('Content-type: application/json');

if(isset($_POST))
{
	$query = "SELECT * from product left join category on product.CategoryId = category.CategoryId where category.Name = '".$_POST['category']."' and product.ProductId NOT IN(".$_POST['productid'].") limit 5";
	$product = DB::query(Database::SELECT,$query)->as_object()->execute();
	$template = '';	
	$arrProductId = $_POST['productid'];	
	foreach ($product as $p) {
		$template .= templateProduct($p->ImgUrl,$p->Name,$p->Price,$p->PriceDiscount,$p->Like,'?category='.$_POST['category'].'&id='.$p->ProductId);
			$arrProductId .= ','.$p->ProductId;	
	}

	$response = array();	
	$response['template'] = $template;	
	$response['productid'] = $arrProductId;
	echo json_encode($response);
}

function templateProduct($img,$name,$price,$discountprice,$like,$productid){
  return "<article class='art'><a href=\"$productid\"><div class=\"article-img-pane\"><img src=\"$img\" /></div><h2>$name</h2><div class=\"prod-pricePane\"><span class=\"current-price pull-right\">$price</span></div></a><div class=\"a-meta\"><span><i class=\"fa fa-thumbs-up\">$like</i></span><div class=\"products-ratings\"><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star-half-empty\"></i></div></div></article>";
} 