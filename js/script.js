// Created between June2021 - July2021
// * JAGADEESH KOPPULA (N170142)
// * ANAND PRASAD B (N170049)
// * UDAY KIRAN P (N170019)


//scroll sticky navbar
window.addEventListener("scroll",function(){
    var ele = document.querySelector("header");
    ele.classList.toggle("sticky",window.scrollY > 100);
})


//hamburger-menu toggling
const header = document.querySelector('#header');
const menu = document.querySelector('#menu');
const nav = document.querySelector('#nav');

document.onclick = function(e){
    if(e.target.id !== 'header' && e.target.id !== 'menu' && e.target.id !== 'nav'){
        menu.classList.remove('active');
        nav.classList.remove('active');
    }
}

menu.onclick = function(){
    menu.classList.toggle('active');
    nav.classList.toggle('active');
}        
