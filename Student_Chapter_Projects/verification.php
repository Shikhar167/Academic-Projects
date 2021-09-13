<?php
	include('include/config.php');
	session_start();
	$email = $_POST['email'];
	$pwd = $_POST['password'];
	$newpwd = $_POST['newpassword'];
	$repwd = $_POST['repassword'];
	$hash = $_POST['hash'];
	$type = $_POST['types'];
	if ($type == "std" and $newpwd == $repwd){
		$qry = mysqli_query($con,"SELECT * FROM student WHERE hash='$hash' and password='$pwd' and email='$email' ");
		$qry1 = mysqli_num_rows($qry);
		if($qry1) {
			$qry2 = mysqli_query($con,"UPDATE student SET password='$newpwd' WHERE email='$email' ")or die(mysqli_error($con));
			$qry = mysqli_query($con,"SELECT * FROM student WHERE email='$email' ")or die(mysqli_error($con));
			$row = mysqli_fetch_array($qry);
	  		$_SESSION['log'] = $row;
	  		$_SESSION['type'] = 'student';
	  		?>
			<script>
				alert ("Password changed!");
				window.location.href = "dash.php";
			</script>
			<?php
		} else {
			?>
			<script>
				alert ("Wrong Password!");
			</script>
			<?php
		}
	} else if ($type == "ment" and $newpwd == $repwd){
		$qry = mysqli_query($con,"SELECT * FROM mentor WHERE hash='$hash' and password='$pwd' and email='$email' ")or die(mysqli_error($con));
		$qry1 = mysqli_num_rows($qry);
		if($qry1) {
			$qry2 = mysqli_query($con,"UPDATE mentor SET password='$newpwd' WHERE email='$email' ")or die(mysqli_error($con));
			$qry = mysqli_query($con,"SELECT * FROM mentor WHERE email='$email' ")or die(mysqli_error($con));
			$row = mysqli_fetch_array($qry);
	  		$_SESSION['log'] = $row;
	  		$_SESSION['type'] = 'mentor';
	  		?>
			<script>
				alert ("Password changed!");
				window.location.href = "dash.php";
			</script>
			<?php
		} else {
			?>
			<script>
				alert ("Wrong Password!");
				window.location.href = window.history.back();
			</script>
			<?php
		}
	} else {
		?>
		<script>
			alert ("Password not matching!");
			window.location.href = window.history.back();
		</script>
		<?php
	}
?>