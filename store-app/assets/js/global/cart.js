$(document).ready(function() {
    $("body").on("click", ".remove_item", function() {
        $(this).closest("ul").closest("li").addClass("confirm_delete");
        $(".popover_overlay").fadeIn();
        $(".cart_items_form").find("input[name=action]").val("delete");
        $(".cart_items_form").find("input[name=update_cart_item_id]").val($(this).val());
    });
    $("body").on("click", ".cancel_remove", function() {
        $(this).closest("li").removeClass("confirm_delete");
        $(".popover_overlay").fadeOut();
        $(".cart_items_form").find("input[name=action]").val("update");
    });
    /* prototype added delete */
    $("body").on("click", ".remove", function() {
		let cart_id = $('#cart_id').val();
		$.post("/delete_cart/"+cart_id, $('.cart_items_form').serialize(), function(res) {
            history.go(0);
			$(".remove").closest('li.confirm_delete').remove();
			$(".popover_overlay").fadeOut();
		});
		return false;
    });

    $("body").on("click", ".increase_decrease_quantity", function() {
        let input = $(this).closest(".form_control").find("input");
        let input_val = parseInt(input.val());

        if($(this).attr("data-quantity-ctrl") == 1) {
            input.val(input_val + 1);
        }
        else {
            if(input_val != 1) {
                input.val(input_val - 1)
            };
        };

        $("input[name=update_cart_item_id]").val($(this).val())
        $("input[name=update_cart_item_quantity]").val(input.val());
        $(".cart_items_form").trigger("submit");
    });

    $("body").on("submit", ".cart_items_form", function() {
        let form = $(this);
        $.post(form.attr("action"), form.serialize(), function(res) {
            $(".wrapper > section").html(res);
            $(".popover_overlay").fadeOut();
        });
        return false;
    });

    $("#billing_info").hide();
    $("body").on("change", "#same_billing", function() {
        if($(this).is(":checked")) {
            $("#billing_info").hide();
			$("#billing_info input").prop("disabled", true);
        } else {
            $("#billing_info").show();
        }
    });
	
    $("body").on("click", ".btn_checkout", function() {
		$(".checkout_form").submit();
	});
	
    $("body").on("submit", ".checkout_form", function() {
		$("#card_details_modal").modal("show");

        return false;
    });
	
	var $stripeForm = $(".pay_form");
    $("body").on("submit", ".pay_form", function(e) {
        let form = $(this);
        $(this).find("button").addClass("loading");
		if (!form.data('ccOnFile')) {
			console.log("no cc-on-file");
			e.preventDefault();
			console.log(form.data());
			Stripe.setPublishableKey(form.data('stripe-publishable-key'));
			Stripe.createToken({
				name: $('.card-name').val(),
				number: $('.card-number').val(),
				cvc: $('.card-cvc').val(),
				exp_month: $('.card-expiry-month').val(),
				exp_year: $('.card-expiry-year').val()
			}, stripeResponseHandler);
		}
    });
	
	function stripeResponseHandler(status, res) {
		if (res.error) {
			$('.pay_message').addClass('pay_error').text(res.error.message);
		} else {
			var token = res['id'];
			$stripeForm.find('input[type=text]').empty();
			$stripeForm.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
			let checkout_details = ($(".checkout_form").serialize())+"&"+($(".pay_form").serialize());
			
			$.post($stripeForm.attr("action"), checkout_details, function(res) {
				$('.btn_pay').prop('disabled',true);
				$('.pay_message').addClass('pay_success').text("Your payment is successfully processed.");
				setTimeout(function() {
					$("#card_details_modal").find("button").removeClass("loading").addClass("success").find("span").text("Payment Successfull!");
				}, 2000);
				setTimeout(function() {
					$("#card_details_modal").modal("hide");
				}, 3000);
			});
		}
	}
});
