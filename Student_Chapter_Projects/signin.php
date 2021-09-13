<?php
	include('include/config.php');
	session_start();
	$email = $_POST['email'];
	$pwd = $_POST['password'];
	$qry = mysqli_query($con,"SELECT * FROM student WHERE email='$email' AND password='$pwd' ");
	$qry1 = mysqli_num_rows($qry);
	if ($qry1) {
		$row = mysqli_fetch_array($qry);
		$_SESSION['log']=$row;
		$_SESSION['type']='student';
		header("location:dash.php");
	} else {
		$qry = mysqli_query($con,"SELECT * FROM mentor WHERE email='$email' AND password='$pwd' ");
		$qry1 = mysqli_num_rows($qry);
		if ($qry1) {
			$row = mysqli_fetch_array($qry);
			$_SESSION['log']=$row;
			$_SESSION['type']='mentor';
			header("location:dash.php");
		} else if ($email == "admin@ecellvit.in" and $pwd == "admin123"){
			header("location:admin/admin.php");
			$_SESSION['log']='admin';
			$_SESSION['type']='admin';
		} else {
			?>
			<script>
				alert("Wrong Email Id or Password!");
				window.location.href="index.php";
			</script>
			<?php
		}
	}
?>