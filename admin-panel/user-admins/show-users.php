<?php
include_once "../layouts/header.php";
include_once "../../includes/config.php";


$users = $pdo->query("SELECT * FROM users");
$users->execute();
$allUsers = $users->fetchAll(PDO::FETCH_OBJ);
?>



<div class="container-fluid">

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Users</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">USERNAME</th>
                                <th scope="col">email</th>
                                <th scope="col">update</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allUsers as $users) : ?>
                                <tr>
                                    <th scope="row"><?php echo $users->id; ?></th>
                                    <td><?php echo $users->username; ?></td>
                                    <td><?php echo $users->email; ?></td>


                                    <td><a href="update-users.php?id=<?php echo $users->id; ?>" class="btn btn-warning text-white text-center ">Update </a></td>
                                    <td><a href="delete-users.php?id=<?php echo $users->id; ?>" class="btn btn-danger  text-center ">Delete </a></td>





                                </tr>

                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>



</div>
<?php
include_once "../layouts/footer.php";
?>