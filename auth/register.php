<?php
ob_start();
include_once "../includes/header.php";
require_once "../includes/config.php";

if (isset($_SESSION['username'])) {
  header("location: " . APPURL . "");
}

if (isset($_POST['submit'])) {
  if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
    echo "<script>alert('One Or More Input Are Empty')</script>";
  } else {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $insert = $pdo->prepare("INSERT INTO users (username, email, pwd)
    VALUES (:username, :email, :pwd)");

    $insert->execute([
      ":username" => $username,
      ":email" => $email,
      ":pwd" => $password,
    ]);

    header("login.php");
  }
}

ob_end_flush();
?>

<header class="mainHeader bg-overlay">
  <!--Hero-->

</header>

<section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
  <div class="container">
    <div class="row justify-content-middle" style="margin-left: 397px;">
      <div class="col-md-6 mt-5">
        <form action="register.php" method="POST" class="appointment-form" style="margin-top: -568px;">
          <h3 class="display-3 text-white">Register</h3>
          <div class="row">
            <div class="col-md-12 mt-3">
              <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username">
              </div>
            </div>
            <div class="col-md-12 mt-3">
              <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="Email">
              </div>
            </div>
            <div class="col-md-12 mt-3">
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
              </div>
            </div>



            <div class="col-md-12 mt-3">
              <div class="d-grid form-group">
                <input type="submit" name="submit" value="Register" class="btn btn-primary text-white text-uppercase fw-bold">
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