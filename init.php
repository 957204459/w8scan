<?php
/**
 * 全局项加载
 * @copyright (c) Emlog All Rights Reserved
 */
session_start();
error_reporting(7);
ob_start();
header('Content-Type: text/html; charset=UTF-8');

define('EMLOG_ROOT', dirname(__FILE__));

if (extension_loaded('mbstring')) {
	mb_internal_encoding('UTF-8');
}

require_once EMLOG_ROOT.'/config.php';
require_once EMLOG_ROOT.'/include/lib/function.base.php';

doStripslashes();
