// External JS validation
function validateForm() {
    let form = document.forms["registerForm"];
    let username = form["username"].value.trim();
    let email = form["email"].value.trim();
    let role = form["role"].value;
    let password = form["password"].value;
    let confirm = form["confirm_password"].value;

    // Username check
    if (username.length < 3) {
        alert("❌ Username must be at least 3 characters long.");
        return false;
    }

    // Email regex
    let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailPattern.test(email)) {
        alert("❌ Please enter a valid email address.");
        return false;
    }

    // Role check
    if (role === "") {
        alert("❌ Please select a role.");
        return false;
    }

    // Password check
    if (password.length < 6) {
        alert("❌ Password must be at least 6 characters long.");
        return false;
    }

    // Confirm password
    if (password !== confirm) {
        alert("❌ Passwords do not match.");
        return false;
    }

    return true; // Submit form if all validations pass
}
