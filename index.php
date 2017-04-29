<?php
/**
 * 前端页面加载
 * @copyright (c) Emlog All Rights Reserved
 */

require_once 'init.php';
define ('TEMPLATE_PATH', EMLOG_ROOT . '/theme/');
define('theme_path',BLOG_URL . 'theme/');

// $action = isset($_GET['action']) ? addslashes($_GET['action']) : '';

$index_lognum = 10;

/*$index = new Index_Controller();
$index->display();*/
// include View::getview("home");  //首页
// include View::getview("register"); //注册
// include View::getview("login"); //登陆
// include View::getview("webdna_manager");
// new WebDNA_Model();
doStripslashes();
$emDispatcher = Dispatcher::getInstance();
$emDispatcher->dispatch();
View::output();