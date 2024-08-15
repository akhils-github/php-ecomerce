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
    const passwordField = document.getElementById('password');
    const confirmPasswordField = document.getElementById('cppassword');
    const errorConfirmPassword = document.getElementById('error_confirm_password');

    function checkPasswords() {
        if (passwordField.value !== confirmPasswordField.value) {
            errorConfirmPassword.textContent = "Passwords do not match!";
            return false;
        } else {
            errorConfirmPassword.textContent = "";
            return true;
        }
    }

    // Check passwords on blur
    passwordField.addEventListener('blur', checkPasswords);
    confirmPasswordField.addEventListener('blur', checkPasswords);

    // Optionally, you can also validate on form submission
    const form = document.querySelector('.sign-up-container form');
    form.addEventListener('submit', function(event) {
        if (!checkPasswords()) {
            event.preventDefault(); // Prevent form submission if passwords do not match
        }
    });
});
