<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registration Form</title>
  <meta charset="UTF-8">
  <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0' />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body background-image="img/background.png">

  <!-- Navbar -->
  <nav class="navbar navbar-default  navbar-fixed-top ">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
        <a class="navbar-brand active" href="index.php"><img id="logo" src="img/logo.png"></a>
        </div>
    </div><!-- /.container-fluid -->
  </nav>
  <!-- navbar -->
  <?php
  $email = $_GET['email'];
  $hash = $_GET['hash'];
  $types = $_GET['type'];
  ?>
  <div class="container">
    <form id="contact" method="post" action="verification.php">
      <h2>Account Activated Successfully</h2>
      <h4>Sign-In</h4>
        <input class="formInput" type="email" name="email" id="email" placeholder="Your Email Address" value="<?php echo $email ?>"required>
        <input class="formInput" type="password" name="password" id="pwd" placeholder="Your Password" required>
        <input class="formInput" type="password" name="newpassword" id="newpwd" placeholder="Your New Password" required>
        <input class="formInput" type="password" name="repassword" id="repwd" placeholder="Confirm New Password" required>
        <input class="formInput" type="hidden" name="hash" value="<?php echo $hash; ?>">
        <input class="formInput" type="hidden" name="types" value="<?php echo $types; ?>">
        <button class="btn btn-warning" name="submit" type="submit" id="contact-submit" data-submit="Sending">Sign in</button>
    </form>
  </div>

  <!-- Footer -->
  <?php include('include/footer.php') ?>

  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>
</body>

</html>