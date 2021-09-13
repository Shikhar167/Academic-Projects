<?php
	include('include/config.php');
	session_start();
	$name = $_POST['name'];
	$id = $_SESSION['log']['std_uid'];
	$qry = mysqli_query($con,"SELECT * FROM team WHERE name='$name' ")or die(mysqli_error($con));
	$qry1 = mysqli_num_rows($qry);
	if($qry1 == 0){
		$qry = mysqli_query($con,"INSERT INTO team (name, leader) VALUES ('$name', '$id') ")or die(mysqli_error($con));
		$qry1 = mysqli_query($con,"UPDATE student SET team_name='$name' WHERE std_uid='$id' ")or die(mysqli_error($con));
		header("location:dash.php");
	} else {
		?>
		<script>
			alert ("Team already Registered!\nChoose new Name.");
			window.location.href = "dash.php";
		</script>
		<?php
	}
	
?>