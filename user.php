<?php

session_start();

if (!isset($_SESSION['userId'])) {
  header("Location: login.php"); // Redirect to login page
  exit();
}

include_once './includes/header.php';

if (isset($_SESSION['userId'])) {
  require_once './includes/dbh.inc.php'; // Include your database connection code

  $userId = $_SESSION['userId'];

  $sql = "SELECT * FROM user_profiles WHERE user_id = ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$userId]);
  $profile = $stmt->fetch(PDO::FETCH_ASSOC);
}


?>

<section id="user_profile">
  <div class="wrapper">
    <!-- Sidebar -->
    <?php
    include_once "./includes/sidebar.php";

    ?>
    <!-- Main Component -->
    <div class="main">
      <nav class="navbar navbar-expand px-3 border-bottom">
        <!-- Button for sidebar toggle -->
        <button class="btn" type="button" data-bs-theme="dark">
          <span class="navbar-toggler-icon bg-primary rounded"></span>
        </button>
      </nav>
      <main class="content px-3 py-2">
        <div class="container-fluid">
          <div class="row">
            <div class="col mb-3">
              <div class="top_profiles d-flex justify-content-between mt-3">
                <h4>My Profile</h4>
                <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Edit Profile
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="./includes/process_form.php" method="post" class="form-control">

                          <div class="row">
                            <div class="col">
                              <input type="text" class="form-control" name="name" id="" placeholder="Enter Your Name">
                            </div>
                            <div class="col">
                              <select class="form-select text-secondary" name="gender" aria-label="Default select example">
                                <option selected>Select Your Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>

                              </select>
                            </div>
                          </div>
                          <div class="row mt-3">
                            <div class="col">
                              <input type="text" class="form-control" name="surname" id="" placeholder="Surname">
                            </div>
                            <div class="col">
                              <select class="form-select text-secondary" name="country" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">South Africa</option>
                                <option value="2">Albania</option>
                                <option value="3">Algeria</option>
                                <option value="4">Andorra</option>
                                <option value="5">Angola</option>
                                <option value="6">Antigua </option>
                                <option value="7">Argentina</option>
                                <option value="8">Bhutan</option>
                                <option value="9">United States</option>
                                <option value="10">Australia</option>
                              </select>
                            </div>
                          </div>
                          <div class="row mt-3">
                            <div class="col">
                              <input type="email" class="form-control" name="email" id="" placeholder="Enter Your Email">
                            </div>
                            <div class="col">
                              <input type="tel" id="typePhone" name="phone" class="form-control" required placeholder="Enter Your Phone Number" />
                            </div>

                          </div>
                          <div class="row mt-3">
                            <div class="col">

                              <div class="form-outline">

                                <div class="col-lg-12">
                                  <textarea name="user-adress" id="user-adress" class="form-control" cols="50" rows="3" placeholder="Enter your Adress"></textarea>
                                </div><!--end col 10-->
                              </div>

                            </div>

                          </div>

                          <button type="submit" class="btn btn-primary text-white mt-4">Submit</button>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                      </div>
                    </div>
                  </div>
                </div>


              </div>
              <hr />
            </div>
            <table class="table">
              <thead>
                <tr class="fs-5 text_profile table_back">
                  <th scope=" col">Id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Surname</th>
                  <th scope="col">Email</th>


                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td><?php echo $profile['name']; ?></td>
                  <td><?php echo $profile['surname']; ?></td>
                  <td><?php echo $profile['email']; ?></td>
                </tr>



                <thead>
                  <tr class="fs-5 text_profile  ">

                    <th scope="col">Adress</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Country</th>
                    <th scope="col">Phone</th>

                  </tr>

                  <tr>
                    <td class="w-25"> <?php echo $profile['address']; ?></td>
                    <td> <?php echo $profile['gender']; ?></td>
                    <td><?php echo $profile['country']; ?></td>
                    <td><?php echo $profile['phone']; ?></td>

                    <td><a href="edit_profile.php?id=<?php echo $profile['id']; ?>" class="btn btn-primary">Edit</a></td>
                  </tr>
                </thead>
              </tbody>
            </table>
          </div>

          <div class="row">
            <div class="col mb-3">
              <div class="top_profiles d-flex justify-content-between mt-3">
                <h4>Bookings</h4>
                <p class="me-4 text-secondary">Edit Profile</p>
              </div>
              <hr />
            </div>
            <div class="row table-responsive-sm">
              <table class="table ms-2">
                <thead>
                  <tr class="fs-5 text_profile">
                    <th scope="col  ">Hotel Name</th>
                    <th scope="col">Book In</th>
                    <th scope="col">Book Out</th>
                    <th scope="col">Pick Up</th>
                    <th scope="col">Excursions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>@mdo</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</section>





<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/script.js"></script>
</body>

</html>