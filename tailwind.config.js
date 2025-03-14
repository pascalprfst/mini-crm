import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

            fontSize: {
                lg: '17px',
                base: '15px',
                sm: '13px',
                xs: '11px',
            },

            colors: {
                'main': '#2e11af',
                'main-light': '#4329b7',
                'main-dark': '#290f9e',
                'sub': '#7d11af',
            }
        },
    },

    plugins: [forms],
};
