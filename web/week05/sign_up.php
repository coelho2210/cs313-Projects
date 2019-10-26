<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title> Sing Up</title>
</title>
<body>
    <header><h1>Sign Up</h1></header> 
    <div id="back" style="margin-left: 10%; margin-top:10%;"> 
    <?php include 'navbar.php'; ?>  

<form action="">

    <div class="white">
        <form action="addUser.php" method="post">
            <input type="text" name="uzer" placeholder="username"><br>
            <input type="password" name="pw" placeholder="password"><br>
            <input type="password" name="cpw" placeholder="confirm password"><br>
            <input type="text" name="email" placeholder="email"><br>
            <input type="text" name="cemail" placeholder="confirm email"><br>
            <input type="text" name="fname" placeholder="First Name"><br>
            <input type="text" name="lname" placeholder="Last Name"><br>
            <input type="submit" value="Add Account"><br>       
        </form>
    </div>
</body>
</html>




