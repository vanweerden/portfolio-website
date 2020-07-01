/* DROP DOWN MENU */
function toggleDropMenu() {
  // Toggles state of display between none and block
  var dropContent = document.getElementById('dropdown-content');
  var dropState = dropContent.style.display;
  var dropButton = document.getElementById('drop-btn');

  dropContent.style.display = dropState == 'block' ? 'none' : 'block';
  dropButton.textContent = dropButton.textContent == '>' ? 'v' : '>';
}

/* FORM VALIDATION */
const form = document.getElementById('contact-form');
const name = document.getElementById('form-name');
const email = document.getElementById('form-email');
const subject = document.getElementById('form-subject');
const msg = document.getElementById('form-message');

const nameError = document.getElementById('name-error');
const emailError = document.getElementById('email-error');
const msgError = document.getElementById('message-error');

form.addEventListener('submit', function (event) {
  // Form submits if all fields are valid

  if (subject.value === '') {
    subject.value = 'No Subject';
  }

  // Clear any previous error messages if fixed by user
  if (name.validity.valid) {
    nameError.innerHTML = '';
    nameError.style.display = 'none';
  }
  if (email.validity.valid) {
    emailError.innerHTML = '';
    emailError.style.display = 'none';
  }
  if (msg.validity.valid) {
    msgError.innerHTML = '';
    msgError.style.display = 'none';
  }

  // If a field is invalid, display appropriate error message and prevent submission
  if (!name.validity.valid
      || !email.validity.valid
      || !msg.validity.valid) {
    handleErrors();
    event.preventDefault();
  }
});

function handleErrors() {
  if (name.validity.valueMissing) {
    nameError.textContent = 'Please include your name.';
    nameError.style.display = 'inline-block';
  }

  if (email.validity.valueMissing) {
    emailError.textContent = 'Please enter your e-mail address.';
    emailError.style.display = 'inline-block';
  } else if (email.validity.typeMismatch) {
    emailError.textContent = 'Entered value needs to be an e-mail address.';
    emailError.style.display = 'inline-block';
  }

  if (msg.validity.valueMissing) {
    msgError.textContent = 'Please write a message.';
    msgError.style.display = 'inline-block';
  }
}
