<?php
ob_start();
include_once "../includes/header.php";
require_once "../includes/config.php";

if (isset($_SESSION['username'])) {
  header("location: " . APPURL . "");
}


if (isset($_POST['submit'])) {
  if (empty($_POST['email']) || empty($_POST['password'])) {
    echo "<script>alert('One Or More Input Are Empty')</script>";
  } else {


    $password = $_POST['password'];
    $email = $_POST['email'];

    //validate details

    $login = $pdo->query("SELECT * FROM users WHERE email='$email'");
    $login->execute();

    $fetch = $login->fetch(PDO::FETCH_ASSOC);

    // Get row count
    if ($login->rowCount() > 0) {
      if (password_verify($password, $fetch['pwd'])) {

        //echo "<script>alert('You have been logged in')</script>";

        $_SESSION['username'] = $fetch['username'];
        $_SESSION['id'] = $fetch['id'];

        header("location: " . APPURL . "");
      } else {
        echo "<script>alert('Your Email or Password is incorrect')</script>";
      }
    } else {
      echo "<script>alert('Your Email or Password is incorrect')</script>";
    }
  }
}

ob_end_flush();

?>


<header class="mainHeader" style="background: url(../img/mainBanner.jpg); height:80vh;  background-position: center;
    background-size: cover;">
  <!--Hero-->

</header>




<div class="hero-wrap js-fullheight" style="background-image: url('../img/mainBanner.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
      <div class="col-md-7 ftco-animate">
        <!-- <h2 class="subheading">Welcome to Vacation Rental</h2>
          	<h1 class="mb-4">Rent an appartment for your vacation</h1>
            <p><a href="#" class="btn btn-primary">Learn more</a> <a href="#" class="btn btn-white">Contact us</a></p> -->
      </div>
    </div>
  </div>
</div>

<section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
  <div class="container">
    <div class="row justify-content-middle" style="margin-left: 397px;">
      <div class="col-md-6 mt-5">
        <form action="login.php" method="post" class="appointment-form" style="margin-top: -568px;">
          <h3 class="mb-3">Login</h3>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="Email">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
              </div>
            </div>



            <div class="col-md-12">
              <div class="form-group">
                <input type="submit" name="submit" value="Login" class="btn btn-primary py-3 px-4">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<?php
include_once "../includes/footer.php";
?>