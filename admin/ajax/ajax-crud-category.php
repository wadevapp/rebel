<?php
require_once '../../Library/kohana/include.php';
require_once '../../Library/BinaryHelper.php';

header('Content-type: application/json');
if(isset($_POST['action']))
{	
	if($_POST['action']=='InsertCategory'){
		Insert($_POST);
	}else if($_POST['action']=='UpdateCategory'){
		Update($_POST);
	}else if($_POST['action']=='GetCategory'){
		GetCategory($_POST);
	}else{
		Delete($_POST);
	}
}

function Insert($post)
{
	$category = ORM::factory('category');
	$category->Name = $post['name'];
	$category->save();

	$history = ORM::factory('history');
	$history->CreatedDate = DB::expr('Now()');
	$history->Descriptions = 'New category added -> '.$category->Name;
	$history->StatusId = 41;
	$history->save();

	$response = array();
	$response['TemplateAlert'] = BinaryHelper::TemplateAlert('success','success','Insert data has been added');
	$response['success'] = true;
	$response['title'] = __('success');
	$response['message'] = __('insert category success');
	echo json_encode($response);
}

function GetCategory($post)
{
	$category = ORM::factory('category',$post['id']);
	if($category->loaded())
	{
		$response = array();
		$response['name'] = $category->Name;
		$response['id'] = $category->CategoryId;
		echo json_encode($response);
	}
}

function Update($post)
{
	$categoryToUpdate = ORM::factory('category',$post['CategoryId']);
	if($categoryToUpdate->loaded())
	{
		$categoryToUpdate->Name = $post['name'];
		$categoryToUpdate->save();

		$response = array();
		$response['TemplateAlert'] = BinaryHelper::TemplateAlert('info','Update category success','Category has been update');
		$response['success'] = true;
		echo json_encode($response);
	}
}

function Delete($post){
	$category = ORM::factory('category',$post['CategoryId']);
	$Name = $category->Name;
	$category->delete();

	$history = ORM::factory('history');
	$history->CreatedDate = DB::expr('Now()');
	$history->Descriptions = 'delete category -> '.$Name;
	$history->StatusId = 43;
	$history->save();
	
	$response = array();
	$response['TemplateAlert'] = BinaryHelper::TemplateAlert('danger','Delete category','Category has been delete');
	$response['success'] = true;
	$response['title'] = __('success');
	$response['message'] = __('delete category success');
	echo json_encode($response);
}

?>