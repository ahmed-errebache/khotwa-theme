$(document).ready(function() {
    const menuToggle = $('.menu-toggle');
    const closeMenu = $('#closeMenu');
    const navbarCollapse = $('.navbar-collapse');


    menuToggle.on('click', function(event) {
        event.stopPropagation();
        console.log("Menu burger cliqué");
        navbarCollapse.addClass('active'); 
    });


    closeMenu.on('click', function() {
        console.log("Bouton de fermeture cliqué");
        navbarCollapse.removeClass('active');
    });

    $(document).on('click', function(event) {
        if (
            !navbarCollapse.is(event.target) && 
            !menuToggle.is(event.target) &&  
            navbarCollapse.has(event.target).length === 0
        ) {
            console.log("Clic à l'extérieur détecté");
            navbarCollapse.removeClass('active');
        }
    });

    navbarCollapse.on('click', function(event) {
        event.stopPropagation();
    });
    

    // video modal
    $(document).on('click', '.video-trigger', function (e) {
        e.preventDefault();
        const videoURL = $(this).data('video-url');
        if (videoURL) {
          $('#globalVideoFrame').attr('src', videoURL + '?autoplay=1');
        }
      });

      $(document).on('click', '.play-icon', function (e) {
        e.preventDefault();
        const videoURL = $(this).data('video-url');
        if (videoURL) {
          $('#globalVideoFrame').attr('src', videoURL + '?autoplay=1');
        }
      });
    
      $('#videoModal').on('hidden.bs.modal', function () {
        $('#globalVideoFrame').attr('src', '');
      });


      // select language 
      const $toggle = $('.language-toggle');
      const $dropdown = $('.language-dropdown-list');
      const $wrapper = $('.language-dropdown-wrapper');

      // Toggle au clic
      $toggle.on('click', function (e) {
          e.stopPropagation();
          $dropdown.toggleClass('show');
      });

      // Hover pour desktop and click fallback for mobile
      if ('ontouchstart' in window || navigator.maxTouchPoints) {
          $wrapper.on('click', function (e) {
              e.stopPropagation();
              $dropdown.toggleClass('show');
          });
      } else {
          $wrapper.on('mouseenter', function () {
              $dropdown.addClass('show');
          });

          // $wrapper.on('mouseleave', function () {
          //     $dropdown.removeClass('show');
          // });
      }

      // Fermer au clic à l'extérieur
      $(document).on('click', function (e) {
          if (!$(e.target).closest('.language-dropdown-wrapper').length) {
              $dropdown.removeClass('show');
          }
      });

       // swiper
        new Swiper(".mySwiper", {
          loop: true,
          pagination: {
            el: ".swiper-pagination",
          },
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
        });

         new Swiper('.study-swiper', {
          slidesPerView: 1,
          spaceBetween: 10,
          pagination: {
              el: '.swiper-pagination',
              clickable: true,
          },
          breakpoints: {
              640: {
                  slidesPerView: 2,
                  spaceBetween: 10,
              },
              768: {
                  slidesPerView: 3,
                  spaceBetween: 70,
              },
              1280: {
                slidesPerView: 3,
                spaceBetween: 70,
              }
          },
      });
      
      // AOS (Animate On Scroll)
      AOS.init({
        once: true,          // L'animation ne se joue qu'une seule fois
        duration: 800,       // Durée de chaque animation (ms)
        easing: 'ease-out',  // Animation fluide
      });

      // FAQ accordion
      $('.faq_country-question').on('click', function() {
       var $item = $(this).closest('.faq_country-item');
       var $answer = $item.find('.faq_country-answer');
       var $toggle = $(this).find('.faq_country-toggle');
        
       // Fermer tous les autres
       $('.faq_country-answer').not($answer).slideUp();
       $('.faq_country-toggle').not($toggle).text('+').removeClass('minus').addClass('plus');
        
       // Toggle actuel
       if ($answer.is(':visible')) {
           $answer.slideUp();
           $toggle.text('+').removeClass('minus').addClass('plus');
       } else {
           $answer.slideDown();
           $toggle.text('−').removeClass('plus').addClass('minus');
       }
      });

    // slide page service
      new Swiper('.valeurs-swiper', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        speed: 800,              // durée de l’animation (ms)
        effect: 'fade',          // type d’effet
        fadeEffect: {
          crossFade: true        // permet un fondu croisé
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        pagination: {
          el: '.swiper-pagination', 
          clickable: true     
        },
        breakpoints: {
            768: {
                slidesPerView: 1,
                pagination : {
                    el: '.swiper-pagination',
                    clickable: true
                }
            }
        },
      });

      new Swiper('.bloc-differenciation-swiper', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        speed: 800,              // durée de l’animation (ms)
        effect: 'fade',          // type d’effet
        fadeEffect: {
          crossFade: true        // permet un fondu croisé
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        pagination: {
          el: '.swiper-pagination', 
          clickable: true     
        },
        breakpoints: {
            768: {
                slidesPerView: 1,
                pagination : {
                    el: '.swiper-pagination',
                    clickable: true
                }
            }
        },
      });


    //   new Swiper('.testimonial_service_slider', {
    //     // effect: 'coverflow',
    //     slidesPerView: 3,
    //     spaceBetween: 70,
    //     // coverflowEffect: {
    //     //   rotate: 0,
    //     //   stretch: -20,
    //     //   depth: 200,
    //     //   modifier: 1,
    //     //   slideShadows: false,
    //     // },
    //     slidesPerView: 'auto',      // largeur automatique selon le CSS
    //     centeredSlides: true,       // centre toujours le slide actif
    //     loop: true,
    //     autoplay: {
    //       delay: 5000,
    //       disableOnInteraction: false,
    //     },
    //     navigation: {
    //       nextEl: '.swiper-button-next',
    //       prevEl: '.swiper-button-prev',
    //     },
    //     pagination: {
    //       el: '.swiper-pagination',
    //       clickable: true,
    //     },
    //     // breakpoints: {
    //     //   576: {
    //     //     slidesPerView: 1,
    //     //   },
    //     //   768: {
    //     //     slidesPerView: 'auto',
    //     //   }
    //     // }
    //   });

    new Swiper(".testimonial_service_slider", {
        effect: 'coverflow',
        centeredSlides: true,    // ← important !
        coverflowEffect: {
          rotate: 0,
          stretch: -20,
          depth: 200,
          modifier: 1,
          slideShadows: false
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        loop: true,
        spaceBetween: 50,
        autoplay: {
          delay: 5000,
          disableOnInteraction: false
        },
        speed: 800,
        grabCursor: true,
        slidesPerView: 3,        // 3 slides (prev / active / next)
        breakpoints: {
          320:  { slidesPerView: 1, centeredSlides: true },
          576:  { slidesPerView: 1 },
          768:  { slidesPerView: 1 },
          992:  { slidesPerView: 3 }
        }
      });

    //  submenu mobile
    $('.navbar-menu').on('click', '.menu-item-has-children > a', function(e){
        e.preventDefault();
        var $item = $(this).parent();
    
        if (!$item.hasClass('open')) {
          // fermer les autres
          $item
            .siblings('.open')
            .removeClass('open')
            .children('.sub-menu')
            .slideUp(300);
          // ouvrir celui-ci
          $item
            .addClass('open')
            .children('.sub-menu')
            .slideDown(300);
        } else {
          // fermer si déjà ouvert
          $item
            .removeClass('open')
            .children('.sub-menu')
            .slideUp(300);
        }
      });
    
      
      
});
