<?php /* Smarty version Smarty-3.1.15, created on 2013-11-14 18:09:36
         compiled from "D:\Apache2.2\htdocs\osadmin\include\template\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15385281e398016e31-35158767%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bcdf35528da52552ad7dcc8ac540146a578c0da8' => 
    array (
      0 => 'D:\\Apache2.2\\htdocs\\osadmin\\include\\template\\footer.tpl',
      1 => 1384423774,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15385281e398016e31-35158767',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5281e398022551_26014366',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5281e398022551_26014366')) {function content_5281e398022551_26014366($_smarty_tpl) {?>					<footer>
                        <hr/>
                        <!-- <p class="pull-right">A <a href="http://osadmin.org/" target="_blank">Basic Backstage Management System for China Only.</a> by <a href="http://weibo.com/osadmin" target="_blank">SomewhereYu</a></p>
                        <p>&copy; 2013 <a href="http://osadmin.org" target="_blank">OSAdmin</a></p> -->
                    </footer>
				</div>
			</div>
		</div>
    <script src="<?php echo @constant('ADMIN_URL');?>
/assets/lib/bootstrap/js/bootstrap.js"></script>
	
<!--- + -快捷方式的提示 --->
	
<script type="text/javascript">	
	
alertDismiss("alert-success",3);
alertDismiss("alert-info",10);
	
listenShortCut("icon-plus");
listenShortCut("icon-minus");

</script>
  </body>
</html><?php }} ?>
