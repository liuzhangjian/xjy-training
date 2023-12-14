<!doctype HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="../assets/css/reset.css" />
    
    <!--[if IE 6]>
    <link rel="stylesheet" type="text/css" href="../assets/css/reset[ie_6].css" />
    <![endif]-->
    
    <!--[if gte IE 6]>
    <link rel="stylesheet" type="text/css" href="../assets/css/reset[gte_ie_6].css" />
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="../assets/css/typography.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/bep_front_layout.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/forms.css" />
    <title>Installation</title>

    <style>
    <!--
    	ul { list-style-type: none; margin: 0; }
    	ul.results li.fail { background: url(../assets/icons/cross.png) no-repeat; padding-left: 25px;}
    	ul.results li.done { background: url(../assets/icons/tick.png) no-repeat; padding-left: 25px;}
    -->
    </style>
</head>

<body>
<div id="wrapper">
     <div id="header">
        <h1>系统安装成功</h1>
    </div>

    <div id="content">
        <a name="top"></a>
	    <?php include_once("RUN.php");?>

	    <h2>
	    <?php
	    	// Output the overall install status
	    	if ($install_status)
	    		print "<font color='green'>恭喜你，安装成功</font>";
	    	else
	    		print "<font color='red'>安装失败</font>";
	    ?>
	    </h2>

	    <ul class="results">
	    <?php
	    	foreach($features as $feature)
	    	{
	    		$fe_status = ($feature->status) ? "done" : "fail";
	    		print "<li class='" . $fe_status . "'>" . $feature->name;
	    		print "<ul>";
	    		foreach($feature->components as $component)
	    		{
	    			$cp_status = ($component->status) ? "done" : "fail";
	    			$cp_error = ($component->error != NULL) ? " - <b>" . $component->error . "</b>" : "";
	    			print "<li class='" . $cp_status . "'>" . $component->name . $cp_error . "</li>";
	    		}
	    		print "</ul></li>";
	    	}
	    ?>
	    </ul>

	    <?php if($install_status):?>
	    <p>您的系统已经成功安装，为了您的系统安全，请删除/安装目录install。</p>

    	<p><a href="../index.php">访问网站首页</a>&nbsp;|&nbsp;<a href="../index.php?/auth">进入系统管理</a> </p>
    	<p><a href="install.log">日志文件</a> 记录了安装的详细信息</p>
	    <?php else:?>
	    <p>软件安装时产生错误. 请检查以上安装的细节，以解决问题，然后再尝试。 点击
	    <a href="install.log">日志文件 </a> 查看具体的错误.</p>
	    <?php endif;?>
    </div>

    <div id="footer">
        &copy; Copyright 2011 - 钊诚科技 - All rights Reserved
    </div>
</div>

</body>
</html>