<?php
session_start();
$product_array = array( array( 'id' => "1", 'name' => "Soccer-Ball", 'code' => "3DcAM01", 'image' => "images/smallBall1.jpg", 'price' => "35.00", 'description' => " Practice and one day you will be the best!." ), 
 array( 'id' => "2", 'name' => "Chuteira", 'code' => "USB02", 'image' => "images/smallChuteira.jpg", 'price' => "190.00", 'description' => "Be a professional!." ), 
 array( 'id' => "3", 'name' => "Brazil soccer-Short", 'code' => "short03", 'image' => "images/smallShort1.jpg", 'price' => "210.00", 'description' => " Be a winner!! " ));


 $action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}
switch($action) {
	case "add":
		if(!empty($_POST["quantity"])) {
			foreach($product_array as $key) {
				if($key["code"] == $_GET["code"]) { 
					$productByCode = $key;
				}
			}
			


			$itemArray = array($productByCode["code"]=>array('name'=>$productByCode["name"], 'code'=>$productByCode["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode["price"]));
		
			


			if(!empty($_SESSION["cart_item"])) {
				if(in_array($product_array[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($product_array[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
		include 'myBrowser.php';
	break;
	
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
		include 'myBrowser.php';
	break;
	
	case "details":
		foreach($product_array as $key) {
			if($key["code"] == $_GET["code"]) { 
				$itemArray = $key;
			}
		}
		include 'myDetails.php';
	break;
	case "view":
		include 'myCart.php';
	break;
	case "checkout":
		include 'checkout.php';
	break;
	case "orderconfirm":
		$clientName = filter_input(INPUT_POST, 'clientName', FILTER_SANITIZE_STRING);
		$clientEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
		$clientPhone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
		$clientAddress1 = filter_input(INPUT_POST, 'address1', FILTER_SANITIZE_STRING);
		$clientAddress2 = filter_input(INPUT_POST, 'address2', FILTER_SANITIZE_STRING);
		$clientCity = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
		$clientState = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
		$clientZipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING);
	
		include 'confirmOrder.php';
	break;
	case "empty":
		//unset($_SESSION["cart_item"]);
		include 'myBrowser.php';
	break;	
	
	default:
		include 'myBrowser.php';
		break;

	}