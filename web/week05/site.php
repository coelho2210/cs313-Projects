<?php
session_start();

include 'db_access.php';
$siteId = $_GET["siteId"];

if (!isset($siteId)) {
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
	
	$stmt = $db->prepare("SELECT url FROM picture WHERE park_id=:siteId");
	$stmt->bindValue(':siteId', $siteId, PDO::PARAM_STR);
	$stmt->execute();
	$stmt->bindColumn(1, $url);
	
	while ($stmt->fetch()) {
		echo "<img src='" . $url . "'>";
	}

	$stmt = $db->prepare("SELECT name, address, description FROM park WHERE id=:siteId");
	$stmt->bindValue(':siteId', $siteId, PDO::PARAM_STR);
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
