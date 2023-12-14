<fieldset>
<?php
if ($news) {
?>
<legend><?php echo $news->name;?></legend>
<table class="tab_coll_blue">
	    <tr>
	      <th>内容</th>
		  <td><?php echo $news->content;?></td>
	    </tr>	
</table>
<?php } else { ?>
   <div>错误： 内容不存在！</div>
<?php }?>
</fieldset>
<div class="text_center"><input type="button" name='closeWindow' value="关闭窗口"></div>