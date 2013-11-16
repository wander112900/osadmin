<?php
//配置文件
include ('config/config.inc.php');
//自动加载类
include (ADMIN_BASE_LIB . 'Autoloader.class.php');
Autoloader::init();
$cookie = new Cookie();
/*
不需要登录就可以访问的链接，也可以是某个目录，不含子目录
如"/nologin/","/nologin/aaa/"
*/
$no_need_login_page=array("/pdo.php","/login.php",	"/logout.php");
//如果不需要登录就可以访问的话
$action_url = Common::getActionUrl();
if( OSAdmin::checkNoNeedLogin($action_url,$no_need_login_page) ){	
	//for login.php logout.php etc....
	;
}else{
	//else之后 需要验证登录信息
	$user_cookie = $cookie->getUser();
	if(empty($user_cookie)){
		$user_id=User::getCookieRemember();
		if($user_id>0){
			User::loginDoSomething($user_id);
		}
	}
	$current_user_info=UserSession::getSessionInfo();
	User::checkLogin();
	User::checkActionAccess();
	//如果非ajax请求
	if(stripos($_SERVER['SCRIPT_NAME'],"/ajax")===false){
		//显示菜单、导航条、模板
		$sidebar = SideBar::getTree ($current_user_info);
		
		//是否显示quick note
		if($current_user_info['show_quicknote']){
			OSAdmin::showQuickNote();
		}
		$menu = MenuUrl::getMenuByUrl(Common::getActionUrl());
//		print_r($menu);exit();
		Template::assign ( 'page_title', $menu['menu_name']);
		Template::assign ( 'content_header', $menu );
		Template::assign ( 'sidebar', $sidebar );
		Template::assign ( 'current_module_id', $menu['module_id'] );
		Template::assign ( 'user_info', $current_user_info);
	}
}
?>