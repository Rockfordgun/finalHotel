<?php
include_once "../layouts/header.php";
include_once "../../includes/config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $users = $pdo->query("SELECT * FROM users WHERE id='$id'");
    $users->execute();

    $userSingle = $users->fetch(PDO::FETCH_OBJ);

    if (isset($_POST['submit'])) {
        if (empty($_POST['username']) || empty($_POST['pwd']) || empty($_POST['email'])) {
            echo "<script>alert('One Or More Input Are Empty')</script>";
        } else {
            $username = $_POST['username'];
            $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
            $email = $_POST['email'];

            $update = $pdo->prepare("UPDATE users SET username = :username, pwd = :pwd, email = :email WHERE id = :id");
            $update->execute([
                ":username" => $username,
                ":pwd" => $pwd,
                ":email" => $email,
                ":id" => $id
            ]);

            header("location: show-users.php");
        }
    }
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Update User</h5>
                    <form method="POST" action="update-users.php?id=<?php echo $id; ?>">
                        <!-- Email input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="username" value="<?php echo $userSingle->username; ?>" id="form2Example1" class="form-control" placeholder="username" />

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Password</label>
                            <input type="password" name="pwd" value="<?php echo $userSingle->pwd; ?>" id="form2Example1" class="form-control" />
                        </div>

                        <div class="form-outline mb-4 mt-4">
                            <label for="exampleFormControlTextarea1">email</label>

                            <input type="text" name="email" value="<?php echo $userSingle->email; ?>" id="form2Example1" class="form-control" />

                        </div>




                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php

include_once "../layouts/footer.php";


?>