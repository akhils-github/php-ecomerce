'use strict';



/**
 * navbar toggle
 */

const navbar = document.querySelector("[data-navbar]");
const navbarLinks = document.querySelectorAll("[data-nav-link]");
const menuToggleBtn = document.querySelector("[data-menu-toggle-btn]");

menuToggleBtn.addEventListener("click", function () {
  navbar.classList.toggle("active");
  this.classList.toggle("active");
});

for (let i = 0; i < navbarLinks.length; i++) {
  navbarLinks[i].addEventListener("click", function () {
    navbar.classList.toggle("active");
    menuToggleBtn.classList.toggle("active");
  });
}



/**
 * header sticky & back to top
 */

const header = document.querySelector("[data-header]");
const backTopBtn = document.querySelector("[data-back-top-btn]");

window.addEventListener("scroll", function () {
  if (window.scrollY >= 100) {
    header.classList.add("active");
    backTopBtn.classList.add("active");
  } else {
    header.classList.remove("active");
    backTopBtn.classList.remove("active");
  }
});



/**
 * search box toggle
 */

const searchBtn = document.querySelector("[data-search-btn]");
const searchContainer = document.querySelector("[data-search-container]");
const searchSubmitBtn = document.querySelector("[data-search-submit-btn]");
const searchCloseBtn = document.querySelector("[data-search-close-btn]");

const searchBoxElems = [searchBtn, searchSubmitBtn, searchCloseBtn];

for (let i = 0; i < searchBoxElems.length; i++) {
  searchBoxElems[i].addEventListener("click", function () {
    searchContainer.classList.toggle("active");
    document.body.classList.toggle("active");
  });
}



/**
 * move cycle on scroll
 */

const deliveryBoy = document.querySelector("[data-delivery-boy]");

let deliveryBoyMove = -80;
let lastScrollPos = 0;

window.addEventListener("scroll", function () {

  let deliveryBoyTopPos = deliveryBoy.getBoundingClientRect().top;

  if (deliveryBoyTopPos < 500 && deliveryBoyTopPos > -250) {
    let activeScrollPos = window.scrollY;

    if (lastScrollPos < activeScrollPos) {
      deliveryBoyMove += 1;
    } else {
      deliveryBoyMove -= 1;
    }

    lastScrollPos = activeScrollPos;
    deliveryBoy.style.transform = `translateX(${deliveryBoyMove}px)`;
  }

});

// Select the buttons by their class names
var buttonPlus = document.getElementsByClassName("qty-btn-plus");
var buttonMinus = document.getElementsByClassName("qty-btn-minus");

// Function to handle the increment of the quantity
function incrementPlus() {
    var qtyContainer = this.closest(".qty-container");
    var inputQty = qtyContainer.querySelector(".input-qty");
    inputQty.value = Number(inputQty.value) + 1;
}

// Function to handle the decrement of the quantity
function incrementMinus() {
    var qtyContainer = this.closest(".qty-container");
    var inputQty = qtyContainer.querySelector(".input-qty");
    var amount = Number(inputQty.value);
    if (amount > 0) {
        inputQty.value = amount - 1;
    }
}

// Attach event listeners to all buttons with class 'qty-btn-plus'
for (var i = 0; i < buttonPlus.length; i++) {
    buttonPlus[i].addEventListener('click', incrementPlus);
}

// Attach event listeners to all buttons with class 'qty-btn-minus'
for (var i = 0; i < buttonMinus.length; i++) {
    buttonMinus[i].addEventListener('click', incrementMinus);
}
