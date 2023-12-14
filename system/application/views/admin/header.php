<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php print $this->bep_site->get_metatags();?>
	<title><?php print $header.' | '.$this->preference->item('site_name');?></title>
	<?php print $this->bep_site->get_variables();?>
	<?php print $this->bep_assets->get_header_assets();?>
	<link  href="<?php echo base_url();?>assets/css/bep_admin_layout.css" rel="stylesheet" type="text/css" /> 
	<?php print $this->bep_site->get_js_blocks();?>
</head>
<body style="background-color: #EEF2FB;">

<div id="wrapper">
    <div id="header">
        <div id="site"><h3 class="site-name"><?php echo $this->preference->item('site_name')?></h3></div>
        <div id="info">
            您好：<?php echo $this->data['username'];?>，欢迎登录！
			<?php echo anchor('','网站主页', 'target="_blank"');?> | 
			<?php echo anchor('admin','系统主页');?> | 
			<?php echo anchor('auth/admin/members/form/'.$this->data['user_id'],'修改密码','target="rightFrame"');?> |
			&nbsp;<?php echo  anchor('auth/logout',$this->lang->line('userlib_logout'),array('class'=>'icon_key_go'))?>
        </div>
    </div>