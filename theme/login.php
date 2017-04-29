    <div class="container-fluid">
      <div class="row-fluid">
        <?php include View::getview("left_side");?>
        <div class="span9">
		  <div class="row-fluid">
			<div class="page-header">
				<h1>用户登陆 <small>Login</small></h1>
			</div>
			<form class="form-horizontal" action="" method="POST" name="login">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="name">UserName</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="name" value="" placeholder="Admin" name="username"/>
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label" for="pnohe">Password</label>
						<div class="controls">
							<input type="text" class="input-xlarge" value="" placeholder="Password" name="password"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="active">不会用于非法用途</label>
						<div class="controls">
							<input type="checkbox" id="active" value="1" checked />
						</div>
					</div>
					<div class="form-actions">
						<input type="submit" class="btn btn-success btn-large" value="Login " /> <a class="btn" href="./">取消</a>
					</div>					
				</fieldset>
			</form>
		  </div>
        </div>
      </div>
      <?php 
      include View::getview("footer");
      ?>