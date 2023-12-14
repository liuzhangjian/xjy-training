
<!--
When creating a new menu item on the top-most level
Please ensure that you assign the LI a unique ID

Examples can be seen below for menu_bep_system
-->
<ul id="menu">
	<?php if(check('System',NULL,FALSE)):?>
	<li><h5 class="home"><?php print $this->lang->line('backendpro_system')?></h5>
		<ul>
			<li><?php echo anchor('admin/home/info',$this->lang->line('over_view'),'target="rightFrame"')?></li>
			<?php if(check('Members',NULL,FALSE)):?>
			<li><?php print anchor('auth/admin/members',$this->lang->line('backendpro_members'),'target="rightFrame"')?></li>
			<?php endif;?>
			<li><?php print anchor('webconfig/admin/form',$this->lang->line('webconfig'),'target="rightFrame"')?></li>
		</ul>
	</li>
	<?php endif;?>

    <li><h5 class="/news/">培训期数</h5>
        <ul>
            <li><?php echo anchor('period/admin/',$this->lang->line('period_list'),'target="rightFrame"')?></li>
            <li><?php echo anchor('period/admin/form',$this->lang->line('period_create'),'target="rightFrame"')?></li>
        </ul>
    </li>

    <li><h5 class="/news/">员工管理</h5>
        <ul>
            <li><?php echo anchor('staff/admin/',$this->lang->line('staff_list'),'target="rightFrame"')?></li>
            <li><?php echo anchor('staff/admin/form',$this->lang->line('staff_create'),'target="rightFrame"')?></li>
        </ul>
    </li>

</ul>