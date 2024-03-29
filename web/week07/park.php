<?php

// debug coding
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

session_start();

if(!$_SESSION['username'])
{
	header('Location:login.php');
}

$username = $_SESSION['username'];

require_once('db_access.php');
$db = get_db();

$park_id = $_GET["park_id"];

if (!isset($park_id)) {
	die("No site ID.");
}
$selected = array ();

if (!isset($_SESSION["reviews_submitted"])) {
	$_SESSION["reviews_submitted"] = $selected;
}

$name = $_POST["name"];
$description = $_POST["description"];
$rating = $_POST["rating"];

if (isset($name) and isset($description) and isset($rating) and !isset($_SESSION["reviews_submitted"][$park_id])) {
	
	$query = 'SELECT id FROM member WHERE user_name = :user';
	$stmt = $db->prepare($query);	
	$stmt->bindValue(':user', $username, PDO::PARAM_STR);
	$stmt->execute();
	$mem_id = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$query = 'INSERT INTO rating (reviewer_name, description, rating, park_id, member_id) VALUES (:name, :description, :rating, :siteId, :mem_id)';
	$stmt = $db->prepare($query);
	
	$stmt->bindValue(':siteId', $park_id, PDO::PARAM_STR);
	$stmt->bindValue(':name', $name, PDO::PARAM_STR);
	$stmt->bindValue(':description', $description, PDO::PARAM_STR);
	$stmt->bindValue(':rating', $rating, PDO::PARAM_STR);
	$stmt->bindValue(':mem_id', $mem_id[0]['id'], PDO::PARAM_INT);
	$stmt->execute();
	
	//$new_review_id = $db->lastInsertId('rating_id_seq');
	
	//$_SESSION["reviews_submitted"][$park_id] = true;
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
	
	
	$query = 'SELECT url FROM picture WHERE park_id=:park_id';
	$stmt = $db->prepare($query);
	$stmt->bindValue(':park_id', $park_id, PDO::PARAM_STR);
	$stmt->execute();
	$stmt->bindColumn(1, $url);
	
	while ($stmt->fetch()) {
		echo "<img src='" . $url . "'>";
	}

	$query ='SELECT name, address, description FROM park WHERE id=:park_id';
	$stmt = $db->prepare($query);
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
	 <h3>Add a Review</h3>
	
	 <?php 
	
	if (!isset($_SESSION["reviews_submitted"][$park_id])) {
		echo "
		<form action='park.php?park_id=$park_id' method='post'>
			<p>
			Name <input id='boxName' type='text' name='name'><br>
			Description <input id='descriptionSize' type='textarea' name='description'><br>
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
		echo "<p>Thank you for your review. We appreciate your time and I hope to see you soon! </p>";
	}
	?>
	 
	 <h3>Reviews</h3> 
	
	 <?php
	$query = 'SELECT reviewer_name, rating, description, id FROM rating WHERE park_id=:siteId';
	$stmt = $db->prepare($query);
	$stmt->bindValue(':siteId', $park_id, PDO::PARAM_STR);
	$stmt->execute();
	$stmt->bindColumn(1, $name);
	$stmt->bindColumn(2, $rating);
	$stmt->bindColumn(3, $description);
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$x = 0;
	while ($x < count($result)) {
		echo "<p>" . $result[$x]['reviewer_name'] . "</br>";
		
		for ($i = 0; $i < $result[$x]['rating']; $i++) {
			echo "&#9733";
		}
		
		for ($i = 5; $i > $result[$x]['rating']; $i--) {
			echo "&#9734";
		}

		echo "<br>" . $result[$x]['description'] . "</p>";
	
		echo "<form action='deleteMypost.php' method='post'>";
		echo "<input type='hidden' name='park_id' value='".$park_id."'>";
		echo "<input type='hidden' name='rating_id' value='".$result[$x]['id']."'>";
		echo "<button type='submit'>Delete</button>";
		echo "</form>";
		$x++;
	}


	?> 	

</div>

</body>
</html>
