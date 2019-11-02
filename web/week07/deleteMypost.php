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
    $post_id = $_POST['post_id'];
    $query = 'DELETE FROM rating WHERE park_id=:siteId';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);
    $stmt->execute();
    header("Location: park.php#return");
    die();
?>