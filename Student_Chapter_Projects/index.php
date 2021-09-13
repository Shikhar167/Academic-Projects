<!DOCTYPE html>
<html lang="en">

<head>
  <title>Ideation Platform</title>
  <link rel="shortcut icon" type="image/png" href="/img/favicon.png"/>
  <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
  <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0' />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Kodchasan" rel="stylesheet">

</head>
<body>
  <!-- Navbar -->
  <?php include('include/indexnav.php') ?>
  <!-- navbar -->

  <div class="container-fluid">
    <div class="row">
      <div class="div1 col-lg-12">
        <div id="particles-js"></div>
        <script src="particles.js"></script>
        <script src="app.js"></script>
        <h1>Start-Up<br>VIT</h1>
        <div class="hideit">
        <?php if (!isset($_SESSION['log']) || $_SESSION['log'] == '') {?>
            <button type="button" class="btn btn-basic navbarbutton" data-toggle="modal" data-target="#exampleModalCenter">Login/Register</button>
        <?php } else { ?>
            <button type="button" class="btn btn-basic navbarbutton"><a href="dash.php">Dashboard</a></button>
        <?php } ?>
        </div>
    </div>
  </div>
  
<!--</div>
  <div class="div2 row">
    <div class="col-lg-4 col-md-4">
      <h4 class="ele1">100+ PROJECTS <br> REGISTERED</h4>
    </div>
    <div class="col-lg-4 col-md-4">
      <h4 class="mentors ele1">50+ MENTORS</h4>
    </div>
    <div class="col-lg-4 col-md-4">
      <h4 class="ele1">500+ CONTACTS</h4>
    </div>
  </div>
  <!-- projects carousal -->
  <!--<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <!--<ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <!--<div class="carousel-inner" style="height: 300px;">

      <div class="item picture active">
        <img src="img/vicara.jpg" alt="Los Angeles" style="max-width: 700px;max-height: 700px;text-align: center;margin: auto;padding: auto;min-width: 300px;min-height: 300px;">
        <div class="carousel-caption">
          <h3 style="color: #252626">Vicara</h3>
        </div>
      </div>

      <div class="item picture">
        <img src="img/fm.png" alt="Chicago" style="max-width: 700px;max-height: 700px;text-align: center;margin: auto;padding: auto;min-width: 300px;min-height: 300px;">
      </div>
    
      <div class="item picture">
        <img src="img/mm.png" alt="New York" style="max-width: 700px;max-height: 700px;text-align: center;margin: auto;padding: auto;min-width: 300px;min-height: 300px;">
      </div>

      <div class="item picture">
        <img src="img/a.png" alt="Chicago" style="max-width: 700px;padding-top:30%;max-height: 700px;text-align: center;margin: auto;padding: auto;">
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

  <div class="container-fluid" id="about">
    <h3 class="subhead1">About</h3>
    <p>Ideation Platform is a website that shall serve as a stage where the teams that
    registered in HackerTech along with other start-ups will receive resources and
    guidance to implement their idea and transform their dream to an
    entrepreneurial venture. The intricacies of business shall be discussed and
    students will learn how to sustain in this competitive market. From the basics to
    the advanced concepts, every aspect of business will be communicated to them
    through the website and sessions.</p>
  </div>

  <div class="container-fluid" id="about">
    <h3 class="subhead1">Our Objective</h3>
    <p>• To assist the students in improving their understanding about the working
    of a startup<br>
    • To help them work on their startup and ultimately receive the funding it
    requires<br>
    • To provide them the scope to transform their technical project/ prototype
    to a startup and establish themselves as young entrepreneurs.</p>
  </div>

  <div id="contactUs">
    <div class="container-fluid ">
      <h3 class="subhead2">Contact Us</h3>
      <div class="dark">
        <p>Feel free to contact us in case of any queries</p>
      </div>
    </div>
    <form method="post" action="subscribe.php">
      <div class="row contactForm">
        <div class="col-lg-6 col-md-6">
          <input class="formInput" type="text" name="name" placeholder="NAME" required><br>
          <input class="formInput" type="text" name="email" placeholder="EMAIL" required><br>
          <input class="formInput" type="text" name="subject" placeholder="SUBJECT" required><br>
        </div>
        <div class="col-lg-6 col-md-6">
          <textarea class="formInput" name="message" rows="6" cols="30" placeholder="MESSAGE" required></textarea>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <button type="button" class="btn btn-light" id="logout">Send Message</button>
        </div>
      </div>
    </form>
  </div>

  <!-- modal -->
  <?php include('signinmodal.php') ?>
  
  <!-- Footer -->
  <?php include('include/footer.php') ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>
</body>
</html>
