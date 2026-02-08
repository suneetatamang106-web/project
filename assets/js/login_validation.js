function validateLoginForm() {
    let form = document.forms["loginForm"];
    let email = form["email"].value.trim();
    let password = form["password"].value;
    let role = form["role"].value;

    // Email check
    if (email === "") {
        alert("❌ Please enter your email.");
        return false;
    }

    let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailPattern.test(email)) {
        alert("❌ Please enter a valid email address.");
        return false;
    }

    // Password check
    if (password === "") {
        alert("❌ Please enter your password.");
        return false;
    }

    // Role check
    if (role === "") {
        alert("❌ Please select your role.");
        return false;
    }

    return true; // all checks passed
}
