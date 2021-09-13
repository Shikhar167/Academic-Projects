<?php
    include('include/config.php');
    session_start();
    $type = $_POST['type'];
    $project = $_POST['project'];
    $description = $_POST['description'];
    $team = $_SESSION['log']['team_name'];
    $qry = mysqli_query($con,"INSERT INTO requirement(type, project, description,team_name) VALUES ('$type', '$project', '$description','$team')") or die(mysqli_error($con));
    if ($qry) {
    ?>
        <script>
            alert("Requirement Sent!");
            window.location.href = "dash.php";
        </script> 
    <?php
    } else {
    ?>
        <script>
            alert("Technical Error!");
            window.location.href = "dash.php";
        </script>
    <?php
    }
?>