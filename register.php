 <?php require_once('/inc/header.php');?>
 <?php require_once('/inc/navigation.php');?>

<div class="container-fluid">
    <section class="container">
		<div class="container-page">	
		<div class='row'>
			<div class="col-md-7">
				<h3 class="dark-grey">Registration</h3>
				<form action="/registeruser.php" autocomplete="off" method="POST">
					<div class="form-group col-lg-6">
					    <label for="username">Username</label>
						<input id="username" name="username" pattern="[a-zA-Z0-9]{5,}" title="Minimum 5 letters or numbers." required >
					</div>
					<div class="form-group col-lg-6">
						<label for="password">Password</label>
						<input id="password" name="password" type="password" pattern=".{5,}" title="Minmimum 5 letters or numbers." required >
					</div>
					<div class="form-group col-lg-6">
						<label for="email">Email address</label>
						<input id="email" name="email" type="email" required >
					</div>
					<div class="form-group col-lg-6">
						<label for="fname">Firstname</label>
						<input type="text" maxlength="32" name="fname" pattern="[A-Za-z]{1,32}" value="" required >
					</div>
					<div class="form-group col-lg-6">
						<label for="lname">Lastname</label>
						<input type="text" maxlength="32" name="lname" pattern="[A-Za-z]{1,32}" value="" required >
					</div>
					<div class="form-group col-lg-6">
						<label for="bday">Birthday</label>
						<input id="bday" name="bday" type="date">
					</div>
					<div class="form-group col-lg-6">
						<label for="location">Location</label>
						<input id="location" name="location" type="text">
					</div>
									<input type="submit" class="btn btn-primary" role="button" value="Register" />
				</form>
			</div>
		<div class="col-md-5">
				<h3 class="dark-grey">Terms and Conditions</h3>
				<p>
					By clicking on "Register" you agree to Fitness Coach's Terms and Conditions
				</p>


		</div>
		</div>
	</div>
	</section>
</div>
</body>
</html>