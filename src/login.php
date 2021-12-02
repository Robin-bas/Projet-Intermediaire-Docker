<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <title>login</title>
</head>
<body>
    <form action="action_page.php" method="get">
        <div class="container">
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" id="" required placeholder="Enter Pseudo" value="pseudo">
            <label for="password">Password</label>
            <input type="password" name="password" id="" required placeholder="Enter Password" value="password">
            <label for="email">Email</label>
            <input type="email" name="email" id="" required placeholder="Enter Email" value="email">
            <label for="admin">Admin</label>
            <input type="checkbox" name="admin" id="" value="admin">
            <button type="submit">Envoyer</button>
            <a href="register.php">create account batard !</a>
        </div>   
    </form>
</body>
</html>