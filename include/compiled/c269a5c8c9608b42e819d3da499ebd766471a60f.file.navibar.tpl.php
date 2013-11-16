<?php /* Smarty version Smarty-3.1.15, created on 2013-11-16 16:07:53
         compiled from "D:\Apache2.2\htdocs\osadmin\include\template\navibar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:232685281e397e2f973-53478984%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c269a5c8c9608b42e819d3da499ebd766471a60f' => 
    array (
      0 => 'D:\\Apache2.2\\htdocs\\osadmin\\include\\template\\navibar.tpl',
      1 => 1384589260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '232685281e397e2f973-53478984',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5281e397e87548_05450330',
  'variables' => 
  array (
    'user_info' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5281e397e87548_05450330')) {function content_5281e397e87548_05450330($_smarty_tpl) {?>  <body class=""> 
  <!--<![endif]-->
<div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                    <!-- li><a href="#" class="hidden-phone visible-tablet visible-desktop" role="button">设置模板</a></li -->
					 
					<?php if ($_smarty_tpl->tpl_vars['user_info']->value['setting']) {?>
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-cog"></i>设置<i class="icon-caret-down"></i>
						</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo @constant('ADMIN_URL');?>
/admin/setting.php">系统设置</a></li>
                        </ul>
                    </li>
					<?php }?>
					
					<li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
							
                            选择模板
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="<?php echo @constant('ADMIN_URL');?>
/admin/set.php?t=default">默认模板</a></li>
                            <li><a href="<?php echo @constant('ADMIN_URL');?>
/admin/set.php?t=blacktie">黑色领结</a></li>
                            <li><a href="<?php echo @constant('ADMIN_URL');?>
/admin/set.php?t=wintertide">冰雪冬季</a></li>
							<li><a href="<?php echo @constant('ADMIN_URL');?>
/admin/set.php?t=schoolpainting">青葱校园</a></li>
                        </ul>
                    </li>
					
					<li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> <?php echo $_smarty_tpl->tpl_vars['user_info']->value['user_name'];?>

                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="<?php echo @constant('ADMIN_URL');?>
/admin/profile.php">我的账号</a></li>
                            <li><a tabindex="-1" href="<?php echo @constant('ADMIN_URL');?>
/logout.php">登出</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="<?php echo @constant('ADMIN_URL');?>
/index.php"><span class="first"></span> <span class="second"><?php echo @constant('COMPANY_NAME');?>
</span></a>
        </div>
</div><?php }} ?>
