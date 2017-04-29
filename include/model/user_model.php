<?php
/*
 * 用户模型管理
 * 添加 删除
 */
 class User_Model{
    private $db;

    function __construct() {
        $this->db = Database::getInstance();
    }


    /**
	 * 添加文章、页面
	 *
	 * @param array $logData
	 * @return int
	 */

	function insertData($logData) {
		$kItem = array();
		$dItem = array();
		foreach ($logData as $key => $data) {
			$kItem[] = $key;
			$dItem[] = $data;
		}
		$field = implode(',', $kItem);
		$values = "'" . implode("','", $dItem) . "'";
		$this->db->query("INSERT INTO " . DB_PREFIX . "user ($field) VALUES ($values)");
		$logid = $this->db->insert_id();
		return $logid;
	}


    function checkUser($user,$password){
        $sql = "SELECT * FROM " . DB_PREFIX . "user WHERE user='$user' and password='$password'";
        $res = $this->db->query($sql);
        $row = $this->db->fetch_array($res);
        if ($row) {
            return True;
        } else {
            return false;
        }
    }

    function getUser($user,$password){
        $sql = "SELECT * FROM " . DB_PREFIX . "user WHERE user='$user' and password='$password'";
        $res = $this->db->query($sql);
        $row = $this->db->fetch_array($res);
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

}