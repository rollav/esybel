/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';


 // require jQuery normally
 const $ = require('jquery');
 

 // create global $ and jQuery variables
 global.$ = global.jQuery = $;
// model showing only once on landing page
 $(document).ready(function() {
    if (sessionStorage.getItem('#myModal') !== 'true') {
        $('#myModal').modal('show');
         $(".btn").click(function(){
                       $("#myModal").modal('hide');
                   });
        sessionStorage.setItem('#myModal','true');     
    }
});
import 'bootstrap';


require ('bootstrap/dist/js/bootstrap');
require ('bootstrap/dist/js/bootstrap');

// start the Stimulus application
import './bootstrap';
// You can specify which plugins you need
 require('bootstrap/js/dist/tooltip');
 require('bootstrap/js/dist/popover');
 require('bootstrap/js/dist/modal')
 require ('bootstrap/js/dist/carousel');
 require('bootstrap/js/dist/toast');
 require('bootstrap/js/dist/dom/event-handler');
 require('bootstrap/dist/js/bootstrap.bundle');
 require('jquery/dist/jquery.slim');
 require('@fortawesome/fontawesome-free/css/all.min.css');
 require('@fortawesome/fontawesome-free/js/all.js');


import '@fortawesome/fontawesome-free/js/fontawesome'
import '@fortawesome/fontawesome-free/js/solid'
import '@fortawesome/fontawesome-free/js/regular'
import '@fortawesome/fontawesome-free/js/brands'

  // preloader animation
  $(window).on('load', function() {
    if($('.cover').length){
        $('.cover').parallax({
            imageSrc: $('.cover').data('image'),
            zIndex: '1'
        });
    }

    $("#preloader").animate({
        'opacity': '0'
    }, 600, function(){
        setTimeout(function(){
            $("#preloader").css("visibility", "hidden").fadeOut();
        }, 300);
    });
}); 








   
      







