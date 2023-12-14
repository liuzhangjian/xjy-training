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
    <title>安装过程</title>
</head>

<body>
<div id="wrapper">
    <a name="top"></a>
    <div id="header">
        <h1>系统安装过程</h1>
    </div>

    <div id="content">
    	<a name="top"></a>
    	<?php
    		include_once("common/CommonFunctions.php");
    		
    		// Check the install folder is realy writable
    		if(!is_really_writable($_SERVER['DOCUMENT_ROOT'] . dirname($_SERVER['SCRIPT_NAME']))):
   		?>
   		<p>在安装固件项目过程管理软件前请确保以下文件可写:</p>
   		<p><b><?php print $_SERVER['DOCUMENT_ROOT'] . dirname($_SERVER['SCRIPT_NAME']) ?></b></p>
   		<?php else:?>        
        <p>欢迎你来到软件安装界面，现在让我们一起来设置软件安装环境.</p>

        <form action="install_status.php" method="POST" class="horizontal">
        	<br>
            <h3>文件系统</h3>
            <p>确保所有文件夹都是相对于 <b><?php print $_SERVER['DOCUMENT_ROOT'] . dirname(dirname($_SERVER['SCRIPT_NAME']))?>/</b></p>

            <fieldset>
                <ol>
                    <li>
                        <label for="ci_system">系统文件夹</label>
                        <input type="text" name="ci_system" class="text" value="system" />
                    </li>
                    <li>
                        <label for="ci_application">应用程序文件夹</label>
                        <input type="text" name="ci_application" class="text" value="system/application" />
                    </li>
                    <li>
                        <label for="ci_modules">模块文件夹</label>
                        <input type="text" name="ci_modules" class="text" value="modules" />
                    </li>
                    <li>
                        <label for="ci_logs">日志文件夹</label>
                        <input type="text" name="ci_logs" class="text" value="system/logs" />
                    </li>
                    <li>
                        <label for="ci_cache">缓存文件夹</label>
                        <input type="text" name="ci_cache" class="text" value="system/cache" />
                    </li>
                </ol>
            </fieldset>

            <br>
            <h3>数据库</h3>
            <p>配置数据库信息,请确保您有权限创建新表，并插入数据.</p>

            <fieldset>
                <ol>
                    <li>
                        <label for="database_host">数据库地址</label>
                        <input type="text" name="database_host" class="text" value="localhost" />
                    </li>
                    <li>
                        <label for="database_name">数据库的名称</label>
                        <input type="text" name="database_name" class="text" value="ci" />
                    </li>
                    <li>
                        <label for="database_user">数据库用户</label>
                        <input type="text" name="database_user" class="text" value="root" />
                    </li>
                    <li>
                        <label for="database_password">数据库密码</label>
                        <input type="text" name="database_password" class="text" />
                    </li>
                </ol>
            </fieldset>

            <br>
            <h3>用户帐户</h3>
            <p>现在设置管理员信息，请记住您的电子邮件地址,系统以邮件地址作为登陆方式。.</p>
            <fieldset>
                <ol>
                    <li>
                        <label for="username">用户名</label>
                        <input type="text" name="username" class="text" value="admin" />
                    </li>
                    <li>
                        <label for="email">Email</label>
                        <input type="text" name="email" class="text" />
                    </li>
                    <li>
                        <label for="password">密码</label>
                        <input type="text" name="password" class="text" />
                    </li>
                </ol>
            </fieldset>
			<div style="display:none;">
            <br>
            <h3>加密密钥</h3>
            <p>在整个软件中，加密是用来保护敏感数据。 为此，需要指定一个加密密钥，如果指定请确保它是最少32位字符，如果不指定，系统会为你自动生成.</p>
            <fieldset>
                <ol>
                    <li>
                        <label for="username">密钥</label>
                        <input type="text" name="encryption_key" class="text" value="" />
                    </li>
                </ol>
            </fieldset>
		
            <br>
            <h3>验证码</h3>
            <p>系统可以使用验证码来验证一个人是不是机械人，但对于这一点，我们既需要您的公共和私人密钥。 如果您没有公钥/私钥请到 <a href="https://admin.recaptcha.net/accounts/signup/?next=%2Frecaptcha%2Fcreatesite%2F" target="_blank">这里</a> 来获得一个。 这是一个可选的字段，而不是进入一个关键的reCAPTCHA只能意味着你无法使用</p>
            <fieldset>
                <ol>
                    <li>
                        <label for="public_key">公钥</label>
                        <input type="text" name="public_key" class="text" />
                    </li>
                    <li>
                        <label for="private_key">私人密匙</label>
                        <input type="text" name="private_key" class="text" />
                    </li>
                </ol>
            </fieldset>
			</div>
            <fieldset>
                <ol>
                    <li class="submit">
                        <input type="submit" name="submit" value="开始安装" />
                    </li>
                </ol>
            </fieldset>
        </form>
        <?php endif;?>
    </div>

    <div id="footer">
        <a href="#top">Top</a><br />
        &copy; Copyright 2011 - 钊诚科技 - All rights Reserved
    </div>
</div>

</body>
</html>