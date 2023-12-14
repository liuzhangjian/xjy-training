<div id="tbox">
	<div id="tbox_action"><?php echo anchor('period/admin/form',$this->lang->line('period_create'),'class="icon_add"');?></div>
</div>
<div id="main">
<table class="display" id="list_dataTables">
<thead>
		<tr>
		  <th>ID</th>
            <th>期数</th>
		  <th>名称</th>
		  <th>创建时间</th>
            <th>状态</th>
		  <th>操作</th>
		</tr>
</thead>
<tbody>
<?php foreach ($data as $c) {?>
	<tr>
		<td><?php echo $c->id;?></td>
        <td><?php echo $c->periodCount;?></td>
        <td><?php echo $c->name;?></td>
		<td><?php echo $c->createTime ?: '&nbsp;';?></td>
        <td><?php echo $c->state == 1 ? "有效" : "无效";?></td>
		<td>
		<?php 
		echo '&nbsp;&nbsp;'.anchor_img('period/admin/form/'.$c->id,'assets/images/edit.png','title="编辑"').'&nbsp;&nbsp;';
		if($c->state){
            echo anchor_img('period/admin/invalid/'.$c->id,'assets/images/delete.png','title="设无效" class="invalid"');
        }else{
            echo anchor_img('period/admin/valid/'.$c->id,'assets/icons/tick.png','title="设有效"');
        }
		?>
		</td>
	</tr>
<?php }?>
</tbody>
</table>
</div>