function nav() {
  var nav = document.getElementById("navcontenu");
  if (nav.getAttribute("vue") == "active") {
    document.getElementById("navcontenu").classList.remove("menu");
    nav.setAttribute("vue", "");
  } else {
    nav.setAttribute("vue", "active");
    document.getElementById("navcontenu").classList.add("menu");
  }
}