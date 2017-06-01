<?php
Class BinaryHelper{
	public static function NumberFormat($number)
	{
	    return str_replace(".00", "", number_format($number,2));
	}

	public static function SetAlertMessage($type,$message)
	{
		$_SESSION["alert"]["type"] = $type;
		$_SESSION["alert"]["message"] = $message;
	}

	public static function TemplateAlert($type,$title,$message)
	{		
		$faicon = '';
		if(strtolower($type) == 'success')
			$faicon = 'check';
		else if(strtolower($type) == 'danger')
			$faicon = 'ban';
		else if(strtolower($type) == 'warning')
			$faicon = 'warning';
		else
			$faicon = 'info';
		
	     return "<div class='col-md-12'>
	          <div class='box box-".$type." box-solid'>
	            <div class='box-header with-border'>
	              <h3 class='box-title'><i class='icon fa fa-".$faicon."'></i> ".$title."</h3>

	              <div class='box-tools pull-right'>
	                <button type='button' class='btn btn-box-tool' data-widget='remove'><i class='fa fa-times'></i></button>
	              </div>
	              <!-- /.box-tools -->
	            </div>
	            <!-- /.box-header -->
	            <div class='box-body'>
	              ".$message."
	            </div>
	            <!-- /.box-body -->
	          </div>
	          <!-- /.box -->
	        </div>";
	}		

public static function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}	

public static function serialize_string($serial)
{
    $result = unserialize($serial);
    return implode(', ', $result);
}
}