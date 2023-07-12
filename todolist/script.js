const inputBox = document.getElementById("input-box");
const listContainer = document.getElementById("list-container");

function addTask(){
    if(inputBox.value === ''){
        alert("You must enter something!");

    }else{
        let li = document.createElement("li");
        li.innerHTML = inputBox.value;
        listContainer.appendChild(li);
        let span = document.createElement("span");
        span.innerHTML = "\u00d7";
        li.appendChild(span);
    }
    inputBox.value = "";
    saveData();
}
listContainer.addEventListener("click", function(e){
    if(e.target.tagName === "LI"){
        e.target.classList.toggle("checked");
        saveData();
    } else if(e.target.tagName === "SPAN"){
        e.target.parentElement.remove();
        saveData();
    }
}, false);

function saveData(){
    localStorage.setItem("data", listContainer.innerHTML);
}
function showTask(){
    listContainer.innerHTML = localStorage.getItem("data");
}
showTask();

let todoBtn = document.querySelectorAll(".content-field li");
let todoApp = document.querySelector(".todo-app");
todoApp.style.display = "none";
console.log(todoApp);

todoBtn[0].addEventListener("click", function(){
    todoApp.style.display="inline-block";
    document.querySelector(".container").style.display="none";
    document.querySelector(".des-block").style.display="none";
    document.querySelector(".containert").style.display="none";
    

});