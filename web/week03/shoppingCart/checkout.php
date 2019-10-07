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
        <div id="shopping-cart">
            <div class="my-heading"><a id="btnView" href="index.php?action=browse">Go Back</a><a id="btnEmpty" href="index.php?action=empty">Empty Cart</a></div>
            <?php
            if (isset($_SESSION["cart_item"])) {
                $item_total = 0;
                ?>
                <table cellpadding="10" cellspacing="1">
                    <tbody>
                        <tr>
                            <th style="text-align:left;"><strong>Name</strong></th>
                            <th style="text-align:left;"><strong>Code</strong></th>
                            <th style="text-align:right;"><strong>Quantity</strong></th>
                            <th style="text-align:right;"><strong>Price</strong></th>
                            <th style="text-align:center;"><strong>Action</strong></th>
                        </tr>
                        <?php
                            foreach ($_SESSION["cart_item"] as $item) {
                                ?>
                            <tr>
                                <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["name"]; ?></strong></td>
                                <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["code"]; ?></td>
                                <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
                                <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo "$" . $item["price"]; ?></td>
                                <td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove Item</a></td>
                            </tr>
                        <?php
                                $item_total += ($item["price"] * $item["quantity"]);
                            }
                            ?>

                        <tr>
                            <td colspan="5" text-align=right><strong>Total:</strong> <?php echo "$" . $item_total; ?></td>
                        </tr>
                    </tbody>
                </table>
                <form id="frmCheckout" method="post" action="index.php?action=orderconfirm">
                    <fieldset>
                        <legend>Personal Information</legend>
                        <!-- Personal Info -->
                        <div>
                            <input class="requiredinvalid" id="clientName" name="clientName" autofocus required type="text" tabindex="1" autocomplete="clientName" pattern="[A-Za-z\s]{5,60}" title="Name should only have Upper and Lower case letters with a space between them." />
                            <label for="clietnName">Full Name:</label>
                        </div>
                        <div>
                            <input class="requiredinvalid" id="email" name="email" type="email" required placeholder="email@address.com" tabindex="2" title="E-mail address must be a valid e-mail address format." />
                            <label for="email">e-Mail Address</label>
                        </div>
                        <div>
                            <label for="phone">Phone Number</label>
                            <input class="requiredinvalid" id="phone" name="phone" type="tel" tabindex="3" required placeholder="(111) 222-3333" pattern"^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)| ([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9] [02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$" />
                        </div>
                        <div>
                            <input class="requiredinvalid" id="address1" name="address1" autofocus required type="text" tabindex="4" autocomplete="address1" pattern="[A-Za-z0-9\s]{5,60}" title="Address should only have Upper and Lower case letters and numbers with a space between them." />
                            <label for="address1">Address 1:</label>
                        </div>
                        <div>
                            <input class="requiredinvalid" id="address2" name="address2" autofocus type="text" tabindex="5" autocomplete="address2" pattern="[A-Za-z0-9\s]{5,60}" title="Address2 should only have Upper and Lower case letters with a space between them." />
                            <label for="address2">Address 2:</label>
                        </div>
                        <div>
                            <input class="requiredinvalid" id="city" name="city" autofocus required type="text" tabindex="6" autocomplete="city" pattern="[A-Za-z\s]{5,60}" title="City should only have Upper and Lower case letters with a space between them." />
                            <label for="city">City:</label>
                        </div>
                        <div>
                            <select id="state" name="state" required tabindex="7">
                                <option value="">Select State</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="DC">District Of Columbia</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                            </select>
                            <label for="state">Select State:</label>
                        </div>
                        <div>
                            <input id="zipcode" type="text" name="zipcode" maxlength="10" required pattern="^\d{5,6}(?:[-\s]\d{4})?$" tabindex="8" />
                            <label for="zipcode">Zip code</label>
                        </div>
                    </fieldset>
                    <input type="submit" name="placeOrder" value="Place Order" />
                </form>
            <?php
            }
            ?>
        </div>
        <div class="txt-headingout"></div>
    </main>
</body>

</html>