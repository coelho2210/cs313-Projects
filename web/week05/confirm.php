<?php
session_start();
require('db_access.php');
$db = get_db();
$user = $_POST['username'];
foreach ($db->query("SELECT username, password, display_name, id FROM author WHERE username = '".$user."'") as $row)
{
    if (password_verify($_POST["pass"], $row["password"])) {
        $_SESSION['user'] = $row["display_name"];
        $_SESSION['user_id'] = $row["id"];
        header('Location: social.php');
    } else {
        header('Location: login.php?fail=true');
    }
}
?>