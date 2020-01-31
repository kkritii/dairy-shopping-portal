var loginButton = document.getElementById("loginButton");
var registerButton = document.getElementById("registerButton");
// console.log(loginButton);
loginButton.onclick = function () {
	document.querySelector("#flipper").classList.toggle("flip");
};
registerButton.onclick = function () {
	document.querySelector("#flipper").classList.toggle("flip");
};