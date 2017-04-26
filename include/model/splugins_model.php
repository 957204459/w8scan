<?php
/**
 * 爬虫插件管理，添加，显示
 *
 * @copyright (c) w8scan All Rights Reserved
 */
 class Splugins_Model{
     /**
    * 获取指定行内容
    *
    * @param $file 文件路径
    * @param $line 行数
    * @param $length 指定行返回内容长度
    */
    function getLine($file, $line, $length = 4096){
        $returnTxt = null; // 初始化返回
        $i = 1; // 行数
    
        $handle = @fopen($file, "r");
        if ($handle) {
            while (!feof($handle)) {
                $buffer = fgets($handle, $length);
                if($line == $i) $returnTxt = $buffer;
                $i++;
            }
            fclose($handle);
        }
        return $returnTxt;
    }

    /*
    * 获取指定文件夹的所有文件
    *
    */
    function tree($directory) 
    { 
        $mydir = dir($directory); 
        $filedir = array();
        while($file = $mydir->read())
        { 
            if((is_dir("$directory/$file")) AND ($file!=".") AND ($file!="..")) 
            {
                $filedir[] = $file;
                tree("$directory/$file"); 
            } 
            else if(($file!=".") AND ($file!="..")){
                $filedir[] = $file;
            } 
            
        }
        $mydir->close(); 
        return $filedir;
    } 

    function Getinfo($dirx){
        $filenames = $this->tree($dirx);
        $info = array();
        foreach($filenames as $filename){
            $rtext = $this->getLine($dirx.'/'.$filename,1);
            $rtext = trim($rtext);
            $descript = substr(strrchr($rtext, "#"), 1);
            $tem_arr = [];
            $tem_arr["descript"] = $descript;
            $tem_arr["all_path"] = $dirx.'/'.$filename;
            $tem_arr["path"] = $filename;
            $info[] = $tem_arr;
        }
        return $info;
    }


 }