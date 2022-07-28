/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./resources/js/Pages/*"
    ],
    theme: {
        extend: {},
    },

    plugins: [require('@tailwindcss/forms')],

}
