<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends Admin_Controller {
	function Admin(){
		parent::Admin_Controller();
    }

	function index(){
		redirect('team/admin/teamList/');
	}
	
	function teamList(){
		$data['header'] = $this->lang->line('team_list');
		$data['page'] = $this->config->item('backendpro_template_admin') . "admin_team_home";
		$data['module'] = 'team';
		$data['teamList'] = $this->MTeam->teamList('', '', "teams.team_id DESC", "teams.team_id <=".TEAM_CS);
		$this->load->view($this->_container,$data);
	}
	
	function teamForm($team_id = NULL){
		//Setup form default values
		if(! is_null($team_id) && ! $this->input->post('submit')){// Modify form
			$data['header'] = $this->lang->line('team_create');
			$data['page'] = $this->config->item('backendpro_template_admin') . "admin_team_form";
			$data['module'] = 'team';
			$team=$this->MTeam->teamDetails($team_id);
			$team_manager_name=$this->MTeam->userDetails($team['team_manager_user_id']);//get manager name
			$team['team_manager_name']=$team_manager_name['username'];
			$data['team']=$team;
			$data['userList'] = $this->MTeam->userList('','','id DESC', 'id!=1 AND team_id=0 AND `group`!='.GROUP_DISTRIBUTOR);
			$data['teamUserList'] = $this->MTeam->userList('','','id DESC','team_id='.$team_id);
			$this->load->view($this->_container,$data);
		}elseif(is_null($team_id) && ! $this->input->post('submit')){//Create form
			$data['header'] = $this->lang->line('team_create');
			$data['page'] = $this->config->item('backendpro_template_admin') . "admin_team_form";
			$data['module'] = 'team';
			$data['userList'] = $this->MTeam->userList('','','id DESC','id!=1 AND team_id=0 AND `group`!='.GROUP_DISTRIBUTOR);
			$this->load->view($this->_container,$data);		
		}elseif($this->input->post('submit')){//Form submit
			$team_info['team_id']=$this->input->get_post('team_id');
			$team_info['team_name']=$this->input->get_post("team_name");
			$team_info['team_manager_user_id']=$this->input->get_post("team_manager_user_id");
			$team_info['team_desc']=$this->input->get_post("team_desc");
			$alternativeUser=$this->input->get_post("alternativeUser");
			$selectedUser=$this->input->get_post("selectedUser");
			if($team_info['team_id']){//update
				$this->MTeam->teamUpdate($team_info);
				if(is_array($selectedUser)){
					foreach($selectedUser as $row){
						$this->MTeam->teamMemberAdd($team_info['team_id'],$row);
					}				
				}
				if(is_array($alternativeUser)){//update cancl user
					foreach($alternativeUser as $row){
						$this->MTeam->teamMemberDelete($row);
					}
				}
				flashMsg('success',$this->lang->line('team_updated'));
				redirect('/team/admin/', 'refresh');
			}else{//create
			    //
				// check if the department name is used
				//
                $data['teamList'] = $this->MTeam->teamList();
				$team_info['team_name'] = trim($team_info['team_name'] );
				foreach ($data['teamList'] as $v) {
				  if ($v['team_name'] == $team_info['team_name']) {
				    flashMsg('success',$this->lang->line('team_already_existed'));
                    redirect('/team/admin/', 'refresh');
				  }
				}
				$team_id=$this->MTeam->teamCreate($team_info);//get insert_id
				if(is_array($alternativeUser)){
					foreach($alternativeUser as $row){
						$this->MTeam->teamMemberAdd($team_id,$row);
					}
				}
				flashMsg('success',$this->lang->line('team_created'));
				redirect('/team/admin/', 'refresh');
			}
			
		}

	}

	function teamDetails($team_id){
		$data['header'] = $this->lang->line('team_details');
		$data['page'] = $this->config->item('backendpro_template_admin') . "admin_team_details";
		$data['module'] = 'team';
		$team = $this->MTeam->teamDetails($team_id);
		$team_manager_name=$this->MTeam->userDetails($team['team_manager_user_id']);//get manager name
		$team['team_manager_name']=$team_manager_name['username'];
		$data['team'] = $team;
		$data['members'] = $this->MTeam->memberTree ($team['team_manager_user_id']);
		$this->load->view($this->_popup_container,$data);
	}

	function teamDelete($team_id){
		$this->MTeam->teamDelete ($team_id);
		$this->MTeam->teamMemberDelete($team_id);
		flashMsg('success',$this->lang->line('team_deleted'));
		redirect('/team/admin/', 'refresh');
	}
	
    function changePassword($user_id = NULL){
		if ($this->input->post('submit')){
			$original_password = $this->input->post('original_password');
			$password = $this->input->post('password');
			$confirm_password = $this->input->post('confirm_password');
			$user_id = $this->input->post('user_id');
			$user = $this->MTeam->userDetails($user_id);
			if($user['password'] != $this->userlib->encode_password($original_password)){
				flashMsg('error',$this->lang->line('password_not_original_password'));
				redirect('team/admin/changePassword/'.$user_id,'refresh');
			}
			if(!empty($password)){
				if(strlen($password)<6){
					flashMsg('error',$this->lang->line('password_length'));
					redirect('team/admin/changePassword/'.$user_id,'refresh');
				} 
				if($password != $confirm_password){
					flashMsg('error',$this->lang->line('password_not_confirm_password'));
					redirect('team/admin/changePassword/'.$user_id,'refresh');
				} 
				$info['password'] = $this->userlib->encode_password($password);
				$info['id'] = $user_id;
				$this->MTeam->userUpdate($info);
				flashMsg('success',$this->lang->line('change_password_updated'));
				redirect('team/admin/changePassword/'.$user_id,'refresh');
			}
		}else{
			if(is_null($user_id) || !is_numeric($user_id)) show_404();
			$user = $this->MTeam->userDetails($user_id);
			if(!$user) show_404();
			$data['user'] = $user;
			$data['header'] = $this->lang->line('change_password');
			$data['page'] = $this->config->item('backendpro_template_admin') . "change_password";
			$data['module'] = 'team';
			$this->load->view($this->_container,$data);
		}		
		
	}

	function marketingTeamlist() {
	    $data['header'] = $this->lang->line('marketing_team_list');
		$data['page'] = $this->config->item('backendpro_template_admin') . "market_team_list";
		$data['module'] = 'team';
		$teamList =$this->MTeam->teamList('', '', "teams.team_id DESC", "teams.team_id >".TEAM_CS);
        if (is_array($teamList) AND count($teamList)) {
		  foreach($teamList as $k=>$v) {
		    $members = $this->MTeam->teamMemberList($v['team_id']);
			if (!is_array($members)) { 
				$member_count = 1;
			} else {
			    $member_count = count($members) + 1;
			}
			$teamList[$k]['member_count'] = $member_count;
		  }
		}
		$data['teamList'] = $teamList;
		$this->load->view($this->_container,$data);
	}
	function marketTeamDetails($team_id = NULL) {
	    $data['header'] = $this->lang->line('team_details');
		$data['page'] = $this->config->item('backendpro_template_admin') . "market_team_details";
		$data['module'] = 'team';
		$team = $this->MTeam->teamDetails($team_id);
		if (is_null($team_id) OR $team_id < TEAM_CS OR $team == 0) {
		  flashMsg('error',$this->lang->line('marketing_team_not_existed'));
          redirect('/team/admin/marketingTeamlist', 'refresh');
		}
		$team_manager_name=$this->MTeam->userDetails($team['team_manager_user_id']);//get manager name
		$team['team_manager_name']=$team_manager_name['username'];
		$data['team'] = $team;
		$data['members'] = $this->MTeam->memberTree ($team['team_manager_user_id']);
		$this->load->view($this->_popup_container,$data);
	}
	function marketingTeamForm($team_id=NULL) {
	    	//Setup form default values
		if(! is_null($team_id) && ! $this->input->post('submit')){// Modify form
		   $team=$this->MTeam->teamDetails($team_id);
		   if ($team_id < TEAM_CS OR $team == 0 OR $team == 0) {
		       flashMsg('error',$this->lang->line('marketing_team_not_existed'));
               redirect('/team/admin/marketingTeamlist', 'refresh');
		    }
			$team=$this->MTeam->teamDetails($team_id);
			$team_manager_name=$this->MTeam->userDetails($team['team_manager_user_id']);//get manager name
			$team['team_manager_name']=$team_manager_name['username'];
			if ($team_manager_name==0) {
			  flashMsg('error',$this->lang->line('marketing_team_not_existed'));
			  redirect('/team/admin/marketingTeamlist', 'refresh');
			}
			$data['team']=$team;
			$data['userList'] = $this->MTeam->userList('','','id DESC', 'id!=1 AND team_id='.TEAM_SALSE.' AND `group`='.GROUP_SALES_EE);
			$data['teamUserList'] = $this->MTeam->userList('','','id DESC','team_id='.$team_id);
			$data['header'] = $this->lang->line('market_team_edit');
		    $data['page'] = $this->config->item('backendpro_template_admin') . "market_team_form";
		    $data['module'] = 'team';
	    	$this->load->view($this->_container,$data);
		}elseif(is_null($team_id) && ! $this->input->post('submit')){//Create form. it will not allow to creat here
			 flashMsg('success',$this->lang->line('marketing_team_not_existed'));
             redirect('/team/admin/marketingTeamlist', 'refresh');
		}elseif($this->input->post('submit')){//Form submit
			$team_info['team_id']=$this->input->get_post('team_id');
			$team_info['team_name']=$this->input->get_post("team_name");
			$team_info['team_manager_user_id']=$this->input->get_post("team_manager_user_id");
			$team_info['team_desc']=$this->input->get_post("team_desc");
			$alternativeUser=$this->input->get_post("alternativeUser");
			$selectedUser=$this->input->get_post("selectedUser");
			if($team_info['team_id']){//update
				$this->MTeam->teamUpdate($team_info);
				if(is_array($selectedUser)){
					foreach($selectedUser as $row){
						$this->MTeam->teamMemberAdd($team_info['team_id'],$row);
					}				
				}
				if(is_array($alternativeUser)){//update cancl user
					foreach($alternativeUser as $row){
						$this->MTeam->teamMemberAdd(TEAM_SALSE, $row);
					}
				}
				flashMsg('success',$this->lang->line('market_team_updated'));
				redirect('/team/admin/marketingTeamlist', 'refresh');
			}
			
		}

	}
	function marketingTeamDelete($team_id=NULL){
		$team = $this->MTeam->teamDetails($team_id);
		if (is_null($team_id) OR $team_id < TEAM_CS OR $team == 0) {
		  flashMsg('error',$this->lang->line('marketing_team_not_existed'));
          redirect('/team/admin/marketingTeamlist', 'refresh');
		}
		$members = $this->MTeam->teamMemberList($team_id);
		if (is_array($members) AND count($members) > 0) {
		  flashMsg('error',$this->lang->line('marketing_team_not_empty'));
		  redirect('/team/admin/marketingTeamlist', 'refresh');
		}
		$user = $this->MTeam->userDetails($team['team_manager_user_id']);
		$user_info = array(
			        'id'=>$team['team_manager_user_id'],
			        'group'=>GROUP_SALES_EE
			        );
		$this->MTeam->userUpdate($user_info);
		$this->MTeam->teamDelete ($team_id);
		
		flashMsg('success',sprintf($this->lang->line('market_team_deleted'),$team['team_name'],$user['username']));
		redirect('/team/admin/marketingTeamlist', 'refresh');
	}
}

?>
