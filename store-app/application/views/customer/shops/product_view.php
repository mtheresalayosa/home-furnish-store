<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

    <link rel="shortcut icon" href="<?php echo base_url('assets/images/home-furnish-small-icon.ico')?>" type="image/x-icon">

    <script src="<?php echo base_url('assets/js/vendor/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/vendor/popper.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/vendor/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/vendor/bootstrap-select.min.js')?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/vendor/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/vendor/bootstrap-select.min.css')?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom/global.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom/product_view.css')?>">
</head>

<script>
    $(document).ready(function() {
        let cart_count = 1;
        $("#add_to_cart").click(function(){
            $('.show_cart').text('('+ cart_count++ +')');
            $("<span class='added_to_cart'>Added to cart succesfully!</span>")
            .insertAfter(this)
            .fadeIn()
            .delay(1000)
            .fadeOut(function() {
                $(this).remove();
            });
           return false;
        });
    })
</script>
<body>
    <div class="wrapper">
        <section class="show_product">
            <a href="catalogue.html">Go Back</a>
            <ul>
                <li>
                    <img src="../assets/images/cabinet.jpg" alt="cabinet">
                    <ul>
                        <li class="active"><button class="show_image"><img src="../assets/images/cabinet.jpg" alt="cabinet"></button></li>
                        <li><button class="show_image"><img src="../assets/images/cabinet.jpg" alt="cabinet"></button></li>
                        <li><button class="show_image"><img src="../assets/images/cabinet.jpg" alt="cabinet"></button></li>
                        <li><button class="show_image"><img src="../assets/images/cabinet.jpg" alt="cabinet"></button></li>
                    </ul>
                </li>
                <li>
                    <h2>MAXIMERA drawer</h2>
                    <ul class="rating">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <span>36 Rating</span>
                    <span class="amount">$ 10</span>
                    <p>Lorem ipsum dolor sit amet consectetur. Eget sit posuere enim facilisi. Pretium orci venenatis habitasse gravida nulla tincidunt iaculis. Aliquet at massa quisque libero viverra ut sed. Est vulputate est rutrum nunc nunc pellentesque ultrices pharetra. Mauris euismod sed vel quisque tincidunt suspendisse sed turpis volutpat.</p>
                    <form action="" method="post" id="add_to_cart_form">
                        <ul>
                            <li>
                                <label>Quantity</label>
                                <input type="text" min-value="1" value="1">
                                <ul>
                                    <li><button type="button" class="increase_decrease_quantity" data-quantity-ctrl="1"></button></li>
                                    <li><button type="button" class="increase_decrease_quantity" data-quantity-ctrl="0"></button></li>
                                </ul>
                            </li>
                            <li>
                                <label>Total Amount</label>
                                <span class="total_amount">$ 10</span>
                            </li>
                            <li><button type="submit" id="add_to_cart">Add to Cart</button></li>
                        </ul>
                    </form>
                </li>
            </ul>
            <section>
                <h3>Similar Items</h3>
                <ul>
                    <li>
                        <a href="product_view">
                            <img src="../assets/images/cabinet.jpg" alt="#">
                            <h3>MAXIMERA drawer</h3>
                            <ul class="rating">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <span>36 Rating</span>
                            <span class="price">$ 10</span>
                        </a>
                    </li>
                    <li>
                        <a href="product_view">
                            <img src="../assets/images/cabinet.jpg" alt="#">
                            <h3>MAXIMERA drawer</h3>
                            <ul class="rating">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <span>36 Rating</span>
                            <span class="price">$ 10</span>
                        </a>
                    </li>
                    <li>
                        <a href="product_view">
                            <img src="../assets/images/cabinet.jpg" alt="#">
                            <h3>MAXIMERA drawer</h3>
                            <ul class="rating">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <span>36 Rating</span>
                            <span class="price">$ 10</span>
                        </a>
                    </li>
                    <li>
                        <a href="product_view">
                            <img src="../assets/images/cabinet.jpg" alt="#">
                            <h3>MAXIMERA drawer</h3>
                            <ul class="rating">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <span>36 Rating</span>
                            <span class="price">$ 10</span>
                        </a>
                    </li>
                    <li>
                        <a href="product_view">
                            <img src="../assets/images/cabinet.jpg" alt="#">
                            <h3>MAXIMERA drawer</h3>
                            <ul class="rating">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <span>36 Rating</span>
                            <span class="price">$ 10</span>
                        </a>
                    </li>
                    <li>
                        <a href="product_view">
                            <img src="../assets/images/cabinet.jpg" alt="#">
                            <h3>MAXIMERA drawer</h3>
                            <ul class="rating">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <span>36 Rating</span>
                            <span class="price">$ 10</span>
                        </a>
                    </li>
                    <li>
                        <a href="product_view">
                            <img src="../assets/images/cabinet.jpg" alt="#">
                            <h3>MAXIMERA drawer</h3>
                            <ul class="rating">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <span>36 Rating</span>
                            <span class="price">$ 10</span>
                        </a>
                    </li>
                </ul>
            </section>
        </section>
    </div>
</body>
</html>
