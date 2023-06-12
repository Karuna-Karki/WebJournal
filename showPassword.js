const form = document.form[0];
form.addEventListener("submit", function(event){
    event.preventDefault();
});

const password = document.getElementById("password");
password.style.display = "none";
const nextBtn = document.getElementsByClassName("nextBtn");
console.log(nextBtn);

nextBtn.addEventListener("click", function(){
    password.style.display = "block";
    document.getElementsByClassName("journalname").style.display = "none";

});