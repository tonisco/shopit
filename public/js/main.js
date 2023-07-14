const swiper1 = new Swiper(".swiper1", {
	loop: true,
	slidesPerView: "auto",
	spaceBetween: 10,
	freeMode: true,
	watchSlidesVisibility: true,
	watchSlidesProgress: true,
});

const swiper = new Swiper(".swiper", {
	loop: true,
	// autoplay: {
	// 	delay: 2500,
	// 	disableOnInteraction: false,
	// },
	pagination: {
		el: ".swiper-pagination",
		clickable: true,
	},
	spaceBetween: 10,
	grabCursor: true,
	centeredSlides: true,
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},
	// thumbs: {
	// 	swiper: swiper1,
	// },
});
