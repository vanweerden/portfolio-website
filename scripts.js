// Toggles state of display between none and block
function toggleDropMenu() {
  const dropContent = document.getElementById("dropdown-content");
  // "block" or "none"
  const dropState = dropContent.style.display;

  // toggles display
  dropContent.style.display = dropState == "block" ? "none" : "block";
}
