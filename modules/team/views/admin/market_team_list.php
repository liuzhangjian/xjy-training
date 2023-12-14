<div id="tbox">
	<div id="breadcrumb">位置：<?php echo anchor('admin/','首页').' > '.anchor('team/admin/marketingTeamlist/',$this->lang->line('marketing_team_list'))?></div>
</div>
<div id="main">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="display" id="list_dataTables">
<thead>
  <tr>
    <th>ID</th>
    <th>业务小组名</th>
    <th>业务小组经理</th>
	<th>小组人数 </th>
	<th>操作</th>
    </tr>
  </thead>
  <tbody>
 <?php
 if(is_array($teamList)){
foreach($teamList as $k=>$row){
	echo '<tr>'.
			'<td>'.($k+1).'</td>'.
			'<td>'.$row['team_name'].'</td>'.
			'<td>'.$row['username'].'</td>'.
		    '<td>'.$row['member_count'].'</td>'.
	        '<td>';
	   $attr = array(
			'title'=>"详细",
            'onclick'=>"javascript:wopen('".site_url("team/admin/marketTeamDetails/".$row['team_id'])."', '业务小组详情', 750, 550);return false;"
         );
		echo anchor_img("#" ,'assets/images/details.png', $attr);
		echo '&nbsp;&nbsp;'.anchor_img('team/admin/marketingTeamForm/'.$row['team_id'],'assets/images/edit.png','title="编辑"');
		echo '&nbsp;&nbsp;'.anchor_img('team/admin/marketingTeamDelete/'.$row['team_id'],'assets/images/delete.png','title="删除" class="delete"');
		echo '</td></tr>';
	}
	}
?>
</tbody></table>
</div>