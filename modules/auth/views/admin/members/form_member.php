<div id="generatePasswordWindow">
	<table>
		<tr><th width="50%"><?php print $this->lang->line('userlib_generate_password'); ?></th><th class="right"><a href="javascript:void(0);" id="gpCloseWindow"><?php print $this->bep_assets->icon('cross') ?></a></th></tr>
		<tr><td rowspan="3"><?php print $this->lang->line('userlib_password'); ?>:<br/>&nbsp;&nbsp;&nbsp;<b id="gpPassword">PASSWORD</b></td><td class="right"><?php print $this->lang->line('general_uppercase'); ?> <?php print form_checkbox('uppercase','1',TRUE); ?></td></tr>
		<tr><td class="right"><?php print $this->lang->line('general_numeric'); ?> <?php print form_checkbox('numeric','1',TRUE); ?></td></tr>
		<tr><td class="right"><?php print $this->lang->line('general_symbols'); ?> <?php print form_checkbox('symbols','1',FALSE); ?></td></tr>
		<tr><td colspan="2"><a href="javascript:void(0);" class="icon_arrow_refresh" id="gpGenerateNew"><?php print $this->lang->line('general_generate'); ?></a></td></tr>
		<tr><td><a href="javascript:void(0);" class="icon_tick" id="gpApply"><?php print $this->lang->line('general_apply'); ?></a></td><td class="right"><?php print $this->lang->line('general_length'); ?> <input type="text" name="length" value="12" maxlength="2" size="4" /></td></tr>
	</table>
</div>
<div id="tbox">
	<div id="tbox_action"><span class="icon_back">返回</span></div>
</div>
<div id="main">
<div class="title"><?php echo $header; ?></div>
<?php print form_open('auth/admin/members/form/'.$this->validation->id,array('class'=>'horizontal'))?>
	<table class="tab_coll">
		 <tr>
	      <th>用户名</th>
	      <td><?php print form_input('username',$this->validation->username,'id="username" class="text"')?> <span class="red">*</span> <span class="gray">请输入用户名</span></td>
	    </tr>
	    <tr>
	      <th>电子邮件</th>
	      <td><?php print form_input('email',$this->validation->email,'id="email" class="text"')?></td>
	    </tr>
		<tr>
		  <th>密码</th>
		  <td>
		  		<?php print form_password('password','','id="password" class="text"')?>
		  		<em><?php print $this->lang->line('userlib_password_info')?></em>
			</td>
		</tr>
		<tr>
		  <th>确认密码</th>
		  <td><?php print form_password('confirm_password','','id="confirm_password" class="text"')?></td>
		</tr>
		<tr>
		  <th>用户组</th>
		  <td><?php print form_dropdown('group',$groups,$this->validation->group,'id="group" size="10" style="width:20.3em;"')?></td>
		</tr>
	</table>
	<div class="buttons center" style="width:320px;">
		<button type="submit" class="positive" name="submit" value="submit">
        	<?php print  $this->bep_assets->icon('disk');?>
        	<?php print $this->lang->line('general_save')?>
        </button>

        <a href="<?php print  site_url('auth/admin/members')?>" class="negative">
        	<?php print  $this->bep_assets->icon('cross');?>
        	<?php print $this->lang->line('general_cancel')?>
        </a>

        <a href="javascript:void(0);" id="generate_password">
        	<?php print  $this->bep_assets->icon('key');?>
        	<?php print $this->lang->line('userlib_generate_password'); ?>
        </a>
	</div>

<div class="clear"></div>
    <!--
<div class="title clear" style="margin-top:20px;"><?php print $this->lang->line('userlib_user_profile')?></div>
<?php
    if( ! $this->preference->item('allow_user_profiles')):
        print "<p>".$this->lang->line('userlib_profile_disabled')."</p>";
    else:
?>
	<div class="submit">
	    <div class="buttons center">
	     <button type="submit" class="positive" name="submit" value="submit">
        	<?php print  $this->bep_assets->icon('disk');?>
        	<?php print $this->lang->line('general_save')?>
        </button>

        <a href="<?php print  site_url('auth/admin/members')?>" class="negative">
        	<?php print  $this->bep_assets->icon('cross');?>
        	<?php print $this->lang->line('general_cancel')?>
        </a>
	    </div>
	</div>
<?php endif;?>
<?php print form_close()?>
-->
</div>