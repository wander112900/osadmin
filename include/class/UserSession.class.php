<?php
if (! defined ( 'ACCESS' )) {
	exit ( 'Access denied.' );
}
class UserSession {
	public static function setSessionInfo($user_info, $remember = FALSE) {
		$cookie = new Cookie ();
		$user_info ['shortcuts_arr'] = implode ( "\r\n", $user_info ['shortcuts_arr'] );
		$time = time () + 3600 * 24 * 7;
		if ($remember) {
			$cookie->add ( USER_KEY, implode ( "\r\n", $user_info ) );
		} else {
			$cookie->add ( USER_KEY, implode ( "\r\n", $user_info ), $time );
		}
		return true;
	}
	
	public static function getSessionInfo() {
		$user_info = array ();
		$cookie = new Cookie ();
		$user_info = $cookie->getUser ();
		return $user_info;
	}
	
	public static function getUserName() {
		$user_info = self::getSessionInfo ();
		return isset ( $user_info ['user_name'] ) ? $user_info ['user_name'] : '';
	}
	
	public static function getUserId() {
		$user_info = self::getSessionInfo ();
		return isset ( $user_info ['user_id'] ) ? $user_info ['user_id'] : '';
	}
	
	public static function getRealName() {
		$user_info = self::getSessionInfo ();
		return isset ( $user_info ['real_name'] ) ? $user_info ['real_name'] : '';
	}
	
	public static function getUserGroup() {
		$user_info = self::getSessionInfo ();
		return isset ( $user_info ['user_group'] ) ? $user_info ['user_group'] : '';
	}
	
	public static function getTemplate() {
		$user_info = self::getSessionInfo ();
		return isset ( $user_info ['template'] ) ? $user_info ['template'] : '';
	}
	
	public static function clear() {
		$cookie = new Cookie ();
		$cookie->add ( USER_KEY, '', time () - 3600 );
		return true;
	}
	
	public static function reload() {
		$current_user_info = self::getSessionInfo ();
		$user_info = User::getUserById ( $current_user_info ['user_id'] );
		
		if ($user_info ['status'] != 1) {
			Common::jumpUrl ( "login.php" );
			return;
		}
		
		//
		$user_group = UserGroup::getGroupById ( $user_info ['user_group'] );
		$user_info ['group_id'] = $user_group ['group_id'];
		$user_info ['user_role'] = $user_group ['group_role'];
		$user_info ['shortcuts_arr'] = explode ( ',', $user_info ['shortcuts'] );
		$menu = MenuUrl::getMenuByUrl ( '/admin/setting.php' );
		if (strpos ( $user_group ['group_role'], $menu ['menu_id'] )) {
			$user_info ['setting'] = 1;
		}
		$user_info ['login_time'] = Common::getDateTime ( $user_info ['login_time'] );
		UserSession::setSessionInfo ( $user_info );
	}
	/*
	const SESSION_NAME="osa_user_info";
	public static function setSessionInfo($user_info){
		$_SESSION[self::SESSION_NAME] = $user_info;
		return true;
	}
	
	public static function getSessionInfo(){
		$user_info = array();
		$user_info = $_SESSION[self::SESSION_NAME];
		return $user_info;
	}
	
	public static function getUserName(){
		$user_name = '';
		$user_name = $_SESSION[self::SESSION_NAME]['user_name'];
		return $user_name;
	}
	
	public static function getUserId(){
		$admin_id = '';
		$admin_id = $_SESSION[self::SESSION_NAME]['user_id'];
		return $admin_id;
	}
	
	public static function getRealName(){
		$real_name = '';
		$real_name = $_SESSION[self::SESSION_NAME]['real_name'];
		return $real_name;
	}
	
	public static function getUserGroup(){
		$purviews = '';
		$purviews = $_SESSION[self::SESSION_NAME]['user_group'];
		return $purviews;
	}
	
	public static function getTemplate(){
		$template = '';
		$template = $_SESSION[self::SESSION_NAME]['template'];
		return $template;
	}
	
    public static function clear(){
        $_SESSION[self::SESSION_NAME] = null;
        return true; 
    }
	
	public static function reload(){
		$current_user_info=self::getSessionInfo();
		$user_info = User::getUserById($current_user_info['user_id']);

		if($user_info['status']!=1){
			Common::jumpUrl("login.php");
			return;
		}
		
		//
		$user_group = UserGroup::getGroupById($user_info['user_group']);
		$user_info['group_id']=$user_group['group_id'];
		$user_info['user_role']=$user_group['group_role'];
		$user_info['shortcuts_arr']=explode(',',$user_info['shortcuts']);
		$menu = MenuUrl::getMenuByUrl('/admin/setting.php');
		if(strpos($user_group['group_role'],$menu['menu_id'])){
			$user_info['setting']=1;
		}
		$user_info['login_time']=Common::getDateTime($user_info['login_time']);
		UserSession::setSessionInfo( $user_info);
	}*/
}