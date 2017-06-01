<?php
require_once '../../Library/kohana/include.php';
require_once '../../Library/BinaryHelper.php';

header('Content-type: application/json');
if(isset($_POST['actions']))
{	
	if($_POST['actions']=='InsertCustomer'){
		Insert($_POST);
	}else if($_POST['actions']=='UpdateCustomer'){

	}else{
		Delete($_POST);
	}
}

function Insert($post)
{
	$address = ORM::factory('address');
	$address->StreetAddress = $post['address'];
	$address->PostCode = $post['postcode'];
	$address->Area1 = $post['area'];
	$address->Area2 = $post['area2'];
	$address->City = $post['city'];
	$address->save();

	$customer = ORM::factory('customer');
	$customer->Firstname = $post['firstname'];
	$customer->Lastname = $post['lastname'];
	$customer->Username = $post['username'];
	$customer->Password = $post['password'];
	$customer->Email = $post['email'];
	$customer->Phone = $post['phone'];
	$customer->Gender = $post['gender'];
	$customer->StatusId = 1;
	$customer->AddressId = $address->AddressId;
	$customer->CreatedDate = DB::expr('NOW()');
	$customer->save();
			// $ImgUrl = "";
	  //   	if($_FILES["ImgFile"]["error"] == 0){
	  //   		$ImgUrl = save_image($_FILES["ImgFile"],$customer->CustomerId);
	  //   		$customer->ImgUrl = $ImgUrl;	
	  //   		$customer->save();    		
	  //   	}
	$history = ORM::factory('history');
	$history->CreatedDate = DB::expr('Now()');
	$history->Descriptions = 'New customer added -> '.$customer->Firstname.''.$customer->Lastname;
	$history->StatusId = 21;
	$history->save();
	
	$response = array();
	$response['TemplateAlert'] = BinaryHelper::TemplateAlert('success','Insert data','Insert Product has been added');	
	$response['success'] = true;
	$response['title'] = __('success');
	$response['message'] = __('insert customer success');
	echo json_encode($response);
}

function Update($post)
{
	$address = ORM::factory('address',$post['AddressId']);
	$address->StreetAddress = $post['address'];
	$address->PostCode = $post['postcode'];
	$address->Area1 = $post['area'];
	$address->Area2 = $post['area2'];
	$address->City = $post['city'];
	$address->save();

	$customer = ORM::factory('customer',$post['CustomerId']);
	$customer->Firstname = $post['firstname'];
	$customer->Lastname = $post['lastname'];
	$customer->Username = $post['username'];
	$customer->Password = $post['password'];
	$customer->Email = $post['email'];
	$customer->Phone = $post['phone'];
	$customer->Gender = $post['gender'];
	$customer->StatusId = 1;
	$customer->AddressId = $address->AddressId;
	$customer->save();
			// $ImgUrl = "";
	  //   	if($_FILES["ImgFile"]["error"] == 0){
	  //   		$ImgUrl = save_image($_FILES["ImgFile"],$customer->CustomerId);
	  //   		$customer->ImgUrl = $ImgUrl;	
	  //   		$customer->save();    		
	  //   	}
	$history = ORM::factory('history');
	$history->CreatedDate = DB::expr('Now()');
	$history->Descriptions = 'Update customer -> '.$customer->Firstname.''.$customer->Lastname;
	$history->StatusId = 22;
	$history->save();
	
	$response = array();
	$response['TemplateAlert'] = BinaryHelper::TemplateAlert('success','Insert data','Insert Product has been added');	
	$response['success'] = true;
	$response['title'] = __('success');
	$response['message'] = __('insert customer success');
	echo json_encode($response);
}

function Delete($post){
	$customer = ORM::factory('customer',$post['CustomerId']);
	$name = $customer->Firstname.''.$customer->Lastname;
	$customer->delete();

	$history = ORM::factory('history');
	$history->CreatedDate = DB::expr('Now()');
	$history->Descriptions = 'Delete customer -> '.$name;
	$history->StatusId = 23;
	$history->save();

	$response = array();
	$response['TemplateAlert'] = BinaryHelper::TemplateAlert('danger','Delete data','Delete Product has been deleted');	
	$response['success'] = true;	
	$response['title'] = __('success');
	$response['message'] = __('delete customer success');
	echo json_encode($response);
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

?>