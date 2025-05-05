<?php
/**
 * Functions file for Khotwa theme
 */

/**
 * Theme setup: menus, logos, featured images, etc.
 */
function khotwa_theme_setup() {
    // Support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Support for featured images
    add_theme_support('post-thumbnails');

    // Register a main menu
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'khotwa')
    ));
}
add_action('after_setup_theme', 'khotwa_theme_setup');

/**
 * Enqueue styles and scripts
 */
function khotwa_enqueue_assets() {
    $is_rtl = is_rtl();

    if ($is_rtl) {
        wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css');
    } else {
        wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
    }
    wp_enqueue_style('fonts-style', get_template_directory_uri() . '/assets/fonts/stylesheet.css', array(), null);
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css', array(), '1.10.5');
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/custom.css', array('main-style', 'bootstrap-css'), null);
    wp_enqueue_style('responsive-style', get_template_directory_uri() . '/assets/css/responsive.css', array('main-style', 'bootstrap-css', 'custom-style'), null);

    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', array(), null, true);
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/custom.js', array('swiper-js'), null, true);
}
add_action('wp_enqueue_scripts', 'khotwa_enqueue_assets');

function enqueue_aos_assets() {
    // CSS
    wp_enqueue_style('aos-css', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css');

    // JS AOS (dépendance à jQuery ici si besoin)
    wp_enqueue_script('aos-js', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_aos_assets');


// Charger le fichier WP_Bootstrap_Navwalker
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';


function khotwa_load_textdomain() {
    load_theme_textdomain('khotwa', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'khotwa_load_textdomain');

/**
 * Register ACF options page
 */

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => __('Theme Options', 'khotwa'),
        'menu_title'    => __('Theme Options', 'khotwa'),
        'menu_slug'     => 'theme-options',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'position'      => 2,
        'icon_url'      => 'dashicons-admin-generic',
    ));
}

add_action('init', function() {
    $test = get_field('footer_social_title', 'option');
    error_log('footer_social_title from init: ' . $test);
});



function khotwa_wpforms_custom_validation_messages( $strings ) {
    if ( function_exists('pll_current_language') ) {
        $lang = pll_current_language();
    } else {
        $lang = 'fr'; // fallback langue
    }

    if ( $lang === 'fr' ) {
        $strings['val_required'] = 'Ce champ est obligatoire.';
        $strings['val_email'] = 'Veuillez entrer une adresse email valide.';
        $strings['val_url'] = 'Veuillez entrer une URL valide.';
        $strings['val_phone'] = 'Veuillez entrer un numéro de téléphone valide.';
        $strings['val_confirm'] = 'Les champs ne correspondent pas.';
        $strings['val_captcha'] = 'Erreur de vérification Captcha.';
    } elseif ( $lang === 'ar' ) {
        $strings['val_required'] = 'هذا الحقل إجباري.';
        $strings['val_email'] = 'يرجى إدخال بريد إلكتروني صالح.';
        $strings['val_url'] = 'يرجى إدخال عنوان رابط صحيح.';
        $strings['val_phone'] = 'يرجى إدخال رقم هاتف صحيح.';
        $strings['val_confirm'] = 'الحقلان غير متطابقين.';
        $strings['val_captcha'] = 'فشل التحقق من الكابتشا.';
    } elseif ( $lang === 'en' ) {
        $strings['val_required'] = 'This field is required.';
        $strings['val_email'] = 'Please enter a valid email address.';
        $strings['val_url'] = 'Please enter a valid URL.';
        $strings['val_phone'] = 'Please enter a valid phone number.';
        $strings['val_confirm'] = 'Fields do not match.';
        $strings['val_captcha'] = 'Captcha verification failed.';
    }

    return $strings;
}
add_filter( 'wpforms_frontend_strings', 'khotwa_wpforms_custom_validation_messages' );


if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Options du site',
        'menu_title' => 'Options du site',
        'menu_slug'  => 'site-options',
        'capability' => 'edit_posts',
        'redirect'   => false
    ]);
}

function get_footer_field_translated($field_name) {
    $locale = get_locale(); // ex: fr_FR, ar, en_US
    $lang_code = substr($locale, 0, 2); // fr, ar, en

    $translated_field = $field_name . '_' . $lang_code;

    // Si le champ traduit existe et a une valeur
    $value = get_field($translated_field, 'option');
    if ($value) return $value;

    // Fallback : champ par défaut (non traduit)
    return get_field($field_name, 'option');
}

