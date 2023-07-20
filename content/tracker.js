const markedDaysArr = [];

function markCell(cell) {
  cell.classList.toggle("clicked");
  cell.innerHTML = cell.innerHTML.replace("&#10003;", "");
  cell.removeAttribute("onclick");
  const marked_day = Number(cell.innerHTML);
  markedDaysArr.push(marked_day);
  document.querySelector("#marked").setAttribute("value", markedDaysArr);
  const tracker_form = document.forms[0];
  console.log(document.querySelector("#marked"));
  // cell.setAttribute("name", "marked");
  const markedValue = document.createElement("input");
  markedValue.setAttribute("value", marked_day);
  markedValue.setAttribute("type", "hidden");
  markedValue.setAttribute("name", "marked");
  cell.appendChild(markedValue);

  const formData = new FormData(tracker_form);
  // formData.append("markedDays", markedDaysArr);
  // formData.append("text", "Hello");
  // console.log(markedDaysArr);
  const xhttp = new XMLHttpRequest();
  xhttp.open("POST", "./track.php", true);
  // xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhttp.send(formData);
  xhttp.onload = function () {
    if (this.readyState === 4 && this.status === 200) {
      console.log(this.responseText);
    }
  }
};


let trackerBtn = document.querySelectorAll(".content-field li");
let tApp = document.querySelector(".containert");
tApp.style.display = "none";

console.log(tApp);
trackerBtn[1].addEventListener("click", function () {
  tApp.style.display = "inline-block";
  document.querySelector(".container").style.display = "none";
  document.querySelector(".des-block").style.display = "none";
  document.querySelector(".todo-app").style.display = "none";

});

const addButton = document.getElementById("add");
const contentContainer = document.getElementById("contentContainer");
const templateContainer = document.getElementById("templateContainer");

addButton.addEventListener("click", function () {
  const newContainer = templateContainer.cloneNode(true);
  contentContainer.appendChild(newContainer);
});


