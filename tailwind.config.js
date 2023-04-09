/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
        screens: {
            sm: '480px',
            md: '768px',
            lg: '976px',
            xl: '1440px',
        },
        zIndex: {
            'background': 0,
            'background-overlay': 1,
            'normal': 5,
            'navbar': 10,
            'dropdown': 1000,
            'modal': 2000,
            'overlay': 3000,
        },
    },
    plugins: [],
}
