<?php
	include('include/config.php');
	session_start();
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pwd = rand(1000,9999);
	$hash = md5(rand(1,999));
	$phone = $_POST['phone'];
	$radi = $_POST['radi'];
	$from = "piyush@ecellvit.in";
	$recipient = $email;
	$subject = "Start-Up VIT Account Created";
	$message = '
		Message via Start-Up VIT. 
		Thank you for Signing up with us. 
		Your account has been created, you can sign in with the following credentials after you have activated the account by pressing the url below.
		----------------------
		E-mail : '.$email.' 
		Password : '.$pwd.' 
		----------------------
		Please click this link to activate your account :
		http://startupvit.ecellvit.in/verify.php?email='.$email.'&hash='.$hash.'&type=std ';
	$headers = 'From:' . $from;
	$qry = mysqli_query($con,"SELECT * FROM student WHERE email='$email' ")or die(mysqli_error($con));
	$qry1 = mysqli_num_rows($qry);
	if($qry1 == 0) {
		if($radi == "internal") {
			$regno = $_POST['reg_no'];
			$qry2 = mysqli_query($con,"INSERT INTO student (name,reg_no,type,email,password,phone_no,college_name,hash) VALUES ('$name','$regno','$radi','$email','$pwd','$phone','VIT, VELLORE','$hash') ")or die(mysqli_error($con));
			mail($recipient, $subject, $message, $headers);
			?>
			<script>
				alert("Successfully Registered!\nCheck your E-mail inbox and spam for verification.");
				window.location.href = "index.php";
			</script>
			<?php
		} else if($radi == "external") {
			$colname = $_POST['college_name'];
			$qry2 = mysqli_query($con,"INSERT INTO student (name,type,email,password,phone_no,college_name,hash) VALUES ('$name','$radi','$email','$pwd','$phone','$colname','$hash') ")or die(mysqli_error($con));
			mail($recipient, $subject, $message, $headers);
			?>
			<script>
				alert("Successfully Registered!\nCheck your E-mail inbox and spam for verification.");
				window.location.href="index.php";
			</script>
			<?php
		} 
	} else {
		?>
		<script>
			alert ("Email already Registered!");
			window.location.href = "index.php";
		</script>
		<?php
	}
?>