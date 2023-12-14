<div class="blank10"></div>
<div id="search-box">
    <?php if(!isset($result)){ ?>
    <h3>
        查询身份证号：<span class="red"><?=$identity;?></span> 暂无信息！
    </h3>
    <?php }else{ ?>
    <ul>
        <h3>
            查询结果：
        </h3>
        <li>姓名：<?=$result->name;?></li>
        <li>身份证号：<?=$result->identity;?></li>
        <li>公司：<?=$result->company;?></li>
        <li>地址：<?=$result->address;?></li>
        <li>培训期数：<?=$period ? $period->periodCount : '';?></li>
        <li>证书：<?php if($result->certificate) echo '<a href="'.base_url().'uploads/'.$result->certificate.'" target="_blank">查看</a>'; ?></li>
    </ul>
    <?php } ?>
    <div class="re-search"><?= anchor('home','再次查询 &#187;')?></div>
</div>