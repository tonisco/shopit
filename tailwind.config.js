import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
	content: [
		"./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
		"./storage/framework/views/*.php",
		"./resources/views/**/*.blade.php",
		"./node_modules/tw-elements/dist/js/**/*.js",
	],
	theme: {
		extend: {
			fontFamily: {
				sans: ["Figtree", ...defaultTheme.fontFamily.sans],
			},
			colors: {
				brandRed: "#ef4444",
				brandRedDark: "#b91c1c",
				brandYellow: "#eab308",
				brandYellowDark: "#a16207",
				brandBlue: "#3b82f6",
				brandBlueDark: "#1d4ed8",
				brandGray: "#9ca3af",
				brandGrayDark: "#6b7280",
				brandLight: "#e5e7eb",
				brandDark: "#1f2937",
				brandLighter: "#f3f4f6",
				brandDarker: "#111827",
				brandWhite: "#ffffff",
			},
		},
	},
	darkMode: "class",
	plugins: [
		require("@tailwindcss/forms"),
		require("tw-elements/dist/plugin.cjs"),
		require("tailwind-scrollbar"),
	],
};
