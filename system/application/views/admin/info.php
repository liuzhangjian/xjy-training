<div id="main" style="margin-top:12px;">
<div class="title">服务器概况及PHP配置信息</div>
<table class="tab_coll">
  <tr>
    <td width="50%">当前版本：Version <?php echo CI_VERSION?></td>
    <td>服务器域名/IP地址：<?php echo $_SERVER['SERVER_NAME']?>	(<?php echo @gethostbyname($_SERVER['SERVER_NAME'])?>)</td>
  </tr>
  <tr>
  	<td>服务器时间：<?php echo date("Y年n月j日 H:i:s")?></td>
  	<td>北京时间：<?php echo gmdate("Y年n月j日 H:i:s",time()+8*3600)?></td>
  	</tr>
  <tr>
  	<td>服务器操作系统：<?php $os = explode(" ", php_uname());?><?php echo $os[0];?>&nbsp;(内核版本：<?php echo $os[2]?>)</td>
  	<td>主机名称：<?php echo $os[1];?></td>
  	</tr>
  <tr>
  	<td>服务器解译引擎：<?php echo $_SERVER['SERVER_SOFTWARE']?></td>
  	<td>Web服务端口：<?php echo $_SERVER['SERVER_PORT']?></td>
  	</tr>
  <tr>
  	<td>站点物理路径：<?php echo dirname(dirname($_SERVER['SCRIPT_FILENAME']))?></td>
  	<td>PHP运行方式：<?php echo strtoupper(php_sapi_name())?></td>
  	</tr>
  <tr>
  	<td>PHP版本：<?php echo PHP_VERSION?></td>
  	<td>PHP运行于安全模式：<?php echo getcon("safe_mode")?></td>
  	</tr>
  <tr>
  	<td>支持ZEND编译运行：<?php echo (get_cfg_var("zend_optimizer.optimization_level")||get_cfg_var("zend_extension_manager.optimizer_ts")||get_cfg_var("zend_extension_ts")) ?'<font color="green">√</font>':'<font color="red">×</font>';?></td>
  	<td>自动定义全局变量(register_globals)：<?php echo getcon("register_globals")?></td>
  	</tr>
  <tr>
  	<td>允许使用URL打开文件(allow_url_fopen)：<?php echo getcon("allow_url_fopen")?></td>
  	<td>允许动态加载链接库(enable_dl)：<?php echo getcon("enable_dl")?></td>
  	</tr>
  <tr>
  	<td>显示错误信息(display_errors)：<?php echo getcon("display_errors")?></td>
  	<td>程序最多允许使用内存量(memory_limit)：<?php echo getcon("memory_limit")?></td>
  	</tr>
  <tr>
  	<td>POST最大字节数(post_max_size)：<?php echo getcon("post_max_size")?></td>
  	<td>允许最大上传文件(upload_max_filesize)：<?php echo getcon("upload_max_filesize")?></td>
  	</tr>
  <tr>
  	<td>程序最长运行时间(max_execution_time)：<?php echo getcon("max_execution_time")?> 秒</td>
  	<td>magic_quotes_gpc：<?php echo (1===get_magic_quotes_gpc()) ? '<font color="green">√</font>':'<font color="red">×</font>';?></td>
  	</tr>
</table>

<div class="title" id="showComponentStatus" style="margin-top:12px;">服务器组件支持状况</div>
<table class="tab_coll hide">
  <tr>
  	<td width="33%">Session支持：
  		<?php echo isfun("session_start")?></td>
    <td width="34%">拼写检查(ASpell Library)：<?php echo isfun("aspell_check_raw")?></td>
    <td width="33%">高精度数学运算(BCMath)：<?php echo isfun("bcadd")?></td>
  </tr>
  <tr>
  	<td>Socket支持：
  		<?php echo isfun("fsockopen")?></td>
  	<td>历法运算(Calendar)：<?php echo isfun("cal_days_in_month")?></td>
  	<td>DBA数据库：<?php echo isfun("dba_close")?> (DBM数据库：<?php echo isfun("dbmclose")?>)</td>
  	</tr>
  <tr>
  	<td>FTP：
  		<?php echo isfun("ftp_login")?></td>
  	<td>dBase数据库：<?php echo isfun("dbase_close")?></td>
  	<td>ODBC数据库连接：
  		<?php echo isfun("odbc_close")?></td>
  	</tr>
  <tr>
  	<td>压缩文件支持(Zlib)：
  		<?php echo isfun("gzclose")?></td>
  	<td>FDF表单资料格式：<?php echo isfun("fdf_get_ap")?></td>
  	<td>FilePro数据库：<?php echo isfun("filepro_fieldcount")?></td>
  	</tr>
  <tr>
  	<td>XML解析：
  		<?php echo isfun("xml_set_object")?></td>
  	<td>Hyperwave数据库：<?php echo isfun("hw_close")?></td>
  	<td>图形处理(GD Library)：<?php echo isfun("gd_info")?></td>
  	</tr>
  <tr>
  	<td>WDDX支持：
  		<?php echo isfun("wddx_add_vars")?></td>
  	<td>IMAP电子邮件系统：<?php echo isfun("imap_close")?></td>
  	<td>Informix数据库：<?php echo isfun("ifx_close")?></td>
  	</tr>
  <tr>
  	<td>VMailMgr邮件处理：
  		<?php echo isfun("vm_adduser")?></td>
  	<td>LDAP目录协议：<?php echo isfun("ldap_close")?></td>
  	<td>MCrypt加密处理：<?php echo isfun("mcrypt_cbc")?></td>
  	</tr>
  <tr>
  	<td>SNMP网络管理协议：
  		<?php echo isfun("snmpget")?></td>
  	<td>Postgre SQL数据库：
  		<?php echo isfun("pg_close")?></td>
  	<td>mSQL数据库：<?php echo isfun("msql_close")?></td>
  	</tr>
  <tr>
  	<td>PDF文档支持：
  		<?php echo isfun("pdf_close")?></td>
  	<td>SQL Server数据库：<?php echo isfun("mssql_close")?></td>
  	<td>MySQL数据库：<?php echo isfun("mysql_close")?></td>
  	</tr>
  <tr>
  	<td>PREL相容语法 PCRE：
  		<?php echo isfun("preg_match")?></td>
  	<td>SyBase数据库：<?php echo isfun("sybase_close")?></td>
  	<td>Yellow Page系统：<?php echo isfun("yp_match")?></td>
  	</tr>
  <tr>
  	<td>哈稀计算(MHash)：
  		<?php echo isfun("mhash_count")?></td>
  	<td>Oracle数据库：<?php echo isfun("ora_close")?></td>
  	<td>Oracle 8 数据库：<?php echo isfun("OCILogOff")?></td>
  	</tr>
    </table>
<?php
//检测PHP设置参数
function getcon($varName){
	switch($res = get_cfg_var($varName)){
		case 0:
		return '<font color="red">×</font>';
		break;
		case 1:
		return '<font color="green">√</font>';
		break;
		default:
		return $res;
		break;
	}
}

//PHP组件支持检测
function isfun($funName){
	return (false !== function_exists($funName)) ? '<font color="green">√</font>' : '<font color="red">×</font>';
}

//整数运算能力测试
function test_int(){
	$timeStart = gettimeofday();
	for($i = 0; $i < 500000; $i++){
		$t = 1+1;
	}
	$timeEnd = gettimeofday();
	$time = ($timeEnd["usec"]-$timeStart["usec"])/1000000+$timeEnd["sec"]-$timeStart["sec"];
	$time = round($time*1000, 2)."毫秒";
	return $time;
}

//浮点运算能力测试
function test_float(){
	$t = pi();
	$timeStart = gettimeofday();
	for($i = 0; $i < 500000; $i++){
		sqrt($t);
	}
	$timeEnd = gettimeofday();
	$time = ($timeEnd["usec"]-$timeStart["usec"])/1000000+$timeEnd["sec"]-$timeStart["sec"];
	$time = round($time*1000, 2)."毫秒";
	return $time;
}
?>
</div>