<?php session_start(); 
    if (!isset($_SESSION['email']))
    {
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <title>Blog VDM</title>
</head>
<body>
    <h1>Blog vie de merde</h1>
    <h5>Si vous aussi vous avez une vie de merde commenter</h5>
    <p>Login toi fdp !!!!</p>
    <a href="login.php">login</a>
</body>
</html>
