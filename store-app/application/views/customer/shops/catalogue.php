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
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom/product_dashboard.css')?>">
</head>
<body>
    <div class="wrapper">
        <section>
            <form action="process.php" method="post" class="categories_form">
                <h3>Sort By</h3>
                <select name="sort_options" id="sort_options" class="mb-4">
                    <option value="1">Price: low to high</option>
                    <option value="2">Price: high to low</option>
                    <option value="3">Newest</option>
                    <option value="4">Name</option>
                </select>
                <h3>Categories</h3>
                <ul>
                    <li>
                        <input type="checkbox" name="category_id" id="kitchen_appliances" value="8" checked class="form_checkbox">
                        <label for="kitchen_appliances">Kitchen & appliances</label>
                    </li>
                    <li>
                        <input type="checkbox" name="category_id" id="storage" value="1" class="form_checkbox">
                        <label for="storage">Storage & organisation</label>
                    </li>
                    <li>
                        <input type="checkbox" name="category_id" id="furniture" value="2" class="form_checkbox">
                        <label for="furniture">Furniture</label>
                    </li>
                    <li>
                        <input type="checkbox" name="category_id" id="textiles" value="3" class="form_checkbox">
                        <label for="textiles">Textiles</label>
                    </li>
                    <li>
                        <input type="checkbox" name="category_id" id="decor" value="4" class="form_checkbox">
                        <label for="decor">Decoration</label>
                    </li>
                    <li>
                        <input type="checkbox" name="category_id" id="kitchenware" value="4" class="form_checkbox">
                        <label for="kitchenware">Kitchenware & tableware</label>
                    </li>
                    <li>
                        <input type="checkbox" name="category_id" id="bathroom" value="5" class="form_checkbox">
                        <label for="bathroom">Bathroom Products</label>
                    </li>
                    <li>
                        <input type="checkbox" name="category_id" id="beds" value="6" class="form_checkbox">
                        <label for="beds">Beds & mattresses</label>
                    </li>
                    <li>
                        <input type="checkbox" name="category_id" id="home_improv" value="7" class="form_checkbox">
                        <label for="home_improv">Home improvement</label>
                    </li>
                </ul>
            </form>
            <div>
                <h3>All Products(46)</h3>
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
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                        </a>
                      </li>
                      <li class="page-item active"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">4</a></li>
                      <li class="page-item"><a class="page-link" href="#">5</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                        </a>
                      </li>
                    </ul>
                </nav>
            </div>
        </section>
    </div>
</body>
</html>
