window.onscroll = function() {
  "use strict";
  if (document.body.scrollTop >= 0.2*window.innerHeight && document.body.scrollTop || document.documentElement.scrollTop >= 0.2*window.innerHeight) {
    scrUp.classList.add("scrup");
  } else {
    scrUp.classList.remove("scrup");
  }
};