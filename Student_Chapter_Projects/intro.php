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
<style>
.flex-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.flex-container > div {
  text-align: center;
}
</style>
<body>

  <!-- Navbar -->
  <?php include('include/dashnav.php') ?>
  <!-- navbar -->

  <div class="flex-container">
    <div class="container big">
      <form id="contact" method="post" action="create.php">
        <h1>CREATE</h1>
        <h4>a team.</h4>
        <input class="formInput" type="text" name="name" placeholder="Name" required autofocus>
        <button class="btn btn-warning" name="submit" type="submit" id="contact-submit" data-submit="Sending">Create</button>
      </form>
    </div>
    <div class="container big">
      <form id="contact" method="post" action="join.php">
        <h1>JOIN</h1>
        <h4>a team.</h4>
        <input class="formInput" type="text" name="name" placeholder="Name" required autofocus>
        <button class="btn btn-warning" name="submit" type="submit" id="contact-submit" data-submit="Sending">Join</button>
      </form>
    </div>
    <div class="container big">
      <form id="contact" method="post" action="mentor.php">
        <h1>MENTOR</h1>
        <h4>a team.</h4>
        <br>
        <button class="btn btn-warning" name="submit" type="submit" id="contact-submit" data-submit="Sending" style="margin-bottom: 20px">Mentor</button>
      </form>
    </div>
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