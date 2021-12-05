<?php
require_once "database/database.php";
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$admin = "0";
if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty(trim($_POST["username"])))
            {
                $username_err = "Veuillez entrer votre pseudo.";
            } 
        elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"])))
            {
                $username_err = "Le nom d'utilisateur peut seulement contenir des lettres, nombres et underscores.";
            } 
        else
            {
                $sql = "SELECT id FROM users WHERE username = ?";
                if($stmt = $mysqli->prepare($sql))
                    {
                        $stmt->bind_param("s", $param_username);
                        $param_username = trim($_POST["username"]);
                        if($stmt->execute())
                            {
                                $stmt->store_result();
                                if($stmt->num_rows == 1)
                                    {
                                        $username_err = "Ce nom d'utilisateur est déja prit.";
                                    } 
                                else
                                    {
                                        $username = trim($_POST["username"]);
                                    }
                            } 
                        else
                            {
                                echo "Oups! Une erreur est survenue. Veuillez réessayer plus tard.";
                            }
                        $stmt->close();
                    }
            }
    

        if(empty(trim($_POST["password"])))
            {
                $password_err = "Please enter a password.";     
            } 
        elseif(strlen(trim($_POST["password"])) < 6)
            {
                $password_err = "Votre mot de passe doit contenir au moins 6 caractères.";
            } 
        else
            {
                $password = trim($_POST["password"]);
            }
    
        if(empty(trim($_POST["confirm_password"])))
            {
                $confirm_password_err = "Veuillez confirmer votre mot de passe";     
            } 
        else
            {
                $confirm_password = trim($_POST["confirm_password"]);
                if(empty($password_err) && ($password != $confirm_password))
                    {
                        $confirm_password_err = "Les deux mots de passe ne corresponde pas";
                    }
            }
        if(empty($_POST["admin"]))
            {
                $_POST["admin"] = $admin;
            }
        if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
            {
                $sql = "INSERT INTO users (username, password, admin) VALUES (?, ?, ?)";
                if($stmt = $mysqli->prepare($sql))
                    {
                        $stmt->bind_param("sss", $param_username, $param_password, $param_admin);
                        $param_admin = $_POST['admin'];
                        $param_username = $username;
                        $param_password = password_hash($password, PASSWORD_DEFAULT);
                        if($stmt->execute())
                            {
                                header("location: login.php");
                            } 
                        else
                            {
                                echo "Oups! Une erreur est survenue. Veuillez réessayer plus tard.";
                            }
                        $stmt->close();
                    }
            }
        $mysqli->close();
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Pseudo</label>
                <input type="text" name="username" placeholder="JohnSnow,IronMan..." class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Is Admin ?</label>
                <input type="checkbox"  name="admin" value="1">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>