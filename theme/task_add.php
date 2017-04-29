<?php 
if(!defined('EMLOG_ROOT')) {exit('error!');} 
IsLogin()
?>
<div class="container-fluid">
<div class="row-fluid">
<?php include View::getview("left_side");?>
<?php
//获取某目录下所有文件、目录名（不包括子目录下文件、目录名）  

//开始运行

?>
<div class="span9">
    <div class="row-fluid">
    <div class="page-header">
        <h1>新建任务 <small>添加一个新的任务</small></h1>
    </div>

    <?php if($token):?>
    <div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Warning!</strong> 仅供研究学习，切勿用于非法用途
    </div>

    <div class="alert alert-info alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Success!</strong> 任务加入成功，现在执行命令 <code>python -c"exec(__import__('urllib').urlopen('<?php echo $callback_url;?>').read())"</code>
    </div>
    <?php endif;?>
    <form class="form-horizontal" method="POST" action="" name="newtask">
        <fieldset>
            <div class="control-group">
                <label class="control-label" for="role">Target</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" id="role" name="url" placeholder="url地址 http://xxx.com/"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="description">Description</label>
                <div class="controls">
                    <textarea class="input-xlarge" id="description" name="descript" rows="3" placeholder="描述"></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="slug">Slug</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" id="slug" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="slug">选择插件</label>
                <div class="controls">
                    <?php 
                    $spider = new Splugins_Controller();
                    $spider->DisplayOnPlugins();
                    ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="slug">爬虫插件</label>
                <div class="controls">
                <?php 
                $spider = new Splugins_Controller();
                $spider->DisplayOnSpider();
                ?>
                </div>
            </div>
            <div class="form-actions">
                <input type="submit" class="btn btn-success btn-large" value="Save Role" /> <a class="btn" href="roles.html">Cancel</a>
            </div>					
        </fieldset>
    </form>
    </div>
</div>
</div>
<?php include View::getview("footer");?>