<?php
require_once '../../Library/kohana/include.php';
require_once '../../Library/BinaryHelper.php';

			$products = ORM::factory('product')->order_by('CreatedDate','DESC')->find_all();
			header('Content-type: application/json');
			$json = array();
			foreach ($products as $p) {											
				$action = "<a href='#register-form' data-id=".$p->ProductId." class='edit-form register-form fa fa-edit btn btn-primary btn-sm' style=margin-bottom:4px></a> <button data-id=".$p->ProductId." class='ProductToDelete fa fa-trash btn btn-sm btn-danger' style=padding-right:13px;margin-bottom:4px></button>";
				$img = "<div class=\"img-popup\" style='height:90px;width:90px' ><a href='$p->ImgUrl'><img src='$p->ImgUrl' width=100%></a></div>";		
					
				$price = '';
				if($p->IsDiscount == false)
				{
					$price = "<span class='label label-success'>".BinaryHelper::NumberFormat($p->Price)."</span>";			
				}else{
					$price = BinaryHelper::NumberFormat($p->Price);	
				} 
					
				$pricediscount = '';
				if($p->IsDiscount == true){
					$pricediscount = "<span class='label label-success'>".BinaryHelper::NumberFormat($p->PriceDiscount)."</span>";
				}else{
					$pricediscount = "<span class='text text-danger'>".BinaryHelper::NumberFormat($p->PriceDiscount)."</span>";			
				}

				$json[] = array(
					$img,
					$p->Name,
					$price,
					$pricediscount,
					$p->Descriptions,
					$p->category->Name,
					serialize_string($p->Colors),
					serialize_string($p->Sizes),
					$p->IsDiscount == true ? "<span class='label label-default'>Discount</span>":"",									
					$p->StatusId == 1 ? "<span class='label label-success'>Active</span>":"<span class='label label-warning'>Inactive</span>",
					$action,					
				);
			}
			$response = array();
			$response['success'] = true;
			$response['aaData'] = $json;
			echo json_encode($response);


function serialize_string($serial)
{
    $result = unserialize($serial);
    return implode(', ', $result);
}					
		