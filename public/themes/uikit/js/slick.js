document.addEventListener("DOMContentLoaded", function() {

	$('.guide__slider').slick({
		prevArrow: '<button type="button" class="slick-btn slick-prev">​<img src="../images/arrow-prev.svg" alt="Prev arrow"></button>',
		nextArrow: '<button type="button" class="slick-btn slick-next">​<img src="../images/arrow-next.svg" alt="Next arrow"></button>',
		autoplay: false,
		fade: true,
		responsive: [
					{
					breakpoint: 601,
					settings: {
						arrows: false
					}
					}
				]
	});

	$('.guide-right__slider').slick({
		prevArrow: '<button type="button" class="slick-btn slick-prev">​<img src="../images/arrow-prev.svg" alt="Prev arrow"></button>',
		nextArrow: '<button type="button" class="slick-btn slick-next">​<img src="../images/arrow-next.svg" alt="Next arrow"></button>',
		autoplay: false,
		fade: true,
		responsive: [
					{
					breakpoint: 601,
					settings: {
						arrows: false
					}
					}
				]
	});

});

