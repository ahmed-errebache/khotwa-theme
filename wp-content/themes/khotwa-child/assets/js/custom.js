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

      // swwiper for blog page
      new Swiper('.main-swiper', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        }
    });
      
      // AOS (Animate On Scroll)
      AOS.init({
        once: true,          // L'animation ne se joue qu'une seule fois
        duration: 800,       // Durée de chaque animation (ms)
        easing: 'ease-out',  // Animation fluide
      });
});
