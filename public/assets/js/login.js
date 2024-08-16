const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});


document.addEventListener('DOMContentLoaded', function() {
    const phoneField = document.getElementById('phone');
    const passwordField = document.getElementById('password');
    const confirmPasswordField = document.getElementById('cppassword');
    const errorConfirmPassword = document.getElementById('error_confirm_password');

    // Function to check passwords
    function checkPasswords() {
        if (passwordField.value !== confirmPasswordField.value) {
            errorConfirmPassword.textContent = "Passwords do not match!";
            return false;
        } else {
            errorConfirmPassword.textContent = "";
            return true;
        }
    }

    // Function to enforce 10-digit phone number
    function enforcePhoneLimit() {
        const maxDigits = 10;
        if (phoneField.value.length > maxDigits) {
            phoneField.value = phoneField.value.slice(0, maxDigits);
        }
    }

    // Check passwords on blur
    passwordField.addEventListener('blur', checkPasswords);
    confirmPasswordField.addEventListener('blur', checkPasswords);

    // Enforce phone number length on input
    phoneField.addEventListener('input', enforcePhoneLimit);

    // Optionally, validate passwords on form submission
    const form = document.querySelector('.sign-up-container form');
    form.addEventListener('submit', function(event) {
        if (!checkPasswords()) {
            event.preventDefault(); // Prevent form submission if passwords do not match
        }
    });
});
