<?php
    include('../include/config.php');
    $from = $_GET['from'];
    $to = $_GET['to'];
    $message = $_POST['message'];
    $qry = mysqli_query($con,"INSERT INTO team_message(sender, receiver, description) VALUES ('$from', '$to', '$message')") or die(mysqli_error($con));
    if ($qry)
    {
    ?>
        <script>
            console.log("in if");
            alert("Message Sent!!");
            window.location.href = "admin.php";
        </script> 
    <?php
    } else
    {
    ?>
        <script>
            console.log("in else");
            alert("Not Able Send Message!!");
            window.location.href = "admin.php";
        </script>
    <?php
    }
?>