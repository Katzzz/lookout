<?php
include ("config.php");
$res = "";
if (isset($_POST['email'])) {	
	$email = htmlspecialchars(trim($_POST['email']));
	$comment = "--- New subscribe form ---\n\n".
				"Email: $email\n".
				"-------------------------------------------";
	$sendmail = mail (TO_EMAIL, "New subscribe - ".SITE_NAME, $comment, "Content-type:text/plain; charset = utf-8\r\nFrom:$email");
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