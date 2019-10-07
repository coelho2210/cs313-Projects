<<?php 
    include 'common/array3.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTML Form</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    
    <script src="js/week3.js"></script>

</head>
<body>
    <main>
        
        <form action="nameentry.php" method="post" id="nameForm">
            <fieldset>
                <div>
                    <input id="name" name="fullName"
                    type="text" required placeholder="Full Name" tabindex="1"
                    title="Please enter your full name"  <?php if(isset($fullName)){echo "value='$fullName'";} ?> >
                    
                    <label for="fullName">Full Name</label>
                </div>
                <div>
                    <input id="email" name="email"
                    type="email" required placeholder="email@address.com" tabindex="2"
                    title="E-mail address must be a valid e-mail address format." <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?> >
                    <label for="email">e-Mail Address</label>
                </div>
            </fieldset>
            <div>
                <fieldset>
                    <label>Major</label>
                    <?php 
                        $majorDisp = '';
                        foreach($majors as $key => $mj){
                            $majorDisp .= '<div>';
                            $majorDisp .= "<input id='major_$key' name='major' type='radio' value=$key />";
                             $majorDisp .= "<label class='choice' for='major_$key'>$mj</label></div>";
                        }
                        echo $majorDisp;
                    ?>
                    
                </fieldset>
                <fieldset>
                    Which have you visited?<br>
                    <?php
                        $vistDisp = '';
                        foreach($vstCountry as $key => $vst) {
                            $vistDisp .= "<input type='checkbox' name='haveVisited[]' value='$key' />$vst<br>";
                        }
                        echo $vistDisp;
                    ?>

                </fieldset>
                <fieldset>
                    <label for="comments">Additional Comments </label><br>
                    <textarea id="comments" name="comments" maxlength="2000" rows="6" cols="60"></textarea>
                    <div id="charcount"><span id="chars">2000</span> &nbsp;characters remaining</div>
                </fieldset>
            </div>
            <input type="submit" name="submit" value="Save" />
     
        </form>

    </main>
</body>
</html>