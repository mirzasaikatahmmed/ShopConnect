document.getElementById("changePasswordForm").addEventListener("submit", function() 
{
    const newPassword = document.getElementById("new_password").value;
    const passwordRegex = /^(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

    if (!passwordRegex.test(newPassword)) {
        alert("New password must be strong.");
        e.preventDefault();
    }
});