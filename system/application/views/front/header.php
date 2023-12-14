<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php print $this->bep_site->get_metatags(); ?>
	<title><?php echo $header.' | '.$this->webconfig->item('title');?></title>
	<meta name="description" content="<?php echo $this->webconfig->item('description');?>" /> 
<meta name="keywords" content="<?php echo $this->webconfig->item('keywords');?>" /> 
	<?php print $this->bep_site->get_variables()?>
	<?php print $this->bep_assets->get_header_assets();?>
	<?php print $this->bep_site->get_js_blocks()?>
</head>

<body>
<div id="container">     
    <!--Header--> 
    <div id="header">
    	<div id="logo">人员信息查询</div>
        <!--Nav--> 
    </div>
