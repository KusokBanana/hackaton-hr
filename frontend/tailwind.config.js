module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      // backgroundImage: {
      //   "cardbg": require('./src/assets/images/cardbg.png')
      // },
      colors: {
        "apptext": "#777FA7",
        "appgrey": "#535F6A",
        "pickergrey": "#7F90A5",
        "appblue": "#4886FF",
        "menugrey": "#A5ABCC",
        "appbg": "#f4f7f9",
        "appdivider": "#DADDEF",
        "progress": "#E9EEF1",
        "appred": "#F7685B",
        "positiongrey": "#C3C3C3",
        "candidategrey": "#7D7D7D"
      },
      width: {
        "220px": "220px",
        "500px": "500px"
      },
      minWidth: {
        "220px": "220px"
      },
      height: {
        "60px": "60px",
        "progress": "5px"
      },
      boxShadow: {
        "block": "0px 4px 4px rgba(111, 135, 238, 0.3)",
        "side": "0px 0px 4px rgba(111, 135, 238, 0.3)",
        "bottom": "0px 1px 4px -2px rgba(111, 135, 238, 0.15)",
        "card": "0px 2px 10px rgba(111, 135, 238, 0.1)"
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
