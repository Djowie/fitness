<?php
	require_once('/inc/bcrypt.php');

/**
* User Class Data*
**/
class user{
	protected $id = null;
	protected $username = null;
	protected $password = null;
	protected $salt = null;
	protected $firstname = null;
	protected $lastname = null;
	protected $email = null;
	protected $birthday = null;
	protected $location = null;
	protected $datecreated = null;
	protected $lastmodified = null;
	public $loggedIn = null;


	function getById($id){
				 $conn = createPDO();

		 // load your user database model
		try{$stmt = $conn->prepare('SELECT * FROM user WHERE id = :id');
					$stmt->execute(array(':id' => $id));
					
					//if you got any, than set the user
					while($row = $stmt->fetch()) {
						$this->id = $row['id'];
						$this->username = $row['username'];
						$this->password = $row['password'];
						$this->salt = $row['salt'];
						$this->firstname = $row['firstname'];
						$this->lastname = $row['lastname'];
						$this->email = $row['email'];
						$this->birthday = $row['birthday'];
						$this->location = $row['location'];
						$this->datecreated = $row['datecreated'];
						$this->lastmodified = $row['lastmodified'];


					}
		}catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
		}	
	}
	function getByEmailAddress($email){
		 // load your user database model
		 $conn = createPDO();

		try{$stmt = $conn->prepare('SELECT * FROM user WHERE email = :email');
					$stmt->execute(array(':email' => $email));
					
					//if you got any, than set the user
					while($row = $stmt->fetch()) {
						$this->id = $row['id'];
						$this->username = $row['username'];
						$this->password = $row['password'];
						$this->salt = $row['salt'];
						$this->firstname = $row['firstname'];
						$this->lastname = $row['lastname'];
						$this->email = $row['email'];
						$this->birthday = $row['birthday'];
						$this->location = $row['location'];
						$this->datecreated = $row['datecreated'];
						$this->lastmodified = $row['lastmodified'];


					}
		}catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
		}	
	}
	
	function authenticateUser($input){
		$secure = new SecureHash();        
        // check for password match
        if ($secure->validate_hash($input, $this->password, $this->salt)) {
            // success, log the user in and redirect
			$this->loggedIn = true;
			return $this->id;
			} else {
            // error, password mismatch
            return 'The password did not match our records, please try again.';
        }
	}
	

	
}

?>

