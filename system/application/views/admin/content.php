<div class="content-title"><?=$header;?></div>
<div id="breadcrumb"><?php print $this->bep_site->get_breadcrumb();?></div>
<div class="clear"></div>

<div id="content-box">
    <div id="content">
        <a name="top"></a>
        <?php print displayStatus();?>
        <?php print (isset($content)) ? $content : NULL; ?>
        <?php
        if( isset($page)){
            if( isset($module)){
                $this->load->module_view($module,$page);
            } else {
                $this->load->view($page);
            }}
        ?>
        <br style="clear: both" />
    </div>
</div>