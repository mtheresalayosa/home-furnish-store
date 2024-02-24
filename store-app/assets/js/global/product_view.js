$(document).ready(function(){
    $("body").on("click", ".increase_decrease_quantity", function() {
        let input = $("#quantity");
        let input_val = parseInt(input.val());
		
        if($(this).attr("data-quantity-ctrl") == 1) {
            input.val(input_val + 1);
        }
        else {
            if(input_val != 1) {
                input.val(input_val - 1)
            }
        };

        let total_amount = (parseInt(input.val()) * parseFloat(($(".amount").text()).substring(2))).toFixed(2);
        $("#add_to_cart_form").find(".total_amount").text("$ " + total_amount);
        $("#add_to_cart_form").find("#subtotal_amount").val(total_amount);
    });

    $("body").on("click", ".show_image", function() {

        let show_image_btn = $(this);
        show_image_btn.closest("ul").find(".active").removeClass("active");
        show_image_btn.closest("li").addClass("active");
        show_image_btn.closest("ul").closest("li").children().first().attr("src", show_image_btn.find("img").attr("src"));
    });

	/* Add to cart */
	let cart_count = 1;
	$("body").on("click", "#add_to_cart", function(){
		$(this).submit();
		return false;
	});

    $("body").on("submit", "#add_to_cart_form", function() {
        let form = $(this);

        $.post(form.attr("action"), form.serialize(), function(res) {
			$('.show_cart').text('('+ cart_count++ +')');
			$("<span class='added_to_cart'>Added to cart succesfully!</span>")
			.insertAfter($("#add_to_cart"))
			.fadeIn()
			.delay(1000)
			.fadeOut(function() {
				$(this).remove();
			});
        })
        return false;
    });
});

