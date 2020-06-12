// Toggles state of display between none and block
function toggleDropMenu() {
  const dropContent = document.getElementById("dropdown-content");
  // "block" or "none"
  const dropState = dropContent.style.display;
  const dropButton = document.getElementById("drop-btn");

  // toggles display
  dropContent.style.display = dropState == "block" ? "none" : "block";

  // Changes text inside button
  dropButton.textContent = dropButton.textContent == ">" ? "v" : ">";
}

/* FORM VALIDATION */
function validateEmail(email) {
  const regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return regex.test(String(email).toLowerCase());
}

// Highlights invalid form input fields on submision of form
function handleSubmit(e) {
  e.preventDefault();
  const formFields = document.getElementsByClassName('text-box');

  let valid = true;

  // If any fields are not valid, highlight and set valid to false
  for (let field of formFields) {
    if (field.type === 'email') {
      if (!validateEmail(field.value)) valid = false;
    } else if (field.value == null || field.value == '') {
      valid = false;
    }

    // If any fields are invalid, prevent submission
     if (!valid) {
       e.preventDefault();
       return false;
     } else {
       console.log("SUCCESS!!");
     }
  }
}

const form = document.querySelector('form');
form.addEventListener('submit', e => handleSubmit(e));
