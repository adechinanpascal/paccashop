// 
const bar = document.getElementById('bar');
const close = document.getElementById('close');
const nav = document.getElementById('navbar');

if (bar) {
    bar.addEventListener('click', () => {
        nav.classList.add('active');
    })
}

if (close) {
    close.addEventListener('click', () => {
        nav.classList.remove('active');
    })
}



// Script for navigation bar






// Dynamique sur le dashborad admin (option active à la selection)

let list = document.querySelectorAll(".navigation li");

function activeLink() {
    list.forEach((item) => {
        item.classList.remove("hovered");
    })
    this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));



// Menu toggle

let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");


toggle.onclick = function () {
    navigation.classList.toggle("active");
    main.classList.toggle("active")
}