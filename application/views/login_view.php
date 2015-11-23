<!DOCTYPE html>
<html lang="en">
<head>
  <title>Diet Expert - Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>

<body>
<div id='login_form'>
<form class="form-horizontal"   action='<?php echo base_url();?>index.php/login/process' method='post' name='process'     >
<fieldset>
<div class="container">

  <!--col-->
  <div class="col-lg-12 col-md-8 col-sm-6 col-xs-4">
  <!-- panel panel-default-->
  <div class="panel panel-default" >
	<!-- panel-body -->
	<div class="panel-body" align="center" >
		<h3>Log In</h3>
		<!-- Text input-->
		<div class="control-group">
			<label class="control-label" for="textinput">Username</label>
			<div >
				<div class="controls ">
					<input  type='text' name='username' id='username' size='25' placeholder="Enter ur name" class="input-small">
				</div>
			</div>
			
		</div>
		<!-- Password input-->
		<div class="control-group">
			<label class="control-label" for="passwordinput">Password</label>
			<div class="controls">
				<input type='password' name='password' id='password' size='25'  placeholder="enter ur paswrd here" class="input-small">
			<!--<p class="help-block">help</p>-->
			</div>
		</div>
		<!-- Button -->
		<div class="control-group">
			<label class="control-label" for="singlebutton"></label>
			<div class="controls">
                             <input type='Submit' value='Login' class="btn btn-primary" />    
				
			</div>
		</div>
	</div>
  </div>
  </div>
</div>
</fieldset>
</form> 

</div>    
</body>
</html>