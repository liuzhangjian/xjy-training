<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {
	function __construct(){
		parent::__construct();
		$this->bep_site->set_crumb($this->lang->line('staff_list'),'staff/admin/');
    }

	public function index(){
		$data['header'] =  $this->lang->line('staff_list');
		$data['page'] = "home";
		$data['module'] = 'staff';
		$list = $this->StaffModel->find(array(),array('order' => array('id' =>'DESC')));
		foreach($list as $k => $n){
			$period = $this->PeriodModel->load($n->periodId);
			$n->periodCount = $period ? $period->periodCount : $this->lang->line('unspecified');
		}
		$data['list'] = $list;
		$this->load->view($this->_container,$data);
	}
	

	public function form($id = NULL){
		if ($this->input->post('submit')){
			$info->id = $this->input->post('id');
			$info->name = $this->input->post('name');
			$info->identity = $this->input->post('identity');
			$info->company = $this->input->post('company');
			$info->address = $this->input->post('address');
			$info->periodId = $this->input->post('periodId');
			$info->certificate = $this->input->post('certificate');
			$info->summary = $this->input->post('summary');
			$info->state = $this->input->post('state');
			$this->StaffModel->save($info);
			if($info->id) {
				$msg = $this->lang->line('base_success_updated');
			} else{
				$msg = $this->lang->line('base_success_created');
			}
			flashMsg('success',$msg);
			redirect('staff/admin/', 'refresh');
		} else {
			if (is_null($id)) {
				$header = $this->lang->line('staff_create');
				$row = $this->StaffModel->field();
			} else {
				$row = $this->StaffModel->load($id);
				if(!is_numeric($id) || !$row) show_404();
				$header = $this->lang->line('staff_edit');
			}
			$this->bep_site->set_crumb($header);
			$data['row']  = $row;
			$data['header'] = $header;
			$data['page'] = "form";
			$data['module'] = 'staff';
			$data['periodList'] = $this->PeriodModel->find();
			$this->load->view($this->_container,$data);
		}
	}

	public function valid($id = NULL) {
		if(is_null($id) OR !is_numeric($id)) show_404();
		$info->id = $id;
		$info->state = 1;
		$this->StaffModel->save($info);
		redirect('staff/admin/', 'refresh');
	}

	public function invalid($id = NULL) {
		if(is_null($id) OR !is_numeric($id)) show_404();
		$info->id = $id;
		$info->state = 0;
		$this->StaffModel->save($info);
		redirect('staff/admin/', 'refresh');
	}
}

?>
