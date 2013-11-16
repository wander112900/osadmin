<?php
require ('../include/init.inc.php');
$t = '';
extract ( $_REQUEST, EXTR_IF_EXISTS );
$current_user_id = UserSession::getUserId();
$templates=array("default","blacktie","wintertide","schoolpainting");

if(!in_array($t,$templates)){
	$t="default";
}
$ret=User::setTemplate(UserSession::getUserId(),$t);
$user_info = UserSession::getSessionInfo();
$user_info['template'] = $t;
UserSession::setSessionInfo($user_info);
$rand=rand(0,10000);
$back_url=$_SERVER['HTTP_REFERER']."#".$rand;
header("Location:$back_url");