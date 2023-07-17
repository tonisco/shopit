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

// range

function range(minPrice, maxPrice) {
	return {
		minPrice: parseInt(minPrice),
		maxPrice: parseInt(maxPrice),
		min: parseInt(minPrice),
		max: parseInt(maxPrice),
		minThumb: 0,
		maxThumb: 0,
		minTrigger() {
			this.minPrice = Math.min(this.minPrice, this.maxPrice - 100);
			this.minThumb =
				((this.minPrice - this.min) / (this.max - this.min)) * 100;
		},
		maxTrigger() {
			this.maxPrice = Math.max(this.maxPrice, this.minPrice + 100);
			this.maxThumb =
				100 -
				((this.maxPrice - this.min) / (this.max - this.min)) * 100;
		},
	};
}
