<?php
session_start();
?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="main.css">

    </head>

    <body>
        <header>
            <h1>Login</h1>
            <hr>
        </header>
        <main class="login">
            <div class="wrapper">
                <form action="create.php" method="post">
                    Display Name:<br/>
                    <input type="text" name="display"><br/>
                    Username:<br/>
                    <input type="text" name="username"><br/>
                    <?php if ($_GET["fail"])
{
    echo "<h4 style='color: red;'>Password must be at least 7 characters and contain a number!</h2>";
}
                    ?>
                    Password:<br/>
                    <input type="text" name="pass"><br/>
                    <input type="submit" value="Login">
                </form>
            </div>

        </main>
    </body>

</html>