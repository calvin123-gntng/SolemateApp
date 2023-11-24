const pathName = window.location.pathname.substring(1);

// Navbar
const navbar = document.querySelector("#navbar");
const btnMenu = document.querySelector("#btn-menu");
const menu = document.querySelector(".menu");

document.addEventListener("scroll", () => {
    if (window.scrollY > 0) {
        navbar.classList.replace("relative", "sticky");
        navbar.classList.add("top-0");
    } else {
        navbar.classList.replace("sticky", "relative");
        navbar.classList.remove("top-0");
    }
});

const btnIncreaseQtyBuyer = document.querySelector(
    "#btn-increase-qty-buyer"
);
const btnDecreaseQtyBuyer = document.querySelector(
    "#btn-decrease-qty-buyer"
);
const qtyBuyer = document.querySelector("#qty-buyer");
let qty = 1;

function printQty(qtyBuyer, qty) {
    qtyBuyer.value = qty;
}

printQty(qtyBuyer, qty);

btnIncreaseQtyBuyer.addEventListener("click", function () {
    qty += 1;
    printQty(qtyBuyer, qty);
});

btnDecreaseQtyBuyer.addEventListener("click", function () {
    if (qty > 1) {
        qty -= 1;
    } else {
        qty = 1;
    }
    printQty(qtyBuyer, qty);
});

btnMenu.addEventListener("click", function () {
    menu.classList.toggle("show");
    menu.parentElement.classList.toggle("overflow-hidden");
});

// Buyer
// if (pathName == "buyer" || pathName == "cart") {
    // const btnIncreaseQtyBuyer = document.querySelector(
    //     "#btn-increase-qty-buyer"
    // );
    // const btnDecreaseQtyBuyer = document.querySelector(
    //     "#btn-decrease-qty-buyer"
    // );
    // const qtyBuyer = document.querySelector("#qty-buyer");
    // let qty = 1;

    // function printQty(qtyBuyer, qty) {
    //     qtyBuyer.value = qty;
    // }

    // printQty(qtyBuyer, qty);

    // btnIncreaseQtyBuyer.addEventListener("click", function () {
    //     qty += 1;
    //     printQty(qtyBuyer, qty);
    // });

    // btnDecreaseQtyBuyer.addEventListener("click", function () {
    //     if (qty > 1) {
    //         qty -= 1;
    //     } else {
    //         qty = 1;
    //     }
    //     printQty(qtyBuyer, qty);
    // });
// }

// form login or register
if (pathName == "login" || pathName == "register") {
    const btnShow = document.querySelector("#btn-show");
    const svgShow = document.querySelector("#svg-show");
    const svgHide = document.querySelector("#svg-hide");
    const inputPassword = document.querySelector("#login-password");

    function showHideSVG() {
        svgShow.classList.toggle("hidden");
        if (svgHide.classList.contains("hidden")) {
            svgHide.classList.remove("hidden");
        } else {
            svgHide.classList.toggle("hidden");
        }
    }

    function changeInputPassword() {
        if (inputPassword.type == "password") {
            inputPassword.type = "text";
        } else {
            inputPassword.type = "password";
        }
    }
    btnShow.addEventListener("click", showHideSVG);
    btnShow.addEventListener("click", changeInputPassword);
}
