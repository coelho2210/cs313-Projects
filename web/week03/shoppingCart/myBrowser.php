<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title> Thi is My PHP Shopping Cart</title>
	<link href="style.css" type="text/css" rel="stylesheet" />
</head>

<body>
	<main>
		<div id="shopping-cart">
			<?php

			if (empty($_SESSION["cart_item"])) {
				$count = "";
			} else {

				$count = "(" . count($_SESSION["cart_item"]) . ")";
			}
			?>
			<div class="my-heading">Shopping Cart <a id="btnView" href="index.php?action=view">View Cart <?php echo $count; ?></a><a id="btnEmpty" href="index.php?action=empty">Empty Cart</a></div>
			<?php
			if (isset($_SESSION["cart_item"])) {
				$item_total = 0;
			}
			?>
		</div>

		<div id="product-grid">
			<div class="my-heading">Products</div>
			<?php

			if (!empty($product_array)) {
				foreach ($product_array as $key => $value) {
					?>
					<div class="product-item">
						<form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
							<div class="product-image">
								<a href="index.php?action=Product_information.php&code=<?php echo $product_array[$key]["code"]; ?>">
									<img src="<?php echo $product_array[$key]["image"]; ?>">
								</a>
							</div>
							<div>
								<strong><?php echo $product_array[$key]["name"]; ?></strong>
							</div>
							<div class="product-price">
								<?php echo "$" . $product_array[$key]["price"]; ?>
							</div>
							<div>
								<input type="text" name="quantity" value="1" size="2" />
								<input type="submit" value="Add to cart" class="btnAddAction" />
							</div>
						</form>
					</div>
			<?php
				}
			}
			?>
		</div>
	</main>
</body>

</html>