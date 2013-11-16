<?php
abstract class BaseModel {
	/**
	 * 数据库连接cls_oracle
	 */
	public $db;
	function __construct() {
		global $DATABASE_LIST;
		$this->db = new Mysql($DATABASE_LIST[OSA_DB_ID]);
	}
}