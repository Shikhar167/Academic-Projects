<?php
	include('include/config.php');
	session_start();
	$title = $_POST['title'];
	$team = $_SESSION['log']['team_name'];
	$domain = $_POST['domain'];
	$description = $_POST['description'];
	$qry = mysqli_query($con,"INSERT INTO project (title,team_name,domain,description,status) VALUE ('$title','$team','$domain','description','pending')")or die(mysqli_error());
	if ($qry){
		?>
		<script>
			alert("Project submitted!");
			window.location.href="dash.php";
		</script>
		<?php
	} else {
		?>
		<script>
			alert("Project not submitted. Retry!");
			window.location.href="dash.php";
		</script>
		<?php
	}
?>