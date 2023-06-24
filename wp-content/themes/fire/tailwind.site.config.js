// Default Config: https://github.com/tailwindcss/tailwindcss/blob/master/stubs/defaultConfig.stub.js
module.exports = {
  important: false,
  future: {
    hoverOnlyWhenSupported: true,
  },
  content: ['./templates/**/*.php', './templates/**/*.js', './theme/assets/**/*.js', './theme/main.js', './*.php', './inc/**/*.php', './acf-json/**/*.json'],
  safelist: [
    {
      pattern: /(mt|mb)-gap-(0|xs|sm|md|lg|xl)/,
      variants: ['lg', 'md'],
    },
    {
      pattern: /delay-(100|200|300|400|500|600|700|800|900|1000|1100|1200)/,
    },
  ],
  theme: {
    screens: {
      sm: '575px',
      md: '768px',
      lg: '992px',
      xl: '1200px',
    },
    container: {
      center: true,
      padding: {
        DEFAULT: '1rem',
        sm: '1rem',
        lg: '2rem',
      },
    },
    fontFamily: {
      body: ['Open Sans', 'Arial', 'sans-serif'],
    },
    fontWeight: {
      thin: 200,
      light: 300,
      normal: 400,
      book: 450,
      medium: 500,
      semibold: 600,
      bold: 700,
    },
    extend: {
      colors: {
        orange: {
          1: '#F68B11',
          2: '#F36917',
        },
        blue: {
          1: '#426889',
          2: '#09395B',
        },
      },
      spacing: {
        'gap-0': '0',
        'gap-xs': '1.25rem',
        'gap-sm': '2rem',
        'gap-md': '3rem',
        'gap-lg': '5rem',
        'gap-xl': '8rem',
      },
    },
  },
  plugins: [require('@tailwindcss/aspect-ratio'), require('@tailwindcss/forms')],
};
