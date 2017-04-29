   <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">W8scan 任务系统</a>
          <div class="btn-group pull-right">
			<a class="btn" href=""><i class="icon-user"></i> <?php echo $_SESSION["user"];?></a>
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <?php 
              if(!empty($_SESSION["user"])):
              ?>
              <li class="divider"></li>
              <li><a href="./?logout">Logout</a></li>
              <?php else:?>
              <li><a href="./?reg">注册</a></li>
              <li class="divider"></li>
              <li><a href="./?login">登陆</a></li>
              <?php endif;?>
            </ul>
          </div>
          <div class="nav-collapse">
            <ul class="nav">
			<li><a href="?index">Home</a></li>
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">任务 <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="?task_add">新任务</a></li>
					<li class="divider"></li>
					<li><a href="?task_manager">任务管理</a></li>
				</ul>
			  </li>
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">指纹 <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="?webdna_add">新指纹</a></li>
					<li class="divider"></li>
					<li><a href="?webdna_manager">指纹管理</a></li>
				</ul>
			  </li>
			  <li><a href="?about">关于</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>