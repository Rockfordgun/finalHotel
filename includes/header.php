<?php
session_start();

define("APPURL", "http://localhost/finalHotel");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--Font Selection-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@500&family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="<?php echo APPURL; ?>/css/fontawesome.css" />
    <link rel="stylesheet" href="<?php echo APPURL; ?>/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo APPURL; ?>/css/bootstrap.css" />

    <link rel="stylesheet" href="<?php echo APPURL; ?>/css/bootstrap-datepicker.min.css">
    <script src="<?php echo APPURL; ?>/js/bootstrap-datepicker.min.js"></script>



    <link rel="stylesheet" href="<?php echo APPURL; ?>/css/style.css?v=<?php echo time(); ?>">

    <title>Prestine Escapes</title>
</head>

<body>
    <!--Navigation test Start-->

    <nav class="navbar navbar-expand-lg sticky-top p-3 shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="<?php echo APPURL; ?>/img/PE Logo.png" alt="" width="400" class="img-fluid logoMain" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse fs-5 gap-5 text-secondary" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase active" aria-current="page" href="<?php echo APPURL; ?>/index.php">Home</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" href="<?php echo APPURL; ?>/contactus.php">contact us</a>
                    </li>

                    <?php if (!isset($_SESSION['username'])) : ?>
                        <li class="nav-item text-uppercase"><a href="<?php echo APPURL; ?>/auth/login.php" class="nav-link">Login</a></li>
                        <li class="nav-item text-uppercase"><a href="<?php echo APPURL; ?>/auth/register.php" class="nav-link">Register</a></li>
                    <?php else : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-primary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo  $_SESSION['username']; ?>
                            </a>
                            <ul class="dropdown-menu border-0 rounded-0" style="width: 200px;">
                                <li><a class=" dropdown-item " href=" <?php echo APPURL; ?>/users/bookings.php?id=<?php echo $_SESSION['id']; ?>">Your Bookings</a>
                                </li>
                                <!-- <li><a class="dropdown-item" href="#">Another action</a></li> -->
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?php echo APPURL; ?>/auth/logout.php">Log Out</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>

                <div class="col-lg-1 bookStayMain bg-primary text-white ms-auto d-none d-lg-block d-md-block-d-sm-block d-xs-none">
                    <div class="text-white text-center mt-3">
                        <i class="fa-solid fa-bell-concierge fs-2"></i>
                        <p class="fs-5 text-uppercase" style="line-height: 0.9">
                            Book <br />
                            your <br />
                            stay
                        </p>
                    </div>
                </div>

                <div class="col-lg-1 bookStayMobile bg-primary text-white ms-auto d-lg-none">
                    <div class="d-flex-row align-middle justify-content-center text-center mt-3" style="height: 3.5rem">
                        <i class="fa-solid fa-bell-concierge fs-2"></i>
                        <p class="fs-5 text-uppercase" style="line-height: 0.9">
                            Book your stay
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!--Navigation Test End-->