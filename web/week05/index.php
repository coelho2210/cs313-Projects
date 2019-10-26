<html>

<head>
	<title> Rating Parks</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div id="back" style="margin-left: 10%; margin-top:10%;">
		<!--  This  will ADD THE NAVBAR FILE -->
		<?php include 'navbar.php'; ?>

		<h2>Browser</h2>

		<?php
		require_once('db_access.php');
		$db = get_db();


		// Henrique, Lucas and Leo worked together to solve these code (loops)

		$query  = 'SELECT * FROM state';
		$stmt = $db->prepare($query);
		$stmt->execute();
		$states = $stmt->fetchAll(PDO::FETCH_ASSOC);

		foreach ($states as $state_row) {
			echo "<h3>" . $state_row["name"] . "</h3>";
			$stateId = $state_row["id"];


			$query  = 'SELECT * FROM city WHERE state_id=$stateId';
			$stmt = $db->prepare($query);
			$stmt->execute();
			$cities = $stmt->fetchAll(PDO::FETCH_ASSOC);


			foreach ($cities as $city) {
				echo "<h4>" . $city["name"] . "</h4>";
				echo "<ul>";
				$cityId = $city["id"];


				$query  = 'SELECT * FROM park WHERE city_id=$cityId';
				$stmt = $db->prepare($query);
				$stmt->execute();
				$parks = $stmt->fetchAll(PDO::FETCH_ASSOC);

				foreach ($parks as $site_row) {
					$park_id = $site_row["id"];
					echo "<li><a href='park.php?park_id=$park_id'>" . $site_row["name"] . "</a></li>";
				}

				echo "</ul>";
			}
		}
		?>
	</div>

</body>

</html>