//elements
const btnToggler = window.document.querySelector(".navbar-toggler");
const inputSearch = window.document.querySelector(".navbar-search");
const iconSearch = window.document.querySelector("#icon-search");
const navbar = window.document.querySelector(".navbar");

//events
btnToggler.addEventListener("click", () => {
    navbar.classList.toggle("active");
});

// inputSearch.addEventListener('click', () => {
//     if(!navbar.classList.contains("active")) {
//         navbar.classList.add('active');
//     }
// });

// iconSearch.addEventListener('click', () => {
//     if(!navbar.classList.contains("active")) {
//         navbar.classList.add('active');
//     }
// });

// if menu list actif, color white
const menuItem = window.document.querySelectorAll(".menu-item");
menuItem.forEach((item) => {
    item.addEventListener("click", () => {
        menuItem.forEach((item) => {
            item.classList.remove("active");
        });
        item.classList.add("active");
    });
});

// navbar hover add toogle active
const navbars = window.document.querySelectorAll(".navbar");
navbars.forEach((item) => {
    item.addEventListener("mouseover", () => {
        item.classList.add("active");
    });
    item.addEventListener("mouseout", () => {
        item.classList.remove("active");
    });
});
