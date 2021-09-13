<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$email = $_POST['email'];
	$message = $_SESSION['log']['message_name'];
	$from = $email;
	$recipient = "piyush@ecellvit.in";
	$subject = $subject;
	$message = $message;
	$headers = 'From:'.$from;
	$q = mail($recipient, $subject, $message, $headers);
	if ($q) {
		?>
		<script>
			alert("Invite sent Successfully!");
			window.location.href="index.php";
		</script>
		<?php
	} else {
		?>
		<script>
			alert("Invite Unsuccessful!");
			window.location.href="index.php";
		</script>
		<?php
	}
?>