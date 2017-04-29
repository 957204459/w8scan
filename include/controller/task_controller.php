<?php
/*
 * 插件实现
 */
class Task_Controller {

    function add($params = ''){
        if(!empty($_POST["url"])){
            // 开始处理提交表单
            $task = new Task_Model();
            $token = $task->add(addslashes($_POST["url"]),addslashes($_POST["descript"]),addslashes($_POST["plugins"]),addslashes($_POST["spider_plugins"]));
            $callback_url = BLOG_URL.'?get/'.$token;
        }
        include View::getView("header");
        include View::getview("task_add");  
    }
    function manager($params = ''){
        $task = new Task_Model();
        $LogData = $task->GetPageData();
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

    function reciver_data($params = ''){
        $data = addslashes($_POST["data"]);
        if($params[1]=='/'&&!empty($params[2])&&!empty($data)){
            $token = $params[2];
            $task = new Task_Model();
            $task->update_Result($token,$data);
            echo "success!";
        }else{
            exit("sql error");//假错误
        }
    }
}