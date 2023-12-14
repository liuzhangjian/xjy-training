<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {
	function __construct(){
		parent::__construct();
		$this->bep_site->set_crumb($this->lang->line('webconfig'),'webconfig/admin/form');
    }

	function index(){
		redirect('webconfig/admin/form', 'refresh');
	}
	function form(){
		if ($this->input->post('submit')){
			$info->id = $this->input->post('id');
			$info->title = $this->input->post('title');
			$info->keywords = $this->input->post('keywords');
			$info->description = $this->input->post('description');
			$info->copyright = $this->input->post('copyright');
			$info->lang = $this->la;
			$this->Mwebconfig->save($info);
			$msg = $this->lang->line('base_success_updated');
			flashMsg('success',$msg);
			redirect('webconfig/admin/form', 'refresh');
		} else {
			$header = $this->lang->line('webconfig');
			$this->bep_site->set_crumb($header);
			$data['webconfig']  = $this->Mwebconfig->load($this->la);
			$data['header'] = $header;
			$data['page'] = "form";
			$data['module'] = 'webconfig';			
			$this->load->view($this->_container,$data);
		}
	}

}

?>
