<?php
class BaseController {
	public $cookie;
	public function __construct() {
		$this->cookie = new Cookie();
		//页面默认值
		Template::assign ( 'pagetitle', '红星闪购' );
		Template::assign ( 'pagekeywords', '红星闪购' );
		Template::assign ( 'pagedescription', '红星闪购' );
	}
	public function init() {
		
	}
}