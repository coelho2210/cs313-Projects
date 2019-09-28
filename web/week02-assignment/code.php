<?php

if(isset($_POST['submit'])){


$name = $_POST['name'];
$subject = $_POST['subject'];
$mailFrom = $_POST['email'];
$message = $_POST['message'];


$emailTo = "coelho_ll@hotmail.com";
$headers = "From: ".$mailFrom;

$txt = "You have received an email from ".$name.". \n\n".$message;


$isSent = mail($emailTo,$subject,$txt,$headers);
if($isSent)
{
    $stringLife = "YAY IT SENT!";
    //header("Location: contact.html?emailsend");
}
else
    $stringLife = "FAILED!".$emailTo.$subject.$txt.$headers;
    //echo "Mail did not send! Sorry. Try again.";
}
?>

<!DOCTYPE html>
<html lang="en">
 <body>
     <?=$stringLife?>
  </body>
</html>