<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Preferences Language Array
 *
 * Contains all language strings used by the Preference class.
 *
 * @package         BackendPro
 * @subpackage      Languages
 * @author          Adam Price
 * @copyright       Copyright (c) 2008
 * @license         http://www.gnu.org/licenses/lgpl.html
 * @link            http://www.kaydoo.co.uk/projects/backendpro
 * @filesource
 */

// ---------------------------------------------------------------------------

$lang['preference_saved_successfully'] = "'%s' 保存成功";

/** -------------------------------------- CONTROL PANEL SETTING STRINGS */
// General Configuration
$lang['preference_label_site_name'] = "网站名称";

// Member Settings
$lang['preference_desc_account_activation_time'] = '用户几天之内必须激活他的账户';
$lang['preference_desc_autologin_period'] = '用户自动登录的天数';
$lang['preference_desc_login_field'] = '用户进入系统的方式';

$lang['preference_field_activation_method_none'] = '是否需要激活';
$lang['preference_field_activation_method_email'] = '通过Email激活';
$lang['preference_field_activation_method_admin'] = '由管理员激活';

// Security Preferences
$lang['preference_label_use_login_captcha'] = '使用验证码?';
$lang['preference_label_use_registration_captcha'] = '使用注册验证码?';

// Email Configuration
$lang['preference_label_automated_from_name'] = '返回名称自动生成的电子邮件';
$lang['preference_label_automated_from_email'] = '返回自动生成的电子邮件地址的电子邮件';
$lang['preference_desc_automated_from_email'] = '如果你离开这个空白，许多电子邮件服务器将考虑您的垃圾邮件';
$lang['preference_label_email_mailpath'] = 'Sendmail的路径';
$lang['preference_desc_email_mailpath'] = '服务器路径Sendmail的应用';
$lang['preference_label_smtp_host'] = 'SMTP Server';
$lang['preference_desc_smtp_host'] = 'Use this only if you choose SMTP';
$lang['preference_label_smtp_user'] = 'SMTP Username';
$lang['preference_desc_smtp_user'] = 'Use this only if you choose SMTP';
$lang['preference_label_smtp_pass'] = 'SMTP Password';
$lang['preference_desc_smtp_pass'] = 'Use this only if you choose SMTP';
$lang['preference_label_smtp_port'] = 'SMTP Port';
$lang['preference_label_smtp_timeout'] = 'SMTP Timeout';
$lang['preference_desc_smtp_timeout'] = 'Number in seconds';
$lang['preference_label_email_mailtype'] = 'Default Email Format';
$lang['preference_label_email_charset'] = 'Email Character Encoding';
$lang['preference_label_email_wordwrap'] = 'Enable Wordwrap?';
$lang['preference_label_email_wrapchars'] = 'Character count to wrap at';
$lang['preference_desc_email_wrapchars'] = 'Number of characters to wrap at';
$lang['preference_label_bcc_batch_mode'] = 'BCC Batch Mode?';
$lang['preference_desc_bcc_batch_mode'] = 'Batch Mode breaks up large mailings into smaller groups, which get sent at intervals. Recommended if your site is hosted on a shared-hosting account.';
$lang['preference_label_bcc_batch_size'] = 'Number of Emails Per Batch';
$lang['preference_desc_bcc_batch_size'] = 'For average servers, 200 is a safe number';

// Maintenance & Debuging Settings
$lang['preference_label_page_debug'] = '启用系统调试?';
$lang['preference_desc_page_debug'] = '显示重要信息代码执行';
$lang['preference_label_keep_error_logs_for'] = '错误日志归档?';
$lang['preference_desc_keep_error_logs_for'] = '对归档日志错误的天数';

$lang['preference_label_allow_user_registration'] = '用户是否可以注册';
$lang['preference_label_activation_method'] = '激活方法';
$lang['preference_label_account_activation_time'] = '帐户激活时间';
$lang['preference_label_autologin_period'] = '自动登录期限';
$lang['preference_label_default_user_group'] = '默认用户组';
$lang['preference_label_login_field'] = '登录字段';
$lang['preference_label_allow_user_profiles'] = '允许用户配置系统';
$lang['preference_label_login_field'] = '默认用户组';




/**
 *     BELOW HERE DEFINE ANY LANGUAGE STRINGS FOR YOUR APPLICATIONS
 *
 *     Format:
 *     For a preference label name:
 *     $lang['preference_label_{preference_name}'] = '';
 *
 *     For a preference description:
 *     $lang['preference_desc_{preference_desc}'] = '';
 */

/* End of file preferences_lang.php */
/* Location: ./modules/preferences/language/english/preferences_lang.php */