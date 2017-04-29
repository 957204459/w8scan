<?php 
$task = new Task_Model();
$info = $task->getToken($token);
if($info):
    $url = $info["url"];
    $spider_plugins = unserialize($info["spider_plugins"]);
    $plugins = unserialize($info["plugins"]);
    if(count($plugins)){
        foreach($plugins as $k=>$v){
        $plugins[$k] = BLOG_URL."py/plugins/".$v;
        }
    }
    if(count($spider_plugins)){
        foreach($spider_plugins as $k=>$v){
                $spider_plugins[$k] = BLOG_URL."py/spider/".$v;
        }
    }
?>
#!/usr/bin/env python
import imp
if imp.get_magic() != '\x03\xf3\r\n':
    print "Please update to Python 2.7.3 (http://www.python.org/download/)"
else:
    import zlib
    import marshal
    import urllib
    import time
    _C = True
    _Plugin = '<?php echo json_encode($plugins);?>'
    _SPlugin = '<?php echo json_encode($spider_plugins);?>'
    _B = '<?php echo BLOG_URL;?>'
    _U = '<?php echo $url;?>'.rstrip('/')
    _Token = '<?php echo $token;?>'
    print "[...] w8scan is working!!!"
    print "[...] Initialize engine ..."
    time.sleep(2)
    exec urllib.urlopen(_B+'py/main.py').read()
<?php 
else:
exit("sql error");
endif;
?>