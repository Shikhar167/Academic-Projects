<?php 
if (!$_SESSION['log']['team_name']) {
  ?>
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
        <!-- <a class="navbar-brand active" href=#><img id="logo" src="img/logo.png"></a> -->
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="dash.php">Dash</a></li>
          <li><a href="updateprofile.php">Update Profile</a></li>
          <button type="button" class="btn btn-basic navbarbutton"><a href="logout.php">Logout</a></button>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
<?php
  } else {
    ?>
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
          <a class="navbar-brand active" href=#><img id="logo" src="img/logo.png"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="dash.php">Dash</a></li>
            <!-- <li><a href="#">Change Team</a></li> -->
            <li><a href="problems.php">Recommended Problems</a></li>
            <li><a href="updateprofile.php">Update Profile</a></li>
            <button type="button" class="btn btn-basic navbarbutton"><a href="logout.php">Logout</a></button>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
<?php } ?>
