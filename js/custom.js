// window.addEventListener("DOMContentLoaded", (event) =>{

//     var AdminLog = document.querySelector('Admin')[0];

//     if(AdminLog){
//         AdminLog.addEventListener('click', AdminEnable());
//         function AdminEnable(){
//             let Heading = document.getElementsByClassName('Heading');
//             Heading.innerHTML = "Admin Login";
//         }
//     }
//     else{
//         console.log("element not found");
//     }
// })

// const password = document.getElementById('password').value;
// const confirmPassword = document.getElementById('confirmPassword');

// confirmPassword.addEventListener('input', function() {validate();});


// function validate() {
//     if(password == confirmPassword.value){
//         console.log('password matches');
        
//     }
//     else{
//         console.log('passwords doesnt match');
//     }
// }


document.getElementById('signUp').addEventListener('input', function() {
    validateForm();
});

function validateForm() {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const errorElement = document.getElementById('noMatch');
    const submitCredentials = document.getElementById('submitCredentials')
    let isValid = true;


    if (password !== confirmPassword) {
        errorElement.innerHTML = 'confirmation password not matching';
        errorElement.classList.add('text-danger');
        submitCredentials.classList.add('disabled');
        isValid = false;
    } else {

        errorElement.innerHTML = '';
        submitCredentials.classList.remove('disabled');
    }
}