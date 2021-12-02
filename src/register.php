<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.lhandlers.com/css/registerSite.css">
    <title>Register</title>
</head>
<body>
<div class="login-box">
  <h2>Register</h2>
  <form action="" method="post">
    <div class="user-box">
      <input type="text" name="pseudo" required="">
      <label>Pseudo</label>
    </div>
    <div class="user-box">
      <input type="password" name="password1" required="">
      <label>Password</label>
    </div>
    <div class="user-box">
        <input type="password" name="password2" required="">
        <label>Re-password</label>
    </div>
    <div class="user-box">
        <input type="text" name="email" required="">
        <label>Email</label>
    </div>
    <div class="buttonEndForm">
    <button type="submit">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Submit
    </button>
    <a href="index.php">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Login
    </a>
    </div>
  </form>
</div>
</body>
</html>
<?php
	if(isset($_GET["email"]) && isset($_GET["pseudo"]) && isset($_POST["password1"]) && isset($_POST["password2"])){
		$errors = array();
		
		$emailMaxLength = 254;
		$usernameMaxLength = 20;
		$usernameMinLength = 3;
		$passwordMaxLength = 19;
		$passwordMinLength = 5;
		
		$email = strtolower($_POST["email"]);
		$username = $_POST["username"];
		$password1 = $_POST["password1"];
		$password2 = $_POST["password2"];
		
		//Validate email
		if(preg_match('/\s/', $email)){
			$errors[] = "Email can't have spaces";
		}else{
			if(!validate_email_address($email)){
				$errors[] = "Invalid email";
			}else{
				if(strlen($email) > $emailMaxLength){
					$errors[] = "Email is too long, must be equal or under " . strval($emailMaxLength) . " characters";
				}
			}
		}
		
		//Validate username
		if(strlen($username) > $usernameMaxLength || strlen($username) < $usernameMinLength){
			$errors[] = "Incorrect username length, must be between " . strval($usernameMinLength) . " and " . strval($usernameMaxLength) . " characters";
		}else{
			if(!ctype_alnum ($username)){
				$errors[] = "Username must be alphanumeric";
			}
		}
		
		//Validate password
		if($password1 != $password2){
			$errors[] = "Passwords do not match";
		}else{
			if(preg_match('/\s/', $password1)){
				$errors[] = "Password can't have spaces";
			}else{
				if(strlen($password1) > $passwordMaxLength || strlen($password1) < $passwordMinLength){
					$errors[] = "Incorrect password length, must be between " . strval($passwordMinLength) . " and " . strval($passwordMaxLength) . " characters";
				}else{
					if(!preg_match('/[A-Za-z]/', $password1) || !preg_match('/[0-9]/', $password1)){
						$errors[] = "Password must contain atleast 1 letter and 1 number";
					}
				}
			}
		}
		
		//Check if there is user already registered with the same email or username
		if(count($errors) == 0){
			//Connect to database
			require ('database.php');
			
			if ($stmt = $mysqli_conection->prepare("SELECT username, email FROM sc_users WHERE email = ? OR username = ? LIMIT 1")) {
				
				/* bind parameters for markers */
				$stmt->bind_param('ss', $email, $username);
					
				/* execute query */
				if($stmt->execute()){
					
					/* store result */
					$stmt->store_result();

					if($stmt->num_rows > 0){
					
						/* bind result variables */
						$stmt->bind_result($username_tmp, $email_tmp);

						/* fetch value */
						$stmt->fetch();
						
						if($email_tmp == $email){
							$errors[] = "User with this email already exist.";
						}
						else if($username_tmp == $username){
							$errors[] = "User with this name already exist.";
						}
					}
					
					/* close statement */
					$stmt->close();
					
				}else{
					$errors[] = "Something went wrong, please try again.";
				}
			}else{
				$errors[] = "Something went wrong, please try again.";
			}
		}
		
		//Finalize registration
		if(count($errors) == 0){
			$hashedPassword = password_hash($password1, PASSWORD_BCRYPT);
			if ($stmt = $mysqli_conection->prepare("INSERT INTO sc_users (username, email, password) VALUES(?, ?, ?)")) {
				
				/* bind parameters for markers */
				$stmt->bind_param('sss', $username, $email, $hashedPassword);
					
				/* execute query */
				if($stmt->execute()){
					
					/* close statement */
					$stmt->close();
					
				}else{
					$errors[] = "Something went wrong, please try again.";
				}
			}else{
				$errors[] = "Something went wrong, please try again.";
			}
		}
		
		if(count($errors) > 0){
			echo $errors[0];
		}else{
			echo "<h2 >Votre compte a bien été créer veuillez vous connectez !</h2>";
		}
	}else{
		echo "Missing data";
	}
	
	function validate_email_address($email) {
		return preg_match('/^([a-z0-9!#$%&\'*+-\/=?^_`{|}~.]+@[a-z0-9.-]+\.[a-z0-9]+)$/i', $email);
	}