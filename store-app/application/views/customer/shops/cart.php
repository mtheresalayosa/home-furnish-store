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
    <script src="<?php echo base_url('assets/js/global/cart.js')?>"></script>
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/vendor/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/vendor/bootstrap-select.min.css')?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom/global.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom/cart.css')?>">
</head>
<body>
    <div class="wrapper">
        <section >
            <a href="/">Go Back</a>
            <h3>Total item(s): <?=$cart_count?></h3>
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
                                    <input type="text" min-value="1" value="<?= $cart["quantity"] ?>" name="quantity">
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
									<input type="hidden" name="subtotal_amount" id="subtotal_amount" value="<?= $cart['subtotal_amount'] ?>">
									<input type="hidden" name="product_id" value="<?= $cart["product_id"] ?>">
									<input type="hidden" name="cart_id" value="<?= $cart["id"] ?>" id="cart_id">
									<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                        			<input type="hidden" name="action">
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
<?php if($cart_count != 0) { ?>
                <form class="checkout_form" method="post">
                    <h3>Shipping Information</h3>
                    <input type="checkbox" name="same_billing" id="same_billing" checked class="form_checkbox">
                    <label for="same_billing">Same in billing</label>
                    <ul id="shipping_info">
                        <li>
                            <input type="text" name="shipping_first_name" required>
                            <label>First Name</label>
                        </li>
                        <li>
                            <input type="text" name="shipping_last_name" required>
                            <label>Last Name</label>
                        </li>
                        <li>
                            <input type="text" name="shipping_address1" required>
                            <label>Address 1</label>
                        </li>
                        <li>
                            <input type="text" name="shipping_address2">
                            <label>Address 2</label>
                        </li>
                        <li>
                            <input type="text" name="shipping_city" required >
                            <label>City</label>
                        </li>
                        <li>
                            <input type="text" name="shipping_state" required>
                            <label>State</label>
                        </li>
                        <li>
                            <input type="text" name="shipping_zip_code" required>
                            <label>Zip Code</label>
                        </li>
                    </ul>
                    <div id="billing_info">
                        <h3>Billing Information</h3>
                        <ul>
                            <li>
                                <input type="text" name="billing_first_name">
                                <label>First Name</label>
                            </li>
                            <li>
                                <input type="text" name="billing_last_name">
                                <label>Last Name</label>
                            </li>
                            <li>
                                <input type="text" name="billing_address_1">
                                <label>Address 1</label>
                            </li>
                            <li>
                                <input type="text" name="billing_address_2">
                                <label>Address 2</label>
                            </li>
                            <li>
                                <input type="text" name="billing_city">
                                <label>City</label>
                            </li>
                            <li>
                                <input type="text" name="billing_state">
                                <label>State</label>
                            </li>
                            <li>
                                <input type="text" name="billing_zip_code">
                                <label>Zip Code</label>
                            </li>
                        </ul>
                    </div>
                    <h3>Order Summary</h3>
                    <h4 id="checkout_subtotal">Sub-total <span>$ <?= $subtotal_amount ?></span></h4>
                    <h4>Shipping Fee <span>$ 50</span></h4>
                    <h4 class="total_amount">Total Amount <span class="checkout_total">$ <?= $subtotal_amount + 50 ?></span></h4>
                    <!-- <button type="button" data-toggle="modal" data-target="#card_details_modal">Proceed to Checkout</button> -->
                    <button type="submit" id="btn_checkout">Proceed to Checkout</button>
                </form>
<?php } ?>
            </section>
        </section>
        <!-- Button trigger modal -->
        <div class="modal fade form_modal" id="card_details_modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button data-dismiss="modal" aria-label="Close" class="close_modal"></button>
                    <form action="/process_payment" class="pay_form" method="post" data-cc-on-file="false"
							data-stripe-publishable-key="<?= $stripe_key ?>">
                        <h2>Card Details</h2>
						<p class="pay_message"></p>
                        <ul>
                            <li>
                                <input type="text" name="card_name" required class="card-name" >
                                <label>Name on Card</label>
                            </li>
                            <li>
                                <input type="number" name="card_number" required maxlength='20' autocomplete='off' class="card-number">
                                <label>Card Number</label>
                            </li>
                            <li>
                                <input type="number" name="cvc" required placeholder='ex. 311'
										maxlength='4' autocomplete='off' class="card-cvc">
                                <label>CVC</label>
                            </li>
                            <li>
                                <input type="number" name="expiry-year" required class="card-expiry-year" maxlength='4' placeholder="ex. 2030">
                                <label>Exp Year</label>
                            </li>
                            <li>
                                <input type="number" name="expiry-month" required class="card-expiry-month" maxlength='2' placeholder="ex. 09">
                                <label>Exp Month</label>
                            </li>
                        </ul>
                        <h3>Total Amount <span class="checkout_total">$ <?= $subtotal_amount + 50 ?></span></h3>
						<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                        <button type="submit" class="btn_pay">Pay</button>
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
