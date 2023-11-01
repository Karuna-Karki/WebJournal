// const markedDaysArr = [];

// function markCell(cell) {
//   cell.classList.toggle("clicked");
//   cell.innerHTML = cell.innerHTML.replace("&#10003;", "");
//   cell.removeAttribute("onclick");
//   const marked_day = Number(cell.innerHTML);
//   markedDaysArr.push(marked_day);
//   document.querySelector("#marked").setAttribute("value", markedDaysArr);
//   const tracker_form = document.forms[0];
//   // console.log(document.querySelector("#marked"));
//   // cell.setAttribute("name", "marked");
//   const markedValue = document.createElement("input");
//   markedValue.setAttribute("value", marked_day);
//   markedValue.setAttribute("type", "hidden");
//   markedValue.setAttribute("name", "marked");
//   cell.appendChild(markedValue);

//   const formData = new FormData(tracker_form);
//   // formData.append("markedDays", markedDaysArr);
//   // formData.append("text", "Hello");
//   // console.log(markedDaysArr);
//   const xhttp = new XMLHttpRequest();
//   xhttp.open("POST", "./track.php", true);
//   // xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//   xhttp.send(formData);
//   xhttp.onload = function () {
//     if (this.readyState === 4 && this.status === 200) {
//       // console.log(this.responseText);
//     }
//   }
// };


// let trackerBtn = document.querySelectorAll(".content-field li");
// let tApp = document.querySelector(".containert");
// tApp.style.display = "none";
// trackerBtn[1].addEventListener("click", function () {
//   tApp.style.display = "inline-block";
//   document.querySelector(".container").style.display = "none";
//   document.querySelector(".des-block").style.display = "none";
//   document.querySelector(".todo-app").style.display = "none";

// });

// const addButton = document.getElementById("add");
// const contentContainer = document.getElementById("contentContainer");
// const templateContainer = document.getElementById("templateContainer");

// addButton.addEventListener("click", function () {
//   const newContainer = templateContainer.cloneNode(true);
//   newContainer.querySelectorAll(".clicked").forEach(element => {
//     element.classList.remove("clicked");
//     element.removeChild(element.children[0]);
//     console.log(element.addEventListener("click", function(){
//       markCell(this);
//     }));
//   });
//   contentContainer.appendChild(newContainer);
// });

const markedDaysArr = [];

function markCell(cell) {
  const marked_day = Number(cell.textContent.trim());

  // Toggle the "clicked" class to mark/unmark the cell
  cell.classList.toggle("clicked");

  // Update the "markedDaysArr" based on the cell's state
  if (cell.classList.contains("clicked")) {
      markedDaysArr.push(marked_day);
  } else {
      const index = markedDaysArr.indexOf(marked_day);
      if (index !== -1) {
          markedDaysArr.splice(index, 1);
      }
  }

  // Update the "marked" input field
  document.querySelector("#marked").setAttribute("value", markedDaysArr);
}


// function markCell(cell) {
//   cell.classList.toggle("clicked");
//   cell.innerHTML = cell.innerHTML.replace("&#10003", "");
//   cell.removeAttribute("onclick");
//   const marked_day = Number(cell.innerHTML);
//   markedDaysArr.push(marked_day);
//   document.querySelector("#marked").setAttribute("value", markedDaysArr);
//   const tracker_form = document.forms[0];
//   console.log(document.querySelector("#marked"));
//   // cell.setAttribute("name", "marked");
//   const markedValue = document.createElement("input");
//   markedValue.setAttribute("value", marked_day);
//   markedValue.setAttribute("type", "hidden");
//   markedValue.setAttribute("name", "marked");
//   cell.appendChild(markedValue);

  
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
// };




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
 // Retrieve user data from local storage and populate the form fields
 const titleInput = document.getElementById("title");
//  const markedInput = document.getElementById("marked");

 titleInput.value = localStorage.getItem("userTitle") || "";
//  markedInput.value = localStorage.getItem("userMarked") || "";

 // Update local storage when input fields change
 titleInput.addEventListener("input", function() {
     localStorage.setItem("userTitle", titleInput.value);
 });

 document.addEventListener("DOMContentLoaded", function () {
  const startedDateInput = document.getElementById("d1");
  const endedDateInput = document.getElementById("d2");

  // Load the dates from local storage if they exist
  const storedStartedDate = localStorage.getItem("userStartedDate") || "";
  const storedEndedDate = localStorage.getItem("userEndedDate") || "";

  // Set the input values to the stored dates, if available
  if (storedStartedDate) {
      startedDateInput.value = storedStartedDate;
  }
  if (storedEndedDate) {
      endedDateInput.value = storedEndedDate;
  }

  // Add event listeners to save the dates to local storage when the inputs change
  startedDateInput.addEventListener("change", function () {
      localStorage.setItem("userStartedDate", startedDateInput.value);
  });

  endedDateInput.addEventListener("change", function () {
      localStorage.setItem("userEndedDate", endedDateInput.value);
  });
});


//  // Update local storage when the table is marked (You may need to adapt this part)
//  function markCell(cell) {
//      // Update your marking logic here

//      // Update the "marked" input field
//      markedInput.value = /* Updated marked data */

//      // Update local storage
//      localStorage.setItem("userMarked", markedInput.value);
//  }

 // Add more event listeners and logic as needed

 
 








