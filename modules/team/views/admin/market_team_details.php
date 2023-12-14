<div id="main">
<fieldset>
<legend>业务小组详细信息</legend>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tab_coll_blue">
<tr>
  <th><?php echo $this->lang->line('team_name');?>:</th>
  <td> <?php echo  $team['team_name'];?></td>
  <th><?php echo $this->lang->line('team_manager');?>:</th>
  <td><?php echo $team['team_manager_name'];?>  </td>
  </tr>
  <tr>
  <th><?php echo $this->lang->line('team_desc');?>:</th>
  <td colspan="3"> <?php echo  $team['team_desc'];?></td>
  </tr>
  <tr>
  <th><?php echo $this->lang->line('team_user');?>:</th>
  <td colspan="3">
  <div id="team_user_list" style="margin:5px auto;">
	<ul>
		<li class="open">
<?php 
	echo $team['team_manager_name'];
	echo "<ul>";
	function showMember ($member) {
		if ($member['subordinate'] == 0) {
			echo "<li>".$member['username']."</li>";
			return;
		}
		echo "<li>".$member['username']." (".$member['team_name'].")";
		echo "<ul>";
		foreach ($member['subordinate'] as $user) {
			showMember ($user);
		}
		echo "</ul>";
		echo "</li>";
	}
	if ($members['subordinate'] != 0) {
	foreach ($members['subordinate'] as $member) {
		showMember ($member);
	}
	}
	echo "</ul>";

?>
		</li>
	</ul>
</div></td>
</tr>
</table>
</fieldset>
</div>
<div class="text_center"><input type="button" name='closeWindow' value="关闭窗口" onclick="javascript: window.close()" ></div>
