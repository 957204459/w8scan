<?php
/*
 * 任务管理
 * 添加 删除
 */
 class Task_Model{
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
	function addlog($logData) {
		$kItem = array();
		$dItem = array();
		foreach ($logData as $key => $data) {
			$kItem[] = $key;
			$dItem[] = $data;
		}
		$field = implode(',', $kItem);
		$values = "'" . implode("','", $dItem) . "'";
		$this->db->query("INSERT INTO " . DB_PREFIX . "tasklist ($field) VALUES ($values)");
		$logid = $this->db->insert_id();
		return $logid;
	}


    function add($url,$descript,$plugins,$spider_plugins){
        $logData = array();
        $logData["url"] = $url;
        $logData["descript"] = $descript;
        $logData["status"] = 0;
        $logData["addtime"] = time();
        $logData["spider_plugins"] = serialize($spider_plugins);
        $logData["plugins"] = serialize($plugins);
        $logData["token"] = $this->build_token();
        $this->addlog($logData);
        return $logData["token"];
    }

    function build_token(){
        $str = time()."-".rand(100,999);
        return md5($str);
    }

    function getToken($token){
        $sql = "SELECT * FROM " . DB_PREFIX . "tasklist WHERE token='$token' and status=0";
        $res = $this->db->query($sql);
        $row = $this->db->fetch_array($res);
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }
 }