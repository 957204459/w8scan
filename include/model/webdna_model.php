<?php
/*
 * 指纹识别
 */
class WebDNA_Model {
    function __construct(){
        $this->filename = EMLOG_ROOT.'/w7scan/data/cms.json';
        if(file_exists($this->filename)){
            $str = file_get_contents($this->filename);//将整个文件内容读入到一个字符串中
            $this->_data = json_decode($str,true);
        }
    }
    function getall(){
        return count($this->_data);
    }

    function getdata($index = 0,$num = 10){
        return array_slice(array_reverse($this->_data),$index*10,$num);
    }

    function insert($name = '',$url = '',$re = '',$key = ''){
        $temp = array(
            "url" => $url,
            "name" => $name,
            "re" => $re,
            "md5" => $md5
        );
        $this->_data[] = $temp;
        $data = json_encode($this->_data);
        file_put_contents($this->filename,$data);
    }
}