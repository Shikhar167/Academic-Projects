<?php
	include("include/config.php");
	$id = $_GET['id'];
	mysqli_query($con,"DELETE FROM invite WHERE id=$id ");
	header("location:dash.php");
?>