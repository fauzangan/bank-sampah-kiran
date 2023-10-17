/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.{html,php,js}",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Poppins", "sans-serif"],
            },
            colors: {
                primary: "#65a30d",
            },
            screens: {
                xs: "475px",

                md: "640px",
                // => @media (min-width: 640px) { ... }

                xl: "1024px",
                // => @media (min-width: 1024px) { ... }

                "2xl": "1280px",
                // => @media (min-width: 1280px) { ... }
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
