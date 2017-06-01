<?php
require_once '../../Library/kohana/include.php';

			$suggested = ORM::factory('suggested')->find_all();
			header('Content-type: application/json');
			$json = array();
			foreach ($suggested as $s) {											
				$json[] = array(
					$s->CreatedDate,
					$s->Title,
					$s->Notes
				);
			}
			$response = array();
			$response['success'] = true;
			$response['aaData'] = $json;
			echo json_encode($response);		
		