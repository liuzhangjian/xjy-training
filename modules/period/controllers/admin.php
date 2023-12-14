<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {
	function __construct(){
		parent::__construct();
		$this->bep_site->set_crumb($this->lang->line('period_list'),'period/admin/');
    }

	public function index(){
		$data['header'] =  $this->lang->line('period_list');
		$data['page'] = "home";
		$data['module'] = 'period';
		$data['data'] = $this->PeriodModel->find();
		$this->bep_site->set_crumb($this->lang->line('period_list'));
		$this->load->view($this->_container,$data);
	}


	public function form($id = NULL){
		if ($this->input->post('submit')){
			$info->id = $this->input->post('id');
			$info->periodCount = $this->input->post('periodCount');
			$info->name = $this->input->post('name');
			$info->state = $this->input->post('state');
			$this->PeriodModel->save($info);
			if($info->id) {
				$msg = $this->lang->line('base_success_updated');
			} else{
				$msg = $this->lang->line('base_success_created');
			}
			flashMsg('success',$msg);
			redirect('period/admin/', 'refresh');
		} else {
			if (is_null($id)) {
				$header = $this->lang->line('period_create');
				$row = $this->PeriodModel->field();
			} else {
				$row = $this->PeriodModel->load($id);
				if(!is_numeric($id) || !$row) show_404();
				$header = $this->lang->line('period_edit');
			}
			$data['row']  = $row;
			$data['header'] = $header;
			$data['page'] = "form";
			$data['module'] = 'period';
			$this->bep_site->set_crumb($header);
			$this->load->view($this->_container,$data);
		}
	}

	public function valid($id = NULL) {
		if(is_null($id) OR !is_numeric($id)) show_404();
		$info->id = $id;
		$info->state = 1;
		$this->PeriodModel->save($info);
		redirect('period/admin/', 'refresh');
	}

	public function invalid($id = NULL) {
		if(is_null($id) OR !is_numeric($id)) show_404();
		$info->id = $id;
		$info->state = 0;
		$this->PeriodModel->save($info);
		redirect('period/admin/', 'refresh');
	}
}

?>
