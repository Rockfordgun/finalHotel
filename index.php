<?php

include_once './includes/header.php';
include_once './includes/config.php';

//Hotels
$hotels = $pdo->query("SELECT * FROM hotels WHERE status = 1");
$hotels->execute();

$allHotels = $hotels->fetchAll(PDO::FETCH_OBJ);
//Rooms

$rooms = $pdo->query("SELECT * FROM rooms WHERE status = 1");
$rooms->execute();

$allRooms = $rooms->fetchAll(PDO::FETCH_OBJ);

//reviews
$reviews = $pdo->query("SELECT * FROM reviews WHERE status = 1");
$reviews->execute();

$allreviews = $reviews->fetchAll(PDO::FETCH_OBJ);

?>

<!--Header-->
<header class="mainHeader">
  <!--Hero-->



</header>



<section class="aboutUs my-5">
  <div class="container">
    <div class="row d-flex justify-content-between">
      <div class="col-lg-4 col-sm-12">
        <div class="mainBanner"></div>
        <h1 class="bigHeading">
          Enjoy an extraordinary retreat with exclusive offers
        </h1>
        <hr />
      </div>
      <div class="col-lg-4 col-sm-12">
        <div class="row-lg-3">
          <img src="./img/bush/airial.jpg" alt="" class="img-fluid" />
        </div>
        <h1 class="bigHeading">Welcome to</h1>
        <hr />
        <h1 class="bigHeadingprimary">Prestine Escapes</h1>
        <p>
          Experience the epitome of luxury and exploration with Pristine
          Escapes. Our premier website unveils a world of exceptional
          hotels, scattered across the globe. Discover the perfect sanctuary
          amidst our diverse collection, ranging from stunning coastal
          havens to serene inland retreats and captivating bush escapes.
          Tailor your journey by comparing and selecting from our handpicked
          selection, ensuring an unforgettable experience that aligns with
          your desires. Let Pristine Escapes be your passport to
          extraordinary destinations. <br /><br />

          <strong class="text-primary"> Oasis Resort Nestled</strong>
          <br />Along the pristine shores of a tropical paradise, Ocean
          Oasis Resort offers breathtaking ocean views, private beach
          access, and luxurious amenities. Immerse yourself in the soothing
          sounds of waves and indulge in beachside relaxation. <br />
          <br />
        </p>
      </div>
      <div class="col-lg-4 col-sm-12">
        <p>
          <strong class="text-primary"> Wilderness Haven Lodge</strong>
          Escape to the heart of the untamed wilderness at Wilderness Haven
          Lodge.Surrounded by lush forests and awe-inspiring wildlife, this
          lodge offers rustic elegance, guided nature excursions, and an
          immersive bush experience for nature enthusiasts. <br /><br />
          <strong class="text-primary">Serene Valley Retreat Experience</strong>
          tranquility at Serene Valley Retreat, nestled in a picturesque
          valley surrounded by rolling hills and lush greenery. With
          spacious rooms, rejuvenating spa treatments, and hiking trails,
          it's an ideal sanctuary for relaxation and connecting with nature.
          <br /><br />
          <strong class="text-primary"> Snowfall Lodge</strong> Embark on a
          winter wonderland adventure at Snowfall Lodge. Located amidst
          snow-capped mountains, this cozy retreat offers ski-in/ski-out
          access, warm fireplaces, hot cocoa by the fire, and stunning
          panoramic views of the snow-covered landscape.<br /><br />
          <strong class="text-primary">Panorama Heights Hotel </strong>Perched atop a hill, Panorama Heights Hotel provides breathtaking
          panoramic views of scenic landscapes. Whether it's overlooking a
          vibrant cityscape, a serene lake, or majestic mountains, this
          hotel offers unparalleled vistas and an unforgettable stay.
        </p>
        <img src="./img/bush/safari.jpg" alt="" class="img-fluid" />
      </div>
    </div>
  </div>
</section>



<section class="hotelChoices my-5">
  <div class="container my-5">
    <div class="row">
      <div class="headingTop">
        <h4 class="mt-5 text-white">The Prestine Escapes</h4>
        <hr class="hr" width="300" />
        <h1 class="bigHeading text-white">Hotel Choices</h1>
      </div>
      <?php $hotelCount = 0; ?>
      <?php foreach ($allHotels as $hotel) : ?>
        <?php if ($hotelCount < 3) : ?>
          <div class="col-sm-10 col-md-4 col-lg-4 my-5">

            <div class="card border-0">
              <img class="card-img img-fluid" src="./img/<?php echo $hotel->banner; ?>" alt="" />
              <div class="card-img-overlay text-white d-flex flex-column justify-content-between">



                <a href="rooms.php?id=<?php echo $hotel->id; ?>" class="stretched-link"></a>

              </div>
              <div class="card-footer bg-primary">

                <p class="hotelCardHeading "> <?php echo $hotel->name; ?></p>

              </div>
            </div>
          </div>
        <?php endif; ?>
        <?php $hotelCount++; ?>
      <?php endforeach; ?>



      <div class="row ">

        <?php $hotelCount = 0; ?>
        <?php foreach ($allHotels as $hotel) : ?>
          <?php if ($hotelCount > 2) : ?>



            <div class=" col-sm-12  col-md-6 col-lg-6 mb-5 mx-auto">
              <div class="card  border-0">
                <div class="card-header bg-primary">

                  <p class="hotelCardHeading "> <?php echo $hotel->name; ?></p>


                </div>


                <img class="card-img" type"button" src="./img/<?php echo $hotel->banner; ?>" alt="" />
                <div class="card-img-overlay text-white d-flex flex-column justify-content-around">







                  <a href="rooms.php?id=<?php echo $hotel->id; ?>" class="stretched-link"></a>

                </div>

              </div>
            </div>
          <?php endif; ?>
          <?php $hotelCount++; ?>
        <?php endforeach; ?>

      </div>
    </div>
</section>

<section class="excursion">
  <div class="container">
    <div class="row d-flex justify-content-between">
      <div class="headingTop">
        <h4 class="">Our Services</h4>
        <hr class="hr" width="300" />
        <h1 class="bigHeading">Excursions & Tours</h1>
      </div>

      <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-4 my-3">
          <img src="./img/bush/groupSafari.jpg" alt="" class="thumbnailTours img-fluid" />
        </div>

        <div class="col-sm-12 col-md-4 col-lg-4 mt-3">
          <img src="./img/ocean/scuba.jpg" alt="" class="thumbnailTours img-fluid" />
        </div>

        <div class="col-sm-12 col-md-4 col-lg-4 mt-3">
          <img src="./img/moantain/horses.jpg" alt="" class="thumbnailTours img-fluid" />
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-4 mt-3">
          <img src="./img/ocean/deepsea.jpg" alt="" class="thumbnailTours img-fluid" />
        </div>

        <div class="col-sm-12 col-md-4 col-lg-4 mt-3">
          <img src="./img/snow/dudeski.jpg" alt="" class="thumbnailTours img-fluid" />
        </div>

        <div class="col-sm-12 col-md-4 col-lg-4 mt-3">
          <img src="./img/ocean/yachtcouple.jpg" alt="" class="thumbnailTours img-fluid" />
        </div>
      </div>


      <div class="row d-flex mt-4 ms-1">
        <div class="col-sm-12 col-md-6 col-lg-6 text-center bg-primary">
          <div>
            <img src="./img/white PE Logo.png" alt="" class="logoTours mt-5 img-fluid" />
          </div>
          <div type="button" class="btn btn-outline-light fw-light my-4">
            READ MORE
          </div>
          <p class="fs-3 lh-1 text-white">
            <strong>ENJOY SUMMER DEALS</strong> <br />
            Up to 30% Discount!
          </p>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 imageTour"></div>
      </div>



    </div>
</section>



<section class="testimonial">
  <div class="container">
    <div class="row mt-5">
      <div class="col">
        <div class="headingTop">
          <h4 class="mt-5 text-white">The Prestine Escapes</h4>
          <hr class="hr" width="300" />
          <h1 class="bigHeading text-white">Customer Feedback</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="row mx-auto justify-content-center testimonialSlider">
    <div id="recipeCarousel" class="carousel slide" data-bs-ride="carouseltest">
      <div class="carousel-inner" role="listbox">
        <?php
        $firstSlide = true;
        foreach ($allreviews as $review) :
        ?>
          <div class="carousel-item <?php if ($firstSlide) {
                                      echo 'active';
                                      $firstSlide = false;
                                    } ?>">
            <div class="col-sm-12 col-md-6 col-lg-3">
              <div class="card mx-auto gap-2" style="width: 22rem">
                <div class="card-body">
                  <div class="cardHeading d-flex fs-1">
                    <i class="fa-solid fa-quote-left me-3 text-primary"></i>
                    <h3 class="card-title mb-5 text-primary">
                      <?php echo $review->hotel_name; ?>
                    </h3>
                  </div>
                  <p class="card-text text-secondary">
                    <?php echo $review->user_review; ?>
                  </p>

                  <div class="userDetails d-flex">
                    <img src=" <?php echo APPURL; ?>/reviews/review_images/<?php echo $review->image; ?>" alt="" class="rounded-circle me-3 mt-4" style="width: 100px" />

                    <div class="mt-4">
                      <h4 class="fw-bold text-success"><?php echo $review->client_name; ?></h4>
                      <div class="starRating text-warning">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                      </div>
                      <p><?php echo $review->position; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
      <a class="carousel-control-prev bg-transparent w-aut " href="#recipeCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      </a>
      <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
      </a>
    </div>
  </div>
</section>


<?php include_once './includes/footer.php'; ?>

</body>

</html>