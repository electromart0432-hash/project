document.addEventListener('DOMContentLoaded', function () {

    const loginForm = document.getElementById('loginForm');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const rememberMe = document.getElementById('rememberMe');
    const togglePassword = document.getElementById('togglePassword');

    const errorMessage = document.getElementById('errorMessage');
    const successMessage = document.getElementById('successMessage');

    /* ------------------------
       Password show / hide
    -------------------------*/
    if (togglePassword) {
        togglePassword.addEventListener('click', () => {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                togglePassword.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                togglePassword.textContent = '👁️';
            }
        });
    }

    /* ------------------------
       Remember Me (email only)
    -------------------------*/
    const savedEmail = localStorage.getItem('rememberEmail');
    if (savedEmail) {
        emailInput.value = savedEmail;
        rememberMe.checked = true;
    }

    /* ------------------------
       Form Submit
       (PHP handle karega)
    -------------------------*/
    loginForm.addEventListener('submit', function () {

        // Messages reset
        errorMessage.style.display = 'none';
        successMessage.style.display = 'none';

        // Basic validation
        if (emailInput.value.trim() === '' || passwordInput.value.trim() === '') {
            errorMessage.innerText = 'Please enter email and password';
            errorMessage.style.display = 'block';
            return false; // submit stop
        }

        // Remember email
        if (rememberMe.checked) {
            localStorage.setItem('rememberEmail', emailInput.value.trim());
        } else {
            localStorage.removeItem('rememberEmail');
        }

        // Button disable (double click avoid)
        const btn = document.querySelector('.login-btn');
        btn.disabled = true;
        btn.innerText = 'Logging in...';

        // IMPORTANT: form PHP ko submit hone do
        return true;
    });

});