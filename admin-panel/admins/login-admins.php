<?php
include_once "../layouts/header.php";
include_once "../../includes/config.php";

if (isset($_SESSION['adminname'])) {
  header("location: " . ADMINURL . "");
}


if (isset($_POST['submit'])) {
  if (empty($_POST['email']) || empty($_POST['password'])) {
    echo "<script>alert('One Or More Input Are Empty')</script>";
  } else {


    $password = $_POST['password'];
    $email = $_POST['email'];

    //validate details

    $login = $pdo->query("SELECT * FROM admins WHERE email='$email'");
    $login->execute();

    $fetch = $login->fetch(PDO::FETCH_ASSOC);

    // Get row count
    if ($login->rowCount() > 0) {
      if (password_verify($password, $fetch['pwd'])) {

        // echo "<script>alert('You have been logged in')</script>";

        $_SESSION['adminname'] = $fetch['adminname'];
        $_SESSION['id'] = $fetch['id'];

        header("location: " . ADMINURL . "");
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
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mt-5">Login</h5>
          <form method="POST" class="p-auto" action="login-admins.php">
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />

            </div>


            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />

            </div>



            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>


          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<?php
include_once "../layouts/footer.php";
?>