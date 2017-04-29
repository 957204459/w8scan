<div class="container-fluid">
      <div class="row-fluid">
        <?php include View::getview("left_side");?>
        <div class="span9">
          <div class="well hero-unit">
            <h1>Welcome, w8scan</h1>
            <p>w8scan由w8ay开发，扫描器部分模仿了bugscan，现在，你可以创建一个用户，新建一个目标，在节点上进行扫描. 注册口令为52w8scan</p>
            <p><a class="btn btn-success btn-large" href="./?task_add">Scan Target &raquo;</a></p>
          </div>
          <div class="row-fluid">
            <div class="span3">
              <h3>任务总数</h3>
              <p><a href="#" class="badge badge-inverse">N/N</a></p>
            </div>
            <div class="span3">
              <h3>正在进行的任务</h3>
              <p><a href="users.html" class="badge badge-inverse">N</a></p>
            </div>
            <div class="span3">
              <h3>用户总数</h3>
			  <p><a href="users.html" class="badge badge-inverse">N</a></p>
            </div>
            <div class="span3">
              <h3>exp数量</h3>
			  <p><a href="roles.html" class="badge badge-inverse">N</a></p>
            </div>
          </div>
		  <br />
		  <div class="row-fluid">
			<div class="page-header">
				<h1>W8scan 拥有的功能 <small>Approve or Reject</small></h1>
			</div>
		  </div>
        </div>
      </div>
      <?php 
      include View::getview("footer");
      ?>