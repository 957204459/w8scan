<div class="container-fluid">
      <div class="row-fluid">
        <?php include View::getview("left_side");?>
        <div class="span9">
		  <div class="row-fluid">
			<div class="page-header">
				<h1>插件管理 <small>Total:(24)</small></h1>
			</div>
			<table class="table table-striped table-bordered table-condensed">
				<thead>
					<tr>
						<th>ID</th>
						<th>插件名称</th>
						<th>插件描述</th>
						<th>插件等级</th>
						<th>插件作者</th>
                        <th>插件地址</th>
						<th>状态</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<tr class="list-users">
					<td>1</td>
					<td>XX插件</td>
					<td>进行XX左右</td>
					<td>高危</td>
					<td>未ay</td>
					<td>lib/xxx.py</td>
					<td><span class="label label-success">running</span></td>
					<td>
							<a class="btn btn-mini" href="#">删除</a>
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