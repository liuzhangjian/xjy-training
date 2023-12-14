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
 * Public_Controller
 *
 * Extends the Site_Controller class so I can declare special Public controllers
 *
 * @package        BackendPro
 * @subpackage     Controllers
 */
class Front_Controller extends Site_Controller
{
	function Front_Controller()
	{
		parent::Site_Controller();
		
		$this->bep_site->set_crumb($this->lang->line('web_home'),'');
		
		// Set container variable
		$this->_container = $this->config->item('backendpro_template_front') . "container.php";
		$this->_popup_container = $this->config->item('backendpro_template_front') . "popup.php";
		// Set public meta tags
		//$this->bep_site->set_metatag('name','content',TRUE/FALSE);

		// Load the PUBLIC asset group
		$this->bep_assets->load_asset_group('FRONT');
		
		log_message('debug','BackendPro : Public_Controller class loaded');
		$this->load->helper(array('form', 'url'));
		$modelArr = array(
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
		$this->load->module_model('webconfig','Mwebconfig','webconfig');

	}
	
	function _pages($base_url,$total_rows,$per_page = 20,$uri_segment = 4,$num_links = 5){
		$this->load->library('pagination');
		$config['uri_segment'] = $uri_segment;
		$config['base_url'] = site_url($this->config->item('dlang').'/'.$base_url);
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page; 
		$config['num_links'] = $num_links;
		$config['last_link'] = $this->lang->line('last_page');
		$config['first_link'] = $this->lang->line('home_page');
		$config['next_link'] = $this->lang->line('next_page');
		$config['prev_link'] = $this->lang->line('prev_page');
		$this->pagination->initialize($config); 
		return  $this->pagination->create_links();
	}
}

/* End of Public_controller.php */
/* Location: ./system/application/libraries/Public_controller.php */