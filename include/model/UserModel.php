<?php
class UserModel extends BaseModel{
	public function getList(){
		return $this->db->getAll("select * from osa_sys_log");
	}
	public function getRow()
	{
		return "----------------";
	}
}