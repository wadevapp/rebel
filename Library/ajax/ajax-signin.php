<?php
require_once '../kohana/include.php';

header('Content-type: application/json');
$results = DB::select()->from('admin')	    	
	    	->where("Password", "=", $_POST["password"])
	    	->where("Username", "=", str_replace(' ', '', $_POST["username"]))
	    	->where("StatusId", "=", 1)
	    	->as_object()
	    	->execute();    	
			if($results->count() == 1){
				session_start();
				$_SESSION['login_admin'] = $results[0];

			$setting = DB::select()->from('setting')	    			    	
		    	->where("SettingId", "=", 1)
		    	->as_object()
		    	->execute();				
		    	if($setting->count() == 1)
		    	{
					$_SESSION['settingApp'] = $setting[0];		    		
		    	}

				$response = array();
				$response['success'] = true;
				$response['title'] = __('Well done!');
				$response['message'] = __('Sign in success');
				echo json_encode($response);

			}
			else{
				
				$response = array();
				$response['success'] = false;
				$response['title'] = __('Error!');
				$response['message'] = __('Sign in failed');
				echo json_encode($response);
			}
?>