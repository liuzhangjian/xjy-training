<div id="tbox">
	<div id="tbox_action"><?php echo anchor('staff/admin/form',$this->lang->line('staff_create'),'class="icon_add"');?></div>
</div>
<div id="main">
<table class="display" id="list_dataTables">
<thead>
		<tr>
		  <th>ID</th>
		  <th>姓名</th>
		  <th>身份证号</th>
          <th>公司</th>
		  <th>培训期数</th>
		  <th>创建时间</th>
            <th>状态</th>
		  <th>操作</th>
		</tr>
</thead>
<tbody>
<?php foreach ($list as $a) {?>
	<tr>
		<td><?php echo $a->id;?></td>
		<td><?php echo $a->name;?></td>
        <td><?php echo $a->identity;?></td>
        <td><?php echo $a->company;?></td>
		<td><?php echo $a->periodCount;?></td>
		<td><?php echo $a->createTime;?></td>
        <td><?php echo $a->state == 1 ? "有效" : "无效";?></td>
		<td>
		<?php 
		echo '&nbsp;&nbsp;'.anchor_img('staff/admin/form/'.$a->id,'assets/images/edit.png','title="编辑"').'&nbsp;&nbsp;';;
        if($a->state){
            echo anchor_img('staff/admin/invalid/'.$a->id,'assets/images/delete.png','title="设无效" class="invalid"');
        }else{
            echo anchor_img('staff/admin/valid/'.$a->id,'assets/icons/tick.png','title="设有效"');
        }
		?>
		</td>
	</tr>
<?php }?>
</tbody>
</table>
</div>