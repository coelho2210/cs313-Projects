<?php
session_start();
// check if I have user and password
if (isset($_POST['user']) && isset($_POST['pass']))
{
    //store the user and password
    $username = htmlspecialchars($_POST['user']);
    $password = htmlspecialchars($_POST['pass']);
    
    //catch the database
    require_once("db_access.php");


    // searching for password
    $query = 'SELECT pass_word FROM game.member WHERE username = :username';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':username', $username);
    $result = $stmt->execute();
    if ($result)
    {
        
        $row = $stmt->fetch();
        // get the password from database
        $hashedPassword = $row['pass_word'];
        
    
        //verify if stored password matches password in my database  
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
    <link rel="stylesheet" href="/CSS/style.css">
    <title>User | Login</title>
</head>
<body>
    <header><h1>Login</h1></header>  
    <?php include 'navbar.php'; ?>  
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