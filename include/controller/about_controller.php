<?php
/*
 * about显示方法
 */
class About_Controller {

    
    function display($params = ''){
        include View::getView("header");
        include View::getview("about");  //首页
    }
}