$(document).ready(function(){
    $("body").on("click", ".guest_login", function() {
		$.post('/guest_login', $('.login_form').serialize(),function(){
			$(location).attr('href','/');
		});
	});
	$("body").on("click", ".profile_btn", function() {
        $(".logout_btn").addClass("show");
        $(".popover_overlay").fadeIn();
        $("body").addClass("show_popover_overlay");
    });
    $("body").on("click", ".popover_overlay", function() {
        $(".logout_btn").removeClass("show");
        $(".popover_overlay").fadeOut();
        $("body").removeClass("show_popover_overlay");
    });
	$('.profile_dropdown').on('click', function() {
		let newTop = $(this).offset().top + $(this).outerHeight();
		let newLeft = $(this).offset().left;
			
		$('.admin_dropdown').css({
			'top': newTop + 'px',
			'left': newLeft + 'px'
		});
	});
});
