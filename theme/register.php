    <div class="container-fluid">
      <div class="row-fluid">
        <?php include View::getview("left_side");?>
        <div class="span9">
		  <div class="row-fluid">
			<div class="page-header">
				<h1>用户注册 <small>register</small></h1>
			</div>
			<?php if(!empty($return_msg)):?>
			<div class="alert alert-info alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Info</strong> <?php echo $return_msg;?>
			</div>
			<?php endif;?>
			<form class="form-horizontal" method="POST" action="" name="reg">
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
						<label class="control-label" for="email">E-mail</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="email" value="" placeholder="w8ay@qq.com" name="email"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="pnohe">SecCode</label>
						<div class="controls">
							<input type="text" class="input-xlarge" value="" placeholder="邀请码" name="secode"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="active">不会用于非法用途</label>
						<div class="controls">
							<input type="checkbox" id="active" value="1" checked />
						</div>
					</div>
					<div class="form-actions">
						<input type="submit" class="btn btn-success btn-large" value="注册" /> <a class="btn" href="./">取消</a>
					</div>					
				</fieldset>
			</form>
		  </div>
        </div>
      </div>

      

      <?php 
      include View::getview("footer");
      ?>