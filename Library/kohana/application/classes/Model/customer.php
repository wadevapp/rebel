<?php defined('SYSPATH') or die('No direct access allowed.');
class Model_Customer extends ORM
{
	protected $_table_name = 'customer';
	protected $_primary_key = 'CustomerId';

	protected $_belongs_to = array(
	    'address' => array(
        	'model'   => 'address',
        	'foreign_key' => 'AddressId',
    	),
    );

}