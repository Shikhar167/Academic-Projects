<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registration Form|Mentor</title>
  <meta charset="UTF-8">
  <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0' />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

  <!-- Navbar -->
  <?php include('include/indexnav.php') ?>
  <!-- navbar -->

  <div class="container">
    <form id="contact" method="post" action="mentorregister.php">
      <h2>Registration for Start-Up-VIT</h2>
      <h4>E-CELL,VIT</h4>
      <input class="formInput" type="text" name="name" placeholder="Name" required autofocus>
      <input class="formInput" type="email" name="email" placeholder="Email Address" required>
      <input class="formInput" type="text" name="phone" placeholder="Phone Number" required>
      <label>Domain :</label>
      &emsp;&emsp;&emsp;&emsp;<input type="radio" name="domain" value="business" required>Business&emsp;&emsp;&emsp;&emsp; 
      <input type="radio" name="domain" value="technical">Technical
      <select name="sector">
        <option value="0">Select your Sector</option>
        <option value="1">1</option>
        <option value="1">1</option>
        <option value="1">1</option>
      </select>
      <button class="btn btn-warning" name="submit" type="submit" id="contact-submit" data-submit="Sending">Register</button>
    </form>
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