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

    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom/admin_global.css')?>">
    <script src="<?php echo base_url('assets/js/global/admin_products.js')?>"></script>
</head>
<script>
    $(document).ready(function() {
        $("form").submit(function(event) {
            event.preventDefault();
            return false;
        });
        /* prototype add */
        $(".switch").click(function() {
            window.location.href = "products";
        });

		// let file;
		// let photoInp = $("#btn_upload");
		
		// let imgDisplay = $("#images_display");
		// let ctr = $("imgPreview").length;
		// if(ctr == 4)
		// {
		// 	photoInp.prop('disabled', disabled);
		// }
		// let add_form = $('form.add_product_form');
		// let form_data = new FormData(add_form);
		// photoInp.change(function (e) {
		// 	let count = 0;
		// 	Array.from(this.files).map((file) => {
		// 		if (file) {
		// 			form_data.append("photos[]", document.getElementById('btn_upload').file);
		// 			let reader = new FileReader();
		// 			reader.onload = function (event) {
		// 				imgDisplay.append("<img id='photo"+ ctr+1 +"' src='"+ event.target.result +"' alt='image' class='imgPreview upload_image' />");
		// 			};
		// 			reader.readAsDataURL(file);
		// 		}
		// 	});
		// });

		// $('.add_product_form').submit(function(){
		// 	$.post()
		// })

    });
</script>
<body>
    <div class="wrapper">
        <header>
            <h2>Products</h2>
            <div>
                <a class="switch" href="/">Switch to Shop View</a>
                <button class="profile">
                    <img src="<?= base_url('assets/images/user-profile.svg')?>" alt="#">
                </button>
            </div>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle profile_dropdown" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                <div class="dropdown-menu admin_dropdown" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="/logout">Logout</a>
                </div>
            </div>
        </header>
        <aside>
            <a href="#"><img src="../assets/images/hf-logo-top-down.svg" alt="Organic Shop"></a>
            <ul>
                <li><a href="/admin/orders">Orders</a></li>
                <li class="active"><a href="#">Products</a></li>
            </ul>
        </aside>
        <section>
            <form action="process.php" method="post" class="search_form">
                <input type="text" name="search" placeholder="Search Products">
            </form>
            <button class="add_product" data-toggle="modal" data-target="#add_product_modal">Add Product</button>
            <form action="process.php" method="post" class="status_form">
                <h3>Categories</h3>
                <ul class="categories">
                    <li>
                        <button type="submit" class="active">
                            <span>36</span><h4>All Products</h4>
                        </button>
                    </li>
<?php foreach($categories as $category){?>
                    <li>
                        <button type="submit">
                            <span>36</span><h4><?= $category["name"]?></h4>
                        </button>
                    </li>
<?php } ?>
                </ul>
            </form>
            <div>
                <table class="products_table">
                    <thead>
                        <tr>
                            <th><h3>All Products</h3></th>
                            <th>ID #</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Stocks</th>
                            <th>Sold</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
<?php foreach($products as $product) {?>
                        <tr>
                            <td>
                                <span>
                                    <img src="../assets/images/cabinet.jpg" alt="#">
                                    <?= $product["name"] ?>
                                </span>
                            </td>
                            <td><span><?= $product["id"] ?></span></td>
                            <td><span>$ <?= number_format($product['price'],2) ?></span></td>
                            <td><span>Storage & Organisation</span></td>
                            <td><span><?= $product["stocks"] ?></span></td>
                            <td><span><?= $product["unit_sold"] ?></span></td>
                            <!-- <td>
                                <span>
                                    <button class="edit_product">Edit</button>
                                    <button class="delete_product">X</button>
                                </span>
                                <form class="delete_product_form" action="" method="post">
                                    <p>Are you sure you want to remove this item?</p>
                                    <button type="button" class="cancel_remove">Cancel</button>
                                    <button type="submit">Remove</button>
                                </form>
                            </td> -->
                        </tr>
<?php } ?>
                    </tbody>
                </table>
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
        <div class="modal fade form_modal" id="add_product_modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button data-dismiss="modal" aria-label="Close" class="close_modal"></button>
                    <form class="add_product_form" action="" method="post">
                        <h2>Add a Product</h2>
                        <ul>
                            <li>
                                <input type="text" name="name" required>
                                <label>Product Name</label>
                            </li>
                            <li>
                                <textarea name="description"></textarea>
                                <label>Description</label>
                            </li>
                            <li>
                                <label>Category</label>
                                <select class="selectpicker" required>
<?php foreach($categories as $category){?>
                                    <option value="<?= $category["id"]?>"><?= $category["name"]?></option>
<?php } ?>
                                </select>
                            </li>
                            <li>
                                <input type="number" name="price" value="1" required>
                                <label>Price</label>
                            </li>
                            <li>
                                <input type="number" name="inventory" value="1" required>
                                <label>Inventory</label>
                            </li>
                            <li>
                                <label>Upload Images (4 Max)</label>
                                <ul>
                                    <li><button type="button" class="upload_image"></button></li>
                                </ul>
                                <input type="file" name="image" accept="image/*" class="image_input">
								<input type="hidden" name="form_data_action">
                                <!-- <ul>
                                    <li>
										<button type="button" class="upload_image">
										</button>
										<div id="images_display">
										</div>
									</li>
									<input type="file" name="photos[]" accept="image/*" multiple id="btn_upload" class="image_input">
                                </ul> -->
                            </li>
                        </ul>
                        <button type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
                        <button type="submit" id="btn_add_product">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="popover_overlay"></div>
</body>
</html>
