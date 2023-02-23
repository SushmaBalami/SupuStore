var btn = document.getElementById("myBtn");


function show(pdid) {
    modal = document.getElementById(pdid);
    modal.style.display = "block";
}

function closeWindow(pdid) {
    modal = document.getElementById(pdid);
    modal.style.display = "none";
}

var span = document.getElementsByClassName("close")[0];
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}