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
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom/product_dashboard.css')?>">
    <script src="<?php echo base_url('assets/js/global/global.js')?>"></script>
</head>
<body>
    <div class="wrapper">
        <section>
            <form action="/products/search" method="get" class="categories_form">
                <h3>Sort By</h3>
                <select name="sort_options" id="sort_options" class="mb-4">
<?php foreach($sort_options as $key=>$value) {?>
                    <option value="<?= $key ?>"><?= $value ?></option>
<?php } ?>
                </select>
                <h3>Categories</h3>
                <ul>
<?php foreach($product_categories as $category){?>
                    <li>
                        <input type="checkbox" name="category[]" id="<?= $category["name"] ?>" value="<?= $category["id"] ?>" class="form_checkbox">
                        <label for="<?= $category["name"] ?>"><?= $category["name"] ?></label>
                    </li>
<?php } ?>
					<li>
						<span>
							<button type="submit">Search</button>
						</span>
					</li>
                </ul>
            </form>
            <div>
                <h3>All Products(46)</h3>
                <ul>
<?php foreach($products as $product){?>
                    <li>
                        <a href="product_view/<?= $product["id"] ?>">
                            <img src='../assets/images/<?= $product["photo"]?>' alt="#">
                            <h3><?= $product["name"] ?></h3>
                            <span class="price">$ <?= number_format($product['price'],2) ?></span>
                        </a>
                    </li>
<?php } ?>
                </ul>
                <!-- <nav aria-label="Page navigation example">
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
                </nav> -->
            </div>
        </section>
    </div>
</body>
</html>
