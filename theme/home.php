<div class="container-fluid">
      <div class="row-fluid">
        <?php include View::getview("left_side");?>
        <div class="span9">
          <div class="well hero-unit">
            <h1>Welcome, w8scan</h1>
            <p>w8scan由w8ay开发，扫描器部分模仿了bugscan，现在，你可以创建一个用户，新建一个目标，在节点上进行扫描. 注册口令为52w8scan</p>
            <p><a class="btn btn-success btn-large" href="users.html">Scan Target &raquo;</a></p>
          </div>
          <div class="row-fluid">
            <div class="span3">
              <h3>任务总数</h3>
              <p><a href="#" class="badge badge-inverse">100</a></p>
            </div>
            <div class="span3">
              <h3>正在进行的任务</h3>
              <p><a href="users.html" class="badge badge-inverse">8</a></p>
            </div>
            <div class="span3">
              <h3>用户总数</h3>
			  <p><a href="users.html" class="badge badge-inverse">2</a></p>
            </div>
            <div class="span3">
              <h3>exp数量</h3>
			  <p><a href="roles.html" class="badge badge-inverse">3</a></p>
            </div>
          </div>
		  <br />
		  <div class="row-fluid">
			<div class="page-header">
				<h1>W8scan 拥有的功能 <small>Approve or Reject</small></h1>
			</div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Descript</th>
						<th>level</th>
						<th>Role</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
				<tr class="pending-user">
					<td>1</td>
					<td>爬虫模块</td>
					<td>w8scan内置的爬虫模块 -静态爬虫模块，无法爬取动态内容</td>
					<td>无危险级别</td>
					<td>w8ay</td>
					<td><span class="label label-success">running</span></td>
				</tr>
				<tr class="pending-user">
					<td>2</td>
					<td>信息收集模块</td>
					<td>收集域名信息</td>
					<td>低危</td>
					<td>w8ay</td>
					<td><span class="label label-important">closed</span></td>
				</tr>
				</tbody>
			</table>
		  </div>
        </div>
      </div>
      <?php 
      include View::getview("footer");
      ?>