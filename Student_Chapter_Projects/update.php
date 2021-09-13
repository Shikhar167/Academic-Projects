<?php
	include('include/config.php');
	session_start();
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	if ($_SESSION['type'] == "mentor"){
		$id = $_SESSION['log']['mentor_uid'];
		$qry = mysqli_query($con,"UPDATE mentor SET name='$name', phone_no='$phone' WHERE mentor_uid='$id' ")or die(mysqli_error($con));
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
	}else {
		$id = $_SESSION['log']['std_uid'];
	    if ($_SESSION['log']['type'] == "external") { 
			$college = $_POST['college_name'];
			$qry = mysqli_query($con,"UPDATE student SET name='$name', phone_no='$phone', college_name='$college' WHERE std_uid='$id' ")or die(mysqli_error($con));
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
		} else if ($_SESSION['log']['type'] == "internal") {
			$qry = mysqli_query($con,"UPDATE student SET name='$name', phone_no='$phone' WHERE std_uid='$id' ")or die(mysqli_error($con));
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
		} 
	}
?>