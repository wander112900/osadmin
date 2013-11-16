<?php /* Smarty version Smarty-3.1.15, created on 2013-11-12 17:12:49
         compiled from "D:\Apache2.2\htdocs\osadmin\include\template\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:275545281f111826a35-02296312%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9d4ae9bd177c51c13910562fc6723dc7d63ec78' => 
    array (
      0 => 'D:\\Apache2.2\\htdocs\\osadmin\\include\\template\\index.tpl',
      1 => 1382248560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '275545281f111826a35-02296312',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'menus' => 0,
    'menu' => 0,
    'user_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5281f111889d20_20645762',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5281f111889d20_20645762')) {function content_5281f111889d20_20645762($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!--- START 以上内容不需更改，保证该TPL页内的标签匹配即可 --->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>


	<div class="block">
        <a href="#page-menu" class="block-heading" data-toggle="collapse">快捷菜单</a>
        <div id="page-menu" class="block-body collapse in">
		<h3>
		<?php if (count($_smarty_tpl->tpl_vars['menus']->value)>0) {?>
			<?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
?>
			<span>
				<a href="<?php echo @constant('ADMIN_URL');?>
<?php echo $_smarty_tpl->tpl_vars['menu']->value['menu_url'];?>
">
					<?php echo $_smarty_tpl->tpl_vars['menu']->value['menu_name'];?>

				</a>
			</span>&nbsp;
			<?php } ?>
		<?php }?>
		</h3>
		</div> 
    </div>
	
	<div class="block">
        <a href="#page-stats" class="block-heading" data-toggle="collapse">当前用户信息</a>
        <div id="page-stats" class="block-body collapse in">
			
               <table class="table table-striped">  
						     
							 <tr>
						        <td>用户名</td>
						        <td>真实姓名</td>
						        <td>手机号</td>
						        <td>Email</td>
						        <td>登录时间</td>
						        <td>登录IP</td>
					          </tr>
						      <tr>
						        <td><?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_name'];?>
</td>
						        <td><?php echo $_smarty_tpl->tpl_vars['user_info']->value['real_name'];?>
</td>
						        <td><?php echo $_smarty_tpl->tpl_vars['user_info']->value['mobile'];?>
</td>
						        <td><?php echo $_smarty_tpl->tpl_vars['user_info']->value['email'];?>
</td>
						        <td><?php echo $_smarty_tpl->tpl_vars['user_info']->value['login_time'];?>
</td>
						        <td><?php echo $_smarty_tpl->tpl_vars['user_info']->value['login_ip'];?>
</td>
					          </tr>
					        
					      </table>
		</div>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>注意！</strong>请保管好您的个人信息，一点发生密码泄露请紧急联系管理员。</div>
        </div>
    </div>
	
<!--- END 以下内容不需更改，请保证该TPL页内的标签匹配即可 --->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
