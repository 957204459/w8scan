<?php
/*
 * 指纹识别
 */
class WebDNA_Controller {
    function add($params = ''){
        include View::getView("header");
        include View::getview("webdna_add");  
    }
    function manager($params = ''){
        $page = isset($params[0])&&$params[1]=="/" ? abs(intval($params[2])) : 1;
        $WebDNA = new WebDNA_Model();
        $lognum = $WebDNA->getall();

        $total_pages = ceil($lognum / 10);
        if ($page > $total_pages) {
            $page = $total_pages;
        }
		$pageurl .= BLOG_URL.'?webdna_manager/';
        $page_url = pagination($lognum, 10, $page, $pageurl);
        $logDate = $WebDNA->getdata($page-1,10);

        include View::getView("header");
        include View::getview("webdna_manager"); 
    }
}