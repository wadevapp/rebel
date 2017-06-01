<?php
require_once '../kohana/include.php';
session_start();
header('Content-type: application/json');
if(isset($_POST))
{
	$response = array();
	$Like = ORM::factory('visitorproduct')->where('VisitorIpAddress','=',$_POST['visitor'])->and_where('ProductId','=',$_POST['productid'])->find();
	if($Like->loaded()){		
		$product = ORM::factory('product',$Like->ProductId);
		$product->Like -= 1;
		$product->save();
		$Like->delete();
		$response['IsLike'] = false;
		$response['like'] = $product->Like;
	}else{
		$Like->VisitorIpAddress = $_POST['visitor'];
		$Like->ProductId = $_POST['productid'];
		$Like->save();
		
		$product = ORM::factory('product',$Like->ProductId);
		$product->Like += 1;
		$product->save();
		
		$response['IsLike'] = true;
		$response['like'] = $product->Like;
	}		
	echo json_encode($response);

}