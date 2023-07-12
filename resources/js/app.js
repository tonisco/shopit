import "./bootstrap";

import Alpine from "alpinejs";
import { Collapse, Dropdown, initTE, Ripple } from "tw-elements";

initTE({ Collapse, Dropdown, Ripple });

window.Alpine = Alpine;

Alpine.start();
