document.addEventListener("alpine:init", () => {
	Alpine.data("toggler", () => ({
		open: false,
		toggle() {
			this.open = !this.open;
		},
		change(val) {
			this.open = Boolean(val);
		},
	}));

	Alpine.data("timeout", () => ({
		show: true,
		time: 5,
		close() {
			this.time = 0;
			this.open = false;
		},
		async countdown() {
			let interval = window.setInterval(() => {
				if (this.time === 0) {
					this.show = false;
					clearInterval(interval);
				} else {
					console.log(this.time);
					this.time = this.time - 1;
				}
			}, 1000);
		},
	}));
});
