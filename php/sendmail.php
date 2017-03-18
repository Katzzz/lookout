<?php
include ("config.php");
$res = "";
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['comment'])) {
	$name = htmlspecialchars(trim($_POST['name']));
	$email = htmlspecialchars(trim($_POST['email']));
	$phone = htmlspecialchars(trim($_POST['phone']));
	$comment = htmlspecialchars(trim($_POST['comment']));	
	$comment = "--- New message with contact form ---\n\n".
				"Name: $name\n".
				"Email: $email\n".
				"Phone: $phone\n".
				"$comment \n\n".
				"-------------------------------------------";
	$sendmail = mail (TO_EMAIL, "New contact message - ".SITE_NAME, $comment, "Content-type:text/plain; charset = utf-8\r\nFrom:$email");
	if ($sendmail){
		$res = json_encode(array("status" => true, "message" => "Success"));
	} else {
		$res = json_encode(array("status" => false, "message" => "Error"));
	}
} else {
  $res = json_encode(array("status" => false, "message" => "Error"));
}
echo $res;

?>