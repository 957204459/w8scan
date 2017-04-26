<div class="container-fluid">
<div class="row-fluid">
<?php include View::getview("left_side");?>
<div class="span9">
    <div class="row-fluid">
    <div class="page-header">
        <h1>添加插件 <small>可添加插件或者exp，添加exp时请选择exp选项</small></h1>
    </div>
    <form class="form-horizontal">
        <fieldset>
           
            <div class="control-group">
                <label class="control-label" for="role">Title</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" id="role" placeholder="名称"/>
                </div>
            </div>
             <div class="control-group">
                <label class="control-label" for="active">添加exp？</label>
                <div class="controls">
                    <input type="checkbox" id="active" value="1" checked />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="description">Description</label>
                <div class="controls">
                    <textarea class="input-xlarge" id="description" rows="3" placeholder="描述"></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="description">Pyhton</label>
                <div class="controls">
                    <textarea class="input-xlarge" id="description" rows="10" placeholder="python代码"></textarea>
                </div>
            </div>

            <div class="form-actions">
                <input type="submit" class="btn btn-success btn-large" value="Save Rule" /> <a class="btn" href="roles.html">Cancel</a>
            </div>					
        </fieldset>
    </form>
    </div>
</div>
</div>
<?php include View::getview("footer");?>