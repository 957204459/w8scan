<?php
/**
 * 文章、页面管理
 *
 * @copyright (c) Emlog All Rights Reserved
 * 需求：通过标题模糊搜索 可通过 公司模糊搜索 作者 乌云版本号 搜索
 */

class Log_Model {

    private $db;

    function __construct() {
        $this->db = Database::getInstance();
    }

    /**
     * 前台获取单篇文章
     */
    function getOneLogForHome($blogId) {
        $sql = "SELECT * FROM " . DB_PREFIX . " WHERE wynum='$blogId'";
        $res = $this->db->query($sql);
        $row = $this->db->fetch_array($res);
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }
	/**
	 * 前台搜索
	 */
	function getListForUser($keyword,$type,$page = 1){
		//需求：通过标题模糊搜索（1） 可通过 公司模糊搜索（2） 作者（3） 乌云版本号（4） 搜索
		$perpage_num = 10;
		$start_limit = !empty($page) ? ($page - 1) * $perpage_num : 0;
		$limit = "LIMIT $start_limit, " . $perpage_num;
		
		if($type==1){
			$sql = "SELECT time,title,company,author,bugtype,wynum FROM " . DB_PREFIX . " WHERE title like '%{$keyword}%' order by time desc $limit";
		}elseif($type==2){
			$sql = "SELECT time,title,company,author,bugtype,wynum FROM " . DB_PREFIX . " WHERE company like '%{$keyword}%' order by time desc $limit";
		}elseif($type==3){
			$sql = "SELECT time,title,company,author,bugtype,wynum FROM " . DB_PREFIX . " WHERE author='$keyword' order by time desc $limit";
		}elseif($type==4){
			$sql = "SELECT time,title,company,author,bugtype,wynum FROM " . DB_PREFIX . " WHERE wynum like '%{$keyword}%' ";
		}else{
			$sql = "SELECT time,title,company,author,bugtype,wynum FROM " . DB_PREFIX . " WHERE title like '%{$keyword}%' order by time desc $limit";
		}
		//echo $sql;
		$logs = array();
		$res = $this->db->query($sql);
		while ($row = $this->db->fetch_array($res)) {
			$logs[] = $row;
		}
        return $logs;
	}
	
	function getkeyword_array($keyword){
		$sql = "SELECT title,company,wynum,content FROM " . DB_PREFIX . " WHERE title like '%{$keyword}%'";
		$logs = array();
		$res = $this->db->query($sql);
		while ($row = $this->db->fetch_array($res)) {
			$logs[] = $row;
		}
        return $logs;
	}
	
		/**
	 * 获取指定条件的文章条数
	 *
	 * @param int $spot 0:前台 1:后台
	 * @param string $hide
	 * @param string $condition
	 * @param string $type
	 * @return int
	 */
	function getLogNum($keyword,$type) {
		$limit = '';
		if($type==1){
			$sql = "SELECT COUNT(*) AS total FROM " . DB_PREFIX . " WHERE title like '%{$keyword}%' order by wynum desc $limit";
		}elseif($type==2){
			$sql = "SELECT COUNT(*) AS total FROM " . DB_PREFIX . " WHERE company like '%{$keyword}%' order by wynum desc $limit";
		}elseif($type==3){
			$sql = "SELECT COUNT(*) AS total FROM " . DB_PREFIX . " WHERE author='$keyword' order by wynum desc $limit";
		}elseif($type==4){
			$sql = "SELECT COUNT(*) AS total FROM " . DB_PREFIX . " WHERE wynum like '%{$keyword}%' ";
		}else{
			$sql = "SELECT COUNT(*) AS total FROM " . DB_PREFIX . " WHERE title like '%{$keyword}%' order by wynum desc $limit";
		}

        $data = $this->db->once_fetch_array($sql);
		return $data['total'];
	}
}
