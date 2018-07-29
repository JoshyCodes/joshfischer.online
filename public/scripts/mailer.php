<?php

require 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$formcontent="From: $name \n Email: $email \n Message: $message";
$recipient = "jfischeronline@gmail.com";
$subject = "Contact Form";

mail($recipient, $subject, $formcontent) or die("Error!");

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO list (name,email,message) values(?, ?, ?)";
$q = $pdo->prepare($sql);
$q->execute(array($name,$email,$message));
Database::disconnect();

header("Location: http://joshfischer.online/thankyou.html");

?>
