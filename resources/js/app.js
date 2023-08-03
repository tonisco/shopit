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
