// console.log("Its Working");
$(document).ready(function () {
    //Loads initial index.html
    // console.log("asdhjf");
    $("#content").load("./src/main.html");
    //handle menu click
    $(".nav__links").click(function () {
        //load content without refreshing
        var page = $(this).attr("href");
        $("#content").load("../src/" + page + ".html");

        return false;
    });
});