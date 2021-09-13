<?php
	include("include/config.php");
	$id = $_GET['id'];
	$qry = mysqli_query($con,"SELECT * FROM invite WHERE id='$id' ")or die(mysqli_error($con));
	$qry1 = mysqli_fetch_array($qry);
	$femail = $qry1['from_email'];
	$team = $qry1['team'];
	$qry2 = mysqli_query($con,"UPDATE student SET team_name='$team' WHERE email='$femail' ")or die(mysqli_error($con));
	if ($qry2) {
		$qry3 = mysqli_query($con,"DELETE FROM invite WHERE id=$id");
		?>
		<script>
			alert("Member Added");
			window.location.href="dash.php";
		</script>
		<?php
	} else {
		?>
		<script>
			alert("Please try again!");
			window.location.href="dash.php";
		</script>
		<?php
	}

?>