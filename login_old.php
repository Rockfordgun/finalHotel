<?php

include_once './includes/header.php'

?>

<!--Header-->
<header class="mainHeader">
  <!--Hero-->

</header>
<img src="./img/mainBanner.jpg" alt="" srcset="">
<!--Login-->
<section class="login">
  <div class="container">
    <div class="row mt-5">
      <div class="col text-center">
        <h3>Login</h3>

        <p class="text-danger">
          Dont Have an account yet? Sign Up
          <a href="./signup.html" target="_blank">Here</a>
        </p>

        <form action="./includes/login.inc.php" method="post" class="form-control">
          <input type="text" name="username" placeholder="Enter Your Username" class="mt-3 form-control form-control-lg" />
          <input type="password" name="pwd" placeholder="Enter Your Password" class="mt-3 form-control form-control-lg" />
          <button type="submit" class="btn btn-outline-primary mt-4">
            Login
          </button>
        </form>



      </div>
    </div>
  </div>
</section>

<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/script.js"></script>
</body>

</html>