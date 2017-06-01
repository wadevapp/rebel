<?php
require_once '../../Library/kohana/include.php';
require_once '../../Library/BinaryHelper.php';
header('Content-type: application/json');
	if(isset($_POST['action']))
	{
		if($_POST['action'] == 'UpdateSetting')
		{
		     $setting = ORM::factory('setting',1);
               $setting->Name = $_POST['name'];
               $setting->Area1 = $_POST['area'];
               $setting->Area2 = $_POST['area2'];
               $setting->Address = $_POST['address'];
               $setting->City = $_POST['city'];
               $setting->PostCode = $_POST['postcode'];
               $setting->Contact = $_POST['contact'];
               $setting->Whatsapp = $_POST['whatsapp'];          
               $setting->Line = $_POST['line'];
               $setting->PinBBM = $_POST['pinbbm'];
               $setting->LinkFacebook = $_POST['facebook'];
               $setting->LinkInstagram = $_POST['instagram'];
               $setting->LinkTwitter = $_POST['twitter'];
               $setting->Email = $_POST['email'];
               $setting->save();

               $history = ORM::factory('history');
               $history->CreatedDate = DB::expr('Now()');
               $history->Descriptions = 'Update Setting Now';
               $history->StatusId = 61;
               $history->save();

               $FindSetting = DB::select()->from('setting')                         
               ->where("SettingId", "=", $setting->SettingId)
               ->as_object()
               ->execute();                  
               if($FindSetting->count() == 1)
               {
                    $_SESSION['settingApp'] = $FindSetting[0];                 
               }

			$response = array();
			$response['TemplateAlert'] = BinaryHelper::TemplateAlert('success','Update Setting','Setting Update has been success');
			echo json_encode($response);
		}
	}
?>