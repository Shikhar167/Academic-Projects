<?php
    include('../include/config.php');
    $id = $_GET['id'];
    $mode = $_GET['mode'];
    if($mode == 'approve')
    {
        $qry = mysqli_query($con,"UPDATE student_mentor SET status = 'approved' WHERE req_id = '$id' ") or die(mysqli_error($con));
        if ($qry)
        {
        ?>
            <script>
                console.log("in if");
                alert("Approved!!");
                window.location.href = "studmentor.php";
            </script> 
        <?php
        } else
        {
        ?>
            <script>
                console.log("in else");
                alert("Not Approved!!");
                window.location.href = "studmentor.php";
            </script>
        <?php
        }
    }else
    {
        $qry = mysqli_query($con,"DELETE FROM student_mentor WHERE req_id = '$id' ") or die(mysqli_error($con));
        if ($qry)
        {
        ?>
            <script>
                console.log("in if");
                alert("Rejected!!");
                window.location.href = "studmentor.php";
            </script> 
        <?php
        } else
        {
        ?>
            <script>
                console.log("in else");
                alert("Not Able to Reject!!");
                window.location.href = "studmentor.php";
            </script>
        <?php        
        }
    }
?>