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
});
