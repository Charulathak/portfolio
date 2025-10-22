<?php

$key=trim($_REQUEST["key"]);
if ($key == 1) {
    
    $name    = htmlspecialchars(strip_tags($_POST['name']));
    $email   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(strip_tags($_POST['message']));

    $to      = "432charu@gmail.com";
    $subject = "New Contact Form Submission";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8";

    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    if (mail($to, $subject, $body, $headers)) {
        die(json_encode(["status" => 1, "msg" => "Thank you! Your message has been sent."]));
    } else {
        die(json_encode(["status" => 0, "msg" => "Sorry, something went wrong. Please try again."]));
    }
} else {
    
    die(json_encode(["status" => 0, "msg" => "Invalid Request!"]));
}
?>
