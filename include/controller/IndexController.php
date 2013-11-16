<?php
class IndexController extends BaseController {
	public function actionIndex(){
		$user = new UserModel();
		$users = $user->getList();
		Template::display ('index.tpl');
	}
}