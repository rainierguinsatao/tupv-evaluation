module.exports = {
  content: [
    "./_admin/**/*.php",
    "./_faculty/**/*.php",
    "./_student/**/*.php",
    "./_landingpage/**/*.php",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {},
  },
  plugins: [require("flowbite/plugin")],
};
