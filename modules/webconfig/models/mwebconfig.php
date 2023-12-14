<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mwebconfig extends Model{
	public $id,$lang,$title,$keywords,$description,$copyright,$createTime,$updateTime;
	
	public function __construct() {
		parent::__construct();
		$options = array(
			'key' => 'lang',
			'table' => 'webconfig',
			'columns' => array(
				'id' => 'id',
				'lang' => 'lang',
				'title' => 'title',
				'keywords' => 'keywords',
				'description' => 'description',
				'copyright' => 'copyright',				
				'createTime' => 'create_time',
				'updateTime' => 'update_time'
			)
		);
		parent::init($options);
	}
	
	function item($name)	{
		$info  = $this->load($this->la);
		if( isset($info->$name))		{
			return $info->$name;
		}else{
			log_message("error","BackendPro->Mwebconfig->item : Webconfig is not valid: " . $name);
			return false;
		}		
	}
}
?>