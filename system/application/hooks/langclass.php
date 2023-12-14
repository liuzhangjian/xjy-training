<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class LangClass extends Controller {  	  
	    function set_lang() {    
	        $getLang = $this->uri->segment(1);
			$langs = $this->config->item('langs');
			if(!in_array($getLang, array_keys($langs))) {
				$OSLang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
				$isEnOS = (stristr($OSLang,'zh-cn') || stristr($OSLang,'zh-tw') || stristr($OSLang,'zh-hk') || stristr($OSLang,'zh-sg')) ? false : true;
				$getLang = $isEnOS ? 'en' : reset(array_keys($langs));
			}
			//$getLang = 'cn';
			$this->config->set_item('lang',$langs[$getLang]['key']);
			$this->lang->load('front', $getLang);
			$this->config->set_item('dlang',$getLang); 
	    }
	  
	}  
?>