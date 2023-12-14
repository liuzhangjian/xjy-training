<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {
	function __construct(){
		parent::__construct();
    }

	function ajaxUp(){
		$fileDir = 'uploads';
		if(!file_exists($fileDir)) mkdir($fileDir);
		$config['upload_path'] = $fileDir;
		$config['encrypt_name'] = TRUE;
		$config['allowed_types'] = 'jpg|gif|png|flv';
		$this->load->library('upload', $config);	 
		if (!$this->upload->do_upload('fileToUpload')){
			echo 0;
		}else{
		  	$upInfo = $this->upload->data();
			echo json_encode($upInfo);
		}
	}

}

?>
