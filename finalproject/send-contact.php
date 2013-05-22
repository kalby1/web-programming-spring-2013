<!-- php email sending-->
<?php
$to = 'solutions@calwalker.com';
$subject = "New Contact Data"; 
$message = $_POST['customername'] . ', ' . $_POST['customeremail'] . ', ' . $_POST['phone'] . ', ' . $_POST['comment'] ;
$headers = 'From: solutions@calwalker.com' . "\r\n" .
	'Reply-To: solutions@calwalker.com' . "\r\n" .
	'X-mailer: PHP/' . phpversion();
mail($to, $subject, $message, $headers);
?>