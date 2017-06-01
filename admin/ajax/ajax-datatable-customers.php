<?php
require_once '../../Library/kohana/include.php';

			$customer = ORM::factory('customer')->find_all();
			header('Content-type: application/json');
			$json = array();
			foreach ($customer as $c) {											
				$action = "<a href='#register-form' data-effect='mfp-zoom-in' class='register-form fa fa-edit btn btn-primary btn-sm' style=margin-bottom:4px></a> <button data-id=".$c->CustomerId." class='CustomerToDelete fa fa-trash btn btn-sm btn-danger' style=padding-right:13px;margin-bottom:4px></button>";							
				$img = "<a href='#'>Image</a>";	
				$email = "<a href='#register-form'>$c->Email</a>";

				$json[] = array(
					$c->Firstname .' '.$c->Lastname ,
					$email,
					$c->Gender == 'P' ? 'Female':'Male',
					$c->Phone,
					$c->address->StreetAddress,
					$c->address->Area1 .' '.$c->address->Area2,					
					$c->address->City,
					$c->address->PostCode,
					$img,
					$c->StatusId == 1 ? "<span class='label label-success'>Active</span>":"<span class='label label-warning'>Inactive</span>",
					$action,
					
				);
			}
			$response = array();
			$response['success'] = true;
			$response['aaData'] = $json;
			echo json_encode($response);		
		