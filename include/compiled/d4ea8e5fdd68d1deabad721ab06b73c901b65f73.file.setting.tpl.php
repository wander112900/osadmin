<?php /* Smarty version Smarty-3.1.15, created on 2013-11-13 15:16:50
         compiled from "D:\Apache2.2\htdocs\osadmin\include\template\admin\setting.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1127052832762ad1783-07576537%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4ea8e5fdd68d1deabad721ab06b73c901b65f73' => 
    array (
      0 => 'D:\\Apache2.2\\htdocs\\osadmin\\include\\template\\admin\\setting.tpl',
      1 => 1382249386,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1127052832762ad1783-07576537',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'osadmin_action_alert' => 0,
    'osadmin_quick_note' => 0,
    'timezone_options' => 0,
    'timezone' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52832762b030f7_03426645',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52832762b030f7_03426645')) {function content_52832762b030f7_03426645($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\Apache2.2\\htdocs\\osadmin\\include\\config/../../include/lib/Smarty/plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("navibar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- START 以上内容不需更改，保证该TPL页内的标签匹配即可 -->

<?php echo $_smarty_tpl->tpl_vars['osadmin_action_alert']->value;?>

<?php echo $_smarty_tpl->tpl_vars['osadmin_quick_note']->value;?>


<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">时区设置</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
		  <div class="tab-pane active in" id="home">
			<form id="tab" method="post" action="" autocomplete="off">
				 
				<label>选择时区</label>	
				<?php echo smarty_function_html_options(array('name'=>'new_timezone','id'=>"DropDownTimezone",'class'=>"input-xlarge",'options'=>$_smarty_tpl->tpl_vars['timezone_options']->value,'selected'=>$_smarty_tpl->tpl_vars['timezone']->value),$_smarty_tpl);?>

				
				<div class="btn-toolbar">
				<button type="submit" class="btn btn-primary"><i class="icon-save"></i> 保存</button>
				<div class="btn-group"></div>
			</div>
			</form>
		  </div>
  </div>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
