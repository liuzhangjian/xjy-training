<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//
// Define gropus:
//		2 - 管理员
//		3 - 总经理
//		4 - 业务部经理
//		5 - 业务经理
//		6 - 业务员
//		7 - 财务部经理
//		8 - 财务人员
//		9 - 储运部经理
//		10 - 储运人员
//		11 - 客服部经理
//		12 - 客服人员
//		13 - 代理商
//
define ("GROUP_ADMIN",					2);
define ("GROUP_GENERAL_MANAGER", 		3);
define ("GROUP_SALES_DEP_MANAGER", 		4);
define ("GROUP_SALES_MANAGER", 			5);
define ("GROUP_SALES_EE", 				6);
define ("GROUP_FINANCE_MANAGER", 		7);
define ("GROUP_FINANCE_EE", 			8);
define ("GROUP_SHIPPING_MANAGER", 		9);
define ("GROUP_SHIPPING_EE", 			10);
define ("GROUP_CS_MANAGER", 			11);
define ("GROUP_CS_EE", 					12);
define ("GROUP_DISTRIBUTOR", 			13);

//
// Define teams:
//		1 - 业务部
//		2 - 财务部
//		3 - 储运部
//		4 - 客服部
//
define ("TEAM_SALSE",			1);
define ("TEAM_FINANCE", 		2);
define ("TEAM_SHIPPING", 		3);
define ("TEAM_CS", 				4);

//
// Model for project management
//
class MTeam extends Model{

	public function __construct() {
		parent::__construct();

		// Get CI Instance
		$this->CI = &get_instance();
	}

	//
	// Get current login user_id.
	//
	// INPUT:
	//		None.
	// OUTPUT:
	//		Login user id.
	//
	function getCurrentUserId()
	{
		return $this->CI->session->userdata('id');
	}
	
	function teamTotal ($where='')
	{
		$query = "SELECT COUNT(*) AS count FROM teams";
		if ($where != '') {
			$query .= " WHERE $where";
		}
		$result = $this->db->query ($query);
		if ($result->num_rows() > 0) {
			$data = $result->result_array();
  			return $data[0]['count'];
		}
		return 0;
	}
	
	function userTotal ($where='')
	{
		$query = "SELECT COUNT(*) AS count FROM be_users";
		if ($where != '') {
			$query .= " WHERE $where";
		}
		$result = $this->db->query ($query);
		if ($result->num_rows() > 0) {
			$data = $result->result_array();
  			return $data[0]['count'];
		}
		return 0;
	}

	//
	// Get user by username.
	//
	// INPUT:
	//		username - Name of user.
	// OUTPUT:
	//		User info:
	//		Array (
	//					`id`
	//					`username`
	//					`email`
	//					`active`
	//					`group`
	//					`last_visit`
	//					`created`
	//					`modified`
	//		)
	//
	function getUserByName($username)
	{
		$query = "SELECT * FROM be_users WHERE username='$username'";
		$result = $this->db->query ($query);
		if ($result->num_rows() == 0) {
			return 0;
		}
		$data = $result->result_array();
		return $data[0];
	}

	//
	// Get user by email.
	//
	// INPUT:
	//		email - Email of user.
	// OUTPUT:
	//		User info:
	//		Array (
	//					`id`
	//					`username`
	//					`email`
	//					`active`
	//					`group`
	//					`last_visit`
	//					`created`
	//					`modified`
	//		)
	//
	function getUserByEmail($email)
	{
		$query = "SELECT * FROM be_users WHERE email='$email'";
		$result = $this->db->query ($query);
		if ($result->num_rows() == 0) {
			return 0;
		}
		$data = $result->result_array();
		return $data[0];
	}

	//
	// Return list of users.
	//
	// INPUT:
	//		$start		- Start offset (OPTIONAL)
	//		$limit		- LIMIT (OPTIONAL)
	//		$sort_by	- ORDER BY (OPTIONAL)
	//		$where		- additional condition (OPTIONAL)
	// OUTPUT:
	//		Array of teams, in format of:
	//	Arrary(
	//		[0] =>	Array (
	//					`id`
	//					`username`
	//					`email`
	//					`active`
	//					`group`
	//					`last_visit`
	//					`created`
	//					`modified`
	//					`team_id`
	//				),
	//		[1] => Array (
	//				. . .
	//				)
	//		[2] => . . .
	//	)
	//
	function userList ($start='', $limit='', $sort_by="id DESC", $where='')
	{
		// GET DEAL LIST
		$query = "SELECT * FROM be_users ";
		if ($where != "") {
			$query .= " WHERE $where ";
		}
		if ($sort_by != '') {
			$query .= " ORDER BY $sort_by ";
		}
		if ($limit) {
			$query .= " LIMIT $start, $limit ";
		}
		$result = $this->db->query ($query);
		if ($result->num_rows() == 0) {
			return 0;
		}
		return $result->result_array();
	}
	
	//
	// Update a user password.
	//
	// INPUT:
	//		$user_info	- user detailed information array.
	//		Array (
	//					`id`
	//					`password`
	//		),
	// OUTPUT:
	//		None
	//
	function userUpdate ($user_info)
	{
		// update deal info
		$query = "UPDATE be_users SET";
		$item_exist = false;
		if (isset ($user_info['password'])) {
			if ($item_exist) {$query .= ",";}
			$query .= " password               = '".$user_info['password']."'";
			$item_exist = true;
		}
		if (isset ($user_info['group'])) {
			if ($item_exist) {$query .= ",";}
			$query .= " `group`               = '".$user_info['group']."'";
			$item_exist = true;
		}
		$query .= " WHERE id='".$user_info['id']."'";
		$this->db->query ($query);
	}
	
	//
	// Return detail of a user.
	//
	// INPUT:
	//		$user_id	- user ID.
	// OUTPUT:
	//	Arrary(
	//					`id`
	//					`username`
	//					`email`
	//					`active`
	//					`group`
	//					`last_visit`
	//					`created`
	//					`modified`
	//					`team_id`
	//					`team_name`
	//					`team_desc`
	//					`team_manager_user_id`
	//	)
	//
	function userDetails ($user_id)
	{
		// Get user details
		$query = "SELECT * FROM be_users WHERE id='$user_id'";
		$result = $this->db->query ($query);
		if ($result->num_rows() == 0) {
			return 0;
		}
		$data = $result->result_array();
		$result->free_result();
		$user = $data[0];
		return $user;
	}

	//
	// Return list of teams.
	//
	// INPUT:
	//		$start		- Start offset (OPTIONAL)
	//		$limit		- LIMIT (OPTIONAL)
	//		$sort_by	- ORDER BY (OPTIONAL)
	//		$where		- additional condition (OPTIONAL)
	// OUTPUT:
	//		Array of teams, in format of:
	//	Arrary(
	//		[0] =>	Array (
	//					`team_id`
	//					`team_name`
	//					`team_desc`
	//					`team_manager_user_id`
	//				),
	//		[1] => Array (
	//				. . .
	//				)
	//		[2] => . . .
	//	)
	//
	function teamList ($start='', $limit='', $sort_by="teams.team_id DESC", $where='')
	{
		// GET DEAL LIST
		$query = "SELECT teams.*,be_users.username FROM teams LEFT JOIN be_users ON teams.team_manager_user_id=be_users.id ";
		if ($where != "") {
			$query .= " WHERE $where ";
		}
		if ($sort_by != '') {
			$query .= " ORDER BY $sort_by ";
		}
		if ($limit) {
			$query .= " LIMIT $start, $limit ";
		}
		$result = $this->db->query ($query);
		if ($result->num_rows() == 0) {
			return 0;
		}
		return $result->result_array();
	}

	//
	// Return detail of a team.
	//
	// INPUT:
	//		$team_id	- team ID.
	// OUTPUT:
	//	Arrary(
	//					`team_id`
	//					`team_name`
	//					`team_desc`
	//					`team_manager_user_id`
	//					`team_created_date`
	//	)
	//
	function teamDetails ($team_id)
	{
		// GET DEAL LIST
		$query = "SELECT * FROM teams WHERE team_id='$team_id'";
		$result = $this->db->query ($query);
		if ($result->num_rows() == 0) {
			return 0;
		}
		$data = $result->result_array();
		$result->free_result();

		return $data[0];
	}

	//
	// Create a new team.
	//
	// INPUT:
	//		$team_info	- Array of team information
	//		Array (
	//					`team_name`
	//					`team_desc`
	//					`team_manager_user_id`
	//					`team_created_date`
	//		),
	// OUTPUT:
	//		team id
	//		0	-	failed to create team
	//
	//
	function teamCreate ($team_info)
	{
		$now = time();
		$query = "INSERT INTO teams (
  					team_name,
  					team_desc,
  					team_manager_user_id,
  					team_created_date
				) VALUES (
  					'".$team_info['team_name']."',
  					'".$team_info['team_desc']."',
  					'".$team_info['team_manager_user_id']."',
  					'".$now."'
				)";
  		$result = $this->db->query ($query);
  		$team_id = $this->db->insert_id ();

		return $team_id;
	}

	//
	// Update a team.
	//
	// INPUT:
	//		$team_info	- team detailed information array.
	//		Array (
	//					`team_id`
	//					`team_name`
	//					`team_desc`
	//					`team_manager_user_id`
	//					`team_created_date`
	//		),
	// OUTPUT:
	//		None
	//
	function teamUpdate ($team_info)
	{
		// update deal info
		$query = "UPDATE teams SET";
		$item_exist = false;
		if (isset ($team_info['team_name'])) {
			if ($item_exist) {$query .= ",";}
			$query .= " team_name               = '".$team_info['team_name']."'";
			$item_exist = true;
		}
		if (isset ($team_info['team_desc'])) {
			if ($item_exist) {$query .= ",";}
			$query .= " team_desc               = '".$team_info['team_desc']."'";
			$item_exist = true;
		}
		if (isset ($team_info['team_manager_user_id'])) {
			if ($item_exist) {$query .= ",";}
			$query .= " team_manager_user_id               = '".$team_info['team_manager_user_id']."'";
			$item_exist = true;
		}

		$query .= " WHERE team_id='".$team_info['team_id']."'";
		$this->db->query ($query);
	}

	//
	// Delete a team.
	//
	// INPUT:
	//		$team_id - ID of team to delete
	// OUTPUT:
	//		None
	//
	function teamDelete ($team_id)
	{
		// Delete the team
		$query = "DELETE FROM teams WHERE team_id='$team_id'";
		$this->db->query ($query);
	}

	//
	// Add a team member
	//
	// INPUT:
	//		$team_id - ID of team
	//		$user_id - ID of user to add
	// OUTPUT:
	//		None
	//
	function teamMemberAdd ($team_id, $user_id)
	{
		// Update team_id for user
		$query = "UPDATE be_users SET team_id='$team_id' WHERE id='$user_id'";
		$this->db->query ($query);
	}

	//
	// Delete a team member
	//
	// INPUT:
	//		$user_id - ID of user to delete
	// OUTPUT:
	//		None
	//
	function teamMemberDelete ($user_id)
	{
		// Update team_id for user
		$query = "UPDATE be_users SET team_id=0 WHERE id='$user_id'";
		$this->db->query ($query);
	}

	//
	// Return list of team members
	//
	// INPUT:
	//		$team_id - ID of team
	// OUTPUT:
	//		Array of team members, in format of:
	//	Arrary(
	//		[0] =>	Array (
	//					`id`
	//					`username`
	//					`email`
	//					`active`
	//					`group`
	//					`last_visit`
	//					`created`
	//					`modified`
	//					`team_id`
	//				),
	//		[1] => Array (
	//				. . .
	//				)
	//		[2] => . . .
	//	)
	//
	function teamMemberList ($team_id)
	{
		// Update team_id for user
		$query = "SELECT * FROM be_users WHERE team_id='$team_id'";
		$result = $this->db->query ($query);
		if ($result->num_rows() == 0) {
			return 0;
		}
		return $result->result_array();
	}

	//
	// Get team managed by a user
	//
	// INPUT:
	//		$user_id - ID of user
	// OUTPUT:
	//	Arrary(
	//					`team_id`
	//					`team_name`
	//					`team_desc`
	//					`team_manager_user_id`
	//					`team_created_date`
	//	)
	//
	function getManagedTeam ($user_id)
	{
		// Update team_id for user
		$query = "SELECT * FROM teams WHERE team_manager_user_id='$user_id'";
		$result = $this->db->query ($query);
		if ($result->num_rows() == 0) {
			return 0;
		}
		$data = $result->result_array();
		$result->free_result();

		return $data[0];
	}

	//
	// Return list of subordinate of a user
	//
	// INPUT:
	//		$user_id - ID of user
	// OUTPUT:
	//		Array of subordinate, in format of:
	//	Arrary(
	//		[0] =>	Array (
	//					`id`
	//					`username`
	//					`email`
	//					`active`
	//					`group`
	//					`last_visit`
	//					`created`
	//					`modified`
	//					`team_id`
	//				),
	//		[1] => Array (
	//				. . .
	//				)
	//		[2] => . . .
	//	)
	//
	function subordinateList ($user_id)
	{
		$members = array();
		$team = $this->getManagedTeam ($user_id);
		if ($team == 0) {
			return 0;
		}
		return $this->teamMemberList ($team['team_id']);
	}

	//
	// Return list of subordinate of a user
	//
	// INPUT:
	//		$user_id - ID of user
	// OUTPUT:
	//		Array of subordinate, in format of:
	//	Arrary(
	//		[0] =>	Array (
	//					`id`
	//					`username`
	//					`team_name`
	//					`subordinate`
	//				),
	//		[1] => Array (
	//				. . .
	//				)
	//		[2] => . . .
	//	)
	//
	function memberTree ($user_id)
	{
		$user = $this->userDetails ($user_id);
		$data['id'] = $user['id'];
		$data['username'] = $user['username'];
		$data['team_name'] = '';
		$subordinate = $this->subordinateList ($user_id);
		if ($subordinate == 0) {
			$data['subordinate'] = 0;
			return $data;
		}
		$team = $this->teamDetails ($subordinate[0]['team_id']);
		$data['team_name'] = $team['team_name'];
		foreach ($subordinate as $member) {
			if ($member['id'] == $user_id) continue;
			$data['subordinate'][] = $this->memberTree ($member['id']);
		}
		return $data;
	}

}

?>