<div id="tbox">
	<div id="tbox_action"><span class="icon_back">返回</span></div>
	<div id="breadcrumb">位置：<?php echo anchor('admin/','首页').' > '.anchor('team/admin/marketingTeamlist/',$this->lang->line('marketing_team_list')).' > '.$this->lang->line('market_team_edit')?></div>
</div>
<div id="main">

<?php
echo form_open('team/admin/marketingTeamForm',array('name' => 'team_create','class'=>'auto_select_form', 'id' => 'team_create_form'));
if(isset($team['team_id'])){
	echo form_hidden('team_id',$team['team_id']);
}
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="table_coll colorizeNotHover">
	    <tr>
	      <td class="td_right"><?php echo $this->lang->line('market_team_name');?>:<span class="label_required"></td>
	      <td class="td_left"><?php
					if(isset($team['team_name'])){
						echo  form_input(array('name'=>'team_name','value'=>$team['team_name'],'id'=>'project_title'));
					}else{
						echo  form_input(array('name'=>'team_name','value'=>'','id'=>'project_title'));
					}
				?></td>
          <td align="center" valign="middle">&nbsp;</td>
	    </tr>
	    <tr>
	      <td class="td_right"><?php echo $this->lang->line('market_team_desc');?></td>
	     	<td class="td_left"><?php
					if(isset($team['team_desc'])){
						echo  form_textarea(array('name'=>'team_desc','rows'=>'8','value'=>$team['team_desc'],'style' => 'width:100%','id'=>'team_desc','class'=>'wysiwyg'));
					}else{
						echo  form_textarea(array('name'=>'team_desc','rows'=>'8','style' => 'width:30%','id'=>'team_desc','class'=>'wysiwyg'));
					}
				?></td>
            <td align="center" valign="middle">&nbsp;</td>
	    </tr>
		<tr>
		  <td class="td_right"><?php echo $this->lang->line('market_team_manager');?></td>
		  <td class="td_left"><?php  
					echo $team['team_manager_name'];
					echo '<input type="hidden" name="team_manager_user_id" id="team_manager_user_id" value="'.$team['team_manager_user_id'].'" />';
			?></td>
		  <td align="center" valign="middle">&nbsp;</td>
    </tr>
		<tr>
		  <td class="td_right"><?php echo $this->lang->line('market_team_user');?></td>
		  <td class="td_left">
		  
		  <table>
      <tr>
        <th align="center" style="text-align:center;"><?php echo $this->lang->line('alternative_user');?></th>
		  <th width="50">&nbsp;</th><th style="text-align:center;"><?php echo $this->lang->line('selected_user');?></th>
	  </tr>
      <tr>
        <td>
<select name="alternativeUser[]" class="alternativeEl" id="alternativeUser" multiple="multiple" size="16" style="width:150px;">
<?php
  if(is_array($userList) AND count($userList) > 0){
		foreach($userList as $v){
			echo '<option value="'.$v['id'].'">'.$v['username'].'</option>';
		}
	echo form_multiselect('alternativeUser[]', $alternativeUser,'','size="16" class="alternativeEl" style="width:150px;" id="alternativeUser"');
	}
  ?>
</select>
</td>
		  <td width="45"><div class="arrowright2"></div><div class="arrowright"></div><div class="arrowleft"></div><div class="arrowleft2"></div></td>
		  <td valign="top">
	<select name="selectedUser[]" class="selectedEl" id="selectedUser" multiple="multiple" size="16" style="width:150px;">
	<?php 
	if(is_array($teamUserList) AND count($teamUserList) > 0){
		foreach($teamUserList as $row){
			echo '<option value="'.$row['id'].'">'.$row['username'].'</option>';
		}
	}	
	?>
	</select>
		
	<select name="select_recycle" id="select_recycle" multiple="multiple" size="16" style="display:none;"></select>
</td>
	  </tr>
    </table>
		  
		  </td>
		  <td align="center" valign="middle">&nbsp;</td>
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
<?php
			 
			  echo "<script type='text/javascript' language='javascript'>\n";
					echo "var userList=".json_encode($userList).";\n";
					echo '</script>';
?>
