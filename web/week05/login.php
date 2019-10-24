<?php
session_start();
if (isset($_POST['user']) && isset($_POST['pass']))
{
    $username = htmlspecialchars($_POST['user']);
    $password = htmlspecialchars($_POST['pass']);
    require_once("db_access.php");
  
    $query = 'SELECT pass_word FROM game.member WHERE username = :username';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':username', $username);
    $result = $stmt->execute();
    if ($result)
    {
        $row = $stmt->fetch();
        $hashedPassword = $row['pass_word'];
        
        if (password_verify($password, $hashedPassword))
        {
            $_SESSION['username'] = $username;
            
            header("Location: main.php");
            die();
            
        }
        else 
        {
            $badLogin = true;
        }
    }
    else
    {
        $badLogin = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="games.css">
    <link rel="icon" href="shark.png" type="image/gif">
    <title>User | Login</title>
</head>
<body>
    <header><h1>Login</h1></header>  
    <div class="sticky">
        <ul class="nav">
        <li class="active"><a href="login.php">Login</a></li>
        <li><a href="signUp.php">Sign up</a></li>
        </ul>
    </div>   
    <div class="login">
        <form action='login.php' method='post'>
        <input type="text"  name="user" placeholder="Username"/><br>
        <input type="password"  name="pass" placeholder="Password"/><br>
        <p><?php if ($badlogin) {echo 'Your username or password is incorrect';} ?></p>
        <input type="submit" value="Login">
        </form>

    </div>
</body>
</html>