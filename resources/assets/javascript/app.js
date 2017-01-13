$(document).ready(function(){
    console.log("gg");
      $('.carousel.carousel-slider').carousel({full_width: true});

      $('.sidebar-nav > li.category').hover(
        function(){ $(this).removeClass('white-animals') },
        function(){ $(this).addClass('white-animals') }
      )

      $('.collapsible').collapsible();

      $('select').material_select();
    });