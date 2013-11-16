<?php
/**
 * Autoloader 类
 */
class Autoloader {
	
	private static $loader;
	/**
	 * 构造函数
	 */
	private function __construct() {
		spl_autoload_register ( array ($this, 'inc_lib' ) );
		//spl_autoload_register ( array ($this, 'inc_cls' ) );
	}
	
	public static function init() {
		// 静态化自调用
		if (self::$loader == NULL)
			self::$loader = new self ();
		
		return self::$loader;
	}
	
	/**
	 * 加载include/class下的类
	 * @param string $classname
	 */
	private function inc_lib($classname) {
		if (stristr ( $classname, 'Model' ) === FALSE && stristr ( $classname, 'Controller' ) === FALSE)
		{
			$filename = str_replace ( '_', '/', $classname ) . '.class.php';
			// class类
			$filepath = ADMIN_BASE_CLASS . $filename;
			if (file_exists ( $filepath )) {
				return include $filepath;
			} else {
				//仅对Class仅支持一级子目录
				//如果子目录中class文件与CLASS根下文件同名，则子目录里的class文件将被忽略
				$handle = opendir ( ADMIN_BASE_CLASS );
				while ( false !== ($file = readdir ( $handle )) ) {
					if (is_dir ( ADMIN_BASE_CLASS . "/" . $file )) {
						$filepath = ADMIN_BASE_CLASS . "/" . $file . "/" . $filename;
						if (file_exists ( $filepath )) {
							return include $filepath;
						}
					}
				}
			}
			//lib库文件
			$filepath = ADMIN_BASE_LIB . $filename;
			if (file_exists ( $filepath )) {
				return include $filepath;
			}
			throw new Exception ( $filepath . ' NOT FOUND!' );
		}
		else
		{
			$this->inc_cls($classname);
		}
	}
	
	/**
	 * 处理原model和controller文件
	 */
	private function inc_cls($className) {
		$modulesDir = "";
		$classType = "";
		if (substr ( $className, - 5 ) == 'Model') {
			$modulesDir = ROOT_PATH . 'include/model/';
		} elseif (substr ( $className, - 10 ) == 'Controller') {
			$modulesDir = ROOT_PATH . 'include/controller/';
		}
		$classFileName = "";
		$classFileName = $modulesDir . $className . ".php";
		if (file_exists ( $classFileName )) {
			return include $classFileName;
		} else {
			$this->err_fn ( $className );
		}
	}
	// 文件出错提示
	private function err_fn($className) {
		echo "class $className files includes err!!";
		exit ();
	}
}
?>