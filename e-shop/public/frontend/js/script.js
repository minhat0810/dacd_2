let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .nav');
 console.log(navbar);
menu.onclick = () => {
    // menu.classList.toggle('fas-times');
    navbar.classList.toggle('active');
}

