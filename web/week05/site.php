<?php
session_start();

include 'db_access.php';
$siteId = $_GET["siteId"];

if (!isset($siteId)) {
	die("No site ID.");
}

$selected = array ();

if (!isset($_SESSION["reviews_submitted"])) {
	$_SESSION["reviews_submitted"] = $selected;
}

$name = $_POST["name"];
$description = $_POST["description"];
$rating = $_POST["rating"];

if (isset($name) and isset($description) and isset($rating) and !isset($_SESSION["reviews_submitted"][$siteId])) {
	$stmt = $db->prepare(
	"INSERT INTO rating (reviewer_name, description, rating, park_id) 
	VALUES (:name, :description, :rating, :siteId)");
	
	$stmt->bindValue(':siteId', $siteId, PDO::PARAM_STR);
	$stmt->bindValue(':name', $name, PDO::PARAM_STR);
	$stmt->bindValue(':description', $description, PDO::PARAM_STR);
	$stmt->bindValue(':rating', $rating, PDO::PARAM_STR);
	$stmt->execute();
	
	$_SESSION["reviews_submitted"][$siteId] = true;
}
?>

<html>
<head>
<title>Midwest Outdoors</title>
<link rel="stylesheet" href="style.css">
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
		echo "<p>Location: " . $address . "</p>";
		echo "<p>" . $description . "</p>";
	}
	?>
	
	<h3>Add a Review</h3>
	
	<?php 
	
	if (!isset($_SESSION["reviews_submitted"][$siteId])) {
		echo "
		<form action='site.php?siteId=$siteId' method='post'>
			<p>
			Name <input type='text' name='name'><br>
			Description <input type='textarea' name='description'><br>
			&#9733 &#9734 &#9734 &#9734 &#9734 <input type='radio' name='rating' value=1><br>
			&#9733 &#9733 &#9734 &#9734 &#9734 <input type='radio' name='rating' value=2><br>
			&#9733 &#9733 &#9733 &#9734 &#9734 <input type='radio' name='rating' value=3><br>
			&#9733 &#9733 &#9733 &#9733 &#9734 <input type='radio' name='rating' value=4><br>
			&#9733 &#9733 &#9733 &#9733 &#9733 <input type='radio' name='rating' value=5><br>
			<button type='submit'>Submit</button>
			</p>
		</form>";
	}
	else {
		echo "<p>A review has already been submitted. Thank you for your input!</p>";
	}
	?>
	
	<h3>Reviews</h3>
	
	<?php
	
	$stmt = $db->prepare("SELECT reviewer_name, rating, description FROM rating WHERE site_id=:siteId");
	$stmt->bindValue(':siteId', $siteId, PDO::PARAM_STR);
	$stmt->execute();
	$stmt->bindColumn(1, $name);
	$stmt->bindColumn(2, $rating);
	$stmt->bindColumn(3, $description);
	
	while ($stmt->fetch()) {
		echo "<p>" . $name . "</br>";
		
		for ($i = 0; $i < $rating; $i++) {
			echo "&#9733";
		}
		
		for ($i = 5; $i > $rating; $i--) {
			echo "&#9734";
		}

		echo "<br>" . $description . "</p>";
	}
	?>
</div>

</body>
</html>
