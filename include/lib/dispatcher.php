<?php
/**
 * 路由分发器
 * author:w8ay
 **/
 class Dispatcher{
    static $_instance;

    /**
        * 请求模块
        */
    private $_model = '';

    /**
        * 请求模块方法
        */
    private $_method = '';

    /**
        * 请求参数
        */
    private $_params;

    /**
        * 路由表
        */
    private $_routingTable;
    public static function getInstance() {//大概功能就是创建这个类
        if(self::$_instance == null) {
            self::$_instance = new Dispatcher();
            return self::$_instance;
        } else {
            return self::$_instance;
        }
    }

    private function __construct() {//初始化就调用的类
        $this->_path = $this->setPath();
        $this->_routingTable = $this->getRoutingTable();
        foreach ($this->_routingTable as $route) {
            if (preg_match($route['reg_0'], $this->_path, $matches)) {
                $this->_model = $route['controller'];
                $this->_method = $route['method'];
                $this->_params = $matches;
                break;
            }
        }

        if (empty($this->_model)) {
            show_404_page();
        }

    }
    static function getRoutingTable(){
        $routingtable = array(
            array(
                'controller' => 'Index_Controller',
                'method' => 'login',
                'reg_0' => '|^.*/\?login|'
            ),
            array(
                'controller' => 'Index_Controller',
                'method' => 'reg',
                'reg_0' => '|^.*/\?reg|'
            ),
            array(
                'controller' => 'About_Controller',
                'method' => 'display',
                'reg_0' => '|^.*/\?about|'
            ),
            array(
                'controller' => 'Index_Controller',
                'method' => 'logout',
                'reg_0' => '|^.*/\?logout|'
            ),
            array(
                'controller' => 'Task_Controller',
                'method' => 'add',
                'reg_0' => '|^.*/\?task_add|'
            ),
            array(
                'controller' => 'Task_Controller',
                'method' => 'manager',
                'reg_0' => '|^.*/\?task_manager|'
            ),
            array(
                'controller' => 'Plugin_Controller',
                'method' => 'add',
                'reg_0' => '|^.*/\?plugin_add|'
            ),
            array(
                'controller' => 'Plugin_Controller',
                'method' => 'manager',
                'reg_0' => '|^.*/\?plugin_manager|'
            ),
            array(
                'controller' => 'WebDNA_Controller',
                'method' => 'add',
                'reg_0' => '|^.*/\?webdna_add|'
            ),
            array(
                'controller' => 'WebDNA_Controller',
                'method' => 'manager',
                'reg_0' => '|^.*/\?webdna_manager(/)?(\d+)?|'
            ),
            array(
                'controller' => 'Task_Controller',
                'method' => 'task_callback',
                'reg_0' => '|^.*/\?get(/)?(\w+)?|'
            ),
            array(
                'controller' => 'Task_Controller',
                'method' => 'reciver_data',
                'reg_0' => '|^.*/\?send(/)?(\w+)?|'
            ),
            array(
                'controller' => 'Index_Controller',
                'method' => 'display',
                'reg_0' => '|^/?([\?&].*)?$|'
            ),
        );
        return $routingtable;
    }
    public function dispatch(){
        $module = new $this->_model();
        $method = $this->_method;
        $module->$method($this->_params);
    }

    public static function setPath(){
        $path = '';
        if (isset($_SERVER['HTTP_X_REWRITE_URL'])) { //iis
            $path = $_SERVER['HTTP_X_REWRITE_URL'];
        } elseif (isset($_SERVER['REQUEST_URI'])) {
            $path = $_SERVER['REQUEST_URI'];
        } else {
            if (isset($_SERVER['argv'])) {
                $path = $_SERVER['PHP_SELF'] .'?'. $_SERVER['argv'][0];
            } else {
                $path = $_SERVER['PHP_SELF'] .'?'. $_SERVER['QUERY_STRING'];
            }
        }

        //for iis6 path is GBK
        if (isset($_SERVER['SERVER_SOFTWARE']) && false !== stristr($_SERVER['SERVER_SOFTWARE'], 'IIS')) {
            if (function_exists('mb_convert_encoding')) {
                $path = mb_convert_encoding($path, 'UTF-8', 'GBK');
            } else {
                $path = @iconv('GBK', 'UTF-8', @iconv('UTF-8', 'GBK', $path)) == $path ? $path : @iconv('GBK', 'UTF-8', $path);
            }
        }
        //for ie6 header location
        $r = explode('#', $path, 2);
        $path = $r[0];
        //for iis6
        $path = str_ireplace('index.php', '', $path);
        //for subdirectory
        $t = parse_url(BLOG_URL);
        $path = str_replace($t['path'], '/', $path);

        return $path;
    }
 }