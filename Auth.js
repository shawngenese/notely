
const signInForm = document.querySelector("#signInForm");
const signUpForm = document.querySelector("#signUpForm");

const pathname = window.location.pathname;

if (pathname === '/login' || pathname === '/') {
    signInForm.classList.remove("hidden");
    signUpForm.classList.add("hidden");
} 
if (pathname === '/register') {
    signInForm.classList.add("hidden");
    signUpForm.classList.remove("hidden");
}

const loadingScreen = document.querySelector("#loadingScreen");

document.addEventListener("submit", () => {
    loadingScreen.classList.remove("hidden");
});

