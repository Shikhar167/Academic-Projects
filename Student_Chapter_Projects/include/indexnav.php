<?php session_start(); ?>
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
        <!-- <a class="navbar-brand active" href="index.php"><img id="logo" src="img/logo.png"></a> -->
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Home</a></li>
                <li><a href="problems.php">Problem Statements</a></li>
                <li><a href="index.php#about">About</a></li>
                <li><a href="index.php#contactUs">Contact Us</a></li>
                <?php if (!isset($_SESSION['log']) || $_SESSION['log'] == '') {?>
                <button type="button" class="btn btn-basic navbarbutton" data-toggle="modal" data-target="#exampleModalCenter">Login/Register</button>
            <?php } else { ?>
                <button type="button" class="btn btn-basic navbarbutton"><a href="dash.php">Dashboard</a></button>
            <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>