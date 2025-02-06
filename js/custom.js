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


console.log("running");


document.getElementById('updatePass').addEventListener('input', function () {
    validateForm();
});

export function validateForm() {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const errorElement = document.getElementById('passwordError');
    let isValid = true;


    if (password !== confirmPassword) {
        console.log("dpmp");
        
        isValid = false;
    } else {
        
        console.log("dpmp");

    }
}