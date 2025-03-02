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

            animation: {
                slideIn: 'slideIn 5s ease-in-out forwards',
                widthExpand: 'widthExpand 4750ms ease-in-out forwards',
            },
            keyframes: {
                slideIn: {
                    '0%': {transform: 'translate(-50%,-100%)'},
                    '10%': {transform: 'translate(-50%, 24px)'},
                    '90%': {transform: 'translate(-50%, 24px)'},
                    '100%': {transform: 'translate(-50%,-100%)'},
                },
                widthExpand: {
                    '0%': {width: '0%'},
                    '100%': {width: '100%'},
                },
            }
        },
    },

    plugins: [forms],
};
