document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector(".register");
    const messageSpan = document.getElementById("message");
    const fileInput = document.querySelector('input[type="file"]');

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        const nameInput = document.getElementById("name");
        const professionInput = document.getElementById("profession");
        const emailInput = document.getElementById("email");
        const passwordInput = document.getElementById("password");

        const name = nameInput.value.trim();
        const profession = professionInput.value.trim();
        const email = emailInput.value.trim();
        const password = passwordInput.value.trim();

        if (name === "" || profession === "" || email === "" || password === "") {
            messageSpan.textContent = "Please fill in all fields.";
            return;
        }
        // Walidacja adresu email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            messageSpan.textContent = "Please enter a valid email address.";
            return;
        }
        if (!fileInput.files || fileInput.files.length === 0) {
            messageSpan.textContent = "Please select a file.";
            return;
        }
        if (password.length < 6) {
            messageSpan.textContent = "Password must be at least 6 characters long.";
            return;
        }
        // Jeśli wszystkie pola są wypełnione, możesz wysłać formularz
        form.submit();
    });
});