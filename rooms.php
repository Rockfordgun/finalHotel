<?php

include_once './includes/header.php';
include_once './includes/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $hotel = $pdo->query("SELECT * FROM hotels WHERE status = 1 AND id = '$id'");
    $hotel->execute();
    $singleHotel = $hotel->fetch(PDO::FETCH_OBJ);

    $getRooms = $pdo->query("SELECT * FROM rooms WHERE hotel_id='$id'");
    $getRooms->execute();

    $getAllRooms = $getRooms->fetchAll(PDO::FETCH_OBJ);
}

//Hotels






?>




<header class="header" style="background-image: url(<?php echo APPURL; ?>/<?php echo $singleHotel->image; ?>);">
    <div class="container ">
        <div class="row my-7 bg-white-50 rounded-3 bg-white bg-opacity-75 py-3 px-3">
            <div class="col-lg-12 ">
                <h1 class="bigHeadingprimary "><?php echo $singleHotel->name; ?> </h1>
                <hr>
                <p class="text-dark "><?php echo $singleHotel->description; ?></p>

            </div>


        </div>
    </div>
</header>


<div class="container-fluid mx-4">
    <div class="row my-5">


        <?php foreach ($getAllRooms as $room) : ?>
            <div class="col-lg-6 mt-4">
                <div class=" d-md-flex ">

                    <img src="./<?php echo $room->image; ?>" class="img-fluid rounded-2 hotelCardImg ">

                    <div class="s half left-arrow d-flex align-items-center">
                        <div class="text p-xl-5 text-center mx-auto">

                            <h3 class="text-primary hotelCardHeading "><?php echo $room->name; ?></h3>
                            <hr>

                            <p class="star mb-0 text-warning"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></p>
                            <p class="mb-0 fs-5 mb-2"><span class="price mr-1">R<?php echo $room->price; ?></span> <span class="per">per night</span></p>

                            <ul class="list-unstyled">
                                <li><span><i class="fa-solid fa-user me-2"></i>Max:</span> <?php echo $room->num_persons; ?></li>
                                <li><span><i class="fa-solid fa-arrows-to-circle me-2"></i>Size:</span> <?php echo $room->size; ?> m2</li>
                                <li><span><i class="fa-solid fa-eye me-2"></i>View:</span> <?php echo $room->view; ?></li>
                                <li><span><i class="fa-solid fa-bed me-2"></i>Bed:</span> <?php echo $room->num_beds; ?></li>
                            </ul>
                            <a href="<?php echo APPURL; ?>/rooms/room-single.php?id=<?php echo $room->id; ?>">
                                <button class="btn btn-primary text-white text-uppercase fw-bold mb-3" type="button">View Room Details</button>
                            </a>
                        </div>



                    </div>
                </div>



            </div>

        <?php endforeach; ?>



    </div>
</div>

<?php include_once './includes/footer.php'; ?>