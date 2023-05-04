// Car year
function yearCheck() {
    var minYear = document.querySelector("#s-minyear").value;
    this.minYear = Number(minYear);
    var maxYear = document.querySelector("#s-maxyear").value;
    this.maxYear = Number(maxYear);

    if (minYear < 1899) {
        alert("Minimum year too small!");
        document.querySelector("#s-minyear").value = 1899;
    } else if (maxYear < 1899) {
        alert("Maximum year too small!");
        document.querySelector("#s-maxyear").value = 1899;
    } else if (minYear > 2024) {
        alert("Minimum year too large!");
        document.querySelector("#s-minyear").value = 2024;
    } else if (maxYear > 2024) {
        alert("Maximum year too large!");
        document.querySelector("#s-maxyear").value = 2024;
    } else if (minYear > maxYear) {
        alert("Minimum year is higher than maximum year!");
        document.querySelector("#s-minyear").value = maxYear;
    }
}

var ssubmit = document.getElementById("s-submit")

ssubmit.addEventListener('click', function(event) {
    yearCheck();
})