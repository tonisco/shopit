import "./bootstrap";
import "laravel-datatables-vite";

import Alpine from "alpinejs";
import {
	Carousel,
	Collapse,
	Dropdown,
	initTE,
	Input,
	Modal,
	Ripple,
	Select,
	Tab,
} from "tw-elements";

initTE({ Carousel, Collapse, Dropdown, Input, Modal, Ripple, Select, Tab });

window.Alpine = Alpine;

Alpine.start();

let timeout;

function scrollHandle(ele) {
	clearTimeout(timeout);

	ele.classList.remove("scrollBar-hide");

	timeout = setTimeout(() => {
		ele.classList.add("scrollBar-hide");
	}, 500);
}

document
	.querySelectorAll(".bar")
	.forEach((ele) => ele.addEventListener("scroll", () => scrollHandle(ele)));
