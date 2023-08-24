<?php

define("APPURL", "http://localhost/finalHotel");
?>

<!doctype html>
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

<body class="container">
    <header ">
        <div class=" row mt-5 d-flex justify-content-center">
        <div class="col-lg-6">

            <ul class="list-unstyled">
                <h6 class="invoiceHeading text-primary">Invoice To</h6>
                <li><i class="fa-solid fa-user text-primary"></i> : Persons Name</li>
                <li><i class="fa-solid fa-phone text-primary"></i> : +27 82 444 0023</li>
                <li><i class="fa-solid fa-envelope text-primary"></i> : mail@mail.com</li>

            </ul>

        </div>
        <div class="col-lg-6 d-flex justify-content-end">
            <img src="../img/PE Logo.png" alt="" style="max-width: 400px;">
        </div>
        </div>




        <div class="row d-flex justify-content-around mt-5">
            <div class="col-lg-8 ">
                <h1 class="text-uppercase bigHeading text-primary">invoice</h1>
                <br>
                <ul class="list-unstyled">
                    <li>Date: </li>
                    <li>Due Date:</li>
                </ul>
            </div>
            <div class="col-lg-4 text-lg-end">
                <h6 class="invoiceHeading text-primary">Contact:</h6>
                <p>Prestine Escapes</p>
                <ul class="list-unstyled">
                    <li>2567 Jakaranda Drive</li>
                    <li>+82 444 0023</li>
                    <li>info@prestineescapes.co.za</li>
                </ul>


            </div>
        </div>
    </header>
    <main>
        <table class="table container mt-5">
            <thead class="table-primary">
                <tr>
                    <th scope="col">Your Name</th>
                    <th scope="col">Telephone number</th>
                    <th scope="col">Email Adress</th>
                    <th scope="col">Hotel Name</th>
                    <th scope="col">Room Name</th>
                    <th scope="col">Booking</th>
                    <th scope="col">Check In</th>
                    <th scope="col">Check Out</th>


                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>

                    <td> <?php echo $booking['full_name']; ?></td>
                    <td><?php echo $booking['phone_number']; ?></td>
                    <td>@<?php echo $booking['email']; ?></td>
                    <td><?php echo $booking['hotel_name']; ?></td>
                    <td><?php echo $booking['room_name']; ?></td>
                    <td>@<?php echo $booking['status']; ?></td>
                    <td><?php echo $booking['check_in']; ?></td>
                    <td>@<?php echo $booking['check_out']; ?></td>
                </tr>

            </tbody>
        </table>

        <div class="row d-flex justify-content-end container ">
            <div class="col-lg-4">
                <h3 class="mt-6">Payment Has Been Recieved <br>
                    <hr> <span class="invoiceHeading text-primary">Thank You</span>
                </h3>
            </div>
            <div class="col text-lg-end mt-6">
                <h4 class="invoiceHeading text-primary">Grand Total: </h4> <span class="fw-bold display-6 text-secondary">R<?php echo $booking['payment']; ?></span>
            </div>
        </div>

        <div class="row mt-7">
            <div class="col">
                <h6 class="invoiceHeading text-primary fs-6">Terms & Conditions:</h6>
                <p class="my-2">By choosing to stay with us, you agree to our hotel's terms and conditions. These include adhering to check-in/out policies, refraining from smoking indoors, and responsible property use. We prioritize guest comfort and safety, and any damage or disruption may result in charges or removal. Your privacy is valued, and we reserve the right to refuse service.</p>
                <hr>
                <h6 class="invoiceHeading text-primary fs-6">Thank you of ryour ongoing support and we hope you enjoy your stay with us.</h6>
            </div>
            <div class="col text-lg-end">
                <h2>Anton Marais</h2>
                <h4 class="invoiceHeading text-primary">CEO & Founder</h4>

            </div>
        </div>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>