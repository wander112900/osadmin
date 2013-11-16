<?php
if(!defined('ACCESS')) {exit('Access denied.');}

class Sample extends SampleBase {
	private static $table_name = 'sample';
 
	private static $columns = 'sample_id, sample_content';
 
	
	public static function getTableName(){
		return self::$table_name;
	}
	 
	public static function getSamples() {
	
		$db=self::__instance();
		
		$sql="select ".self::$columns." from ".self::getTableName();
		$list = $db->query($sql)->fetchAll();
		if ($list) {
			return $list;
		}
		return array ();		
	}
}
