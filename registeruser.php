  <?php
 if(!empty($_POST['username'])&& isset($_POST['username'])){
	require_once('/inc/db.php');
	require_once('/inc/bcrypt.php');
	
// load the class
$secure = new SecureHash();
// the password to encrypt
$pass = $_POST['password'];
// salt is passed by reference and generated on the fly
$salt = '';
// the encrypted version of the password (for database storage)
$encrypted = $secure->create_hash($pass, $salt);
// now store both the $encrypted and $salt values in the database
// new data
$username = $_POST['username'];
$salt = $salt;
$password = $encrypted;
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$email = $_POST['email'];
$birthday = $_POST['bday'];
$location = $_POST['location'];

$conn = createPDO();
// query
$sql = "INSERT INTO user (username,firstname,lastname,email,password,salt,birthday,location)
VALUES (:username,:firstname,:lastname,:email,:password,:salt,:birthday,:location)";
$q = $conn->prepare($sql);
$q->execute(array(':username' => $username,
					':firstname' => $firstname,
					':lastname' => $lastname,
					':email' => $email,
					':password' => $password,					
					':salt' => $salt,
					':birthday' => $birthday,
					':location' => $location));
	header('Location: /index.php');
	die();
	 }else{
	 header('Location: /register.php');
	 die();
 }