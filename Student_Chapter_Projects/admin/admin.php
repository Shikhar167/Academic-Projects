<?php include('../include/sessioncheck.php'); ?>
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
  <nav class="navbar navbar-default  navbar-fixed-top ">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
          aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand active" href=#><img id="logo" src="../img/logo.png"></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <button type="button" class="btn btn-warning navbarbutton"><a href="../logout.php">Logout</a></button>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <!-- navbar -->
  <div class="namaste">
    <h2>Hey</h2>
    <h1>Admin!!</h1>
  </div>

    <div class="container">
        <div class="row"><br>
        <a href="teams.php" class="btn btn-info btn-block" role="button">Teams</a>
        <a href="students.php" class="btn btn-info btn-block" role="button">Students</a>
        <a href="studmentor.php" class="btn btn-info btn-block" role="button">Student Mentors</a>
        <a href="mentors.php" class="btn btn-info btn-block" role="button">Mentors</a>
        <a href="projects.php" class="btn btn-info btn-block" role="button">Projects</a>
        <a href="requirements.php" class="btn btn-info btn-block" role="button">Requirements</a>
        </div>
    </div>
    <br>

  <?php include('footer.php'); ?>

  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>
</body>

</html>