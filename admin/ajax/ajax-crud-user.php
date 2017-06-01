<?php
require_once '../../Library/kohana/include.php';
require_once '../../Library/BinaryHelper.php';

session_start();
header('Content-type: application/json');
if(isset($_POST['action']))
{	
	if($_POST['action']=='InsertUser'){
		Insert($_POST);
	}else if($_POST['action']=='UpdateUser'){

	}else{
		Delete($_POST);
	}
}

function Insert($post)
{
	$user = ORM::factory('admin');
	$user->Username = $post['username'];
	$user->Password = $post['password'];
	$user->Firstname = $post['firstname'];
	$user->Lastname = $post['lastname'];
	$user->AdminTypeId = $post['admintype'];
	$user->CreatedDate = DB::expr('Now()');
	$user->StatusId = 1;
	$user->save();

	$history = ORM::factory('history');
	$history->CreatedDate = DB::expr('Now()');
	$history->Descriptions = 'New user added -> '.$user->Firstname.' '.$user->Lastname;
	$history->StatusId = 31;
	$history->save();

	$response = array();
	$response['TemplateAlert'] = BinaryHelper::TemplateAlert('info','Delete category','Category has been delete');
	$response['success'] = true;
	$response['title'] = __('success');
	$response['message'] = __('insert user success');
	echo json_encode($response);
}


function Delete($post){	
	$user = ORM::factory('admin',$post['UserId']);
	$response = array();
	if($user->AdminTypeId == 1)
	{
			$response['TemplateAlert'] = BinaryHelper::TemplateAlert('info','Important!','you can\'t delete superadmin');
			$response['success'] = false;
			$response['title'] = __('failed');
			$response['message'] = __('delete awawwa failed');
			echo json_encode($response);
	}
	else
	{		
		if($user->AdminId == $_SESSION['login_admin']->AdminId)
		{
			$response['TemplateAlert'] = BinaryHelper::TemplateAlert('warning','Alert!','you can\'t delete your account');
			$response['success'] = false;
			$response['title'] = __('failed');
			$response['message'] = __('delete user failed');
			echo json_encode($response);
		}
		else
		{			
			$name = $user->Firstname.' '.$user->Lastname;
			$user->delete();

			$history = ORM::factory('history');
			$history->CreatedDate = DB::expr('Now()');
			$history->Descriptions = 'Delete user -> '.$name;
			$history->StatusId = 33;
			$history->save();
			
			$response['TemplateAlert'] = BinaryHelper::TemplateAlert('danger','Deleted!','Delete Account has been deleted');
			$response['success'] = true;
			$response['title'] = __('success');
			$response['message'] = __('delete user success');
			echo json_encode($response);
		}
	}
	
}




?>