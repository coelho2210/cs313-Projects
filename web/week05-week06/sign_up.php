<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Sing Up</title>

    <link rel="stylesheet" href="css/style.css">
</head>


<body>
    
    <div id="back">
        <?php include 'navbar.php'; ?>
        

            <div class="white">
                <form action="addUser.php" method="post">
                    <input type="text" name="uzer" placeholder="username"><br>
                    <input type="password" name="pw" placeholder="password"><br>
                    <input type="password" name="cpw" placeholder="confirm password"><br>
                    <input type="text" name="email" placeholder="email"><br>
                    <input type="text" name="cemail" placeholder="confirm email"><br>
                    <input type="text" name="fname" placeholder="First Name"><br>
                    <input type="text" name="lname" placeholder="Last Name"><br>
                    <input type="submit" value="Submit"><br>
                </form>

                
            </div>
    </div>

    
</body>

</html>