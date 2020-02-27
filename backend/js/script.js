$(document).ready(function() {
     //Loads initial index.html
     $("#content").load("./src/main.php");
     //handle menu click
     $(".nav__links").click(function() {
          //load content without refreshing
          var page = $(this).attr("href");
          $("#content").load("./src/" + page + ".php");
          return false;
     });
});
