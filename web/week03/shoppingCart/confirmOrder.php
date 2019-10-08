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

        <?php
        if (isset($_SESSION["cart_item"])) {
            $item_total = 0;
            ?>
            <div class="txt-headingout">
                <p>This is your order Confirmation</p>
            </div>


            <legend>Personal Information</legend>

            <div class="row1">Full Name: <?php echo $clientName; ?></div>
            <div class="row2">e-Mail Address: <?php echo $clientEmail; ?></div>
            <div class="row1">Phone Number: <?php echo $clientPhone; ?></div>
            <div class="row2">Address 1: <?php echo $clientAddress1; ?></div>
            <div class="row1">Address 2: <?php echo $clientAddress2; ?></div>
            <div class="row2">City: <?php echo $clientCity; ?></div>
            <div class="row1">State: <?php echo $clientState; ?></div>
            <div class="row2">Zip Code: <?php echo $clientZipcode; ?></div>

            <div class="ordered">
                <legend class="orderedTitle">Products Ordered</legend>

                <div class="titleRow" id="confname">Name</div>
                <div class="titleRow" id="confcode">Code</div>
                <div class="titleRow" id="confqty">Quantity</div>
                <div class="titleRow" id="confprice">Price</div>

            <?php
                $display = "";
                $index = 0;
                foreach ($_SESSION["cart_item"] as $key => $item) {

                    if (($index % 2) == 0) {
                        $tmp = "even";
                    } else {
                        $tmp = "odd";
                    }
                    $display .= "<div class='prodRow$key $tmp' id='confprodname'>" .  $item['name'] . "</div>";
                    $display .= "<div class='prodRow$key $tmp' id='confprodcode'>" .  $item['code'] . "</div>";
                    $display .= "<div class='prodRow$key $tmp' id='confprodqty'>" .  $item['quantity'] . "</div>";
                    $display .= "<div class='prodRow$key $tmp' id='confprodprice'> $" . $item['price'] . "</div>";
                    $item_total += ($item["price"] * $item["quantity"]);
                    $index += 1;
                }
                $display .= "<div class='prodTotal' id='total'>Total: $" . $item_total . "</div>";
                echo $display;
            }
            ?>
            </div>
            <div class="txt-headingout"><a id="btnView" href="index.php?action=browser">Go Back</a></div>
    </main>
</body>

</html>