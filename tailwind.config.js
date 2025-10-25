/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./storage/framework/views/*.php",
        "./resources/**/*.ts",
        "./resources/**/*.jsx",
        "./resources/**/*.tsx",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Montserrat Alternates", "sans-serif"], // Tambahkan font di sini
            },
        },
    },
    plugins: [require("tailwind-scrollbar-hide"), require("daisyui")], // Perbaiki bagian ini
    daisyui: {
        themes: ["bumblebee"],
        
    },
};
