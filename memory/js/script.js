const squaresContainer = document.querySelector('#squares');
const SquareNum = 16;
let i = 0;
let square1, square2;
let clickCount = 0;

document.querySelector("#score").style.visbility = "hidden";
const playAgainBtn = document.querySelector('button');
playAgainBtn.style.visibility = "hidden";
playAgainBtn.addEventListener('click', playAgain)

let colors = [
    "#33ff33",
    "#33ff33",
    "#ff944d",
    "#ff944d",
    "#80ccff",
    "#80ccff",
    "#ffff66",
    "#ffff66",
    "#ff4dff",
    "#ff4dff",
    "#ff1a1a",
    "#ff1a1a",
    "#dddddd",
    "#dddddd",
    "#000099",
    "#000099",
];

function selectColor() {
    const random = Math.floor(Math.random() * colors.length)
    const selected = colors[random]
    colors.splice(random, 1)
    return selected;
}

while(i < SquareNum) {
    const square = document.createElement('li');
    const color = selectColor();
    square.setAttribute("data-color",color);
    squaresContainer.appendChild(square);

    i++;
}

const squares = document.querySelectorAll('li')
for(const square of squares) {
    square.addEventListener('click', squareClicked)
}

function squareClicked() {
    if (square1 == this) return;
    clickCount++;
    if (clickCount > 2) return;
    clickCount === 1 ? (square1 = this) : (square2 = this);
    if(clickCount === 1) {
        square1.style.background = square1.getAttribute("data-color");
    } else {
        square2.style.background = square2.getAttribute("data-color");
        checkMatch();
    }
}

function checkMatch() {
    let match =
        square1.getAttribute("data-color") === square2.getAttribute("data-color")
    if (!match) {
        noMatch();
    } else {
        isMatch();
    }
}

function noMatch() {
    square1.style.borderWidth = "1px";
    square2.style.borderWidth = "1px";
    square1.style.border = "solid #cc0000";
    square2.style.border = "solid #cc0000";
    setTimeout(function () {
        square1.style.borderWidth = "0px";
        square2.style.borderWidth = "0px";
        square1.style.background = "";
        square2.style.background = "";
        square1 = "";
        square2 = "";
    }, 500);
    clickCount = 0;
    console.log("NO");
}

function isMatch() {
    score++;
    document.querySelector("#score").innerText = score;
    document.querySelector("#score").style.visibility = "visible";
    square1.style.border = "solid #00cc00";
    square2.style.border = "solid #00cc00";
    square1.style.borderWidth = "2px";
    square2.style.borderWidth = "2px";
    square1.removeEventListener("click", squareClicked)
    square2.removeEventListener("click", squareClicked)
    clickCount = 0;
    console.log("yes");
}

function checkGameEnded() {
    const target = SquareNum / 2
    const gameOver = score === target ? true : false;
    if(gameOver) {
        playAgainBtn.style.visibility = "visible"
    }
}


function playAgain() {
    window.location.reload()
}