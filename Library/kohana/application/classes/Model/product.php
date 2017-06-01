<?php defined('SYSPATH') or die('No direct access allowed.');
class Model_Product extends ORM
{
	protected $_table_name = 'product';
	protected $_primary_key = 'ProductId';

	protected $_belongs_to = array(
	    'category' => array(
        	'model'   => 'category',
        	'foreign_key' => 'CategoryId',
    	),
    );
}