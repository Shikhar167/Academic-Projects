<?php
	include('include/config.php');
	session_start();
	$team = $_POST['team'];
	$id = $_SESSION['log']['email'];
	$qry1 = mysqli_query($con,"SELECT * FROM team WHERE name='$team' ")or die(mysqli_error($con));
	$qry2 = mysqli_fetch_array($qry1);
	$leader = $qry2['leader'];
	$qry1 = mysqli_query($con,"SELECT * FROM student WHERE std_uid='$leader' ")or die(mysqli_error($con));
	$qry2 = mysqli_fetch_array($qry1);
	$id2 = $qry2['email'];
	$qry = mysqli_query($con,"INSERT INTO invite (from_email,to_email,team) VALUES ('$id','$id2','$team') ")or die(mysqli_error($con));
	header("location:dash.php");
?>