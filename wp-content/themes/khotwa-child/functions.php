<?php
// Charger les styles parent + enfant proprement
add_action('wp_enqueue_scripts', 'khotwa_enqueue_styles');
function khotwa_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', ['parent-style']);
}


// Charger les assets (CSS/JS externes + locaux)
add_action('wp_enqueue_scripts', 'khotwa_child_enqueue_assets', 20); // priorité après les styles parent/enfant
function khotwa_child_enqueue_assets() {
    $is_rtl = is_rtl();

    if ($is_rtl) {
        wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css');
    } else {
        wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
    }

    wp_enqueue_style('fonts-style-child', get_stylesheet_directory_uri() . '/assets/fonts/stylesheet.css', [], null);
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css', [], '1.10.5');
    wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/assets/css/custom.css', ['child-style', 'bootstrap-css'], null);
    wp_enqueue_style('responsive-style', get_stylesheet_directory_uri() . '/assets/css/responsive.css', ['custom-style'], null);

    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', [], null, true);
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], null, true);
    wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/assets/js/custom.js', ['swiper-js'], null, true);
}


function formatted_date_localized($datetime_str = '', $locale = '') {
    // Si pas de date, prend la date actuelle
    $date = empty($datetime_str) ? new DateTime() : new DateTime($datetime_str);

    // Détection automatique de la locale si non fournie
    if (empty($locale)) {
        $locale = get_locale(); // ex: fr_FR, en_US, ar
    }

    // Forcer les chiffres latins même pour l'arabe
    if (str_starts_with($locale, 'ar')) {
        $locale .= '@numbers=latn'; // force les chiffres latins
    }

    $formatter = new IntlDateFormatter(
        $locale,
        IntlDateFormatter::LONG,
        IntlDateFormatter::SHORT,
        get_option('timezone_string') ?: 'UTC',
        IntlDateFormatter::GREGORIAN,
        "MMMM d, yyyy, h:mm a"
    );

    return $formatter->format($date);
}

function enqueue_swiper_assets() {
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], null, true);

    $inline_js = <<<JS
    document.addEventListener('DOMContentLoaded', function () {
        // Slider principal
        new Swiper('.main-swiper', {
            loop: true,
            effect: 'fade',
            fadeEffect: { crossFade: true },
            pagination: { el: '.swiper-pagination', clickable: true },
            autoplay: { delay: 5000, disableOnInteraction: false }
        });

        // Derniers articles
        new Swiper('.latest-swiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            navigation: {
                nextEl: '.latest-swiper .swiper-button-next',
                prevEl: '.latest-swiper .swiper-button-prev'
            },
            breakpoints: {
                0: { slidesPerView: 2, spaceBetween: 10 },
                576: { slidesPerView: 2, spaceBetween: 10 },
                768: { slidesPerView: 3, spaceBetween: 10 },
                992: { slidesPerView: 4, spaceBetween: 20 }
            },
            grabCursor: true,
            loop: true,
            autoplay: { delay: 10000, disableOnInteraction: false }
        });

        new Swiper('.swiper-country-1', {
            slidesPerView: 1,
            spaceBetween: 20,
            autoHeight: true,
            navigation: {
            nextEl: '.swiper-country-1 .swiper-button-next',
            prevEl: '.swiper-country-1 .swiper-button-prev'
            },
            breakpoints: {
            0: { slidesPerView: 1.4, spaceBetween: 30 },
            576: { slidesPerView: 1.4, spaceBetween: 30 },
            768: { slidesPerView: 1.4, spaceBetween: 30 },
            992: { slidesPerView: 3, spaceBetween: 30 }
            },
            grabCursor: true,
            loop: true,
            autoplay: { delay: 10000, disableOnInteraction: false }
        });

        new Swiper('.swiper-country-2', {
            slidesPerView: 1,
            spaceBetween: 20,
            autoHeight: true,
            navigation: {
            nextEl: '.swiper-country-2 .swiper-button-next',
            prevEl: '.swiper-country-2 .swiper-button-prev'
            },
            breakpoints: {
            0: { slidesPerView: 1.4, spaceBetween: 30 },
            576: { slidesPerView: 1.4, spaceBetween: 30 },
            768: { slidesPerView: 1.4, spaceBetween: 30 },
            992: { slidesPerView: 3, spaceBetween: 30 }
            },
            grabCursor: true,
            loop: true,
            autoplay: { delay: 10000, disableOnInteraction: false }
        });

        new Swiper('.swiper-country-3', {
            slidesPerView: 1,
            spaceBetween: 20,
            autoHeight: true,
            navigation: {
            nextEl: '.swiper-country-3 .swiper-button-next',
            prevEl: '.swiper-country-3 .swiper-button-prev'
            },
            breakpoints: {
            0: { slidesPerView: 1.4, spaceBetween: 30 },
            576: { slidesPerView: 1.4, spaceBetween: 30 },
            768: { slidesPerView: 1.4, spaceBetween: 30 },
            992: { slidesPerView: 3, spaceBetween: 30 }
            },
            grabCursor: true,
            loop: true,
            autoplay: { delay: 10000, disableOnInteraction: false }
        });

        new Swiper('.swiper-country-4', {
            slidesPerView: 1,
            spaceBetween: 20,
            autoHeight: true,
            navigation: {
            nextEl: '.swiper-country-4 .swiper-button-next',
            prevEl: '.swiper-country-4 .swiper-button-prev'
            },
            breakpoints: {
            0: { slidesPerView: 1.4, spaceBetween: 30 },
            576: { slidesPerView: 1.4, spaceBetween: 30 },
            768: { slidesPerView: 1.4, spaceBetween: 30 },
            992: { slidesPerView: 3, spaceBetween: 30 }
            },
            grabCursor: true,
            loop: true,
            autoplay: { delay: 10000, disableOnInteraction: false }
        });

        new Swiper('.swiper-country-5', {
            slidesPerView: 1,
            spaceBetween: 20,
            autoHeight: true,
            navigation: {
            nextEl: '.swiper-country-5 .swiper-button-next',
            prevEl: '.swiper-country-5 .swiper-button-prev'
            },
            breakpoints: {
            0: { slidesPerView: 1.4, spaceBetween: 30 },
            576: { slidesPerView: 1.4, spaceBetween: 30 },
            768: { slidesPerView: 1.4, spaceBetween: 30 },
            992: { slidesPerView: 3, spaceBetween: 30 }
            },
            grabCursor: true,
            loop: true,
            autoplay: { delay: 10000, disableOnInteraction: false }
        });

        new Swiper('.swiper-country-6', {
            slidesPerView: 1,
            spaceBetween: 20,
            autoHeight: true,
            navigation: {
            nextEl: '.swiper-country-6 .swiper-button-next',
            prevEl: '.swiper-country-6 .swiper-button-prev'
            },
            breakpoints: {
            0: { slidesPerView: 1.4, spaceBetween: 30 },
            576: { slidesPerView: 1.4, spaceBetween: 30 },
            768: { slidesPerView: 1.4, spaceBetween: 30 },
            992: { slidesPerView: 3, spaceBetween: 30 }
            },
            grabCursor: true,
            loop: true,
            autoplay: { delay: 10000, disableOnInteraction: false }
        });

        new Swiper('.swiper-country-7', {
            slidesPerView: 1,
            spaceBetween: 20,
            autoHeight: true,
            navigation: {
            nextEl: '.swiper-country-7 .swiper-button-next',
            prevEl: '.swiper-country-7 .swiper-button-prev'
            },
            breakpoints: {
            0: { slidesPerView: 1.4, spaceBetween: 30 },
            576: { slidesPerView: 1.4, spaceBetween: 30 },
            768: { slidesPerView: 1.4, spaceBetween: 30 },
            992: { slidesPerView: 3, spaceBetween: 30 }
            },
            grabCursor: true,
            loop: true,
            autoplay: { delay: 10000, disableOnInteraction: false }
        });

        new Swiper('.swiper-country-8', {
            slidesPerView: 1,
            spaceBetween: 20,
            autoHeight: true,
            navigation: {
            nextEl: '.swiper-country-8 .swiper-button-next',
            prevEl: '.swiper-country-8 .swiper-button-prev'
            },
            breakpoints: {
            0: { slidesPerView: 1.4, spaceBetween: 30 },
            576: { slidesPerView: 1.4, spaceBetween: 30 },
            768: { slidesPerView: 1.4, spaceBetween: 30 },
            992: { slidesPerView: 3, spaceBetween: 30 }
            },
            grabCursor: true,
            loop: true,
            autoplay: { delay: 10000, disableOnInteraction: false }
        });

        new Swiper('.swiper-country-9', {
            slidesPerView: 1,
            spaceBetween: 20,
            autoHeight: true,
            navigation: {
            nextEl: '.swiper-country-9 .swiper-button-next',
            prevEl: '.swiper-country-9 .swiper-button-prev'
            },
            breakpoints: {
            0: { slidesPerView: 1.4, spaceBetween: 30 },
            576: { slidesPerView: 1.4, spaceBetween: 30 },
            768: { slidesPerView: 1.4, spaceBetween: 30 },
            992: { slidesPerView: 3, spaceBetween: 30 }
            },
            grabCursor: true,
            loop: true,
            autoplay: { delay: 10000, disableOnInteraction: false }
        });

        new Swiper('.swiper-country-10', {
            slidesPerView: 1,
            spaceBetween: 20,
            autoHeight: true,
            navigation: {
            nextEl: '.swiper-country-10 .swiper-button-next',
            prevEl: '.swiper-country-10 .swiper-button-prev'
            },
            breakpoints: {
            0: { slidesPerView: 1.4, spaceBetween: 30 },
            576: { slidesPerView: 1.4, spaceBetween: 30 },
            768: { slidesPerView: 1.4, spaceBetween: 30 },
            992: { slidesPerView: 3, spaceBetween: 30 }
            },
            grabCursor: true,
            loop: true,
            autoplay: { delay: 10000, disableOnInteraction: false }
        });

        new Swiper('.swiper-country-11', {
            slidesPerView: 1,
            spaceBetween: 20,
            autoHeight: true,
            navigation: {
            nextEl: '.swiper-country-11 .swiper-button-next',
            prevEl: '.swiper-country-11 .swiper-button-prev'
            },
            breakpoints: {
            0: { slidesPerView: 1.4, spaceBetween: 30 },
            576: { slidesPerView: 1.4, spaceBetween: 30 },
            768: { slidesPerView: 1.4, spaceBetween: 30 },
            992: { slidesPerView: 3, spaceBetween: 30 }
            },
            grabCursor: true,
            loop: true,
            autoplay: { delay: 10000, disableOnInteraction: false }
        });

        new Swiper('.swiper-country-12', {
            slidesPerView: 1,
            spaceBetween: 20,
            autoHeight: true,
            navigation: {
            nextEl: '.swiper-country-12 .swiper-button-next',
            prevEl: '.swiper-country-12 .swiper-button-prev'
            },
            breakpoints: {
            0: { slidesPerView: 1.4, spaceBetween: 30 },
            576: { slidesPerView: 1.4, spaceBetween: 30 },
            768: { slidesPerView: 1.4, spaceBetween: 30 },
            992: { slidesPerView: 3, spaceBetween: 30 }
            },
            grabCursor: true,
            loop: true,
            autoplay: { delay: 10000, disableOnInteraction: false }
        });

        new Swiper('.swiper-country-13', {
            slidesPerView: 1,
            spaceBetween: 20,
            autoHeight: true,
            navigation: {
            nextEl: '.swiper-country-13 .swiper-button-next',
            prevEl: '.swiper-country-13 .swiper-button-prev'
            },
            breakpoints: {
            0: { slidesPerView: 1.4, spaceBetween: 30 },
            576: { slidesPerView: 1.4, spaceBetween: 30 },
            768: { slidesPerView: 1.4, spaceBetween: 30 },
            992: { slidesPerView: 3, spaceBetween: 30 }
            },
            grabCursor: true,
            loop: true,
            autoplay: { delay: 10000, disableOnInteraction: false }
        });

        new Swiper('.swiper-country-14', {
            slidesPerView: 1,
            spaceBetween: 20,
            autoHeight: true,
            navigation: {
            nextEl: '.swiper-country-14 .swiper-button-next',
            prevEl: '.swiper-country-14 .swiper-button-prev'
            },
            breakpoints: {
            0: { slidesPerView: 1.4, spaceBetween: 30 },
            576: { slidesPerView: 1.4, spaceBetween: 30 },
            768: { slidesPerView: 1.4, spaceBetween: 30 },
            992: { slidesPerView: 3, spaceBetween: 30 }
            },
            grabCursor: true,
            loop: true,
            autoplay: { delay: 10000, disableOnInteraction: false }
        });

        new Swiper('.swiper-country-15', {
            slidesPerView: 1,
            spaceBetween: 20,
            autoHeight: true,
            navigation: {
            nextEl: '.swiper-country-15 .swiper-button-next',
            prevEl: '.swiper-country-15 .swiper-button-prev'
            },
            breakpoints: {
            0: { slidesPerView: 1.4, spaceBetween: 30 },
            576: { slidesPerView: 1.4, spaceBetween: 30 },
            768: { slidesPerView: 1.4, spaceBetween: 30 },
            992: { slidesPerView: 3, spaceBetween: 30 }
            },
            grabCursor: true,
            loop: true,
            autoplay: { delay: 10000, disableOnInteraction: false }
        });

    });
    JS;
    wp_add_inline_script('swiper-js', $inline_js);
}
add_action('wp_enqueue_scripts', 'enqueue_swiper_assets');
 

function khotwa_custom_translations($translated_text, $text, $domain) {
    $locale = determine_locale();

    $translations = [
        'fr_FR' => [
            'You May Also Like'                       => 'Vous aimerez aussi',
            'Categories:'                             => 'Catégories :',
            'Tags:'                                   => 'Étiquettes :',
            'Read More'                               => 'Lire la suite',
            '← Previous'                              => '← Article précédent',
            'Next →'                                  => 'Article suivant →',
            'Leave a Reply'                           => 'Laisser un commentaire',
            'Your email address will not be published.' => 'Votre adresse e-mail ne sera pas publiée.',
            'Post Comment'                            => 'Envoyer le commentaire',
            'Comment'                                 => 'Commentaire',
            'Name'                                    => 'Nom',
            'Email'                                   => 'E-mail',
        ],
        'ar' => [
            'You May Also Like'                       => 'قد يعجبك أيضًا',
            'Categories:'                             => 'التصنيفات:',
            'Tags:'                                   => 'الوسوم:',
            'Read More'                               => 'اقرأ المزيد',
            '← Previous'                              => '← المقال السابق',
            'Next →'                                  => 'المقال التالي →',
            'Leave a Reply'                           => 'اترك تعليقاً',
            'Your email address will not be published.' => 'لن يتم نشر عنوان بريدك الإلكتروني.',
            'Post Comment'                            => 'أضف التعليق',
            'Comment'                                 => 'تعليق',
            'Name'                                    => 'الاسم',
            'Email'                                   => 'البريد الإلكتروني',
        ],
        'en_US' => [
            'You May Also Like'                       => 'You May Also Like',
            'Categories:'                             => 'Categories:',
            'Tags:'                                   => 'Tags:',
            'Read More'                               => 'Read More',
            '← Previous'                              => '← Previous',
            'Next →'                                  => 'Next →',
            'Leave a Reply'                           => 'Leave a Reply',
            'Your email address will not be published.' => 'Your email address will not be published.',
            'Post Comment'                            => 'Post Comment',
            'Comment'                                 => 'Comment',
            'Name'                                    => 'Name',
            'Email'                                   => 'Email',
        ],
    ];

    if (isset($translations[$locale][$text])) {
        return $translations[$locale][$text];
    }

    return $translated_text;
}
add_filter('gettext', 'khotwa_custom_translations', 20, 3);


if( function_exists('acf_add_options_page') ) {
    acf_add_options_page([
        'page_title' => 'Options du site',
        'menu_title' => 'Options',
        'menu_slug'  => 'site-options',
        'capability' => 'edit_posts',
        'redirect'   => false
    ]);
}
