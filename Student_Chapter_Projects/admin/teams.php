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
                        <th class="head" scope="col">Name</th>
                        <th class="head" scope="col">Leader</th>
                        <th class="head" scope="col"></th>
                        <th class="head" scope="col"></th>
                        </tr>
                    </thead><br><br><br><br><br>
                    <tbody>
                        <?php
                            {
                                $qry2 = mysqli_query($con,"SELECT distinct(name),leader,team_name FROM team INNER JOIN project ");
                                while($qry1 = mysqli_fetch_array($qry2)){
                            ?>
                            <tr>
                            <td><?php echo $qry1['name'];  ?></td>
                            <td><?php echo $qry1['leader'];  ?></td>
                            <td><button type="button" id="btn-viewMember" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter" onclick="loadDynamicContentModal('<?php echo $qry1['team_name'];  ?>')" style="margin-bottom: 15px;">Members</button></td>
                            <td><button type="button" id="btn-viewProject" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter2" onclick="loadDynamicContentModal2('<?php echo $qry1['team_name'];  ?>')" style="margin-bottom: 15px;">Projects</button></td>
                            </tr>
                            <?php 
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalCenterTitle">Team Members</h3>
          </div>
          <div class="container">
            <div class="row" id="viewMember"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalCenterTitle">Projects</h3>
          </div>
          <div class="container">
            <div class="row" id="viewProject"></div>
          </div>
        </div>
      </div>
    </div>
                        
    <script>
	    function loadDynamicContentModal(modal) {
		    var options = {
          modal : true,
          height : 300,
          width : 500
        };
		    $('#viewMember').load('get-dynamic-data.php?team_name=' + modal,
				  function() {
					  $('#bootstrap-modal').modal({
						  show : true
					  });
				  });
	      }

	    function loadDynamicContentModal2(modal) {
		    var options = {
          modal : true,
          height : 300,
          width : 500
        };
		    $('#viewProject').load('get-dynamic-data-project.php?team_name=' + modal,
				  function() {
					  $('#bootstrap-modal').modal({
						  show : true
					  });
				  });
	      }
    </script>

   
   

  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>
</body>

</html>