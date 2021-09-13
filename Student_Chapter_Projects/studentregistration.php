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
  <?php include('include/indexnav.php') ?>
  <!-- navbar -->

  <div class="container">
    <form id="contact" method="post" action="studentregister.php">
      <h2>Registration for StartUp-VIT</h2>
      <h4>E-CELL,VIT</h4>
        <input class="formInput" type="text" name="name" id="name" placeholder="Your Name" autofocus required><br>
        <input class="formInput" type="email" name="email" id="email" placeholder="Your Email Address" required>
        <input class="formInput" type="text" name="phone" id="phone" placeholder="Your Phone Number" required>
        <label>VIT, Vellore student?</label>
        &emsp;&emsp;&emsp;<input type="radio" name="radi" id="rad2" onclick="myFunction2()" value="internal" required>Yes &emsp;&emsp;&emsp;&emsp;&emsp;
        <input type="radio" name="radi" id="rad1" onclick="myFunction()" value="external">No
        <input class="formInput" type="text" name="tobereplaced" id="tobereplaced" style="display: none" required>
        <button class="btn btn-warning" name="submit" type="submit" id="contact-submit" data-submit="Sending">Register</button>
    </form>
  </div>

  <!-- Footer -->
  <?php include('include/footer.php') ?>

  <!-- modal -->
  <?php include('signinmodal.php') ?>

  <script>
    let i;
    let x = null;
    function myFunction() {
      x = document.getElementById("rad1").value; 
      // console.log(x);
      i = document.createElement("input");
      i.type = "text";
      i.name = "college_name";
      i.id = "tobereplaced";
      i.placeholder = "Your College name";
      i.required = true;
      replace(i);
    }
    function myFunction2() {
      x = document.getElementById("rad2").value;
      // console.log(x);
      i = document.createElement("input");
      i.type = "text";
      i.name = "reg_no";
      i.id = "tobereplaced";
      i.placeholder = "Your Registration Number";
      i.required = true;
      replace(i);
    }
    function replace(i){
      var f = document.getElementById("contact");
      var g = document.getElementById("tobereplaced");
      f.replaceChild(i,g);
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>
</body>

</html>