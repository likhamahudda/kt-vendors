
// count-js


var counted = 0;
$(window).scroll(function() {

  var oTop = $('#counter').offset().top - window.innerHeight;
  if (counted == 0 && $(window).scrollTop() > oTop) {
    $('.count').each(function() {
      var $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },

        {

          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }

        });
    });
    counted = 1;
  }

});

// count-js-End


// social share

$(document).ready(function() {
  $('.social-share-icon').click(function() {
    $('.social-hidden-icon').toggleClass('toggled');
  });
});

$(document).ready(function() {
  $('.social-share-icon').click(function() {
    $('.grid-item').addClass('wbook-share');
  });
});

// end  social share  


// perfectScrollbar-js

 $(document).ready(function () {
        $('.ps').perfectScrollbar();
        $('.ps').perfectScrollbar('update');
    });

// end-// perfectScrollbar-js



// swiper-slider-js

 var mainslider = new Swiper('.mySwiper', {
      spaceBetween:50,
      autoplay: {
        delay: 9000,
        disableOnInteraction: false,
      },
       speed: 1000,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      loop: false,
      autoplay:false,
      
      thumbs: {
        swiper: sliderthumbs
      },
    });

    var mainslider = new Swiper('.mySwiperone', {
      spaceBetween: 0,
      autoplay: {
        delay: 9000,
        disableOnInteraction: false,
      },
       speed: 1000,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      pagination: {
        el: '.swiper-pagination',
        type: 'progressbar',
      },
      loop: false,
      autoplay:false,
      
      thumbs: {
        swiper: sliderthumbs
      }
    });
    

// SLIDER THUMBS
    var sliderthumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      centeredSlides: false,
      slidesPerView: 1,
      touchRatio: 0.2,
      slideToClickedSlide: true,
      loop: false,
      loopedSlides: 1,
      
      breakpoints: {
        1024: {
          slidesPerView: 1
        },
        768: {
          slidesPerView: 1
        },
        640: {
          slidesPerView: 1
        },
        320: {
          slidesPerView: 1
        }
      }
    });

// owl-carousal-js-Testimonials

 $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
    responsive:{
        0:{
            items:1,
            nav:false,
            dots:true,
        },
        600:{
            items:1,
            nav:false,
            dots:true,

        },
        1000:{
            items:1,
            nav:true,
            loop:false,
            dots:false,
        }
    }
})

// end-owl-carousal-js-Testimonials


// wow-js

if ($('.wow').length) {
            var wow = new WOW({
                boxClass: 'wow', // animated element css class (default is wow)
                animateClass: 'animated', // animation css class (default is animated)
                offset: 250, // distance to the element when triggering the animation (default is 0)
                mobile:false, // trigger animations on mobile devices (default is true)
                live: true // act on asynchronously loaded content (default is true)
            });
            wow.init();
        }

// end-wow-js

// tooltip-js

$(function () {
      $('[data-toggle="tooltip"]').tooltip();
    })

// end-tooltip


// dropify-js

$(document).ready(function(){
                // Basic
                $('.dropify').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove:  'Supprimer',
                        error:   'Désolé, le fichier trop volumineux'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element){
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });

// end-dropify-js


// multipal-image-upload

(function() {
  $(function() {
    return $('.file-upload__input').on('change', function() {
      return $('.file-upload__label').html([this.files.length, 'Files to upload'].join(' '));
    });
  });

}).call(this);



// end-multipal-image-upload


// image-module-open-js

function lightbox(idx) {
            //show the slider's wrapper: this is required when the transitionType has been set to "slide" in the ninja-slider.js
            var ninjaSldr = document.getElementById("ninja-slider");
            ninjaSldr.parentNode.style.display = "block";

            nslider.init(idx);

            var fsBtn = document.getElementById("fsBtn");
            fsBtn.click();
        }

        function fsIconClick(isFullscreen, ninjaSldr) { //fsIconClick is the default event handler of the fullscreen button
            if (isFullscreen) {
                ninjaSldr.parentNode.style.display = "none";
            }
        }

// end-image-module-open-js


// masonry-grid-js

$('.grid').masonry({
  // set itemSelector so .grid-sizer is not used in layout
  itemSelector: '.grid-item',
  // use element for option
  columnWidth: '.grid-sizer',
  percentPosition: true
})


// end-masonry-grid-js

