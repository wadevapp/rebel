<?php defined('SYSPATH') or die('No direct access allowed.');
class Model_Order extends ORM
{
	protected $_table_name = 'orders';
	protected $_primary_key = 'OrderId';

	protected $_belongs_to = array(
	    'customer' => array(
        	'model'   => 'customer',
        	'foreign_key' => 'CustomerId',
    	),
    );

}