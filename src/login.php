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
    <form action="action_page.php" method="post">
        <div class="container">
            <label for="pseudo">pseudo</label>
            <input type="text" name="pseudo" id="" required placeholder="Enter Pseudo">
            <label for="password">password</label>
            <input type="password" name="password" id="" required placeholder="Enter Password">
            <label for="email">email</label>
            <input type="email" name="email" id="" required placeholder="Enter Email">
            <label for="isadmin">Admin</label>
            <input type="checkbox" name="isadmin" id="">
            <button type="submit">Envoyer</button>
        </div>   
    </form>
</body>
</html>