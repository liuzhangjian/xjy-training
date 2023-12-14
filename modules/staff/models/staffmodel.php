<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StaffModel extends Model{
	public $id;
	public $name;
	public $identity;
	public $company;
	public $address;
	public $periodId;
    public $certificate;
    public $summary;
	public $state;
	public $createTime;
	public $updateTime;
	
	public function __construct() {
		parent::__construct();
		$options = array(
			'key' => 'id',
			'table' => 'staff',
			'columns' => array(
				'id' => 'id',
				'name' => 'name',
                'identity' => 'identity',
                'company' => 'company',
                'address' => 'address',
                'periodId' => 'periodId',
                'certificate' => 'certificate',
                'summary' => 'summary',
                'state' => 'state',
                'createTime' => 'createTime',
                'updateTime' => 'updateTime'
			)
		);
		parent::init($options);
	}
}
?>