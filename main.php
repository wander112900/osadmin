<?php
require (dirname(__FILE__) . '/include/init.php');
$con  = isset($_GET['con']) ? trim($_GET['con']) : 'index';
$act  = isset($_GET['act']) ? trim($_GET['act']) : 'index';
$controllerName = ucfirst($con).'Controller';
if(class_exists($controllerName)){
	$controller = new $controllerName();
	$functionName = 'action'.ucfirst($act);
	if(method_exists($controller,'init')){
		$controller->init();
	}
	if(method_exists($controller,$functionName)){
		$controller->$functionName();
	}else{
		//404错误
		die('function 404');
	}
}else{
	//404错误
	die('404');
}
?>