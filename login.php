<?php
require ('include/init.inc.php');
$user_name = $password = $remember = $verify_code = '';
extract ( $_POST, EXTR_IF_EXISTS );

if (Common::isPost ()) {
	$cookie = new Cookie();
	$osa_verify_code = $cookie->get('osa_verify_code');
	$cookie->add('osa_verify_code','',time()-3600);
	if(strtolower($verify_code) != strtolower($osa_verify_code)){
		OSAdmin::alert("error",ErrorMessage::VERIFY_CODE_WRONG);
	}else{
		$user_info = User::checkPassword ( $user_name, $password );
		if ($user_info) {
			if($user_info['status']==1){
				User::loginDoSomething($user_info['user_id']);
				if($remember){
					//$encrypted = OSAEncrypt::encrypt($user_info['user_id']);
					User::setCookieRemember($user_info['user_id'],30);
				}
				$ip = Common::getIp();
				SysLog::addLog ( $user_name, 'LOGIN', 'User' ,UserSession::getUserId(),json_encode(array("IP" => $ip)));
				Common::jumpUrl ( 'index.php' );
			}else{
				OSAdmin::alert("error",ErrorMessage::BE_PAUSED);
			}
		} else {
			OSAdmin::alert("error",ErrorMessage::USER_OR_PWD_WRONG);
			SysLog::addLog ( $user_name, 'LOGIN','User' ,'' , json_encode(ErrorMessage::USER_OR_PWD_WRONG) );
		}
	}
}
Template::assign ( '_POST',$_POST );
Template::assign ( 'page_title','登入' );
Template::Display ( 'login.tpl' );