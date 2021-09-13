<?php
    include('../include/config.php');
    $email = $_GET['email'];
    $mode = $_GET['mode'];
    if($mode == 'approve')
    {
        $qry = mysqli_query($con,"UPDATE mentor SET status = 'approved' WHERE email = '$email' ") or die(mysqli_error($con));
        if ($qry)
        {
        ?>
            <script>
                console.log("in if");
                alert("Approved!!");
                window.location.href = "mentorapprovals.php";
            </script> 
        <?php
        } else
        {
        ?>
            <script>
                console.log("in else");
                alert("Not Approved!!");
                window.location.href = "mentorapprovals.php";
            </script>
        <?php
        }
    }else
    {
        $qry = mysqli_query($con,"DELETE FROM mentor WHERE email = '$email' ") or die(mysqli_error($con));
        if ($qry)
        {
        ?>
            <script>
                console.log("in if");
                alert("Rejected!!");
                window.location.href = "mentorapprovals.php";
            </script> 
        <?php
        } else
        {
        ?>
            <script>
                console.log("in else");
                alert("Not Able to Reject!!");
                window.location.href = "mentorapprovals.php";
            </script>
        <?php
        }        
    }
?>