<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Access Control Language Array
 *
 * Contains all language strings used by the Access Control Controller
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

/* Strings used on Access Control Splash page */
$lang['access_permissions'] = '权限';
$lang['access_groups'] = '用户组';
$lang['access_actions'] = '行动';
$lang['access_resources'] = '资源';

$lang['access_permissions_desc'] = "你可以通过使用权限授予特定的用户群体获得一定的资源。 您也可以指定如果有什么行动，他们可以对这些资源.";
$lang['access_groups_desc'] = "组是'虚拟'网站成员容器。 通过分配用户到组就意味着你可以分配该组的用户相对权限，而无需为每个用户进程重复.";
$lang['access_actions_desc'] = "动作让你有更细的资源细粒度控制。 比如，你可以有'添加'，'编辑'和'删除'的行动。这将意味着您可以授予用户的权限执行某些操作设置资源上.";
$lang['access_resources_desc'] = "资源是项目要限制访问。 例如本行政区域的，其网页的所有资源。使用正确的用户组和权限有可能只由少数授予访问这些网页.";

/* General */
$lang['access_name'] = "名称";
$lang['access_parent_name'] = "父级";

/* Actions */
$lang['access_create_action'] = "创建行动";
$lang['access_delete_action'] = "删除行动";
$lang['access_action_created'] = "行动'%s' 创建成功";
$lang['access_action_deleted'] = "行动'%s' 删除成功";
$lang['access_action_exists'] = "不能创建,因为'%s' 已经存在!";
$lang['access_delete_actions_confirm'] = "你确定要删除这些行动？这样做将删除相关的权限的一切行动
";

/* Resources */
$lang['access_create_resource'] = "创建资源";
$lang['access_edit_resource'] = "修改资源";
$lang['access_delete_resource'] = "删除资源";
$lang['access_resource_created'] = "资源 '%s' 创建成功";
$lang['access_resource_saved'] = "资源 '%s' 保存成功";
$lang['access_resource_deleted'] = "资源 '%s' 删除成功";
$lang['access_resource_exists'] = "不能创建，因为 '%s' 已经存在!";
$lang['access_resource_root'] = "不能修改，因为 '%s' 已经存在.";
$lang['access_resource_illegal_assignment'] = "节点'%s'的新母节点是无效的分配";
$lang['access_delete_resources_confirm'] = "您确定您想要删除这些资源？这样做也会删除所有权限使用这些资源!";

/* Groups */
$lang['access_disabled'] = "显示";
$lang['access_create_group'] = "创建用户组";
$lang['access_edit_group'] = "修改用户组";
$lang['access_delete_group'] = "删除用户组";
$lang['access_group_created'] = "用户组 '%s' 创建成功";
$lang['access_group_saved'] = "用户组 '%s' 保存成功";
$lang['access_group_deleted'] = "用户组 '%s' 成功删除";
$lang['access_group_exists'] = "不能重复添加 '%s'!";
$lang['access_group_root'] = "'%s' 是根节点,不能修改.";
$lang['access_group_illegal_assignment'] = "节点'%s'的新母节点是无效的分配";
$lang['access_delete_groups_confirm'] = "你确定删除这些组吗？删除它会删除该组下面的用户的权限!";

/* Permissions */
$lang['access_permissions_table_desc'] = "Items in <font color='green'><b>green</b></font> means that group is <b>ALLOWED</b> access to it, while <font color='red'><b>red</b></font> means they are <b>DENIED</b> access to it. A resource access write takes priority over action access writes. For example if a resource is marked as <b>DENIED</b>, it dosn't matter if an action is <b>ALLOWED</b> the resource & all actions will be <b>DENIED</b>.";
$lang['access_create_permission'] = "创建权限";
$lang['access_edit_permission'] = "修改权限";
$lang['access_delete_permission'] = "删除权限";
$lang['access_permission_created'] = "权限创建成功";
$lang['access_permission_saved'] = "权限保存成功";
$lang['access_permissions_deleted'] = "权限删除成功";
$lang['access_advanced_permissions'] = "高级视图模式";
$lang['access'] = "访问";
$lang['access_allow'] = "允许";
$lang['access_deny'] = "拒绝";
$lang['access_delete_permissions_confirm'] = "你确定要删除这些权限？警告：这样做可能会将你锁在系统之外!";

/* Advanced View */
$lang['access_advanced_desc'] = "这页是用来作为一种辅助手段，告诉你如何管理用户组的权限，什么用户组可以访问哪些资源,在用户组列选择了组,资源列中显示出了对应该组的对资源的权限，选择了资源后,行动列显示出对应的操作.";
$lang['access_advanced_select'] = "请选择一种资源，查看其行动的权限.";

/* End of file access_control_lang.php */
/* Location: ./modules/auth/lang/english/access_control_lang.php */