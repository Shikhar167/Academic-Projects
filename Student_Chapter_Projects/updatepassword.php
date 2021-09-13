<?php
	include('include/config.php');
	session_start();
	$password = $_SESSION['log']['password'];
	$pwd = $_POST['password'];
	$newpwd = $_POST['newpassword'];
	$repwd = $_POST['repassword'];
	if ($_SESSION['type'] == "mentor" and $password == $pwd and $newpwd == $repwd) {
		$id = $_SESSION['log']['mentor_uid'];
		$qry = mysqli_query($con,"UPDATE mentor SET password='$newpwd' WHERE mentor_uid='$id' ")or die(mysqli_error($con));
		if ($qry) {
			$qry = mysqli_query($con,"SELECT * FROM mentor WHERE mentor_uid='$id' ")or die(mysqli_error($con));
			$row = mysqli_fetch_array($qry);
	  		$_SESSION['log'] = $row;
			?>
			<script>
				alert("Updated Successfully!");
				window.location.href = "dash.php"
			</script>
		<?php
		} else {
			?>
			<script>
				alert("Update Unsuccessful!");
				window.location.href = "updateprofile.php"
			</script>
		<?php
		}
	} else if ($_SESSION['type'] == "student" and $password == $pwd and $newpwd == $repwd) {
		$id = $_SESSION['log']['std_uid'];
		$qry = mysqli_query($con,"UPDATE student SET password='$newpwd' WHERE std_uid='$id' ")or die(mysqli_error($con));
		if ($qry) {
			$qry = mysqli_query($con,"SELECT * FROM student WHERE std_uid='$id' ")or die(mysqli_error($con));
			$row = mysqli_fetch_array($qry);
	  		$_SESSION['log'] = $row;
			?>
			<script>
				alert("Updated Successfully!");
				window.location.href = "dash.php"
			</script>
		<?php
		} else {
			?>
			<script>
				alert("Update Unsuccessful!");
				window.location.href = "updateprofile.php"
			</script>
		<?php
		}
	} else {
		?>
			<script>
				alert("Update Unsuccessful!");
				window.location.href = "updateprofile.php"
			</script>
		<?php
	}
?>