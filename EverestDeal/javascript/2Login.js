const UserName = document.getElementsByClassName('Username');
const password = document.getElementsByClassName("Password");
const form = document.getElementById('form');
const errorElement = document.querySelector('.error');

form.addEventListener('submit',(e)=>
{
    let messages = [];
    if (password.value.length<=6)
    {
        messages.push("Password must be longer than 6 characters.")

    }

    if (password.value.length>=13)
    {
        messages.push("Password must be less than 12 characters")
    }

    if(password.value==='password')
    {
        messages.push('Password cant be password');
    }

    if (messages.length>0)
    {
        e.preventDefault()
        errorElement.innerText= messages.join(',')
    }
    
    // e.preventDefault()
});