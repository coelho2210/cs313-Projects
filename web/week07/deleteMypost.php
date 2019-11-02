<?php 
    session_start();
    if (isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
    }
    else
    {
        header("Location: login.php");
        die();
    }
    require_once("db_access.php");
    $db = get_db();
    $post_id = $_POST['rating_id'];
    $park_id = $_POST['park_id'];
    $query = 'DELETE FROM rating WHERE id=:post_id';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);
    $stmt->execute();
    header("Location: park.php?park_id=$park_id");
    die();
?>
