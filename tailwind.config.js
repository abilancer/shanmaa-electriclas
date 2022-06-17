module.exports = {
  content: [
    './*.php'
  ],
  theme: {
    screens:{
       sm:'480px',
       md:'768px',
       lg:'976px',
       xl:'1440px'
    },
    extend: {
      fontFamily: {
        proxima: ["proxima", "sans-serif"],
        helvetica: ["helvetica", "sans-serif"],
        times_new:["times_new","sans-serif"],
        varela:["varela","sans-serif"],
      },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}
