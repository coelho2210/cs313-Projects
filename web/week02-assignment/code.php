<?php


// that will store the name of the user
$name = $_POST['name'];

// that will store the email ID of the visitor
$visitor_email = $_POST['email'];

// store the message
$message = $_POST['message'];

// That will send the email wherever I want
$email_from = 'coelho_ll22@icloud.com';

$email_subject = "New Submission form";

$email_body = "User Name: $name.\n".
               "User Email: $visitor_email.\n".
                  "User Message: $message.\n";


                  $to = "sil18001@byui.edu";
                  $headers = "Form $email_from \r\n";

                  mail($to,$email_subject,$email_body,$headers);

                  header("Location: contact.html");

?>