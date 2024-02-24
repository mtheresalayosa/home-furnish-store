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
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom/signup.css')?>">
</head>
<script>
    $(document).ready(function() {
        // $("form").submit(function(event) {
        //     event.preventDefault();
        //     return false;
        // });
        // /* prototype add */
        // $(".signup_btn").click(function() {
        //     window.location.href = "catalogue.html";
        // });
    });
</script>
<body>
    <div class="wrapper">
        <a href="/"><img src="../assets/images/home_furnish_logo_text.svg" alt="Home Furnish Store"></a>
        <form action="/users/process_signup" method="post">
            <h2>Signup to order</h2>
            <a href="login">Already a member? Login here.</a>
			<div class="form_messages">
<?= $message ?>
			</div>
            <ul>
                <li>
                    <input type="text" name="first_name" id="first_name" class="">
                    <label for="first_name">First Name</label>
                </li>
                <li>
                    <input type="text" name="last_name" id="last_name">
                    <label for="last_name">Last Name</label>
                </li>
                <li>
                    <input type="email" name="email" id="email">
                    <label for="email">Email</label>
                </li>
                <li>
                    <input type="password" name="password" id="password">
                    <label for="password">Password</label>
                </li>
                <li>
                    <input type="password" name="confirm_password" id="confirm_password">
                    <label for="confirm_password">Confirm Password</label>
                </li>
            </ul>
			<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
            <button class="signup_btn" type="submit">Signup</button>
        </form>
    </div>
</body>
</html>
