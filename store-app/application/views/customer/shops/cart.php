<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeFurnish.store - Let's decorate your dream home.</title>

    <link rel="shortcut icon" href="<?php echo base_url('assets/images/home-furnish-small-icon.ico')?>" type="image/x-icon">

    <script src="<?php echo base_url('assets/js/vendor/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/vendor/popper.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/vendor/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/vendor/bootstrap-select.min.js')?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/vendor/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/vendor/bootstrap-select.min.css')?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom/global.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom/cart.css')?>">
    <script src="<?php echo base_url('assets/js/global/cart.js')?>"></script>
</head>
<body>
    <div class="wrapper">
        <section >
            <a href="/">Go Back</a>
            <h3>Total items: 4</h3>
            <section>
                <form class="cart_items_form">
                    <ul>
<?php foreach($carts as $cart) { ?>
                        <li>
                            <img src="../assets/images/<?= $cart["main_photo"] ?>" alt="">
                            <h3><?= $cart["name"] ?></h3>
                            <span>$ <?= $cart["price"] ?></span>
                            <ul>
                                <li>
                                    <label>Quantity</label>
                                    <input type="text" min-value="1" value="<?= $cart["quantity"] ?>">
                                    <ul>
                                        <li><button type="button" class="increase_decrease_quantity" data-quantity-ctrl="1"></button></li>
                                        <li><button type="button" class="increase_decrease_quantity" data-quantity-ctrl="0"></button></li>
                                    </ul>
                                </li>
                                <li>
                                    <label>Total Amount</label>
                                    <span class="total_amount">$ <?= $cart["subtotal_amount"] ?></span>
                                </li>
                                <li>
									<input type="hidden" name="product_id" value="<?= $cart["product_id"] ?>">
									<input type="hidden" name="cart_id" value="<?= $cart["id"] ?>">
                                    <button type="button" class="remove_item"></button>
                                </li>
                            </ul>
                            <div>
                                <p>Are you sure you want to remove this item?</p>
                                <button type="button" class="cancel_remove">Cancel</button>
                                <button type="button" class="remove">Remove</button>
                            </div>
                        </li>
<?php } ?>
                    </ul>
                </form>
                <form class="checkout_form">
                    <h3>Shipping Information</h3>
                    <input type="checkbox" name="same_billing" id="same_billing" checked class="form_checkbox">
                    <label for="same_billing">Same in billing</label>
                    <ul id="shipping_info">
                        <li>
                            <input type="text" name="first_name" required>
                            <label>First Name</label>
                        </li>
                        <li>
                            <input type="text" name="last_name" required>
                            <label>Last Name</label>
                        </li>
                        <li>
                            <input type="text" name="address_1" required>
                            <label>Address 1</label>
                        </li>
                        <li>
                            <input type="text" name="address_2" required>
                            <label>Address 2</label>
                        </li>
                        <li>
                            <input type="text" name="city" required>
                            <label>City</label>
                        </li>
                        <li>
                            <input type="text" name="state" required>
                            <label>State</label>
                        </li>
                        <li>
                            <input type="text" name="zip_code" required>
                            <label>Zip Code</label>
                        </li>
                    </ul>
                    <div id="billing_info">
                        <h3>Billing Information</h3>
                        <ul>
                            <li>
                                <input type="text" name="first_name" required>
                                <label>First Name</label>
                            </li>
                            <li>
                                <input type="text" name="last_name" required>
                                <label>Last Name</label>
                            </li>
                            <li>
                                <input type="text" name="address_1" required>
                                <label>Address 1</label>
                            </li>
                            <li>
                                <input type="text" name="address_2" required>
                                <label>Address 2</label>
                            </li>
                            <li>
                                <input type="text" name="city" required>
                                <label>City</label>
                            </li>
                            <li>
                                <input type="text" name="state" required>
                                <label>State</label>
                            </li>
                            <li>
                                <input type="text" name="zip_code" required>
                                <label>Zip Code</label>
                            </li>
                        </ul>
                    </div>
                    <h3>Order Summary</h3>
                    <h4>Items <span>$ 40</span></h4>
                    <h4>Shipping Fee <span>$ 5</span></h4>
                    <h4 class="total_amount">Total Amount <span>$ 45</span></h4>
                    <button type="button" data-toggle="modal" data-target="#card_details_modal">Proceed to Checkout</button>
                </form>
            </section>
        </section>
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#card_details_modal">
            Launch demo modal
        </button> -->
        <div class="modal fade form_modal" id="card_details_modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button data-dismiss="modal" aria-label="Close" class="close_modal"></button>
                    <form action="process.php" method="post">
                        <h2>Card Details</h2>
                        <ul>
                            <li>
                                <input type="text" name="card_name" required>
                                <label>Card Name</label>
                            </li>
                            <li>
                                <input type="number" name="card_number" required>
                                <label>Card Number</label>
                            </li>
                            <li>
                                <input type="month" name="expiration" required>
                                <label>Exp Date</label>
                            </li>
                            <li>
                                <input type="number" name="cvc" required>
                                <label>CVC</label>
                            </li>
                        </ul>
                        <h3>Total Amount <span>$ 45</span></h3>
                        <button type="button">Pay</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade form_modal" id="login_modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button data-dismiss="modal" aria-label="Close" class="close_modal"></button>
                    <form action="process.php" method="post">
                        <h2>Login to order.</h2>
                        <button type="button" class="switch_to_signup">New Member? Register here.</button>
                        <ul>
                            <li>
                                <input type="text" name="email" required>
                                <label>Email</label>
                            </li>
                            <li>
                                <input type="password" name="password" required>
                                <label>Password</label>
                            </li>
                        </ul>
                        <button type="button">Login</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade form_modal" id="signup_modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button data-dismiss="modal" aria-label="Close" class="close_modal"></button>
                    <form action="process.php" method="post">
                        <h2>Signup to order.</h2>
                        <button type="button" class="switch_to_signup">Already a member? Login here.</button>
                        <ul>
                            <li>
                                <input type="text" name="email" required>
                                <label>Email</label>
                            </li>
                            <li>
                                <input type="password" name="password" required>
                                <label>Password</label>
                            </li>
                            <li>
                                <input type="password" name="password" required>
                                <label>Password</label>
                            </li>
                            <li>
                                <input type="password" name="password" required>
                                <label>Password</label>
                            </li>
                            <li>
                                <input type="password" name="password" required>
                                <label>Password</label>
                            </li>
                        </ul>
                        <button type="button">Signup</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="popover_overlay"></div>
</body>
</html>
