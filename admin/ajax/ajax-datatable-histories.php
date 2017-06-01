<?php
require_once '../../Library/kohana/include.php';
require_once '../../Library/HistoryBiz.php';

			$history = ORM::factory('history')->order_by('CreatedDate', 'DESC')->find_all();
			header('Content-type: application/json');
			$json = array();
			foreach ($history as $h) {											
				$json[] = array(
					$h->CreatedDate,
					$h->Descriptions,
					HistoryBiz::$Status[$h->StatusId]
				);
			}
			$response = array();
			$response['success'] = true;
			$response['aaData'] = $json;
			echo json_encode($response);		
		