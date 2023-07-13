import "./bootstrap";

import Alpine from "alpinejs";
import { Carousel, Collapse, Dropdown, initTE, Ripple } from "tw-elements";

initTE({ Carousel, Collapse, Dropdown, Ripple });

window.Alpine = Alpine;

Alpine.start();
