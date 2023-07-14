const markedDaysArr = [];

function markCell(cell) {
    cell.classList.toggle("clicked");
    cell.innerHTML = cell.innerHTML.replace("&#10003;", "");
    cell.removeAttribute("onclick");
    const marked_day = Number(cell.innerHTML);
    markedDaysArr.push(marked_day);
    document.querySelector("#marked").setAttribute("value", markedDaysArr);

    console.log(document.querySelector("#marked"));
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



