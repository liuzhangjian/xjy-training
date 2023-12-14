<div id="tbox">
	<div id="tbox_action"><span class="icon_back">返回</span></div>
</div>
<div id="main">
<div class="title"><?php echo $header;?></div>
<?php echo form_open('staff/admin/form','',array('id'=>$row->id));?>
<table class="tab_coll">
	    <tr>
	      <th>名称</th>
	      <td><?php echo form_input('name',$row->name);?></td>
	    </tr>
		<tr>
	      <th>身份证号</th>
	      <td><?php echo form_input('identity',$row->identity,'size="30"');?></td>
	    </tr>
	    <tr>
	      <th>公司</th>
	      <td><?php echo form_input('company',$row->company,'size="50"');?></td>
	    </tr>	   
		<tr>
	      <th>地址</th>
            <td><?php echo form_input('address',$row->address,'size="50"');?></td>
	    </tr>
		<tr>
	      <th>培训期数</th>
	      <td>
		  	<?php 
				$options = array(0=>'请选择');
				foreach($periodList as $k =>  $v){
					$options[$v->id] = $v->periodCount;
				}
				echo form_dropdown('periodId',$options,$row->periodId);
			?>
		  </td>
	    </tr>
		<tr>
			<th>证书</th>
			<td><?php echo form_input('certificate',$row->certificate,'class="width300"');?><input type="file" name="fileToUpload" size="30" id="fileToUpload" /><input type="button" value="上传" class="upfile" />
			<span class="message"> <?php if($row->certificate) echo '<a href="'.base_url().'uploads/'.$row->certificate.'" target="_blank">查看</a>'; ?></span></td>
	    </tr>
    <tr>
        <th>状态</th>
        <td>
            <label> <input type="radio" name="state" value="1" <?=$row->state || !$row->id ? 'checked' : '';?>> 有效</label>
            <label><input type="radio" name="state" value="0" <?=!$row->state && $row->id ? 'checked' : '';?>> 无效</label>
        </td>
    </tr>
	    <tr>
	      <th>备注</th>
	     	<td><?php echo form_textarea('summary',$row->summary,'class="area"');?></td>
        </tr>

</table>
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