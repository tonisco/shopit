let toolbar = [
	["bold", "italic", "underline", "strike"], // toggled buttons
	["blockquote", "code-block"],
	[
		{
			header: 1,
		},
		{
			header: 2,
		},
	], // custom button values
	[
		{
			list: "ordered",
		},
		{
			list: "bullet",
		},
	],
	[
		{
			script: "sub",
		},
		{
			script: "super",
		},
	], // superscript/subscript
	[
		{
			indent: "-1",
		},
		{
			indent: "+1",
		},
	], // outdent/indent
	[
		{
			direction: "rtl",
		},
	], // text direction

	[
		{
			size: ["small", false, "large", "huge"],
		},
	], // custom dropdown
	[
		{
			header: [1, 2, 3, 4, 5, 6, false],
		},
	], // remove formatting button
];

document.addEventListener("alpine:init", () => {
	Alpine.data("toggler", (data) => ({
		open: false,
		toggle() {
			this.open = !this.open;
		},
		change(val) {
			this.open = Boolean(val);
		},
		init() {
			if (data && typeof Boolean(data) === "boolean") {
				this.open = Boolean(data);
			}
		},
	}));

	Alpine.data("timeout", () => ({
		show: true,
		time: 5,
		close(clean) {
			this.time = 0;
			this.open = false;
			if (clean) this.remove();
		},
		async countdown(clean) {
			let interval = window.setInterval(() => {
				if (this.time === 0) {
					this.show = false;
					clearInterval(interval);
					if (clean) this.remove();
				} else {
					this.time = this.time - 1;
				}
			}, 1000);
		},
		remove() {
			$(this).remove();
		},
	}));

	Alpine.data("categoriesData", (data, defaultData, defaultSub) => ({
		categories: data,
		subCategoryValue: "",
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
			if (defaultSub) {
				this.subCategoryValue = defaultSub;
			}
		},
	}));

	Alpine.data("imagePreview", (defaultImage) => ({
		image_url: "",
		value: "",
		deleteValue: "",
		change(e, id) {
			if (e.target.files[0])
				this.image_url = URL.createObjectURL(e.target.files[0]);
			if (id) this.deleteValue = id;
		},
		clear(val, id) {
			this.image_url = "";
			document.querySelector("#" + val.id).value = "";
			if (id) this.deleteValue = id;
		},
		init() {
			if (defaultImage) {
				this.image_url = defaultImage;
			}
		},
	}));

	Alpine.data("editor", (id, data) => ({
		init() {
			var quill = new Quill(this.$refs.editor, {
				theme: "snow",
				modules: {
					toolbar,
				},
			});

			quill.on("text-change", function () {
				document.querySelector(`#${id}`).value =
					document.querySelector(".ql-editor").innerHTML;
			});
			if (data) document.querySelector(".ql-editor").innerHTML = data;
		},
	}));

	Alpine.data("selected", (data) => ({
		itemSelected: data,
		setItemSelected(val) {
			this.itemSelected = val;
		},
	}));
});
