<div id="tbox">
	<div id="tbox_action"><span class="icon_back">返回</span></div>
	<div id="breadcrumb">位置：<?php echo anchor('admin/','首页').' > '.$header;?></div>
</div>
<div id="main">

<?php
echo form_open('team/admin/changePassword');
echo form_hidden('user_id',$user['id']);
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_coll colorizeNotHover">
	    <tr>
	      <td class="td_right">用户名</td>
	      <td class="td_left"><?php echo $user['username']; ?></td>
	    </tr>
	    <tr>
	      <td class="td_right">用户邮箱</td>
	      <td class="td_left"><?php echo $user['email']; ?></td>
	    </tr>
	    <tr>
	      <td class="td_right">原密码</td>
	      <td class="td_left">
		 	<input type="password" name="original_password" size="20" />
		  </td>
	    </tr>
		<tr>
	      <td class="td_right">新密码</td>
	      <td class="td_left">
		 	<input type="password" name="password" size="20" />
		  </td>
	    </tr>
		
		<tr>
	      <td class="td_right">确认新密码</td>
	      <td class="td_left">
		 	<input type="password" name="confirm_password" size="20" />
		  </td>
	    </tr>
</table>
<div class="buttons center">
	<button type="submit" class="positive" name="submit" value="submit">
		<?php echo  $this->bep_assets->icon('disk');?>
		<?php print $this->lang->line('general_save'); ?>
	</button>
	<a href="<?php echo  site_url('team/admin')?>" class="negative">
		<?php echo  $this->bep_assets->icon('cross');?>
		<?php echo $this->lang->line('general_cancel')?>
	</a>
</div>
<?php
echo form_close();
?>
</div>
