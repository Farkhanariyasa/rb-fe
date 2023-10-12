//elements
const btnToggler = window.document.querySelector(".navbar-toggler");
const inputSearch = window.document.querySelector(".navbar-search");
const iconSearch = window.document.querySelector("#icon-search");
const navbar = window.document.querySelector(".navbar");

const menuItem = window.document.querySelectorAll(".menu-item");
menuItem.forEach((item) => {
    item.addEventListener("click", () => {
        menuItem.forEach((item) => {
            item.classList.remove("active");
        });
        item.classList.add("active");
    });
});

// ketenagakerjaan
const openArrowKetenagakerjaan = window.document.querySelector(
    ".menu-wide.ketenagakerjaan .fa-chevron-right"
);
const closeArrowKetenagakerjaan = window.document.querySelector(
    ".menu-wide.ketenagakerjaan .fa-angle-down"
);
const submenuKetenagakerjaan = window.document.querySelector(
    ".submenu-list.ketenagakerjaan"
);
const menuwideKetenagakerjaan = window.document.querySelector(
    ".menu-wide.ketenagakerjaan"
);

console.log(openArrowKetenagakerjaan.parentElement);
console.log(menuwideKetenagakerjaan);

menuwideKetenagakerjaan.addEventListener("click", () => {
    submenuKetenagakerjaan.classList.toggle("active");
    openArrowKetenagakerjaan.classList.toggle("gas");
    closeArrowKetenagakerjaan.classList.toggle("active");
});

// kependudukan
const openArrowKependudukan = window.document.querySelector(
    ".menu-wide.kependudukan .fa-chevron-right"
);
const closeArrowKependudukan = window.document.querySelector(
    ".menu-wide.kependudukan .fa-angle-down"
);
const submenuKependudukan = window.document.querySelector(
    ".submenu-list.kependudukan"
);
const menuwideKependudukan = window.document.querySelector(
    ".menu-wide.kependudukan"
);

console.log(openArrowKependudukan.parentElement);
console.log(menuwideKependudukan);

menuwideKependudukan.addEventListener("click", () => {
    submenuKependudukan.classList.toggle("active");
    openArrowKependudukan.classList.toggle("gas");
    closeArrowKependudukan.classList.toggle("active");
});

const openArrowIPM = window.document.querySelector(
    ".menu-wide.ipm .fa-chevron-right"
);
const closeArrowIPM = window.document.querySelector(
    ".menu-wide.ipm .fa-angle-down"
);
const submenuIPM = window.document.querySelector(".submenu-list.ipm");
const menuwideIPM = window.document.querySelector(".menu-wide.ipm");

const openArrowKemiskinan = window.document.querySelector(
    ".menu-wide.kemiskinan .fa-chevron-right"
);
const closeArrowKemiskinan = window.document.querySelector(
    ".menu-wide.kemiskinan .fa-angle-down"
);
const submenuKemiskinan = window.document.querySelector(
    ".submenu-list.kemiskinan"
);
const menuwideKemiskinan = window.document.querySelector(
    ".menu-wide.kemiskinan"
);

const openArrowKetimpangan = window.document.querySelector(
    ".menu-wide.ketimpangan .fa-chevron-right"
);
const closeArrowKetimpangan = window.document.querySelector(
    ".menu-wide.ketimpangan .fa-angle-down"
);
const submenuKetimpangan = window.document.querySelector(
    ".submenu-list.ketimpangan"
);
const menuwideKetimpangan = window.document.querySelector(
    ".menu-wide.ketimpangan"
);

const openArrowPDRB = window.document.querySelector(
    ".menu-wide.pdrb .fa-chevron-right"
);
const closeArrowPDRB = window.document.querySelector(
    ".menu-wide.pdrb .fa-angle-down"
);
const submenuPDRB = window.document.querySelector(".submenu-list.pdrb");
const menuwidePDRB = window.document.querySelector(".menu-wide.pdrb");

const openArrowPenerimaan = window.document.querySelector(
    ".menu-wide.penerimaan .fa-chevron-right"
);
const closeArrowPenerimaan = window.document.querySelector(
    ".menu-wide.penerimaan .fa-angle-down"
);
const submenuPenerimaan = window.document.querySelector(
    ".submenu-list.penerimaan"
);
const menuwidePenerimaan = window.document.querySelector(
    ".menu-wide.penerimaan"
);

const openArrowProduksi = window.document.querySelector(
    ".menu-wide.produksi .fa-chevron-right"
);
const closeArrowProduksi = window.document.querySelector(
    ".menu-wide.produksi .fa-angle-down"
);
const submenuProduksi = window.document.querySelector(".submenu-list.produksi");
const menuwideProduksi = window.document.querySelector(".menu-wide.produksi");

menuwideIPM.addEventListener("click", () => {
    submenuIPM.classList.toggle("active");
    openArrowIPM.classList.toggle("gas");
    closeArrowIPM.classList.toggle("active");
});

menuwideKemiskinan.addEventListener("click", () => {
    submenuKemiskinan.classList.toggle("active");
    openArrowKemiskinan.classList.toggle("gas");
    closeArrowKemiskinan.classList.toggle("active");
});

menuwideKetimpangan.addEventListener("click", () => {
    submenuKetimpangan.classList.toggle("active");
    openArrowKetimpangan.classList.toggle("gas");
    closeArrowKetimpangan.classList.toggle("active");
});

menuwidePDRB.addEventListener("click", () => {
    submenuPDRB.classList.toggle("active");
    openArrowPDRB.classList.toggle("gas");
    closeArrowPDRB.classList.toggle("active");
});

menuwidePenerimaan.addEventListener("click", () => {
    submenuPenerimaan.classList.toggle("active");
    openArrowPenerimaan.classList.toggle("gas");
    closeArrowPenerimaan.classList.toggle("active");
});

menuwideProduksi.addEventListener("click", () => {
    submenuProduksi.classList.toggle("active");
    openArrowProduksi.classList.toggle("gas");
    closeArrowProduksi.classList.toggle("active");
});

btnToggler.addEventListener("click", () => {
    navbar.classList.toggle("active");
    if (submenuKetenagakerjaan.classList.contains("active")) {
    } else {
        openArrowKetenagakerjaan.classList.toggle("gas");
    }
    submenuKetenagakerjaan.classList.remove("active");
    closeArrowKetenagakerjaan.classList.remove("active");

    if (submenuKependudukan.classList.contains("active")) {
    } else {
        openArrowKependudukan.classList.toggle("gas");
    }
    submenuKependudukan.classList.remove("active");
    closeArrowKependudukan.classList.remove("active");

    if (submenuIPM.classList.contains("active")) {
    } else {
        openArrowIPM.classList.toggle("gas");
    }

    submenuIPM.classList.remove("active");
    closeArrowIPM.classList.remove("active");

    if (submenuKemiskinan.classList.contains("active")) {
    } else {
        openArrowKemiskinan.classList.toggle("gas");
    }
    submenuKemiskinan.classList.remove("active");
    closeArrowKemiskinan.classList.remove("active");

    if (submenuKetimpangan.classList.contains("active")) {
    } else {
        openArrowKetimpangan.classList.toggle("gas");
    }
    submenuKetimpangan.classList.remove("active");
    closeArrowKetimpangan.classList.remove("active");

    if (submenuPDRB.classList.contains("active")) {
    } else {
        openArrowPDRB.classList.toggle("gas");
    }
    submenuPDRB.classList.remove("active");
    closeArrowPDRB.classList.remove("active");

    if (submenuPenerimaan.classList.contains("active")) {
    } else {
        openArrowPenerimaan.classList.toggle("gas");
    }
    submenuPenerimaan.classList.remove("active");
    closeArrowPenerimaan.classList.remove("active");

    if (submenuProduksi.classList.contains("active")) {
    } else {
        openArrowProduksi.classList.toggle("gas");
    }
    submenuProduksi.classList.remove("active");
    closeArrowProduksi.classList.remove("active");
});
