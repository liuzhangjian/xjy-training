<div id="tbox">
	<div id="breadcrumb">位置：<?php echo anchor('admin/','首页').' > '.anchor('team/admin/teamList/',$this->lang->line('team_list'))?></div>
</div>
<div id="main">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="display" id="list_dataTables">
<thead>
  <tr>
    <th>ID</th>
    <th>部门名称</th>
    <th>部门经理</th>
	<th>操作</th>
    </tr>
  </thead>
  <tbody>
 <?php
 if(is_array($teamList)){
foreach($teamList as $row){
	echo '<tr>'.
			'<td>'.$row['team_id'].'</td>'.
			'<td>'.$row['team_name'].'</td>'.
			'<td>'.$row['username'].'</td>'.
			'<td>';
			$attr = array(
			'title'=>"详细",
            'onclick'=>"javascript:wopen('".site_url("team/admin/teamDetails/".$row['team_id'])."', '业务小组详情', 750, 550);return false;"
         );
	echo 	anchor_img("#" ,'assets/images/details.png', $attr);
	echo 	'</td>'.
			'</tr>';
	}
	}
?>
</tbody></table>
</div>