/* DROP DOWN MENU */
function toggleDropMenu() {
  // Toggles state of display between none and block
  const dropContent = document.getElementById('dropdown-content');
  // 'block' or 'none'
  const dropState = dropContent.style.display;
  const dropButton = document.getElementById('drop-btn');

  // toggles display
  dropContent.style.display = dropState == 'block' ? 'none' : 'block';

  // Changes text inside button
  dropButton.textContent = dropButton.textContent == '>' ? 'v' : '>';
}

/* FORM VALIDATION */
const form = document.getElementById('contact-form');
const name = document.getElementById('form-name');
const email = document.getElementById('form-email');
const msg = document.getElementById('form-message');

const nameError = document.getElementById('name-error');
const emailError = document.getElementById('email-error');
const msgError = document.getElementById('message-error');

form.addEventListener('submit', function (event) {
  // Form submits if all fields are valid

  // If not, display appropriate error message
  if (!name.validity.valid) {
    showError();
    event.preventDefault();
  }
});

function showError(field) {

}
