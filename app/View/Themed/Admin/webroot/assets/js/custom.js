
// JavaScript Document
$(document).ready(function () {
	
    $(".btn-select").each(function (e) {
        var display_value = $(this).find("ul li.selected").html();
        var value = $(this).find("ul li.selected").attr('data-product-id');
		
        if (value != undefined) {
            $(this).find(".btn-select-input").val(value);
            $(this).find(".btn-select-value").html(display_value);
        }
    });
});

$(document).on('click', '.btn-select', function (e) {
    e.preventDefault();
    var ul = $(this).find("ul");
    if ($(this).hasClass("active")) {
        if (ul.find("li").is(e.target)) {
            var target = $(e.target);
            target.addClass("selected").siblings().removeClass("selected");
            var display_value = target.html();
            var value = target.attr('data-product-id');
            $(this).find(".btn-select-input").val(value);
            $(this).find(".btn-select-value").html(display_value);
        }
        ul.hide();
        $(this).removeClass("active");
    }
    else {
        $('.btn-select').not(this).each(function () {
            $(this).removeClass("active").find("ul").hide();
        });
        ul.slideDown(300);
        $(this).addClass("active");
    }
});

$(document).on('click', function (e) {
    var target = $(e.target).closest(".btn-select");
    if (!target.length) {
        $(".btn-select").removeClass("active").find("ul").hide();
    }
});
