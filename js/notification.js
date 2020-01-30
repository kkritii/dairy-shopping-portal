function myFunction() {
    var notification = document.getElementById("notification-bar");
    console.log(notification);
    let closeBtn = document.getElementById("close");
    console.log(closeBtn);
    // bar.style.color="red";
    notification.classList.add("display-none");
}