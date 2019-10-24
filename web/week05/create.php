<?php
session_start();
require('db_access.php');
$db = get_db();
$display = filter_input(INPUT_POST, 'display', FILTER_SANITIZE_SPECIAL_CHARS);
$user = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
$pass = $_POST["pass"];
if($pass.length < 7 || preg_match('\d+', $pass) == 0)
{
    header('Location: create_user.php?fail=true');
}
$passwordHash = password_hash($pass, PASSWORD_DEFAULT);
try
{
    $query = 'INSERT INTO author(username, password, display_name) VALUES(:username, :password, :display_name)';
    $statement = $db->prepare($query);
    // Now we bind the values to the placeholders. This does some nice things
    // including sanitizing the input with regard to sql commands.
    $statement->bindValue(':username', $user);
    $statement->bindValue(':password', $passwordHash);
    $statement->bindValue(':display_name', $display);
    $statement->execute();
}
catch (Exception $ex)
{
    // Please be aware that you don't want to output the Exception message in
    // a production environment
    echo "Error with DB. Details: $ex";
    die();
}
header("location: login.php");
?>