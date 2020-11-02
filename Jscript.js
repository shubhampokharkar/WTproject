$('.Obtn').click(function(){
    $('.sidebar ul .Odbtn').toggleClass("show");
    $('.sidebar ul .first').toggleClass("rotate");
 });
 document.getElementById("mod").addEventListener("click",function()
 {
     document.getElementById("Modify").style.display="none";
     document.getElementById("details").style.display="block";
 });
