<?php


require_once './includes/config_session.inc.php';
require_once './includes/signup_view.inc.php';
include_once './includes/header.php';


?>



<!--Header-->
<header class="header">
  <!--Hero-->
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>
</header>

<!--Reservations-->
<section class="signup">
  <div class="container">
    <div class="row mt-5 mx-auto">
      <div class="col text-center">
        <h3>Signup</h3>
        <form action="./includes/signup.inc.php" method="post" class="form-control">
          <input type="text" name="username" placeholder="Enter Your Username" class="mt-3 form-control form-control-lg" />
          <input type="password" name="pwd" placeholder="Enter Your Password" class="mt-3 form-control form-control-lg" />
          <input type="text" name="email" placeholder="Enter Your Email Adress" class="mt-3 form-control form-control-lg" />

          <button type="submit" class="btn btn-outline-primary mt-4">
            Signup
          </button>
        </form>

        <?php

        check_signup_errors();

        ?>
      </div>
    </div>
  </div>
</section>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>
</body>

</html>