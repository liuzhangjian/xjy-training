<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('error_page')){
  function error_page($popup_flag = false) {
	$CI =& get_instance();
	$data['header'] = $CI->lang->line('404_error');
	$data['page'] = "error_page";
    $data['module'] = "site";
	$data['message'] = $CI->lang->line('404_notice');
	$data['jump'] = $CI->lang->line('404_jump');
	$data['click'] = $CI->lang->line('404_click');
    $container = $popup_flag ? $CI->_container : $CI->_popup_container;
	$CI->load->view($container,$data); 
  }
}