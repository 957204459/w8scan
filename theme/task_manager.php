<div class="container-fluid">
      <div class="row-fluid">
        <?php include View::getview("left_side");?>
        <div class="span9">
		  <div class="row-fluid">
			<div class="page-header">
				<h1>任务管理 <small>Task Manager</small></h1>
			</div>
			<table class="table table-striped table-bordered table-condensed">
				<thead>
					<tr>
						<th>ID</th>
						<th>目标</th>
						<th>网站标题</th>
						<th>网站IP</th>
						<th>环境</th>
                        <th>备注</th>
						<th>Status</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<tr class="list-users">
					<td>1</td>
					<td>https://forum.90sec.org/index.php</td>
					<td>90安全网</td>
					<td>127.0.0.1</td>
					<td>Night</td>
					<td>90安全网测试</td>
					<td><span class="label label-success">running</span></td>
					<td>
						<div class="btn-group">
							<a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Actions <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="icon-user"></i> Details</a></li>
								<li><a href="#"><i class="icon-trash"></i> Delete</a></li>
							</ul>
						</div>
					</td>
				</tr>
				</tbody>
			</table>
			<div class="pagination">
				<ul>
					<li><a href="#">Prev</a></li>
					<li class="active">
						<a href="#">1</a>
					</li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">Next</a></li>
				</ul>
			</div>
			<a href="new-user.html" class="btn btn-success">New User</a>
		  </div>
        </div>
      </div>
    <script>
	$(document).ready(function() {
		$('.dropdown-menu li a').hover(
		function() {
			$(this).children('i').addClass('icon-white');
		},
		function() {
			$(this).children('i').removeClass('icon-white');
		});
		
		if($(window).width() > 760)
		{
			$('tr.list-users td div ul').addClass('pull-right');
		}
	});
	</script>
    <?php include View::getview("footer");?>