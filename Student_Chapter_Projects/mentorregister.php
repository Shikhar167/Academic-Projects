<?php
	include('include/config.php');
	session_start();
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pwd = rand(1000,9999);
	$hash = md5(rand(1,999));
	$phone = $_POST['phone'];
	$domain = $_POST['domain'];
	$sector = $_POST['sector'];
	$from = "piyush@ecellvit.in";
	$recipient = $email;
	$subject = "Start-Up VIT Account Created";
	$message = '
	Message via Start-Up VIT. 
	Thank you for Signing up with us. 
	Your account has been created, you can sign in with the following credentials after you have activated the account by pressing the url below.
	------------------
	E-mail : '.$email.' 
	Password : '.$pwd.' 
	------------------
	Please click this link to activate your account :
	http://startupvit.ecellvit.in/verify.php?email='.$email.'&hash='.$hash.'&type=ment ';
	$headers = 'From:' . $from;
	$qry = mysqli_query($con,"SELECT * FROM mentor WHERE email='$email' ")or die(mysqli_error($con));
	$qry1 = mysqli_num_rows($qry);
	if($qry1 == 0) {
		$qry2 = mysqli_query($con,"INSERT INTO mentor (name,email,password,phone_no,domain,sector,status,hash) VALUES ('$name','$email','$pwd','$phone','$domain','$sector','pending','$hash') ")or die(mysqli_error($con));
		mail($recipient, $subject, $message, $headers);
		?>
		<script>
			alert("Successfully Registered!\nCheck your E-mail inbox and spam for verification.");
			window.location.href = "dash.php";
		</script>
		<?php
	} else {
		?>
		<script>
			alert ("Email already Registered");
			window.location.href = "index.php";
		</script>
		<?php
	}
?>