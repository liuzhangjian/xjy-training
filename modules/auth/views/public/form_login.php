<?php print form_open('auth/login',array('class'=>'horizontal'))?>
<table width="100%" height="532" border="0" cellpadding="0" cellspacing="0" class="login_bg">
      <tr>
        <td width="49%" align="right"><table width="91%" height="532" border="0" cellpadding="0" cellspacing="0" class="login_bg2">
            <tr>
              <td height="138" align="center" valign="middle" id="login_site_name"><?php echo $this->preference->item('site_name');?></td>
            </tr>
            
        </table></td>
        <td width="1%" >&nbsp;</td>
        <td width="50%" align="center" valign="bottom">
		<div style="padding-right:2px;"><?php print displayStatus();?></div>
		<table width="100%" height="59" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td>&nbsp;</td>
              <td height="21" align="left" valign="top"><table cellspacing="0" cellpadding="0" width="100%" border="0" id="table211" height="328">
                <tr>
                  <td height="164" colspan="2" align="left">
                      <table width="400" height="108" border="0" align="left" cellpadding="0" cellspacing="0" id="table212">
                        <tr>
                          <td width="90" height="38" align="right" class="top_hui_text"><span class="login_txt"><?php print $login_field?>：&nbsp;</span></td>
                          <td height="38" align="left" class="top_hui_text"><input type="text" name="login_field" id="login_field" class="text" value="<?php print $this->validation->login_field?>"/>
                          </td>
                        </tr>
                        <tr>
                          <td width="60" height="35" align="right" class="top_hui_text"><span class="login_txt"> <?php print $this->lang->line('userlib_password')?>：&nbsp;</span></td>
                          <td height="35" align="left" class="top_hui_text"><input type="password" name="password" id="password" class="text" />
                              </td>
                        </tr>
                        <?php
							// Only display captcha if needed
							if($this->preference->item('use_login_captcha')):?>
                        <tr>
                          <td width="60" height="35" align="right" class="top_hui_text"><?php print $this->lang->line('userlib_captcha')?></td>
                          <td height="35" align="left" class="top_hui_text"><?php print $captcha?></td>
                        </tr>
                        <?php endif;?>
                        <tr>
                          <td width="60" height="35" >&nbsp;</td>
                          <td height="35" align="left" ><div class="buttons">
                              <button type="submit" class="positive" name="submit" value="submit"> <?php print $this->bep_assets->icon('key') ?> <?php print $this->lang->line('userlib_login')?> </button>
                               <a href="<?php print site_url('')?>" target="_blank"> <?php print $this->bep_assets->icon('house') ?> 网站主页 </a>
                          </div></td>
                        </tr>
                      </table>
                    <br />
                  </td>
                </tr>
                <tr>
                  <td width="433" height="164" align="left" valign="bottom"><?php echo img('assets/images/login-wel.gif');?></td>
                  <td width="57" align="left" valign="bottom">&nbsp;</td>
                </tr>
              </table></td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
	<?php print form_close()?>