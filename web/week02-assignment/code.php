<?php

//if(isset($_POST['submit'])){


//$name = $_POST['name'];
//$subject = $_POST['subject'];
//$mailFrom = $_POST['email'];
//$message = $_POST['message'];
$subject = "OI vem semore aqui?";

$emailTo = "coelho_ll@hotmail.com";
//$headers = "From: ".mailFrom;
$headers = "From: sil18001@byi.edu";
//$txt = "You have received an email from ".$name.".\n\n".$message;
$txt = "You have received an email from  leo";

mail($emailTo,$subject,$txt,$headers);
header("Location: contact.html?emailsend");

//}

?>