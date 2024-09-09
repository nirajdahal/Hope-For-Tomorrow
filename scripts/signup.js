document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector(".get-connected-form");
  const usernameInput = document.getElementById("username");
  const passwordInput = document.getElementById("password");
  const emailInput = document.getElementById("email");

  // Check if elements exist before proceeding
  if (!usernameInput || !passwordInput || !emailInput) {
    console.error("Form elements not found. Check the input IDs.");
    return;
  }

  // Check if elements exist before proceeding
  if (!usernameInput || !passwordInput || !emailInput) {
    console.error("Form elements not found. Check the input IDs.");
    return; // Stop execution if inputs are not found
  }

  const usernameError = usernameInput.nextElementSibling;
  const passwordError = passwordInput.nextElementSibling;
  const emailError = emailInput.nextElementSibling;
  const submitButton = document.querySelector(".submit-button button");

  // Disable submit button initially
  submitButton.disabled = true;

  // Validation function for email
  function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
  }

  // Validation function for password strength
  function validatePassword(password) {
    // Minimum 8 characters, at least one uppercase letter, one lowercase letter, one number and one special character
    const re =
      /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    return re.test(password);
  }

  // Check if all inputs are valid
  function checkFormValidity() {
    const isUsernameValid = usernameInput.value.trim() !== "";
    const isPasswordValid = validatePassword(passwordInput.value);
    const isEmailValid = validateEmail(emailInput.value);
    submitButton.disabled = !(
      isUsernameValid &&
      isPasswordValid &&
      isEmailValid
    );
  }

  // Validation on input events
  usernameInput.addEventListener("input", function () {
    if (usernameInput.value.trim() === "") {
      usernameError.textContent = "Username is required.";
    } else {
      usernameError.textContent = "";
    }
    checkFormValidity();
  });

  passwordInput.addEventListener("input", function () {
    if (passwordInput.value.trim() === "") {
      passwordError.innerHTML = "Password is required.";
    } else if (!validatePassword(passwordInput.value)) {
      passwordError.innerHTML =
        "Include 8 characters Uppercase,<br> lowercase,  number, and special character";
    } else {
      passwordError.innerHTML = ""; // Clear error
    }
    checkFormValidity();
  });

  emailInput.addEventListener("input", function () {
    if (emailInput.value.trim() === "") {
      emailError.textContent = "Email is required.";
    } else if (!validateEmail(emailInput.value)) {
      emailError.textContent = "Enter a valid email address.";
    } else {
      emailError.textContent = "";
    }
    checkFormValidity();
  });

  // Prevent form submission if validations fail
  form.addEventListener("submit", function (e) {
    checkFormValidity(); // Ensure form is re-validated before submission
    if (submitButton.disabled) {
      e.preventDefault(); // Stop form submission if button is still disabled
    }
  });
});
