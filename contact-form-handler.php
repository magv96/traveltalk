
//            $name = $_POST['name'];
//            $visitor_email = $_POST['email'];
//            $message = $_POST['message'];
//
//            $email_from = 'magveltri96@gmail.com';
//            $email_subject = "New Form Submission";
//            $email_body = "User Name: $name.\n".
//                        "User Email: $visitor_email.\n".
//                        "User Message: $message.\n";
//
//            $to = "traveltalker123@gmail.com";
//
//            $headers = "From: $email_from \r\n";
//
//            $headers .= "Reply-To: $visitor_email \r\n";
//
//            mail($to,$email_subject,$email_body,$headers);
//
//            header("Location: index.html");

<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'Demo Contact Form'; 
		$to = 'traveltalker123@gmail.com'; 
		$subject = 'Message from Contact Demo ';
		
		$body ="From: $name\n E-Mail: $email\n Message:\n $message";
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
	}
}
	}
?>
