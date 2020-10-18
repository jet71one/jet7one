$(function(){
    /*Fixed Header*/
  
   let nav = $("#nav");
   let navToggle = $("#navToggle");
   
   /*Nav Toggle*/
   
   navToggle.on("click", function(event) {
      event.preventDefault();
      nav.toggleClass("show");
      
  });
   
});