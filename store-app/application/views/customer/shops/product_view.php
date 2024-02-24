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

    <script src="<?php echo base_url('assets/js/global/product_view.js')?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom/global.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom/product_view.css')?>">
</head>

<script>
    $(document).ready(function() {
        
    })
</script>
<body>
    <div class="wrapper">
        <section class="show_product">
            <a href="/">Go Back</a>
            <ul>
                <li>
                    <img src="../assets/images/<?= $product["main_photo"]?>" alt="cabinet">
                    <ul>
                        <li class="active"><button class="show_image"><img src="../assets/images/<?= $product["main_photo"]?>" alt="cabinet"></button></li>
                        <li><button class="show_image"><img src="../assets/images/<?= $product["photo_1"]?>" alt="cabinet"></button></li>
                        <li><button class="show_image"><img src="../assets/images/<?= $product["photo_2"]?>" alt="cabinet"></button></li>
                        <li><button class="show_image"><img src="../assets/images/<?= $product["photo_3"]?>" alt="cabinet"></button></li>
                    </ul>
                </li>
                <li>
                    <h2><?= $product["name"] ?></h2>
                    <ul class="rating">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <span>36 Rating</span>
                    <span class="amount">$ <?= number_format($product['price'],2) ?></span>
                    <p><?= $product["description"] ?></p>
                    <form action="/add_to_cart" method="post" id="add_to_cart_form">
                        <ul>
                            <li>
                                <label for="quantity">Quantity</label>
                                <input type="text" min-value="1" value="1" id="quantity" name="quantity">
                                <ul>
                                    <li><button type="button" class="increase_decrease_quantity" data-quantity-ctrl="1"></button></li>
                                    <li><button type="button" class="increase_decrease_quantity" data-quantity-ctrl="0"></button></li>
                                </ul>
                            </li>
                            <li>
                                <label>Total Amount</label>
                                <span class="total_amount">$ <?= $product['price'] ?></span>
                            </li>
                            <li>
								<input type="hidden" name="subtotal_amount" id="subtotal_amount">
								<input type="hidden" name="product_id" value="<?= $product['id'] ?>">
								<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
								<button type="submit" id="add_to_cart">Add to Cart</button>
							</li>
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
