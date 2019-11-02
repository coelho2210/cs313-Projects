<?php
require_once('db_access.php');
$db = get_db();

$query ='delete from rating order by id desc limit 1';
$stmt = $db->prepare($query);
$stmt->execute();


?>