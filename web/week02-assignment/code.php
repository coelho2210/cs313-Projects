<?php
echo "<div>Test</div>";
if(isset($_POST['submit'])){


$name = $_POST['name'];
$subject = $_POST['subject'];
$mailFrom = $_POST['email'];
$message = $_POST['message'];


$emailTo = "coelho_ll@hotmail.com";
$headers = "From: ".mailFrom;

$txt = "You have received an email from ".$name.".\n\n".$message;


mail($emailTo,$subject,$txt,$headers);
header("Location: contact.html?emailsend");

}

?>