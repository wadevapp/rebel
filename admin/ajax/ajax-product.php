<?php
require_once '../../Library/kohana/include.php';
require_once '../../Library/BinaryHelper.php';

if(isset($_POST))
{
			$products = ORM::factory('product',$_POST['ProductId']);	

			$response = array();

			$response['success'] = true;
			$response['title'] = __('success');
			$response['message'] = $product->Name;
			echo json_encode($response);		
}

	
