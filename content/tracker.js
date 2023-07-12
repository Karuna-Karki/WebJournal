function markCell(cell) {
    cell.classList.toggle("clicked");
    // var tick = cell.innerHTML.includes("&#10003;") ? "" : "&#10003;";
    cell.innerHTML = cell.innerHTML.replace("&#10003;", "");
    cell.removeAttribute("onclick");
}

let trackerBtn = document.querySelectorAll(".content-field li");
let tApp = document.querySelector(".containert");
tApp.style.display = "none";

console.log(tApp);
trackerBtn[1].addEventListener("click", function(){
    tApp.style.display="inline-block";
    document.querySelector(".container").style.display="none";
    document.querySelector(".des-block").style.display="none";
    document.querySelector(".todo-app").style.display="none";
});



