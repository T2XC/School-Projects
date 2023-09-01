/* Sets the width of the side navigation to 250px when opening */
function openNav() {
    document.getElementById("mySidenav").style.width = "100vw";
}

/* Sets the width of the side navigation to 0 when closing */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

function pw() {
    document.querySelector(".productimg").src = "../img/shirtwhite.png";
}

function pb() {
    document.querySelector(".productimg").src = "../img/shirtblack.png";
}

function ps() {
    document.querySelector(".productimg").src = "../img/shirts.png";
}