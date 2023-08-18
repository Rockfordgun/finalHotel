<?php
include_once "../include/header.php";
include_once "../include/config.php";

if (!isset($_SERVER['HTTP_REFERER'])) {
    echo "<script>window.location.href='" . APPURL . "'</script>";
    exit;
}
?>


<div class="hero-wrap js-fullheight" style="background-image: url('<?php echo APPURL; ?>/images/image_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container ">
        <div class="row d-flex justify-content-center no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate">
                <h2 class="subheading">Pay For Your Stay</h2>

                <div class="container">
                    <!-- Replace "test" with your own sandbox Business account app client ID -->
                    <script src="https://www.paypal.com/sdk/js?client-id=AU610SX2ZPQfu-tYDE5J0MTNTkz0kNsn0HPZoVumjzPMva1AndAZJIul8FP_0-SQ44hMcVnaBIrrg-SX&currency=USD"></script>
                    <!-- Set up a container element for the button -->
                    <div id="paypal-button-container"></div>
                    <script>
                        paypal.Buttons({
                            // Sets up the transaction when a payment button is clicked
                            createOrder: (data, actions) => {
                                return actions.order.create({
                                    purchase_units: [{
                                        amount: {
                                            value: '<?php echo $_SESSION["price"]; ?>' // Can also reference a variable or function
                                        }
                                    }]
                                });
                            },
                            // Finalize the transaction after payer approval
                            onApprove: (data, actions) => {
                                return actions.order.capture().then(function(orderData) {

                                    window.location.href = 'http://localhost/NewHotel';
                                });
                            }
                        }).render('#paypal-button-container');
                    </script>

                </div>

            </div>
        </div>
    </div>
</div>


</div>
</div>


<?php
include_once "../include/footer.php";
?>