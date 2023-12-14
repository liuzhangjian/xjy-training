<?php
$this->load->view($this->config->item('backendpro_template_admin') . 'header');
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="mainTab">
  <tr>
  <td style="vertical-align:top;width:192px;">
	<?php print $this->load->view($this->config->item('backendpro_template_admin') . 'menu');?>
 </td>
 <td style="vertical-align: top;" id="mainTb">
 <iframe scrolling="auto" height="100%" width="100%" border="0" frameborder="0" src="<?php echo site_url("admin/home/info");?>" name="rightFrame" id="rightFrame" title="rightFrame"></iframe></td>
</tr>
</table>
<?php $this->load->view($this->config->item('backendpro_template_admin') . 'footer');?>