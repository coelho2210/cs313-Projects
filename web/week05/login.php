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
    $query = 'SELECT password FROM member WHERE user_name = :username';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':username', $username);
    $result = $stmt->execute();
    if ($result)
    {
        
        $row = $stmt->fetch();
        // get the password from database
        $hashedPassword = $row['password'];
        
    
        //verify if stored password matches password in my database  
        if (password_verify($password, $hashedPassword))
        {
            $_SESSION['username'] = $username;
            
            header("Location: park.php");
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
<title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>User | Login</title>
</title>
<body>
    <header><h1>Login</h1></header> 
    <div id="back" style="margin-left: 10%; margin-top:10%;"> 
    <?php include 'navbar.php'; ?>  

    <div class="login">
        <form action='login.php' method='post'>
        <input type="text"  name="user" placeholder="Username"/><br>
        <input type="password"  name="pass" placeholder="Password"/><br>
        <p><?php if ($badlogin) {echo 'Your username or password is incorrect';} ?></p>
        <input type="submit" value="Login">
        </form>

    </div>
</div>
</body>
</html>