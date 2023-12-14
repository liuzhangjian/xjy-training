<div id="tbox">
<div id="tbox_action"><span class="icon_back">返回</span></div>
</div>
<div id="main">
<div class="title"><?php echo $header;?></div>
<?php echo form_open_lang('period/admin/form','',array('id'=>$row->id));?>
<table class="tab_coll">
        <tr>
            <th>期数</th>
            <td><?php echo form_input('periodCount',$row->periodCount,'size="4"');?></td>
        </tr>
	    <tr>
	      <th>名称</th>
	      <td><?php echo form_input('name',$row->name);?></td>
	    </tr>
        <tr>
            <th>状态</th>
            <td>
                <label> <input type="radio" name="state" value="1" <?=$row->state || !$row->id ? 'checked' : '';?>> 有效</label>
                <label><input type="radio" name="state" value="0" <?=!$row->state && $row->id ? 'checked' : '';?>> 无效</label>
            </td>
        </tr>
</table>
<?php form_close();?>
<div class="buttons center">
	<button type="submit" class="positive" name="submit" value="submit">
		<?php print  $this->bep_assets->icon('disk');?>
		<?php print $this->lang->line('general_save')?>
	</button>
	<button type="button" class="negative button_cancel">
		<?php print $this->bep_assets->icon('cross');?>
		<?php print $this->lang->line('general_cancel')?>
	</button>
</div>
<?php
echo form_close();
?>
</div>