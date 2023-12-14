<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PeriodModel extends Model{
	public $id,$name,$periodCount,$state,$createTime,$updateTime;
	
	public function __construct() {
		parent::__construct();
		$options = array(
			'key' => 'id',
			'table' => 'period',
			'columns' => array(
				'id' => 'id',
				'name' => 'name',
                'periodCount' => 'periodCount',
                'state' => 'state',
				'createTime' => 'createTime',
				'updateTime' => 'updateTime'
			)
		);
		parent::init($options);
	}
}
?>