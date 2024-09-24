document.getElementById('registrationForm').onsubmit = function()
 {
    const emailPattern = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;
    const phonePattern = /^[0-9]{10}$/;
    const name = document.getElementsByName('name')[0].value;
    const email = document.getElementsByName('email')[0].value;
    const phone = document.getElementsByName('phone')[0].value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementByIsd('confirm_password').value;

    if (!emailPattern.test(email)) {
        alert('Please enter a valid email');
        e.preventDefault();
    }
    if (!phonePattern.test(phone)) {
        alert('Please enter a valid phone number');
        e.preventDefault();
    }
    if (password !== confirmPassword) {
        alert('Passwords do not match');
        e.preventDefault();
    }
};