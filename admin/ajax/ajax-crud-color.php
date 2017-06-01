<?php
require_once '../../Library/kohana/include.php';
require_once '../../Library/BinaryHelper.php';

header('Content-type: application/json');
if(isset($_POST['action']))
{	
	if($_POST['action']=='InsertColor'){
		Insert($_POST);
	}else if($_POST['action']=='UpdateColor'){
		Update($_POST);
	}else if($_POST['action']=='GetColor'){
		GetColor($_POST);
	}
	else{
		Delete($_POST);
	}
}

function GetColor($post)
{
	$colors = ORM::factory('colors',$post['id']);
	if($colors->loaded())
	{
		$response = array();
		$response['name'] = $colors->Name;
		$response['id'] = $colors->ColorId;
		echo json_encode($response);
	}
}

function Insert($post)
{
	$colors = ORM::factory('colors');
	$colors->Name = $post['name'];
	$colors->save();

	$history = ORM::factory('history');
	$history->CreatedDate = DB::expr('Now()');
	$history->Descriptions = 'New colors added -> '.$colors->Name;
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
	$colors = ORM::factory('colors',$post['ColorId']);
	if($colors->loaded())
	{
		$colors->Name = $post['name'];
		$colors->save();

		$response = array();
		$response['TemplateAlert'] = BinaryHelper::TemplateAlert('info','Update category success','Category has been update');
		$response['success'] = true;
		echo json_encode($response);
	}
}

function Delete($post){
	$colors = ORM::factory('colors',$post['ColorId']);
	$Name = $colors->Name;
	$colors->delete();

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