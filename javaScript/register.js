var x = document.getElementById("div1");
var y = document.getElementById("div2");
x.style.display = "none";
y.style.display = "none";

function client() {
    var x = document.getElementById("div1");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function customer() {
    var x = document.getElementById("div2");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}