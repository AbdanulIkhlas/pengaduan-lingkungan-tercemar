/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./index.php",
        "./src/**/*.{js,php}",
    ],
    theme: {
        extend: {
            colors: {
                'greenBackground': '#3dc6aa',
            },
        },
    },
    plugins: [],
}