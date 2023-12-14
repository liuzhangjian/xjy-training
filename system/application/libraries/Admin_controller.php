<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * BackendPro
 *
 * A website backend system for developers for PHP 4.3.2 or newer
 *
 * @package         BackendPro
 * @author          Adam Price
 * @copyright       Copyright (c) 2008
 * @license         http://www.gnu.org/licenses/lgpl.html
 * @link            http://www.kaydoo.co.uk/projects/backendpro
 * @filesource
 */

// ---------------------------------------------------------------------------

/**
 * Admin_Controller
 *
 * Extends the Site_Controller class so I can declare special Admin controllers
 *
 * @package       	BackendPro
 * @subpackage      Controllers
 */
class Admin_Controller extends Site_Controller
{
	function Admin_Controller()
	{
		parent::Site_Controller();

		// Set base crumb
		$this->bep_site->set_crumb($this->lang->line('backendpro_control_panel'),'admin/home/info');

		// Set container variable
		$this->_container = $this->config->item('backendpro_template_admin') . "container.php";

		// Set Pop container variable
		$this->_popup_container = $this->config->item('backendpro_template_admin') . "popup.php";

		// Make sure user is logged in
		check('Control Panel');

		// Check to see if the install path still exists
		if( is_dir('install'))
		{
			flashMsg('warning',$this->lang->line('backendpro_remove_install'));
		}

		// Set private meta tags
		//$this->bep_site->set_metatag('name','content',TRUE/FALSE);
		$this->bep_site->set_metatag('robots','nofollow, noindex');
		$this->bep_site->set_metatag('pragma','nocache',TRUE);

		// Load the ADMIN asset group
		$this->bep_assets->load_asset_group('ADMIN');

		log_message('debug','BackendPro : Admin_Controller class loaded');
		
		
		$modelArr = array(
			'webconfig' => 'Mwebconfig',
			'team' => 'MTeam',
            'period' => array('PeriodModel'),
            'staff' => array('PeriodModel','StaffModel'),
		);
		foreach($modelArr as $k => $m){
			if(is_array($m)){
				foreach($m as $v){
					$this->load->module_model ($k, $v);
				}
			} else{
				$this->load->module_model ($k, $m);
			}			
		}
		$this->data['user_id'] = $this->MTeam->getCurrentUserId();
		$userDetails = $this->MTeam->userDetails($this->data['user_id']);
		if (is_array($userDetails)) {
			$this->data['username'] = $userDetails['username'];
		} else {
			$this->data['username'] = "";
			$this->data['is_admin'] = false;
			$this->data['user_group'] = 0;
		}
	}
}

/* End of Admin_controller.php */
/* Location: ./system/application/libraries/Admin_controller.php */