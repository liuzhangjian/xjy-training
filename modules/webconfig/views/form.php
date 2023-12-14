<div id="main" style="margin-top:12px;">
<?php echo form_open_lang('webconfig/admin/form','',array('id'=>$webconfig->id));?>
<div class="title"><?php echo $header; ?></div>
<table class="tab_coll">
	    <tr>
	      <th>系统名称</th>
	      <td><?php echo form_input('title',$webconfig->title,'class="width50"');?></td>
	    </tr>
		<tr>
	      <th>关键字</th>
	      <td><?php echo form_input('keywords',$webconfig->keywords,'class="width50"');?></td>
	    </tr>
		<tr>
	      <th>系统描述</th>
	     	<td><?php echo form_input('description',$webconfig->description,'class="width80"');?></td>
        </tr>
		<tr>
	      <th>版权信息</th>
	     	<td><?php echo form_textarea('copyright',$webconfig->copyright,'class="editor width100"');?></td>
        </tr>
</table>
<?php form_close();?>
<div class="buttons center">
	<button type="submit" class="positive" name="submit" value="submit">
		<?php print  $this->bep_assets->icon('disk');?>
		<?php print $this->lang->line('general_save')?>
	</button>
</div>
<?php
echo form_close();
?>
</div>