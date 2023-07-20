document.addEventListener("alpine:init", () => {
	Alpine.data("sidebar", () => ({
		open: false,

		toggle() {
			this.open = !this.open;
		},
	}));
});
