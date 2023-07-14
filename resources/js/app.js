import "./bootstrap";

import Alpine from "alpinejs";
import {
	Carousel,
	Collapse,
	Dropdown,
	initTE,
	Modal,
	Ripple,
} from "tw-elements";

initTE({ Carousel, Collapse, Dropdown, Modal, Ripple });

window.Alpine = Alpine;

Alpine.start();
