document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector(".login");
    const messageSpan = document.getElementById("message");

    form.addEventListener("submit", function(event) {
        event.preventDefault();

        const emailInput = document.getElementById("email");
        const passwordInput = document.getElementById("password");

        const email = emailInput.value.trim();
        const password = passwordInput.value.trim();

        if (email === "" || password === "") {
            messageSpan.textContent = "Please fill in all fields.";
            return;
        }

        // Walidacja adresu email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            messageSpan.textContent = "Please enter a valid email address.";
            return;
        }
        form.submit();
    });
});