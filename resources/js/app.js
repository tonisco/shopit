import "./bootstrap";
import "laravel-datatables-vite";

import Alpine from "alpinejs";
import {
	Carousel,
	Collapse,
	Dropdown,
	initTE,
	Modal,
	Ripple,
	Tab,
} from "tw-elements";

initTE({ Carousel, Collapse, Dropdown, Modal, Ripple, Tab });

window.Alpine = Alpine;

Alpine.start();
