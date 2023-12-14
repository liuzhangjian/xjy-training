<div class="blank10"></div>
<div id="search-box">
    <?php echo form_open('home/search');?>
    <ul>
        <li><input name="identity" placeholder="请输入身份证号码" value="" /></li>
        <li><button type="submit" name="submit" value="submit">查询</button></li>
    </ul>
    <?php form_close();?>
</div>