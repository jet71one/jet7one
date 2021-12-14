$(function(){

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
})
    /*Fixed Header*/

   let nav = $("#nav");
   let navToggle = $("#navToggle");

   /*Nav Toggle*/

   navToggle.on("click", function(event) {
      event.preventDefault();
      nav.toggleClass("show");

  });

$('.select-guide').click(function(){
var el = $(this)
let id = $(this).data('id');

var url = "/add/guide/tocart";
   $.ajax({
       type: "POST",
       url: url,
       data: { 'product_id': id, 'qty': 1},
       success: function (data) {
               $('.guide_count').text(data['count']);
               el.toggleClass('guide-selected')
              // $.fancybox.open('<div class="message"><h4>Done!</h4></div>');

       },
       error: function (data) {
       console.log('Error:', data);
       }
   });
});


$(document).on("click",".removeGuide",function(e){
   var url = "/clear/remove/guide";
   let id = $(this).data('id');

   $.ajax({
       type: "POST",
       url: url,
       data: { 'id': id, 'qty': 1},
       success: function (data) {
               $('.guide_count').text(data['count']);
               location.reload();
       },
       error: function (data) {
       console.log('Error:', data);
       }
   });
});
  })
