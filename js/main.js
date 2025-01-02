/*  ---------------------------------------------------
    Template Name: Ogani
    Description:  Ogani eCommerce  HTML Template
    Author: Colorlib
    Author URI: https://colorlib.com
    Version: 1.0
    Created: Colorlib
---------------------------------------------------------  */

"use strict";

(function ($) {

});

/*------------------
        Background Set
    --------------------*/
$(".set-bg").each(function () {
  var bg = $(this).data("setbg");
  $(this).css("background-image", "url(" + bg + ")");
});

/*-----------------------
        Hero Slider
    ------------------------*/
$(".hero__slider").owlCarousel({
  loop: true,
  margin: 0,
  items: 1,
  dots: false,
  nav: true,
  navText: [
    "<span class='arrow_left'><span/>",
    "<span class='arrow_right'><span/>",
  ],
  animateOut: "fadeOut",
  animateIn: "fadeIn",
  smartSpeed: 1200,
  autoHeight: false,
  autoplay: false,
});

//Humberger Menu
$(".humberger__open").on("click", function () {
  $(".humberger__menu__wrapper").addClass("show__humberger__menu__wrapper");
  $(".humberger__menu__overlay").addClass("active");
  $("body").addClass("over_hid");
});

$(".humberger__menu__overlay").on("click", function () {
  $(".humberger__menu__wrapper").removeClass("show__humberger__menu__wrapper");
  $(".humberger__menu__overlay").removeClass("active");
  $("body").removeClass("over_hid");
});

/*------------------
		Navigation
	--------------------*/
$(".mobile-menu").slicknav({
  prependTo: "#mobile-menu-wrap",
  allowParentLinks: true,
});

/*---------------------------------
        Product Details Pic Slider
    ----------------------------------*/
$(".product__details__pic__slider").owlCarousel({
  loop: true,
  margin: 20,
  items: 4,
  dots: true,
  smartSpeed: 1200,
  autoHeight: false,
  autoplay: true,
});

/*-----------------------
		Price Range Slider
	------------------------ */
var rangeSlider = $(".price-range"),
  minamount = $("#minamount"),
  maxamount = $("#maxamount"),
  minPrice = rangeSlider.data("min"),
  maxPrice = rangeSlider.data("max");
rangeSlider.slider({
  range: true,
  min: minPrice,
  max: maxPrice,
  values: [minPrice, maxPrice],
  slide: function (event, ui) {
    minamount.val("$" + ui.values[0]);
    maxamount.val("$" + ui.values[1]);
  },
});
minamount.val("$" + rangeSlider.slider("values", 0));
maxamount.val("$" + rangeSlider.slider("values", 1));

/*--------------------------
        Select
    ----------------------------*/
$("select").niceSelect();

/*------------------
		Single Product
	--------------------*/
$(".product__details__pic__slider img").on("click", function () {
  var imgurl = $(this).data("imgbigurl");
  var bigImg = $(".product__details__pic__item--large").attr("src");
  if (imgurl != bigImg) {
    $(".product__details__pic__item--large").attr({
      src: imgurl,
    });
  }
});

/*-------------------
		Quantity change
	--------------------- */
var proQty = $(".pro-qty");
proQty.prepend('<span class="dec qtybtn">-</span>');
proQty.append('<span class="inc qtybtn">+</span>');
proQty.on("click", ".qtybtn", function () {
  var $button = $(this);
  var oldValue = $button.parent().find("input").val();
  if ($button.hasClass("inc")) {
    var newVal = parseFloat(oldValue) + 1;
  } else {
    // Don't allow decrementing below zero
    if (oldValue > 0) {
      var newVal = parseFloat(oldValue) - 1;
    } else {
      newVal = 0;
    }
  }
  $button.parent().find("input").val(newVal);
});
jQuery;
