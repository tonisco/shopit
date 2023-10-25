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
	console.log(ele);

	ele.classList.remove("scrollbar-none");
	ele.classList.add("scrollbar-thin");

	timeout = setTimeout(() => {
		ele.classList.remove("scrollbar-thin");
		ele.classList.add("scrollbar-none");
	}, 500);
}

document.querySelectorAll(".scrollB").forEach((ele) => {
	ele.addEventListener("scroll", () => scrollHandle(ele));
	console.log(ele);
});
