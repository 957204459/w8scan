<?php
/*
 * 插件实现
 */
class Task_Controller {

    function add($params = ''){
        if(!empty($_POST["url"])){
            // 开始处理提交表单
            $task = new Task_Model();
            $token = $task->add($_POST["url"],$_POST["descript"],$_POST["plugins"],$_POST["spider_plugins"]);
            $callback_url = BLOG_URL.'?get/'.$token;
        }
        include View::getView("header");
        include View::getview("task_add");  
    }
    function manager($params = ''){
        include View::getView("header");
        include View::getview("task_manager"); 
    }

    function task_callback($params = ''){
        if($params[1]=='/'&&!empty($params[2])){
            $token = $params[2];
            include View::getView("task_callback");
        }else{
            exit("sql error");//假错误
        }
    }
}