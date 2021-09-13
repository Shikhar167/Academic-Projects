<?php 
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
include('../include/config.php');
include('../include/sessioncheck.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Dashboard|Team</title>
  <meta charset="UTF-8">
  <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0' />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

</head>

<body>
  <!-- Navbar -->
    <?php include('adminnav.php')?>
  <!-- navbar -->

    <div class="container">
        <div class="row">
            <div class="table-wrap col-lg-12">
                <table class="schdule-table table table-bordered">
                    <thead class="thead-light">
                        <tr>
                        <th class="head" scope="col">Title</th>
                        <th class="head" scope="col">Domain</th>
                        <th class="head" scope="col">Team Name</th>
                        <th class="head" scope="col">Description</th>
                        <th class="head" scope="col">status</th>
                        <th class="head" scope="col"></th>
                        <th class="head" scope="col"></th>
                        </tr>
                    </thead><br><br><br><br><br>
                    <tbody>
                        <?php
                            {
                                $qry2 = mysqli_query($con,"SELECT * FROM project ");
                                while($qry1 = mysqli_fetch_array($qry2)){
                            ?>
                            <tr>
                            <td><?php echo $qry1['title'];  ?></td>
                            <td><?php echo $qry1['domain'];  ?></td>
                            <td><?php echo $qry1['team_name'];  ?></td>
                            <td><?php echo $qry1['description'];  ?></td>
                            <td><?php echo $qry1['status'];  ?></td>
                            <?php
                                if($qry1['status']!='approved')
                                {
                            ?>
                            <td><a href="approvingproject.php?mode=approve&id=<?php echo $qry1['project_id']; ?>" class="btn btn-primary btn-sm" >Approve</a></td>
                            <td><a href="approvingproject.php?mode=reject&id=<?php echo $qry1['project_id']; ?>" class="btn btn-primary btn-sm" >Reject</a></td>
                            <?php
                              }
                              else
                              {
                                ?>
                                <td></td>
                                <td></td>
                                </tr>
                                <?php
                              } 
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

   
   

  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>
</body>

</html>