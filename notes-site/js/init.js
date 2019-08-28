$("document").ready(function(){

  var loader = " <div style='position:absolute;left:40%;top:50%' >" +
                  "<div class= 'preloader-wrapper big active ' >" +
                  "<div class='spinner-layer spinner-blue-only'>" +
                  "<div class='circle-clipper left'>"+
                      "<div class='circle'> </div>"+
                      "</div><div class='gap-patch'>"+
                      "<div class='circle'>  </div>"+
                    "</div><div class='circle-clipper right'>"+
             "<div class='circle'></div></div></div></div> </div>";

   menuButtonInit();


    $("#content").html(loader).load("load.php");

    $("#slide-out").on('click','.titles',function(){
           var title = $(this).data("title");
           loadContent(title);
          console.log(title);
    });

    //--------- menuButtonInit() --------------------------
    function menuButtonInit()
    {
      $(".button-collapse").sideNav();
      $(".button-collapse").show();
    }

    //--------- loadContent()-----------------------------
    function loadContent(note_title)
    {
      $('.button-collapse').sideNav('hide');

      $("#content").html(loader);

      $.ajax({
        url:"load.php",
        data:'title='+ note_title,
        type:"GET",
        success: function(data){
            $("#content").html(data);

        },
      });
    }


});
