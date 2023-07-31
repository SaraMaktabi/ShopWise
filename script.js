/*bouton de search*/
searchForm = document.querySelector('.search-form');
document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active');
}

/*bouton de log*/
let loginForm = document.querySelector('.login-form-container');
document.querySelector('#login-btn').onclick=()=>{
    loginForm.classList.toggle('active')
}

document.querySelector('#close-login-btn').onclick=()=>{
    loginForm.classList.remove('active')
}
/*responsive*/
window.onscroll=()=>{

    searchForm.classList.remove('active');

    if(window.scrollY > 80){
        document.querySelector('.header .header-2').classList.add('active');
    }else{
        document.querySelector('.header .header-2').classList.remove('active');
    }
}

window.onload=()=>{
    if(window.scrollY > 80){
        document.querySelector('.header .header-2').classList.add('active');
    }else{
        document.querySelector('.header .header-2').classList.remove('active');
    }
}

var swiper = new Swiper(".featured-slider",{
    spaceBetween: 10,
    loop:true,
    centeredSlides: true,
    autoplay: {
        delay:9500,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    breakpoints: {
        0:{
            slidesPerView: 1,
        },
        450:{
            slidesPerView: 2,
        },
        768:{
            slidesPerView: 3,
        },
        1024:{
            slidesPerView: 4,
        },
    },
});


var swiper = new Swiper(".arrivals-slider",{
    spaceBetween: 10,
    loop:true,
    centeredSlides: true,
    autoplay: {
        delay:9500,
        disableOnInteraction: false,
    },
    
    breakpoints: {
        0:{
            slidesPerView: 1,
        },
        
        768:{
            slidesPerView: 2,
        },
        1024:{
            slidesPerView: 3,
        },
    },
});


var swiper = new Swiper(".reviews-slider",{
    spaceBetween: 10,
    grabCursor: true,
    loop:true,
    centeredSlides: true,
    autoplay: {
        delay:9500,
        disableOnInteraction: false,
    },
    
    breakpoints: {
        0:{
            slidesPerView: 1,
        },
        
        768:{
            slidesPerView: 2,
        },
        1024:{
            slidesPerView: 3,
        },
    },
});


// Fonction de validation du formulaire

function validateForm() {
    // Clear previous error messages
    document.querySelectorAll(".error-message").forEach(element => element.innerHTML = "");
    // Validate Password and Confirm Password match
    const passwordInput = document.getElementById("password");
    const password2Input = document.getElementById("password2");
    const password2Error = document.getElementById("password2-error");
    if (passwordInput.value !== password2Input.value) {
        password2Error.innerHTML = "Passwords do not match.";
        return false;
    }
    // Validate other required fields
    const usernameInput = document.getElementById("username");
    const phoneInput = document.getElementById("phone");
    const emailInput = document.getElementById("email");
    let isValid = true;
    if (usernameInput.value.trim() === "") {
        document.getElementById("username-error").innerHTML = "Please enter your username.";
        isValid = false;
    }
    if (phoneInput.value.trim() === "") {
        document.getElementById("phone-error").innerHTML = "Please enter your phone number.";
        isValid = false;
    }
    if (emailInput.value.trim() === "") {
        document.getElementById("email-error").innerHTML = "Please enter your email.";
        isValid = false;
    }
    // Validate Password and Confirm Password are not empty
    if (passwordInput.value.trim() === "") {
        document.getElementById("password-error").innerHTML = "Please enter your password.";
        isValid = false;
    }
    if (password2Input.value.trim() === "") {
        document.getElementById("password2-error").innerHTML = "Please confirm your password.";
        isValid = false;
    }
    return isValid;
}








    

    





