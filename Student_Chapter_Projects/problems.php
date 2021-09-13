<?php include('include/config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Problems</title>
  <meta charset="UTF-8">
  <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0' />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body>
  <!-- Navbar -->
  <?php include('include/indexnav.php') ?>
  <!-- navbar -->
  <div class="namaste">
    <div id="particles-js"></div>
    <script src="particles.js"></script>
    <script src="app.js"></script>
    <h2>Proposed</h2>
    <h1>Problem Statements</h1>
  </div>

<!-- Start Achievements Area -->
      <div class="container">
        <form id="contact" method="post">
            <select class="formInput" name="sector">
                <option value="0">Sector</option>
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
            <select class="formInput" name="track">
                <option value="0">Track</option>
                <?php
                    $qry = mysqli_query($con,"SELECT DISTINCT(track) FROM problem");
                    while($qry1 = mysqli_fetch_array($qry)){ ?>
                <option value="<?php echo $qry1[0] ;?>"><?php echo $qry1[0] ;?></option>
                <?php } ?>
            </select>
            <button class="btn btn-basic" name="ok" type="submit" id="contact-submit" data-submit="Sending">Search</button>
        </form>
        <br>
      </div>
      <div class="container-fluid">
            <table class="table-bordered table">
              <thead class="thead-light">
                <tr>
                  <th class="head" scope="col">Sl</th>
                  <th class="head" scope="col">Title</th>
                  <th class="head" scope="col">Statement</th>
                  <th class="head" scope="col">Sector</th>
                  <th class="head" scope="col">Track</th>
                </tr>
              </thead>
              <tbody>
              <?php
                if (isset($_POST['ok']))
                {
                  $sec=$_POST['sector'];
                  $trk=$_POST['track'];
                  if ($sec!="0" && $trk!="0")
                  {
                    $qry = mysqli_query($con,"SELECT * FROM problem WHERE sector ='$sec' AND track = '$trk'");
                    while($qry1 = mysqli_fetch_array($qry)){
                  ?>
                <tr>
                  <td><?php echo $qry1['id'];  ?></td>
                  <td><?php echo $qry1['title']; ?></td>
                  <td><?php echo $qry1['statement']; ?></td>
                  <td><?php echo $qry1['sector']; ?></td>
                  <td><?php echo $qry1['track']; ?></td>
                </tr>
                <?php 
                    }   
                  } else if($sec!="0") {
                  $qry = mysqli_query($con,"SELECT * FROM problem WHERE sector='$sec'");
                  while($qry1 = mysqli_fetch_array($qry)){
                ?>
                <tr>
                  <td><?php echo $qry1['id'];  ?></td>
                  <td><?php echo $qry1['title']; ?></td>
                  <td><?php echo $qry1['statement'];  ?></td>
                  <td><?php echo $qry1['sector']; ?></td>
                  <td><?php echo $qry1['track']; ?></td>
                </tr>
                <?php 
                    }   
                  } else if($trk!="0") {
                  $qry = mysqli_query($con,"SELECT * FROM problem WHERE track='$trk'");
                  while($qry1 = mysqli_fetch_array($qry)){
                ?>
                <tr>
                  <td><?php echo $qry1['id'];  ?></td>
                  <td><?php echo $qry1['title']; ?></td>
                  <td><?php echo $qry1['statement'];  ?></td>
                  <td><?php echo $qry1['sector']; ?></td>
                  <td><?php echo $qry1['track']; ?></td>
                </tr>
                <?php 
                    }
                  }
                }
                else
                {
                  $qry = mysqli_query($con,"SELECT * FROM problem");
                  while($qry1 = mysqli_fetch_array($qry)){
                ?>
                <tr>
                  <td><?php echo $qry1['id'];  ?></td>
                  <td><?php echo $qry1['title']; ?></td>
                  <td><?php echo $qry1['statement'];  ?></td>
                  <td><?php echo $qry1['sector']; ?></td>
                  <td><?php echo $qry1['track']; ?></td>
                </tr>
                <?php 
                  }
                } 
              ?>
              </tbody>
            </table>
      </div>

  <!-- Footer -->
  <?php include('include/footer.php') ?>

  <!-- modal -->
  <?php include('signinmodal.php') ?>

  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>
</body>

</html>