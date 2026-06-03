function passwordVisibility() 
{
    const passwordInput = document.getElementById('passkey');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
    } else {
        passwordInput.type = 'password';
    }
}

function confirmPasswordVisibility() 
{
    const cPasswordInput = document.getElementById('confirmpassword');

    if (cPasswordInput.type === 'password') {
        cPasswordInput.type = 'text';
    } else {
        cPasswordInput.type = 'password';
    }
}
function passwordVisibilitylogin()
 {
    const passwordInput = document.getElementById('password');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
    } else {
        passwordInput.type = 'password';
    }
}