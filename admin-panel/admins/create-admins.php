<?php
include_once "../layouts/header.php";
include_once "../../includes/config.php";

if (!isset($_SESSION['adminname'])) {
  echo "<script>window.location.href='" . ADMINURL . "/admins/login-admins.php'</script>";
}

if (isset($_POST['submit'])) {
  if (empty($_POST['adminname']) || empty($_POST['email']) || empty($_POST['password'])) {
    echo "<script>alert('One Or More Input Are Empty')</script>";
  } else {
    $adminname = $_POST['adminname'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $insert = $pdo->prepare("INSERT INTO admins (adminname, email, pwd)
    VALUES (:adminname, :email, :pwd)");

    $insert->execute([
      ":adminname" => $adminname,
      ":email" => $email,
      ":pwd" => $password,
    ]);

    header("admins.php");
  }
}

ob_end_flush();
?>
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-5 d-inline">Create Admins</h5>
          <form method="POST" action="create-admins.php" enctype="multipart/form-data">
            <!-- Email input -->
            <div class="form-outline mb-4 mt-4">
              <input type="email" name="email" id="form2Example1" class="form-control" placeholder="email" />

            </div>

            <div class="form-outline mb-4">
              <input type="text" name="adminname" id="form2Example1" class="form-control" placeholder="adminname" />
            </div>
            <div class="form-outline mb-4">
              <input type="password" name="password" id="form2Example1" class="form-control" placeholder="password" />
            </div>







            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>


          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

</script>
</body>

</html>