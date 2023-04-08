let cursor = document.querySelector('.cursor');
let menuBtn = document.querySelector('#menu-btn');
let navbar = document.querySelector('.navbar');

window.onmousemove = (e) =>{
   cursor.style.top = e.pageY + 'px';
   cursor.style.left = e.pageX + 'px';
};

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
};

window.onscroll = () =>{
   navbar.classList.remove('active');
};