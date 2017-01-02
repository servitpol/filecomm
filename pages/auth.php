<div class="index-form">
	<form id="auth">
	<div class="input-group">
	<span class="input-group-addon "><span class="glyphicon glyphicon-user"></span></span>
	<input type="email" id="authemail" class="form-control" placeholder="e-mail" required autofocus />
	</div>
	
	<div class="input-group">
	<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
	<input type="password" id="authpass" class="form-control" placeholder="Pass" required />
	</div>
	
	<button type="submit" id="submit" class="btn btn-labeled btn-success"> 
	<span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>Sign in</button>
	</form>
	<div id="result"><?php if(isset($_GET['newuser'])) echo 'An activation code is sent to your email'?></div>
</div>