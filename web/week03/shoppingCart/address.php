
<?php 
    include 'common/array3.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thank You</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <?php
        $output = '<h1>Thank you for filling out the form</h1>';
        $output .= '<h3>This is the information we captured</h3>';
        $output .= '<p>Full Name: ' . htmlspecialchars($_POST['fullName']) . '</p>';
        $output .= "<p>e-Mail Address: <a href=mailto:". htmlspecialchars($_POST['email']) .">" . $_POST['email'] . "</a>";
        $output .= '<p>Major: ' . $majors[$_POST['major']] . '</p>';
        $visited = $_POST['haveVisited'];
        if(empty($visited)) {
            echo("You didn't visit any continents.");
        } else {
            $N = count($visited);
            $output .= 'You have visited the following locations:<br>';
            for($i=0; $i < $N; $i++){
                $output .= $vstCountry[$visited[$i]] . "<br>";
            }
        }
        $output .= '<p>Comments: ' . htmlspecialchars($_POST['comments']) . '</p>';
        echo $output;
    ?>
</body>
</html>