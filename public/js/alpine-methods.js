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
					this.time = this.time - 1;
				}
			}, 1000);
		},
	}));

	Alpine.data("categoriesData", (data, defaultData) => ({
		categories: data,
		subCategories: [],
		setSubCategory(e) {
			if (this.categories) {
				let category = this.categories.find(
					(category) => category.id == e
				);

				if (category && category.sub_categories.length > 0) {
					this.subCategories = category.sub_categories;
				} else this.subCategories = [];
			}
		},
		init() {
			if (defaultData) {
				this.setSubCategory(defaultData);
			}
		},
	}));

	Alpine.data("imagePreview", () => ({
		image_url: "",
		value: "",
		change(e) {
			if (e.target.files[0])
				this.image_url = URL.createObjectURL(e.target.files[0]);
		},
		clear(val) {
			this.image_url = "";
			document.querySelector("#" + val.id).value = "";
		},
	}));
});
