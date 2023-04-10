// add class for active sidebar
$(document).ready(function() {
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
    });

});
// image hide and show
$(".ctm-hamer").click(function() {
    $(".hover-none-icon").toggleClass("show-icon");
    $("#img-show").toggleClass("show-icon-img");
});
// dropsown admin
$(document).ready(function() {
    $(".custom-btn").click(function() {
        $(this).toggleClass("active");
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    });
    $("#drop-m").click(function () {
        $(".dropdownmenu").toggleClass("show");
        // $("body").toggleClass("overflow-hidden");
        // $("main").toggleClass("position-relative");
        // $(".overlayer").toggleClass("d-block");
    });
    

       
});

function openNav() {
    document.getElementById("mySidenav").style.width = "30rem";
    // document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
  }
  
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    // document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
  }









feather.replace()