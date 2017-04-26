<div class="container-fluid">
      <div class="row-fluid">
        <?php include View::getview("left_side");?>
        <div class="span9">
		  <div class="row-fluid">
			<div class="page-header">
				<h1>指纹管理 <small>WebDNA total:<?php echo $lognum;?></small></h1>
			</div>
			<table class="table table-striped table-bordered table-condensed">
				<thead>
					<tr>
						<th>指纹名称</th>
						<th>请求路径</th>
						<th>关键字</th>
						<th>MD5</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($logDate as $v):?>
				<tr class="list-users">
					<td><?php echo htmlClean($v["name"]);?></td>
					<td><?php echo htmlClean($v["url"]);?></td>
					<td><?php echo htmlClean($v["re"]);?></td>
					<td><?php echo htmlClean($v["md5"]);?></td>
					<td>
                    <a class="btn btn-mini" href="#">删除</a>
					</td>
				</tr>
				<?php endforeach;?>
				</tbody>
			</table>
			<?php echo $page_url;?>
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