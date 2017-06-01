<?php
require_once '../../Library/kohana/include.php';
require_once '../../Library/BinaryHelper.php';

			$users = ORM::factory('admin')->order_by('CreatedDate','DESC')->find_all();
			header('Content-type: application/json');
			$json = array();
			foreach ($users as $s) {											
				$action = "<button data-id=".$s->AdminId." class='UserToDelete fa fa-trash btn btn-sm btn-danger' style=padding-right:13px;margin-bottom:4px></button>";
				$Name = "<a href='#'>$s->Firstname".' '."$s->Lastname</a>";									

				$json[] = array(
					$Name,					
					$s->Username,
					$s->AdminTypeId == 1 ? "<span class='label label-primary'>Super Admin</span>":"<span class='label label-default'>Normal Admin</span>",					
					$s->StatusId == 1 ? "<span class='label label-success'>Active</span>":"<span class='label label-warning'>Inactive</span>",
					$action,					
				);
			}
			$response = array();
			$response['success'] = true;
			$response['aaData'] = $json;
			echo json_encode($response);		
		