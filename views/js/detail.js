// $('.carousel.zoom').hover(function () {
//   $(this).carousel('pause')
// }, function () {
//   $(this).carousel('cycle')
// });
 $(".carousel.zoom").carousel({interval: 6000}).on("slide.bs.carousel", function (data) {
      var n = $(data.target).find(".item").length;
      var active = data.relatedTarget;
      if(active===undefined){
        active = $(data.target).find(".item.active");
      }else{
        active = $(data.relatedTarget);
      }
      console.log(active);
      $(data.target).find(".item.next").removeClass("next");
      var next = $(data.target).find(".item").eq(active.index()-n+1);
      next.addClass("next");
      $(data.target).find(".item.prev").removeClass("prev");
      var prev = $(data.target).find(".item").eq(active.index()-1);
      prev.addClass("prev");
    }).trigger("slide.bs.carousel");


    jQuery(document).bind('DOMSubtreeModified', function (){
        // jQuery('.active img.imagefield').each(function(){
            jQuery('.carousel-inner').each(function(){
              var height = jQuery(this).height();
              var width = jQuery(this).width();
              var ventana_ancho = jQuery(window).width();
              var ventana_alto = jQuery(window).height();
       
              if(ventana_ancho < ventana_alto){
                 if (width <= 1024 ){

            var new_height = width+(0.60*width); //nuevo tamaño
            jQuery(' img.imagefield').css( {

                // marginTop : '-'+margin+"px", marginBottom : '-'+margin+"px",
                // width : new_width+'px',
                height: new_height+'px',
                objectFit: 'cover'
                // display: 'inline-flex'
            } );
        }

              }else{
                   var new_height = width-(0.45*width); //nuevo tamaño
        
        if (height > new_height){

            jQuery(' img.imagefield').css( {

                // marginTop : '-'+margin+"px", marginBottom : '-'+margin+"px",
                // width : new_width+'px',
                height: new_height+'px',
                objectFit: 'cover'
                // display: 'inline-flex'
            } );

        }
       
              }

       
    });

});