<?php
session_start();
require('dbConnect.php');
$db = dbConnect();
$user = $_POST['username'];
foreach ($db->query("SELECT username, password, display_name, id FROM author WHERE username = '".$user."'") as $row)
{
    if (password_verify($_POST["pass"], $row["password"])) {
        $_SESSION['user'] = $row["display_name"];
        $_SESSION['user_id'] = $row["id"];
        header('Location: /social/social.php');
    } else {
        header('Location: /social/login.php?fail=true');
    }
}
?>