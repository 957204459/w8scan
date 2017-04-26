<?php
/*
 * 首页显示方法
 */
class Index_Controller {
    function display($params = ''){
        include View::getView("header");
        include View::getview("home");  //首页
    }
    function login($params = ''){
        include View::getView("header");
        include View::getview("login");  
    }
    function reg($params = ''){
        include View::getView("header");
        include View::getview("register"); 
    }
}