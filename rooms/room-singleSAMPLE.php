<?php


include_once '../includes/header.php';
include_once '../includes/config.php';

?>

<header class="mainHeader" style="background: url(../img/mainBanner.jpg); height:500px;  background-position: center;
    background-size: cover;">
    <!--Hero-->

    <div class="container ">
        <div class="row  d-flex flex-column justify-content-center" style="height: 500px;">
            <div class=" col-lg-6 ">

                <form action="" class="">
                    <div class="col-lg-12 mt-3">
                        <input type="email" class="form-control" placeholder="Type Your Email">
                    </div>

                    <div class="col-lg-12 mt-3">
                        <input type="text" class="form-control" placeholder="Full Name">
                    </div>
                    <div class="col-lg-12 mt-3">
                        <input type="text" class="form-control" placeholder="Phone number">
                    </div>
                    <div class="input-group my-3">
                        <input type="text" class="form-control" placeholder="Check In" id="">
                        <span class="input-group-text">&</span>
                        <input type="text" class="form-control" placeholder="Check Out" id="">
                    </div>

                    <div class=" d-grid mt-5">
                        <button class="btn btn-lg btn-primary text-uppercase text-white" type="button">book & pay now</button>

                    </div>
                </form>

            </div>
        </div>
    </div>
    <input type="text" name="" id="date">

</header>

<script>
    $("#date").datepicker({

    })
</script>

<?php
include_once '../includes/footer.php';

?>