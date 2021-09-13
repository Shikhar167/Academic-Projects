<!DOCTYPE html>
<html lang="en">

<head>
  <title>Update Profile</title>
  <meta charset="UTF-8">
  <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0' />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

  <!-- Navbar -->
  <?php include('include/dashnav.php'); ?>
  <!-- navbar -->

  <div class="container">
    <form id="contact" method="post" action="update.php">
      <h2>Update Profile</h2>
      <label>Name</label>
      <input class="formInput" type="text" name="name" value="<?php echo $_SESSION['log']['name'] ?>" required autofocus>
      <label>Phone Number</label>
      <input class="formInput" type="text" name="phone" value="<?php echo $_SESSION['log']['phone_no'] ?>" required>
      <?php if ($_SESSION['log']['type'] == "external") { ?>
      <label>College Name</label>
      <input class="formInput" type="text" name="college_name" value="<?php echo $_SESSION['log']['college_name'] ?>" required>
      <?php } ?>
      <button class="btn btn-warning" name="submit" type="submit" id="contact-submit" data-submit="Sending">Update</button>
    </form>
  </div>

  <div class="container">
    <form id="contact" method="post" action="updatepassword.php">
      <h2>Update Password</h2>
      <label>Current Password</label>
      <input class="formInput" type="password" name="password" placeholder="Current Password" required autofocus>
      <label>New Password</label>
      <input class="formInput" type="password" name="newpassword" placeholder="New Password" required>
      <label>Confirm Password</label>
      <input class="formInput" type="password" name="repassword" placeholder="Confirm Password" required>
      <button class="btn btn-warning" name="submit" type="submit" id="contact-submit" data-submit="Sending">Secure</button>
    </form>
  </div>
  <br><br><br>

  <!-- Footer -->
  <?php include('include/footer.php') ?>

  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>
</body>

</html>