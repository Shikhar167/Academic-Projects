<?php
	include('include/config.php');
	session_start();
	$std_uid = $_SESSION['log']['std_uid'];
	$skill = $_POST['skill'];
	$domain = $_POST['domain'];
	$github = $_POST['github'];
	$linkedin = $_POST['linkedin'];
	$qry = mysqli_query($con,"INSERT INTO student_mentor(std_uid,skill,domain,github,linkedin,status) VALUES('$std_uid','$skill','$domain','$github','$linkedin','pending') ")or die(mysqli_error($con));
	if($qry) {
		?>
		<script>
			alert("Request Registered!");
			window.location.href = "dash.php";
		</script>
		<?php
	} else {
		?>
		<script>
			alert ("Not able to Register Request");
			window.location.href = "dash.php";
		</script>
		<?php
	}
?>