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
    <script src="<?php echo base_url('assets/js/global/admin_orders.js')?>"></script>
</head>
<script>
     $(document).ready(function() {
        $('.profile_dropdown').on('click', function() {
            let newTop = $(this).offset().top + $(this).outerHeight();
            let newLeft = $(this).offset().left;
            
            $('.admin_dropdown').css({
                'top': newTop + 'px',
                'left': newLeft + 'px'
            });
        });
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
                <li class="active"><a href="#">Orders</a></li>
                <li><a href="/admin/products">Products</a></li>
            </ul>
        </aside>
        <section>
            <form action="process.php" method="post" class="search_form">
                <input type="text" name="search" placeholder="Search Orders">
            </form>
            <form action="process.php" method="post" class="status_form">
                <h3>Status</h3>
                <ul>
                    <li>
                        <button type="submit" class="active">
                            <span>36</span><img src="../assets/images/all_orders_icon.svg" alt="#"><h4>All Products</h4>
                        </button>
                    </li>
                    <li>
                        <button type="submit">
                            <span>36</span><img src="../assets/images/pending_icon.svg" alt="#"><h4>Pending</h4>
                        </button>
                    </li>
                    <li>
                        <button type="submit">
                            <span>36</span><img src="../assets/images/on_process_icon.svg" alt="#"><h4>On-Process</h4>
                        </button>
                    </li>
                    <li>
                        <button type="submit">
                            <span>36</span><img src="../assets/images/shipped_icon.svg" alt="#"><h4>Shipped</h4>
                        </button>
                    </li>
                    <li>
                        <button type="submit">
                            <span>36</span><img src="../assets/images/delivered_icon.svg" alt="#"><h4>Delivered</h4>
                        </button>
                    </li>
                </ul>
            </form>
            <div>
                <h3>All Orders (36)</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Order ID #</th>
                            <th>Order Date</th>
                            <th>Receiver</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span><a href="#">123</a></span></td>
                            <td><span>09-06-2023</span></td>
                            <td><span>Charlene Flora<span>123 Dojo Way, Bellevue, WA 98005</span></span></td>
                            <td><span>$ 10</span></td>
                            <td>
                                <form action="process.php" method="post">
                                    <select class="selectpicker">
                                        <option>Pending</option>
                                        <option>On-Process</option>
                                        <option>Shipped</option>
                                        <option>Delivered</option>
                                      </select>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td><span><a href="#">123</a></span></td>
                            <td><span>09-06-2023</span></td>
                            <td><span>Charlene Flora<span>123 Dojo Way, Bellevue, WA 98005</span></span></td>
                            <td><span>$ 10</span></td>
                            <td>
                                <form action="process.php" method="post">
                                    <select class="selectpicker">
                                        <option>Pending</option>
                                        <option>On-Process</option>
                                        <option>Shipped</option>
                                        <option>Delivered</option>
                                      </select>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td><span><a href="#">123</a></span></td>
                            <td><span>09-06-2023</span></td>
                            <td><span>Charlene Flora<span>123 Dojo Way, Bellevue, WA 98005</span></span></td>
                            <td><span>$ 10</span></td>
                            <td>
                                <form action="process.php" method="post">
                                    <select class="selectpicker">
                                        <option>Pending</option>
                                        <option>On-Process</option>
                                        <option>Shipped</option>
                                        <option>Delivered</option>
                                      </select>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td><span><a href="#">123</a></span></td>
                            <td><span>09-06-2023</span></td>
                            <td><span>Charlene Flora<span>123 Dojo Way, Bellevue, WA 98005</span></span></td>
                            <td><span>$ 10</span></td>
                            <td>
                                <form action="process.php" method="post">
                                    <select class="selectpicker">
                                        <option>Pending</option>
                                        <option>On-Process</option>
                                        <option>Shipped</option>
                                        <option>Delivered</option>
                                      </select>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td><span><a href="#">123</a></span></td>
                            <td><span>09-06-2023</span></td>
                            <td><span>Charlene Flora<span>123 Dojo Way, Bellevue, WA 98005</span></span></td>
                            <td><span>$ 10</span></td>
                            <td>
                                <form action="process.php" method="post">
                                    <select class="selectpicker">
                                        <option>Pending</option>
                                        <option>On-Process</option>
                                        <option>Shipped</option>
                                        <option>Delivered</option>
                                      </select>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td><span><a href="#">123</a></span></td>
                            <td><span>09-06-2023</span></td>
                            <td><span>Charlene Flora<span>123 Dojo Way, Bellevue, WA 98005</span></span></td>
                            <td><span>$ 10</span></td>
                            <td>
                                <form action="process.php" method="post">
                                    <select class="selectpicker">
                                        <option>Pending</option>
                                        <option>On-Process</option>
                                        <option>Shipped</option>
                                        <option>Delivered</option>
                                      </select>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td><span><a href="#">123</a></span></td>
                            <td><span>09-06-2023</span></td>
                            <td><span>Charlene Flora<span>123 Dojo Way, Bellevue, WA 98005</span></span></td>
                            <td><span>$ 10</span></td>
                            <td>
                                <form action="process.php" method="post">
                                    <select class="selectpicker">
                                        <option>Pending</option>
                                        <option>On-Process</option>
                                        <option>Shipped</option>
                                        <option>Delivered</option>
                                      </select>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td><span><a href="#">123</a></span></td>
                            <td><span>09-06-2023</span></td>
                            <td><span>Charlene Flora<span>123 Dojo Way, Bellevue, WA 98005</span></span></td>
                            <td><span>$ 10</span></td>
                            <td>
                                <form action="process.php" method="post">
                                    <select class="selectpicker">
                                        <option>Pending</option>
                                        <option>On-Process</option>
                                        <option>Shipped</option>
                                        <option>Delivered</option>
                                      </select>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td><span><a href="#">123</a></span></td>
                            <td><span>09-06-2023</span></td>
                            <td><span>Charlene Flora<span>123 Dojo Way, Bellevue, WA 98005</span></span></td>
                            <td><span>$ 10</span></td>
                            <td>
                                <form action="process.php" method="post">
                                    <select class="selectpicker">
                                        <option>Pending</option>
                                        <option>On-Process</option>
                                        <option>Shipped</option>
                                        <option>Delivered</option>
                                      </select>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td><span><a href="#">123</a></span></td>
                            <td><span>09-06-2023</span></td>
                            <td><span>Charlene Flora<span>123 Dojo Way, Bellevue, WA 98005</span></span></td>
                            <td><span>$ 10</span></td>
                            <td>
                                <form action="process.php" method="post">
                                    <select class="selectpicker">
                                        <option>Pending</option>
                                        <option>On-Process</option>
                                        <option>Shipped</option>
                                        <option>Delivered</option>
                                      </select>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td><span><a href="#">123</a></span></td>
                            <td><span>09-06-2023</span></td>
                            <td><span>Charlene Flora<span>123 Dojo Way, Bellevue, WA 98005</span></span></td>
                            <td><span>$ 10</span></td>
                            <td>
                                <form action="process.php" method="post">
                                    <select class="selectpicker">
                                        <option>Pending</option>
                                        <option>On-Process</option>
                                        <option>Shipped</option>
                                        <option>Delivered</option>
                                      </select>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td><span><a href="#">123</a></span></td>
                            <td><span>09-06-2023</span></td>
                            <td><span>Charlene Flora<span>123 Dojo Way, Bellevue, WA 98005</span></span></td>
                            <td><span>$ 10</span></td>
                            <td>
                                <form action="process.php" method="post">
                                    <select class="selectpicker">
                                        <option>Pending</option>
                                        <option>On-Process</option>
                                        <option>Shipped</option>
                                        <option>Delivered</option>
                                      </select>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td><span><a href="#">123</a></span></td>
                            <td><span>09-06-2023</span></td>
                            <td><span>Charlene Flora<span>123 Dojo Way, Bellevue, WA 98005</span></span></td>
                            <td><span>$ 10</span></td>
                            <td>
                                <form action="process.php" method="post">
                                    <select class="selectpicker">
                                        <option>Pending</option>
                                        <option>On-Process</option>
                                        <option>Shipped</option>
                                        <option>Delivered</option>
                                      </select>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td><span><a href="#">123</a></span></td>
                            <td><span>09-06-2023</span></td>
                            <td><span>Charlene Flora<span>123 Dojo Way, Bellevue, WA 98005</span></span></td>
                            <td><span>$ 10</span></td>
                            <td>
                                <form action="process.php" method="post">
                                    <select class="selectpicker">
                                        <option>Pending</option>
                                        <option>On-Process</option>
                                        <option>Shipped</option>
                                        <option>Delivered</option>
                                      </select>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td><span><a href="#">123</a></span></td>
                            <td><span>09-06-2023</span></td>
                            <td><span>Charlene Flora<span>123 Dojo Way, Bellevue, WA 98005</span></span></td>
                            <td><span>$ 10</span></td>
                            <td>
                                <form action="process.php" method="post">
                                    <select class="selectpicker">
                                        <option>Pending</option>
                                        <option>On-Process</option>
                                        <option>Shipped</option>
                                        <option>Delivered</option>
                                      </select>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td><span><a href="#">123</a></span></td>
                            <td><span>09-06-2023</span></td>
                            <td><span>Charlene Flora<span>123 Dojo Way, Bellevue, WA 98005</span></span></td>
                            <td><span>$ 10</span></td>
                            <td>
                                <form action="process.php" method="post">
                                    <select class="selectpicker">
                                        <option>Pending</option>
                                        <option>On-Process</option>
                                        <option>Shipped</option>
                                        <option>Delivered</option>
                                      </select>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td><span><a href="#">123</a></span></td>
                            <td><span>09-06-2023</span></td>
                            <td><span>Charlene Flora<span>123 Dojo Way, Bellevue, WA 98005</span></span></td>
                            <td><span>$ 10</span></td>
                            <td>
                                <form action="process.php" method="post">
                                    <select class="selectpicker">
                                        <option>Pending</option>
                                        <option>On-Process</option>
                                        <option>Shipped</option>
                                        <option>Delivered</option>
                                      </select>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td><span><a href="#">123</a></span></td>
                            <td><span>09-06-2023</span></td>
                            <td><span>Charlene Flora<span>123 Dojo Way, Bellevue, WA 98005</span></span></td>
                            <td><span>$ 10</span></td>
                            <td>
                                <form action="process.php" method="post">
                                    <select class="selectpicker">
                                        <option>Pending</option>
                                        <option>On-Process</option>
                                        <option>Shipped</option>
                                        <option>Delivered</option>
                                      </select>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
