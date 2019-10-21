<html>
<head>
<title> Reting Parks</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>
<div id="back">
	<?php include 'navbar.php'; ?>

	<h2>Browser</h2>
	
	<?php
	include 'db_access.php';
		
	foreach ($db->query("SELECT * FROM state") as $state_row) {
		echo "<h3>" . $state_row["name"] . "</h3>";
		$stateId = $state_row["id"];
			
		foreach ($db->query("SELECT * FROM city WHERE state_id=$stateId") as $city) {
			echo "<h4>" . $city["name"] . "</h4>";
			echo "<ul>";
			$cityId = $city["id"];
				
			foreach ($db->query("SELECT * FROM park WHERE city_id=$cityId") as $site_row) {
				$siteId = $site_row["id"];
				echo "<li><a href='site.php?siteId=$siteId'>" . $site_row["name"] . "</a></li>";
			}
				
			echo "</ul>";
		}
	}
	?>
</div>

</body>
</html>
