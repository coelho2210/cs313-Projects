  
<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>
<header>
<h1>Login</h1>
<hr>
</header>
<main class="login">
    <div class="wrapper">
    <h2 style="color:red;<?php if($_GET["fail"] != 'true'){ echo 'display:none';}?>">Username or Password incorrect</h2>
    <form action="confirm.php" method="post">
        Username:<br/>
        <input type="text" name="username"><br/>
        Password:<br/>
        <input type="text" name="pass"><br/>
        <input type="submit" value="Login">
    </form>

        <a href="create_user.php">Create New User</a>
    </div>

</main>
</body>

</html>