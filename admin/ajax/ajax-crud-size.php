<?php
require_once '../../Library/kohana/include.php';
require_once '../../Library/BinaryHelper.php';

header('Content-type: application/json');
if(isset($_POST['action']))
{	
	if($_POST['action']=='InsertSize'){
		Insert($_POST);
	}else if($_POST['action']=='UpdateSize'){
		Update($_POST);
	}else if($_POST['action']=='GetSize'){
		GetSize($_POST);
	}
	else{
		Delete($_POST);
	}
}

function GetSize($post)
{
	$sizes = ORM::factory('sizes',$post['id']);
	if($sizes->loaded())
	{
		$response = array();
		$response['name'] = $sizes->Name;
		$response['id'] = $sizes->SizeId;
		echo json_encode($response);
	}
}

function Insert($post)
{
	$sizes = ORM::factory('sizes');
	$sizes->Name = $post['name'];
	$sizes->save();

	$history = ORM::factory('history');
	$history->CreatedDate = DB::expr('Now()');
	$history->Descriptions = 'New sizes added -> '.$sizes->Name;
	$history->StatusId = 41;
	$history->save();

	$response = array();
	$response['TemplateAlert'] = BinaryHelper::TemplateAlert('success','success','Insert data has been added');
	$response['success'] = true;
	$response['title'] = __('success');
	$response['message'] = __('insert sizes success');
	echo json_encode($response);
}

function Update($post)
{
	$sizesToUpdate = ORM::factory('sizes',$post['SizeId']);
	if($sizesToUpdate->loaded())
	{
		$sizesToUpdate->Name = $post['name'];
		$sizesToUpdate->save();

		$response = array();
		$response['TemplateAlert'] = BinaryHelper::TemplateAlert('info','Update category success','Category has been update');
		$response['success'] = true;
		echo json_encode($response);
	}
}

function Delete($post){
	$sizes = ORM::factory('sizes',$post['SizeId']);
	$Name = $sizes->Name;
	$sizes->delete();

	$history = ORM::factory('history');
	$history->CreatedDate = DB::expr('Now()');
	$history->Descriptions = 'delete sizes -> '.$Name;
	$history->StatusId = 43;
	$history->save();
	
	$response = array();
	$response['TemplateAlert'] = BinaryHelper::TemplateAlert('danger','Delete sizes','sizes has been delete');
	$response['success'] = true;
	$response['title'] = __('success');
	$response['message'] = __('delete category success');
	echo json_encode($response);
}

?>