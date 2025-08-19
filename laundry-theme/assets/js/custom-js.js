jQuery(document).ready(function($){
    /*----- menu icon toggle -----*/
   $(document).ready(function () {
  $("#menuBtn").click(function () {
    $("#navPhone").toggleClass("active");
    $("#openIcon").toggleClass("hidden");
    $("#closeIcon").toggleClass("hidden");
  });
});
});