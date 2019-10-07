<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>

<body>
    <main>

        <div class="txt-headingout">
            <p>Product Details</p>
        </div>
        <section>
            <img src="<?php echo $itemArray['image']; ?>">
            <p>Description: <?php echo $itemArray['description']; ?></p>
            <p>Price: <?php echo $itemArray['price']; ?></p>
        </section>

        <div class="txt-headingout"><a id="btnView" href="index.php?action=browser">Go Back</a></div>
    </main>
</body>

</html>