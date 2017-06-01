<?php
require_once '../../Library/kohana/include.php';

			$category = ORM::factory('category')->find_all();
			header('Content-type: application/json');
			$json = array();
			foreach ($category as $c) {											
				$action = "<a href='#register-form' data-id=".$c->CategoryId." class='edit-form fa fa-edit btn btn-primary btn-sm' style=margin-bottom:4px></a> <button data-id=".$c->CategoryId." class='CategoryToDelete fa fa-trash btn btn-sm btn-danger' style=padding-right:13px;margin-bottom:4px></button>";

				$json[] = array(
					$c->CategoryId,
					$c->Name,
					$action,
					
				);
			}
			$response = array();
			$response['success'] = true;
			$response['aaData'] = $json;
			echo json_encode($response);		
		