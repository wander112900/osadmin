<?php
require('include/init.inc.php');
$cookie = new Cookie();
if(!$cookie->getUser())
{
	SysLog::addLog ( UserSession::getUserName(), 'LOGOUT','User' ,UserSession::getUserId() );
}
User::logout();
/*
if(array_key_exists(UserSession::SESSION_NAME,$_SESSION)){
	SysLog::addLog ( UserSession::getUserName(), 'LOGOUT','User' ,UserSession::getUserId() );
}
User::logout();
*/
Common::exitWithSuccess("您已安全登出！","login.php");