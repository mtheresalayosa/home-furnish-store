
<link rel="stylesheet" href="<?php echo base_url('assets/css/custom/global.css')?>">
<div class="wrapper">
	<header>
		<a href="/"><img src="../assets/images/home_furnish_logo_text.svg" alt="Home Furnish logo" class="site_logo"></a>
		<form action="/products/search" method="get" class="search_form">
			<input type="text" name="search_term" placeholder="Search">
		</form>
		<div class="header_content">
<?php if(!$is_loggedin) {?>
			<a class="signup_btn" href="/login">Login / Register</a>
<?php } else {?>
			<div class="btn_profile">
                <button class="profile">
                    <img src="<?= base_url('assets/images/user-profile.svg')?>" alt="#">
					<span><?= $user ?></span>
                </button>
            </div>
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle profile_dropdown" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">aaaaa</a>
                <div class="dropdown-menu user_dropdown" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="/logout">Logout</a>
                </div>
            </div>
<?php } ?>
			<a class="show_cart" href="/cart">(<span id="top_cart_count"><?= $cart_count?></span>)</a>
		</div>
	</header>
</div>
