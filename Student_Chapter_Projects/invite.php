<?php
	include('include/config.php');
	session_start();
	$email = $_POST['email'];
	$team = $_SESSION['log']['team_name'];
	$fromto = $_SESSION['log']['email'];
	$name = $_SESSION['log']['name'];
	$from = "piyush@ecellvit.in";
	$recipient = $email;
	$subject = "Platform : Invitaion to join".$team;
	$message = '
		Message via Start-Up VIT. 
		You have an Invitaion from your friend'.$name.' 
		Please click this link to activate your account :
		http://startupvit.ecellvit.in/';
	$headers = 'From:' . $from;
	$q = mail($recipient, $subject, $message, $headers);
	if ($q) {
		?>
		<script>
			alert("Invite sent Successfully!");
			window.location.href="dash.php";
		</script>
		<?php
	} else {
		?>
		<script>
			alert("Invite Unsuccessful!");
			window.location.href="dash.php";
		</script>
		<?php
	}
?>