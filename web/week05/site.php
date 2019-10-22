<?php
session_start();

include 'db_access.php';
$park_id = $_GET["park_id"];

if (!isset($park_id)) {
	die("No site ID.");
}

?>

<html>
<head>
<title>Rating Park</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>
<div id="back">
	<?php 
	include 'navbar.php';
	
	$stmt = $db->prepare("SELECT url FROM picture WHERE park_id=:park_id");
	$stmt->bindValue(':park_id', $park_id, PDO::PARAM_STR);
	$stmt->execute();
	$stmt->bindColumn(1, $url);
	
	while ($stmt->fetch()) {
		echo "<img src='" . $url . "'>";
	}

	$stmt = $db->prepare("SELECT name, address, description FROM park WHERE id=:park_id");
	$stmt->bindValue(':park_id', $park_id, PDO::PARAM_STR);
	$stmt->execute();
	$stmt->bindColumn(1, $name);
	$stmt->bindColumn(2, $address);
	$stmt->bindColumn(3, $description);
	
	while ($stmt->fetch()) {
		echo "<h2>" . $name . "</h2>";
		echo "<h3>Description</h3>";
		echo "<p>Address: " . $address . "</p>";
		echo "<p>" . $description . "</p>";
	}
	?>
	

</div>

</body>
</html>
