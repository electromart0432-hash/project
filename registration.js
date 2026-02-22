document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("registerForm");

    const fullname = document.getElementById("fullname");
    const email = document.getElementById("email");
    const phone = document.getElementById("phone");
    const address = document.getElementById("address");
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirm-password");
    const terms = document.getElementById("terms");

    form.addEventListener("submit", function (e) {

        let isValid = true;

        // Clear old errors
        document.querySelectorAll(".error-message").forEach(el => el.innerText = "");

        /* ---------- Fullname ---------- */
        if (fullname.value.trim().length < 3) {
            document.getElementById("fullname-error").innerText =
                "Name must be at least 3 characters";
            isValid = false;
        }

        /* ---------- Email ---------- */
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email.value.trim())) {
            document.getElementById("email-error").innerText =
                "Enter a valid email address";
            isValid = false;
        }

        /* ---------- Phone ---------- */
        const phonePattern = /^[0-9]{10}$/;
        if (!phonePattern.test(phone.value.trim())) {
            document.getElementById("phone-error").innerText =
                "Enter valid 10 digit phone number";
            isValid = false;
        }

        /* ---------- Address ---------- */
        if (address.value.trim().length < 10) {
            document.getElementById("address-error").innerText =
                "Please enter complete address";
            isValid = false;
        }

        /* ---------- Password ---------- */
        if (password.value.length < 6) {
            document.getElementById("password-error").innerText =
                "Password must be at least 6 characters";
            isValid = false;
        }

        /* ---------- Confirm Password ---------- */
        if (password.value !== confirmPassword.value) {
            document.getElementById("confirm-password-error").innerText =
                "Passwords do not match";
            isValid = false;
        }

        /* ---------- Terms ---------- */
        if (!terms.checked) {
            document.getElementById("terms-error").innerText =
                "You must agree to terms & conditions";
            isValid = false;
        }

        // ❌ Agar validation fail → form stop
        if (!isValid) {
            e.preventDefault();
            return false;
        }

        // ✅ Validation pass → PHP ko submit hone do
        return true;
    });

});