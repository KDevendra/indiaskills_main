<style>
   @media only screen and (max-width: 570px){
   .ad-footer{
   display:flex;
   flex-direction:column;
   align-items:center;
   gap:1rem;
   }
   }
   #footer{
       background: #161616;
  padding:0;
  color: #fff;
  font-size: 14px;
   }
</style>
<footer id="footer">
   <div class="footer-top">
      <div class="container">
      </div>
   </div>
   <div class="container p-3">
      <div class="row row-sm">
         <div class="col-md-12 ad-footer d-flex justify-content-between align-items-center">
             <div>
                  <b><span class="text-center">Visitors :   <?php
                  $visitors = countVisitors();
                  $countVisitors = count($visitors);
                  $formattedNumber = str_pad($countVisitors, 6, "0", STR_PAD_LEFT);
                  echo $formattedNumber;
                  ?>
               </span></b>
             </div>
            <div class="credits">
               Copyright ©  <b>Vimarsh 2023</b> - Allright reserved <a href="#" target="_blank"></a> 
              
            </div>
            <!--<span class="fw-bold"><a href="https://icbappliedscience.com/" class="text-white" target="_blank">Designed and Developed by <span><img src="<?php echo base_url('');?>include/custom/img/icb_logo.png" style="height: 40px; border-radius: 30%; margin-left: 10px;" alt=""></span></a></span>-->
            <span class="fw-bold"><a href="https://icbappliedscience.com/" class="text-white" target="_blank">Designed and Developed by ICB</a></span>
    
         </div>
      </div>
   </div>
</footer>
<!-- End Footer -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<div id="preloader"></div>
<!--  JS Files -->
<script data-cfasync="false" src="<?php echo base_url('');?>include/custom/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="<?php echo base_url('');?>include/custom/_js/jquery.min.js"></script>
<script src="<?php echo base_url('');?>include/custom/_js/jquery.slim.min.js"></script>
<script src="<?php echo base_url('');?>include/custom/_js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('');?>include/custom/_js/purecounter_vanilla.js"></script>
<script src="<?php echo base_url('');?>include/custom/_js/aos.js"></script>
<script src="<?php echo base_url('');?>include/custom/_js/glightbox.min.js"></script>
<script src="<?php echo base_url('');?>include/custom/_js/swiper-bundle.min.js"></script>
<script src="<?php echo base_url('');?>include/custom/_js/main.js"></script>
<!-- Result Page JavaScript -->
<script>
   var swiper = new Swiper('.swiper', {
   
          pagination: '.swiper-pagination',
   
          slidesPerView: 'auto',
   
          paginationClickable: true,
   
          spaceBetween: 0,
   
          loop: true,
   
          navigation: {
   
          nextEl: ".swiper-button-next",
   
          prevEl: ".swiper-button-prev",
   
        },
   
          autoplay: {
   
          delay: 5000,
   
        },
   
          
   
      });
   
</script> 
<!-- <script>
   var swiper = new Swiper(".mySwiper", {
   
     slidesPerView: 1,
   
     spaceBetween: 0,
   
     loop: true,
   
     pagination: '.swiper-pagination',
   
       paginationClickable: true,
   
     navigation: {
   
       nextEl: ".swiper-button-next",
   
       prevEl: ".swiper-button-prev",
   
     },
   
   });
   
   </script> -->
</body>
</html>
<script>
   $('.data').hide()
   
   jQuery('button').on('click',function(){
   
     jQuery('.data').toggle();
   
   })
   
</script>
<script type="text/javascript">
   function show2()
   
   { 
   
       $('#div1').css('display', 'block');
   
   }
   
   
   
   
   
   
   jQuery(document).ready(function($) {
   
         $('.slider').slick({
   
           dots: true,
   
           infinite: true,
   
           speed: 500,
   
           slidesToShow: 3,
   
           slidesToScroll: 1,
   
           autoplay: true,
   
           autoplaySpeed: 2000,
   
           arrows: false,
   
           responsive: [{
   
             breakpoint: 600,
   
             settings: {
   
               slidesToShow: 2,
   
               slidesToScroll: 1
   
             }
   
           },
   
           {
   
              breakpoint: 400,
   
              settings: {
   
                 arrows: false,
   
                 slidesToShow: 1,
   
                 slidesToScroll: 1
   
              }
   
           }]
   
       });
   
   });
   
   
   
   jQuery(document).ready(function($) {
   
         $('.sliderIndex').slick({
   
           dots: false,
   
           infinite: true,
   
           speed: 500,
   
           slidesToShow: 3,
   
           slidesToScroll: 1,
   
           autoplay: true,
   
           autoplaySpeed: 2000,
   
           arrows: true,
   
   		prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-long-arrow-left' aria-hidden='true'></i></button>",
   
           nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-long-arrow-right' aria-hidden='true'></i></button>",
   
           responsive: [{
   
             breakpoint: 600,
   
             settings: {
   
               slidesToShow: 2,
   
               slidesToScroll: 1
   
             }
   
           },
   
           {
   
              breakpoint: 400,
   
              settings: {
   
                 arrows: false,
   
                 slidesToShow: 1,
   
                 slidesToScroll: 1
   
              }
   
           }]
   
       });
   
   });
   
   
   
   jQuery(document).ready(function($) {
   
         $('.ministryDetails').slick({
   
           dots: false,
   
           infinite: true,
   
           speed: 200,
   
           slidesToShow: 3,
   
           slidesToScroll: 1,
   
           autoplay: true,
   
           autoplaySpeed: 2000,
   
           arrows: true,
   
   		prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-long-arrow-left' aria-hidden='true'></i></button>",
   
           nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-long-arrow-right' aria-hidden='true'></i></button>",
   
           responsive: [{
   
             breakpoint: 600,
   
             settings: {
   
               slidesToShow: 2,
   
               slidesToScroll: 1
   
             }
   
           },
   
           {
   
              breakpoint: 400,
   
              settings: {
   
                 arrows: false,
   
                 slidesToShow: 1,
   
                 slidesToScroll: 1
   
              }
   
           }]
   
       });
   
   });
   
   
   
   jQuery(document).ready(function($) {
   
         $('.slider1').slick({
   
           dots: false,
   
           infinite: true,
   
           speed: 500,
   
           slidesToShow: 3,
   
           slidesToScroll: 1,
   
           autoplay: true,
   
           autoplaySpeed: 2000,
   
           arrows: true,
   
   		prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-long-arrow-left' aria-hidden='true'></i></button>",
   
           nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-long-arrow-right' aria-hidden='true'></i></button>",
   
           responsive: [{
   
             breakpoint: 600,
   
             settings: {
   
               slidesToShow: 2,
   
               slidesToScroll: 1
   
             }
   
           },
   
           {
   
              breakpoint: 400,
   
              settings: {
   
                 arrows: false,
   
                 slidesToShow: 1,
   
                 slidesToScroll: 1
   
              }
   
           }]
   
       });
   
   });
   
   
   
   jQuery(document).ready(function($) {
   
         $('.slider2').slick({
   
           dots: false,
   
           infinite: true,
   
           speed: 500,
   
           slidesToShow: 3,
   
           slidesToScroll: 1,
   
           autoplay: true,
   
           autoplaySpeed: 2000,
   
           arrows: false,
   
   		prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-long-arrow-left' aria-hidden='true'></i></button>",
   
           nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-long-arrow-right' aria-hidden='true'></i></button>",
   
           responsive: [{
   
             breakpoint: 600,
   
             settings: {
   
               slidesToShow: 2,
   
               slidesToScroll: 1
   
             }
   
           },
   
           {
   
              breakpoint: 400,
   
              settings: {
   
                 arrows: false,
   
                 slidesToShow: 1,
   
                 slidesToScroll: 1
   
              }
   
           }]
   
       });
   
   });
   
   
   
   jQuery(document).ready(function($) {
   
         $('.videoPrototypesSlide').slick({
   
           dots: true,
   
           infinite: true,
   
           speed: 500,
   
           slidesToShow: 3,
   
           slidesToScroll: 1,
   
           autoplay: true,
   
           autoplaySpeed: 2000,
   
           arrows: false,
   
   		prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-long-arrow-left' aria-hidden='true'></i></button>",
   
           nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-long-arrow-right' aria-hidden='true'></i></button>",
   
           responsive: [{
   
             breakpoint: 600,
   
             settings: {
   
               slidesToShow: 2,
   
               slidesToScroll: 1
   
             }
   
           },
   
           {
   
              breakpoint: 400,
   
              settings: {
   
                 arrows: false,
   
                 slidesToShow: 1,
   
                 slidesToScroll: 1
   
              }
   
           }]
   
       });
   
   });
   
   
   
           $(document).on("scroll", function(){
   
                   if
   
                 ($(document).scrollTop() > 86){
   
                     $("#banner").addClass("shrink");
   
                   }
   
                   else
   
                   {
   
                       $("#banner").removeClass("shrink");
   
                   }
   
               });
   
   
   
           var btn = $('#button');
   
   
   
   $(window).scroll(function() {
   
     if ($(window).scrollTop() > 300) {
   
       btn.addClass('show');
   
     } else {
   
       btn.removeClass('show');
   
     }
   
   });
   
   
   
   btn.on('click', function(e) {
   
     e.preventDefault();
   
     $('html, body').animate({scrollTop:0}, '300');
   
   });
   
   
   
   jQuery(document).ready(function($) {
   
         $('.twitterSlider').slick({
   
           dots: false,
   
           infinite: true,
   
           speed: 500,
   
           slidesToShow: 3,
   
           slidesToScroll: 1,
   
           autoplay: true,
   
           autoplaySpeed: 2000,
   
           arrows: true,
   
           prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-long-arrow-left' aria-hidden='true'></i></button>",
   
           nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-long-arrow-right' aria-hidden='true'></i></button>",
   
           responsive: [{
   
             breakpoint: 600,
   
             settings: {
   
               slidesToShow: 2,
   
               slidesToScroll: 1
   
             }
   
           },
   
           {
   
              breakpoint: 400,
   
              settings: {
   
                 arrows: false,
   
                 slidesToShow: 1,
   
                 slidesToScroll: 1
   
              }
   
           }]
   
       });
   
   });
   
   
   
   $(function () {
   
            $(".like").click(function () {
   
                var input = $(this).find('.qty1');
   
                input.val(parseInt(input.val())+ 1);
   
       
   
            });
   
        $(".dislike").click(function () {
   
            var input = $(this).find('.qty2');
   
            input.val(input.val() - 1);
   
        });
   
     });
   
     
   
     $('.autoplay').slick({
   
             slidesToShow: 3,
   
             infinite: true,
   
             slidesToScroll: 1,
   
             autoplay: true,
   
             autoplaySpeed: 2000,
   
              responsive: [
   
       {
   
         breakpoint: 1024,
   
         settings: {
   
           slidesToShow: 3,
   
           slidesToScroll: 3,
   
           infinite: true,
   
           dots: false
   
         }
   
       },
   
       {
   
         breakpoint: 600,
   
         settings: {
   
           slidesToShow: 2,
   
           slidesToScroll: 2
   
         }
   
       },
   
       {
   
         breakpoint: 480,
   
         settings: {
   
           slidesToShow: 1,
   
           slidesToScroll: 1
   
         }
   
       }
   
       // You can unslick at a given breakpoint now by adding:
   
       // settings: "unslick"
   
       // instead of a settings object
   
     ]
   
           });
   
   		
   
     $(document).ready(function() {
   
     $(".testimonial-carousel").slick({
   
       infinite: true,
   
       slidesToShow: 1,
   
       slidesToScroll: 1,
   
       autoplay: true,
   
       arrows: true,
   
       prevArrow: $(".testimonial-carousel-controls .prev"),
   
       nextArrow: $(".testimonial-carousel-controls .next")
   
     });
   
   });
   
   		
   
       
</script>
<!-- Result Page JavaScript -->
<script>
   $('.toggle').click(function() {
   
     $('#target').toggle('slow');
   
   });
   
   
   
   $('.toggle2').click(function() {
   
     $('#target2').toggle('slow');
   
   });
   
   
   
   $('.toggle3').click(function() {
   
     $('#target3').toggle('slow');
   
   });
   
   
   
   $('.toggle4').click(function() {
   
     $('#target4').toggle('slow');
   
   });
   
   
   
   $('.toggle5').click(function() {
   
     $('#target5').toggle('slow');
   
   });
   
   
   
   $('.toggle6').click(function() {
   
     $('#target6').toggle('slow');
   
   });
   
   
   
   $('.toggle7').click(function() {
   
     $('#target7').toggle('slow');
   
   });
   
   
   
   $('.toggle8').click(function() {
   
     $('#target8').toggle('slow');
   
   });
   
   
   
   $('.toggle9').click(function() {
   
     $('#target9').toggle('slow');
   
   });
   
   
   
   $('.toggle10').click(function() {
   
     $('#target10').toggle('slow');
   
   });
   
   
   
   $('.toggle11').click(function() {
   
     $('#target11').toggle('slow');
   
   });
   
</script>
<!-- Result Page JavaScript -->
</body>
</html><script>
   $('.data').hide()
   
   jQuery('button').on('click',function(){
   
     jQuery('.data').toggle();
   
   })
   
</script>
<!-- Result Page JavaScript -->
</body>
</html>