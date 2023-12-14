<?php

class Home extends Front_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index(){
		$data['header'] = $this->lang->line('web_home');
		$data['page'] = 'home';
		$this->load->view($this->_container,$data);
	}

	public function search(){
        $header = "查询结果";
        $data['identity'] = $this->input->post('identity');
        if (!$this->input->post('submit') || !$data['identity']){
            redirect('home/', 'refresh');
        }
        $data['identity'] = $this->input->post('identity');
        $staffList = $this->StaffModel->find(array('identity' => "='{$data["identity"]}'",'state' => "=1"));
        if(is_array($staffList) && !empty($staffList)){
            $data['result'] = $staffList[0];
            if(is_numeric($data['result']->periodId)){
                $data['period'] = $this->PeriodModel->load($data['result']->periodId);
            }
        }
        $data['page'] = "result";
        $data['header'] = $header;
        $this->load->view($this->_container,$data);
    }

	public function pending(){
		$data['header'] = '暂未开通';
		$data['page'] = 'pending';
		$this->bep_site->set_crumb($this->lang->line('text'));
		$this->load->view($this->_container,$data);
	}

}