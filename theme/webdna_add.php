<div class="container-fluid">
<div class="row-fluid">
<?php include View::getview("left_side");?>
<div class="span9">
    <div class="row-fluid">
    <div class="page-header">
        <h1>Web指纹添加 <small>Add WebDNA</small></h1>
    </div>
    <form class="form-horizontal">
        <fieldset>
            <div class="control-group">
                <label class="control-label" for="role">Name</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" id="role" placeholder="CMS名称"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="role">PATH</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" id="role" placeholder="CMS路径"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="role">关键词</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" id="role" placeholder="关键词"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="role">MD5</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" id="role" placeholder="MD5值"/>
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