//get odal element
var modal1 = document.getElementById("simpleModal");
//get modal button
var modalBtn = document.getElementById("modalBtn");
//get close button
var closeBtn1 = document.getElementsByClassName("closeBtn1")[0];
//for open click
modalBtn.addEventListener("click", openModal1);
//for close click
closeBtn1.addEventListener("click", closeModal1);
///for outside click
window.addEventListener("click", outsideClick);
//function to open modal
function openModal1() {
     modal.style.display = "block";
}

//function to close modal
function closeModal() {
     modal.style.display = "none";
}
//function to close modal if outside click
function outsideClick(e) {
     if (e.target == modal) {
          modal.style.display = "none";
     }
}
