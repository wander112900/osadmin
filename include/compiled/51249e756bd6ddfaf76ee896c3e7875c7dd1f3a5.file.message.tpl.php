<?php /* Smarty version Smarty-3.1.15, created on 2013-11-16 15:49:00
         compiled from "D:\Apache2.2\htdocs\osadmin\include\template\message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:233155281f0f8b9f762-76522948%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51249e756bd6ddfaf76ee896c3e7875c7dd1f3a5' => 
    array (
      0 => 'D:\\Apache2.2\\htdocs\\osadmin\\include\\template\\message.tpl',
      1 => 1384587898,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '233155281f0f8b9f762-76522948',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5281f0f8c1d599_86142045',
  'variables' => 
  array (
    'type' => 0,
    'message_detail' => 0,
    'forward_url' => 0,
    'forward_title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5281f0f8c1d599_86142045')) {function content_5281f0f8c1d599_86142045($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("simple_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <body class="simple_body">

    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                </ul>
                <a class="brand" href="index.php"><span class="first"></span> <span class="second"><?php echo @constant('COMPANY_NAME');?>
</span></a>
        </div>
    </div>
<div>
<div class="container-fluid">	
        <div class="row-fluid">
			<div class="http-error">
				
				<?php if ($_smarty_tpl->tpl_vars['type']->value=="success") {?>
				<h1>Yep!</h1>
				<?php } elseif ($_smarty_tpl->tpl_vars['type']->value=="error") {?>
				<h1>Oops!</h1>
				<?php } else { ?>
				<h1>O~!</h1>
				<?php }?>
				<p class="info"><?php echo $_smarty_tpl->tpl_vars['message_detail']->value;?>
</p>
				<h2>返回 <a href="<?php echo $_smarty_tpl->tpl_vars['forward_url']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['forward_title']->value;?>
</a></h2>
			</div>
	<div>	
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<?php }} ?>
