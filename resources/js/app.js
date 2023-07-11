import "./bootstrap";

import Alpine from "alpinejs";
import { Collapse, Dropdown, initTE } from "tw-elements";

initTE({ Collapse, Dropdown });

window.Alpine = Alpine;

Alpine.start();
