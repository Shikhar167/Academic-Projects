<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalCenterTitle">Login</h3>
      </div>
      <form method="post" action="signin.php">
        <div class="modal-body">
          <label><b>E-mail</b></label><br>
          <input class="formInput" type="email" name="email" placeholder="Username" required>
          <br>
          <label><b>Password</b></label><br>
          <input class="formInput" type="password" name="password" placeholder="Password" required>
          <br>
          <div id="login">
            <button type="submit" class="btn btn-basic" value="submit" href="mentorregistration.php">Login</button>
          </div>
        </div>
      </form>
      <div class="modal-footer">
        <h4>New user?</h4>
        <a role="button" href="studentregistration.php" class="btn btn-basic">Sign-up as Student</a>
        &emsp;&emsp;&emsp;
        <a role="button" href="mentorregistration.php" class="btn btn-basic">Sign-up as Mentor</a>
      </div>
    </div>
  </div>
</div>