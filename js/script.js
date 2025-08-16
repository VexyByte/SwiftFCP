// index Page Script For login And Register
const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.icon-close');
const btn = document.getElementById('fullscreenBtn');


registerLink.addEventListener('click', ()=> {
    wrapper.classList.add('active');
});

document.addEventListener('DOMContentLoaded', () => {
wrapper.classList.add('active-popup');
});

document.addEventListener('load', () => {
    const isFullscreen = localStorage.getItem('fullscreen') === 'true';
    if (isFullscreen) {
        document.documentElement.requestFullscreen();
    } else {
        if (document.fullscreenElement) {
            document.exitFullscreen();
        }
    }
});

loginLink.addEventListener('click', ()=> {
    wrapper.classList.remove('active');
});

btnPopup.addEventListener('click', ()=> {
    wrapper.classList.add('active-popup');
});

iconClose.addEventListener('click', ()=> {
    wrapper.classList.remove('active-popup');
});

function toggleFullScreen() {
     if (!document.fullscreenElement) {
        localStorage.setItem('fullscreen', 'true');
        document.documentElement.requestFullscreen();
         
     } else {
        if (document.exitFullscreen) {
            localStorage.setItem('fullscreen', 'false');
            document.exitFullscreen();
         }
     }
}
//End Of Index Page Script
