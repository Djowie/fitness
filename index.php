<?php session_start();?>
<?php require_once('/inc/header.php');?>
<?php require_once('/inc/navigation.php');?>
<?php require_once('/inc/db.php');?>
<?php require_once('/inc/bcrypt.php');?>
<?php require_once('/inc/classes.php');?>
 
 <?php if(($_SERVER['REQUEST_METHOD'] == "POST")){
$email = $_POST['email'];
$password = $_POST['key'];

//Create new user object
$user = new user();
//try fill user by emailadress given through login
$user->getByEmailAddress($email);
 
//check whether login is true, else show popup
if(is_numeric($user->authenticateUser($password))){
	$_SESSION['currentUser'] = serialize($user);
	header('Location: /index2.php');
	die();	
}else{

?>
<script> 
$(document).ready(function(){
$('.top-right').notify({
    message: { text: '<?php echo $user->authenticateUser($password);?>'}, type: 'warning', closable: 'true'
  }).show(); // for the ones that aren't closable and don't fade out there is a .hide() function.
});
 </script>
<?php
}
 }
 ?>
 
   <div class='notifications top-right'></div>
   <body>
    <div class="container theme-showcase" role="main">
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
		<h2>Login</h2>
		<p>Please login, by filling in your username and password. If you don't have an account already, please signup.</p>
		<section id="login">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="form-wrap">
							<form role="form" action="/index.php" method="post" id="login-form" autocomplete="off">
								<div class="form-group">
									<label for="email" class="sr-only">Email</label>
									<input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
								</div>
								<div class="form-group">
									<label for="key" class="sr-only">Password</label>
									<input type="password" name="key" id="key" class="form-control" placeholder="Password">
								</div>
								<div class="checkbox">
									<span class="character-checkbox" onclick="showPassword()"></span>
									<span class="label">Show password</span>
								</div>
								<input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in">
							</form>
							
							<!--<a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Forgot your password?</a>-->
							<hr>
						</div>
					</div> <!-- /.col-xs-12 -->
				</div> <!-- /.row -->
			</div> <!-- /.container -->
		</section>
		<div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							<span aria-hidden="true">×</span>
							<span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title">Recovery password</h4>
					</div>
					<div class="modal-body">
						<p>Type your email account</p>
						<input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-custom">Recovery</button>
					</div>
				</div> <!-- /.modal-content -->
			</div> <!-- /.modal-dialog -->
		</div> <!-- /.modal -->
	</div>
  </body>
</html>