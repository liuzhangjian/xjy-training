<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Userlib Language Array
 *
 * Contains all language strings used by the Userlib class.
 *
 * @package         BackendPro
 * @subpackage		Languages
 * @author          Adam Price
 * @copyright       Copyright (c) 2008
 * @license         http://www.gnu.org/licenses/lgpl.html
 * @link            http://www.kaydoo.co.uk/projects/backendpro
 * @filesource
 */

// ---------------------------------------------------------------------------

/* User field names */
$lang['userlib_username'] = '用户名';
$lang['userlib_email'] = '邮箱';
$lang['userlib_email_username'] = "用户名/邮箱";
$lang['userlib_password'] = '密码';
$lang['userlib_confirm_password'] = '确认密码';
$lang['userlib_last_visit'] = "上次访问";
$lang['userlib_active'] = "操作";
$lang['userlib_group'] = "组";
$lang['userlib_captcha'] = '验证码';
$lang['userlib_level'] = "等级";
$lang['userlib_team'] = "部门组";

/* Actions & Titles & Form labels */
$lang['userlib_login'] = '登录';
$lang['userlib_logout'] = '退出';
$lang['userlib_reset'] = '重置';
$lang['userlib_remember_me'] = '记住我';
$lang['userlib_forgotten_password'] = '忘记密码';
$lang['userlib_reset_password'] = '重置密码';
$lang['userlib_register'] = '注册新账号';
$lang['userlib_create_user'] = "创建用户";
$lang['userlib_edit_user'] = "修改用户";
$lang['userlib_delete_user'] = "删除用户";
$lang['userlib_administrator_delete'] = "您不能删除管理员用户帐户.";
$lang['userlib_user_saved'] = "'%s' 成功创建";
$lang['userlib_user_deleted'] = "用户成功删除";
$lang['userlib_user_profile'] = "用户配置文件";
$lang['userlib_profile_disabled'] = "用户配置文件已被禁用控制面板上的设置页。请重新启用他们能够编辑该用户的个人资料.";
$lang['userlib_password_info'] = "如果要修改现有会员帐户，您无需输入密码栏位，除非您想改变自己的密码.";
$lang['userlib_delete_user_confirm'] = "您确定要删除这些成员？这样做可能会改动系统数据!";

/* Email activation messages */
$lang['userlib_no_activation'] = '现在您可以用新账号登录了.';
$lang['userlib_email_activation'] = '在登录到您的账户前，请确定您已经创建了该账号，可以点击:
     %s

     在接下来的 %s 天(s)您必须这样做,或者您的账户将被删除.';
$lang['userlib_admin_activation'] = '在登录到您的新账户前,管理员必须先验证它，请耐心等待.';

/* Email subject titles */
$lang['userlib_email_forgotten_password'] = '要求新的登录信息';
$lang['userlib_email_register'] = '您的账号已创建';

/* Auth validation messages */
$lang['userlib_validation_captcha'] = '%s 不正确.';
$lang['userlib_validation_username'] = '%s 已被使用.';
$lang['userlib_validation_email'] = '%s 已被使用.';

/* Status messages */
$lang['userlib_status_restricted_access'] = "您没有权限查看该网页.";
$lang['userlib_status_require_login'] = "访问该网页前请先登录.";
$lang['userlib_account_unactivated'] = '您的账户未激活，请联系管理员或正在审核您的账户过程中.';
$lang['userlib_login_successfull'] = '您已经成功登录系统！';
$lang['userlib_logout_successfull'] = '您已经成功退出系统！.';
$lang['userlib_login_failed'] = '登录失败,请再试一次.检查您的登录ID和密码是否正确.';
$lang['userlib_logout_failed'] = '我们无法让您登录时，请再试一次.';
$lang['userlib_email_not_found'] = '提供的Email不在我们的数据库中.';
$lang['userlib_new_password_sent'] = '新的密码已经发送到您的邮箱.';
$lang['userlib_registration_denied'] = '本网站不允许注册.';
$lang['userlib_registration_failed'] = '我们无法创建账户，请再试一次.';
$lang['userlib_registration_success'] = '您的新帐户已建立';
$lang['userlib_activation_success'] = '您的帐户已被激活，您现在可以登录了.';
$lang['userlib_activation_failed'] = '我们无法激活您的帐户。';

/* Password Generation */
$lang['userlib_generate_password'] = "生成密码";

/* End of file userlib_lang.php */
/* Location: ./modules/auth/language/english/userlib_lang.php */