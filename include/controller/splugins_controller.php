<?php

 class Splugins_Controller{

     function DisplayOnSpider(){
        $spider = new Splugins_Model();
        $infos = $spider->Getinfo(EMLOG_ROOT."/py/spider");
        // print_r($info);
        foreach($infos as $info){
            $descipt = $info["descript"];
            $name = $info["path"];
            echo "<input type='checkbox' value='{$name}' name='spider_plugins[]'> {$descipt}";
        }
     }

     function DisplayOnPlugins(){
        $spider = new Splugins_Model();
        $infos = $spider->Getinfo(EMLOG_ROOT."/py/plugins");
        // print_r($info);
        foreach($infos as $info){
            $descipt = $info["descript"];
            $name = $info["path"];
            echo "<input type='checkbox' value='{$name}' name='plugins[]'> {$descipt}";
        }
     }

 }