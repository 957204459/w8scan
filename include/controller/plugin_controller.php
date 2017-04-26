<?php
/*
 * 插件实现
 */
class Plugin_Controller {
    function add($params = ''){
        include View::getView("header");
        include View::getview("plugin_add");  
    }
    function manager($params = ''){
        include View::getView("header");
        include View::getview("plugin_manager"); 
    }
}