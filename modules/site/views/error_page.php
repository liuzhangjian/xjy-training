<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div id="error">
	<h1><?php echo $header; ?></h1>
	<div class="error_msg">
		<p><?php echo $message?><p>
		<p><span id="jump_num"></span><?php echo $jump; ?><p>
		<p><?php echo anchor('',$click); ?><p>
	</div>
</div>
