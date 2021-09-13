 <?php  include('include/config.php'); 
include('include/sessioncheck.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Dashboard|Team</title>
  <meta charset="UTF-8">
  <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0' />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body>
  <!-- Navbar -->
  <?php include('include/dashnav.php'); ?>
  <!-- navbar -->
  
  <?php
  if (!$_SESSION['log']['team_name']) {
    $show = $_SESSION['log']['name'];
  } else {
    $show = 'Team '.$_SESSION['log']['team_name'];
  }
  $email = $_SESSION['log']['email'];
  $qry = mysqli_query($con,"SELECT * FROM invite WHERE from_email='$email' ")or die(mysqli_error($con));
  $condition = mysqli_num_rows($qry);
  ?>
  
  <div class="namaste">
    <div id="particles-js"></div>
    <script src="particles.js"></script>
    <script src="app.js"></script>
    <h2>Hey</h2>
    <h1><?php echo $show; ?>!</h1>
  </div>

  <?php if (!$_SESSION['log']['team_name']) {
    ?>
    <div class="flex-container">
      <div class="container big">
        <form id="contact" method="post" action="create.php">
          <h1>CREATE</h1>
          <h4>a team.</h4>
          <input class="formInput" type="text" name="name" placeholder="Name of Team" required autofocus>
          <button class="btn btn-basic" name="submit" type="submit" id="contact-submit" data-submit="Sending">Create</button>
        </form>
      </div>

      <div class="container big">
        <form id="contact" method="post" action="join.php">
          <h1>JOIN</h1>
          <h4>a team.</h4>
          <?php if ($condition) {
            ?>
            <h3>Waiting for Approval</h3>
            <?php } else { ?>
          <select name="team" required >
            <option value="0">Select a Team</option>
            <?php 
            $qry = mysqli_query($con,"SELECT * FROM team")or die(mysqli_error($con));
            while($row = mysqli_fetch_array($qry)) { ?>
            <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
            <?php } ?>
          </select>
          <button class="btn btn-basic" name="submit" type="submit" id="contact-submit" data-submit="Sending">Join</button>
          <?php } ?>
        </form>
      </div>

      <?php 
      $std_uid = $_SESSION['log']['std_uid'];
      $qry = mysqli_query($con,"SELECT * FROM student_mentor WHERE std_uid='$std_uid' ")or die(mysqli_error($con)); 
      $qry1 = mysqli_num_rows($qry);
      if (!$qry1) {?>
        <div class="container big">
          <form id="contact" method="post" action="mentor.php">
            <h1>MENTOR</h1>
            <h4>a team.</h4>
            <br>
            <button type="button" class="btn btn-basic" data-toggle="modal" data-target="#exampleModalCenter" >Know More</button>
          </form>
        </div>
      <?php } ?>
    </div>
    <br><br><br>

    <?php
    } else {
      $teamname=$_SESSION['log']['team_name'];
      ?>
      <div class="flex-container">
        <div class="container big">
          <form id="contact" method="post" action="invite.php">
            <h3>Team.</h3>
            <?php $qry = mysqli_query($con,"SELECT * FROM student WHERE team_name='$teamname' ");
            while($row=mysqli_fetch_array($qry)) {
              if ($row['name'] != $_SESSION['log']['name']){
                ?>
                <label><?php echo $row['name']; ?></label><br>
                <?php
              }
            } ?>
            <input type="email" name="email" placeholder="E-Mail" required>
            <button class="btn btn-basic" name="submit" type="submit" id="contact-submit" data-submit="Sending">Invite a Friend</button>
          </form>
        </div>

        <div class="container big">
          <form id="contact" method="post" action="project.php">
            <h3>Project</h3>
            <table>
              <tr>
              <td class="head" scope="col">Title</td>
              <td class="head" scope="col">Status</td>
              <td class="head" scope="col"></td>
              </tr>
                <?php $qry = mysqli_query($con,"SELECT * FROM project WHERE team_name='$teamname' ");
                while($row=mysqli_fetch_array($qry)) {
                  ?>
                  <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><button type="button" id="btn-viewProject" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewProject" onclick="loadDynamicContentModal('<?php echo $row['title'];  ?>')" >View Details</button></td>
                  </tr>
            <?php } ?>
            </table>
            <button type="button" class="btn btn-basic" data-toggle="modal" data-target="#exampleModalCenter2" >Add a Project</button>
          </form>
        </div>

        <div class="container big">
          <form id="contact" method="post" action="resources.php">
            <h3>Need Resources?</h3>
            <select class="formInput" name="project">
                <option value="0">Project</option>
                <?php
                $qry = mysqli_query($con,"SELECT * FROM project WHERE team_name='$teamname' and status='approved' ");
                while($qry1 = mysqli_fetch_array($qry)){
                ?>
                <option value="<?php echo $qry1['title'] ;?>"><?php echo $qry1['title'] ;?></option>
                <?php }  ?>
            </select>
            <select class="formInput" name="type">
                <option value="0">Requirement</option>
                <option value="Hardware">Hardware</option>
                <option value="Mentor">Mentor</option>                
            </select>
            <textarea rows="5" cols="50" name="description" placeholder="Descrption"></textarea>
            <button class="btn btn-basic" name="submit" type="submit" id="contact-submit" data-submit="Sending">Submit</button>
          </form> 
        </div>
      </div>

  <!-- modal -->
  <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalCenterTitle">Add a new Project</h3>
          </div>
          <form method="post" action="project.php">
            <div class="modal-body">
              <input class="formInput" type="text" name="title" placeholder="Title" required>
              <select class="formInput" name="domain">
                <option value="0">Domain</option>
                <?php
                $qry = mysqli_query($con,"SELECT DISTINCT (sector) FROM problem");
                while($qry1 = mysqli_fetch_array($qry)){
                    if($qry1[0]=="GravitiChain") {
                ?>
                <option value="<?php echo $qry1[0]."**" ;?>"><?php echo $qry1[0]."**" ;?></option>
                <?php
                    } else {
                ?>
                <option value="<?php echo $qry1[0] ;?>"><?php echo $qry1[0] ;?></option>
                <?php } } ?>
            </select>
              <textarea class="formInput" rows="5" cols="80" name="description" placeholder="Descrption"></textarea>
              <div id="login">
                <button type="submit" class="btn btn-basic" value="submit" >Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="viewProject" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalCenterTitle">Projects</h3>
          </div>
          <div class="container">
            <div class="row" id="viewProjects"></div>
          </div>
        </div>
      </div>
    </div>

      <div class="updates">
        <h3 class="subhead1">Updates</h3>
        <?php $qry = mysqli_query($con,"SELECT * FROM team_message");
        while($row = mysqli_fetch_array($qry)){
          ?>
          <p><?php echo $row['description']; ?></p>
          <?php
        } ?>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><br>
      </div>

      <?php $id = $_SESSION['log']['std_uid'];
      $qry = mysqli_query($con,"SELECT * FROM team WHERE leader='$id' ");
      $qry1 = mysqli_num_rows($qry);
      if ($qry1) {
        ?>
      <div class="flex-container">
        <div class="container big">
          <form id="contact" method="post" action="invite.php">
            <h3>Approve Members</h3>
            <h4>People who want to join your team.</h4>
            <table>
              <tr>
                <?php $qry3 = mysqli_query($con,"SELECT * FROM invite WHERE team='$teamname' ")or die(mysqli_error($con));
                while($row = mysqli_fetch_array($qry3)) {
                  $femail = $row['from_email'];
                  $qry = mysqli_query($con,"SELECT * FROM student WHERE email='$femail' ")or die(mysqli_error($con));
                  $qry2 = mysqli_fetch_array($qry);
                  ?>
                <td><?php echo $qry2['name']; ?></td>
                <td><a href="approve.php?id=<?php echo $row['id']; ?>">Approve</a></td>
                <td><a href="reject.php?id=<?php echo $row['id']; ?>">Reject</a></td>
                <?php } ?>
              </tr>
            </table>
          </form>
        </div>
      </div>
      <?php } ?>

        <div class="timeline">
          <h3 class="subhead1">Timeline</h3>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated active" role="progressbar" aria-valuenow="75"
              aria-valuemin="0" aria-valuemax="100" style="width: 75%">
            </div>
          </div>
        </div>

    <?php  } ?>
  
  <!-- Footer -->
  <?php include('include/footer.php') ?>

  <!-- modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalCenterTitle">Student Mentor</h3>
          </div>
          <div style="padding: 3%">
            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
          </div>
          <form method="post" action="studmentorregister.php">
            <div class="modal-body">
              <input class="formInput" type="text" name="skill" placeholder="Your Skills" required>
              <input class="formInput" type="text" name="linkedin" placeholder="LinkedIn Link">
              <input class="formInput" type="text" name="github" placeholder="Github Link">
              <select class="formInput" name="domain">
                <option value="0">Domain</option>
                <?php
                $qry = mysqli_query($con,"SELECT DISTINCT (sector) FROM problem");
                while($qry1 = mysqli_fetch_array($qry)){
                    if($qry1[0]=="GravitiChain") {
                ?>
                <option value="<?php echo $qry1[0]."**" ;?>"><?php echo $qry1[0]."**" ;?></option>
                <?php
                    } else {
                ?>
                <option value="<?php echo $qry1[0] ;?>"><?php echo $qry1[0] ;?></option>
                <?php } } ?>
            </select>
              <div id="login">
                <button type="submit" class="btn btn-basic" value="submit" href="mentorregistration.php">Register as a Mentor</button>
              </div>
            </div>
          </form>
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
      $('#viewProjects').load('get-dynamic-data-project.php?modal=' + modal,
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