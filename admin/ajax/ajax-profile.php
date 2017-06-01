<?php
require_once '../../Library/kohana/include.php';
require_once '../../Library/BinaryHelper.php';
session_start();
header('Content-type: application/json');
	if(isset($_POST['action']))
	{
		if($_POST['action'] == 'UpdateProfile')
		{
		     $admin = ORM::factory('admin',$_SESSION['login_admin']->AdminId);
               $admin->Username = $_POST['username'];
               $admin->Firstname = $_POST['firstname'];
               $admin->Lastname = $_POST['lastname'];               
               if($_POST['password'] != '')
                    $admin->Password = $_POST['password'];
               $admin->save();

               $FindAdmin = DB::select()->from('admin')                         
               ->where("AdminId", "=", $admin->AdminId)
               ->as_object()
               ->execute();                  
               if($FindAdmin->count() == 1)
               {
                    $_SESSION['login_admin'] = $FindAdmin[0];                 
               }

               $history = ORM::factory('history');
               $history->CreatedDate = DB::expr('Now()');
               $history->Descriptions = 'Update Setting Now';
               $history->StatusId = 61;
               $history->save();

			$response = array();
               $response['loginAdminUsername'] = $admin->Firstname.' '.$admin->Lastname;
			$response['TemplateAlert'] = BinaryHelper::TemplateAlert('success','Update Profile','Profile has been update');
			echo json_encode($response);
		}
	}
?>