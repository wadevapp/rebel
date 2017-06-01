<?php
require_once '../../Library/kohana/include.php';
require_once '../../Library/BinaryHelper.php';

header('Content-type: application/json');
if(isset($_POST['actions']))
{	
	if($_POST['actions']=='InsertProduct'){
		Insert($_POST);
	}else if($_POST['actions']=='UpdateProduct'){

	}else if($_POST['actions']=='GetProduct'){
		GetProduct($_POST);
	}else{
		Delete($_POST);
	}
}

function GetProduct($post)
{
	$product = ORM::factory('product',$post['id']);
	if($product->loaded())
	{
		$response = array();
		$response['name'] = $product->Name;
		$response['price'] = $product->Price;
		$response['image'] = $product->ImgUrl;
		$response['category'] = $product->CategoryId;
		$response['description'] = $product->Descriptions;
		$response['colors'] = serialize_string($product->Colors);
		$response['sizes'] = serialize_string($product->Sizes);
		$response['id'] = $product->ProductId;
		$response['pricediscount'] = $product->PriceDiscount;	
		if($product->IsDiscount == true)
		{
			$response['isdiscount'] = true;
		}	
		else
		{
			$response['isdiscount'] = false;
		}
		
		echo json_encode($response);
	}
}

function serialize_string($serial)
{
    $result = unserialize($serial);
    return $result;
}	


function save_image($image,$customerId)
{
    if (
        ! Upload::valid($image) OR
        ! Upload::not_empty($image) OR
        ! Upload::type($image, array('jpg', 'jpeg', 'png', 'gif')))
    {
        return FALSE;
    }

    $directory = $_SERVER['DOCUMENT_ROOT'].'/uploads/customer/'.$customerId."/";
    
    if (!file_exists($directory)) {
    	mkdir($directory, 0777, true);
	}

    if ($file = Upload::save($image, NULL, $directory))
    {
        $filename = strtolower(Text::random('alnum', 20)).'.jpg';

        Image::factory($file)->save($directory.$filename);
        // Delete the temporary file
        unlink($file);
        return '/uploads/customer/'.$customerId."/".$filename;
    }

    return FALSE;
}


function Insert($post)
{

	$product = ORM::factory('product');
	$product->Name = $post['name'];
	$product->Price = $post['price'];
	$product->Descriptions = $post['description'];
	$product->CategoryId = $post['category'];
	$product->StatusId = 1;
	$product->save();
	        $PassportOrIcImgUrl = "";
	    	if($_FILES["PassportOrIcImgUrl"]["error"] == 0){
	    		$PassportOrIcImgUrl = save_image($_FILES["PassportOrIcImgUrl"],$product->ProductId);
	    		$product->ImgUrl = $PassportOrIcImgUrl;
	    		$product->save();
	    	}	

	$history = ORM::factory('history');
	$history->CreatedDate = DB::expr('Now()');
	$history->Descriptions = 'New product added -> '.$product->Name;
	$history->StatusId = 71;
	$history->save();

	$response = array();
	$response['TemplateAlert'] = BinaryHelper::TemplateAlert('success','Insert data','Insert Product has been added');	
	$response['success'] = true;
	$response['title'] = __('success');
	$response['message'] = __('insert product success');
	echo json_encode($response);
}


function Delete($post){
	$product = ORM::factory('product',$post['ProductId']);
	$name = $product->Name;
	$product->delete();

	$history = ORM::factory('history');
	$history->CreatedDate = DB::expr('Now()');
	$history->Descriptions = 'Delete product -> '.$name;
	$history->StatusId = 73;
	$history->save();
	
	$response = array();
	$response['success'] = true;
	$response['TemplateAlert'] = BinaryHelper::TemplateAlert('danger','delete data','Delete Product has been deleted');	
	$response['title'] = __('success');
	$response['message'] = __('delete product success');
	echo json_encode($response);
}

?>