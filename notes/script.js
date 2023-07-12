const notesContainer = document.querySelector(".notes-container");
const createBtn = document.querySelector(".btn");
const dateTimeInput = document.getElementById('date-time-input').value;

let notes = document.querySelectorAll(".input-box");

function showNotes(){
    notesContainer.innerHTML = localStorage.getItem("notes");

}
showNotes();

function getDateTime() {
    var dateTimeInput = document.getElementById('date-time-input').value;
    console.log(dateTimeInput);
    // You can perform further processing with the selected date and time
  }
  

function updateStorage(){
    localStorage.setItem("notes", notesContainer.innerHTML);
}

createBtn.addEventListener("click", ()=>{
    let inputBox = document.createElement("textarea");
    let img = document.createElement("img");
    inputBox.className = "input-box";
    inputBox.setAttribute("name", "note_content");
    inputBox.setAttribute("contenteditable", "true");
    img.src = "../notes/images/delete.png";
    notesContainer.appendChild(inputBox).appendChild(img);

    console.log(Array.from(notesContainer.children).forEach(element => function(){
        console.log(element);
    }));


})

notesContainer.addEventListener("click", function(e){
    console.log(e.target.tagName);
    if(e.target.tagName === "IMG"){
        e.target.parentElement.remove();
        updateStorage();
    } else if(e.target.tagName === "textarea"){
        notes = document.querySelectorAll(".input-box");
        notes.forEach(nt => {
            nt.onkeyup = function(){
                updateStorage();
            }
        });
    }
});

let diaryBtn = document.querySelectorAll(".content-field li");
let diaryApp = document.querySelector(".container");
diaryApp.style.display = "none";
console.log(diaryApp);
diaryBtn[2].addEventListener("click", function(){
    diaryApp.style.display="inline-block";
    document.querySelector(".todo-app").style.display="none";
    document.querySelector(".des-block").style.display="none";
    document.querySelector(".containert").style.display="none";
});