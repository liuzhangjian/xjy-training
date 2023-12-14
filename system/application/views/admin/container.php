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
<style>
html,body { margin: 0px; overflow:auto; background: #ffffff }

#wrapper {width: 100%;overflow:auto;}
</style>
<body>

<div id="wrapper">
<?php
$this->load->view($this->config->item('backendpro_template_admin') . 'content');
?>
<?php print $this->bep_assets->get_footer_assets();?>
</body>
</html>