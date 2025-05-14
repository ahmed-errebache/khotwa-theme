<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php
    /**
     * The template for displaying the header
     *
     * @package Khotwa
     * @since 1.0.0
     */

    // Vérification si ACF est installé
    if (!function_exists('get_field')) return;

    // $header_background_color = get_field('header_background_color');
    $cta_button_text         = get_field('cta_button_text') ?: 'استشارة مجانية';
    $cta_button_color        = get_field('cta_button_color') ?: '#ffffff';
    $cta_button_bgcolor      = get_field('cta_button_bgcolor') ?: '#b9131f';
    $cta_button_hover_color  = get_field('cta_button_hover_color') ?: '#ffffff';
    $cta_button_hover_bgcolor = get_field('cta_button_hover_bgcolor') ?: '#ff4d4d';
    $banner_country_page    = get_field('banner_country_page');
    $banner_contact_section = get_field('banner_contact_section');
    $banner_blog_page = get_field('banner_blog_page');
    $banner_service_section = get_field('banner_service_section');


    // Détection automatique de la direction (RTL / LTR)
    $is_rtl           = is_rtl();
    $current_language = substr(get_locale(), 0, 2);
    $direction_class  = ($is_rtl && $current_language === 'ar') ? 'rtl' : 'ltr';
    ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <?php wp_head(); ?>

    <style>
        
        /* ------------------------------
           CTA BUTTON
        ------------------------------ */
        .cta-button {
            background-color: <?php echo esc_attr($cta_button_bgcolor); ?>;
            color: <?php echo esc_attr($cta_button_color); ?>;
        }

        .cta-button:hover {
            background-color: <?php echo esc_attr($cta_button_hover_bgcolor); ?>;
            color: <?php echo esc_attr($cta_button_hover_color); ?>;
        }
    </style>
    <?php get_template_part('template-parts/common/button_settings'); ?>
</head>

<body <?php body_class(); ?>>
    <div class="wrapper">
        <!-- BANNER SECTION -->
        <section class="banner_section <?php echo $banner_country_page ? 'banner_country_section' : ''; ?><?php echo $banner_contact_section ? 'banner_contact_section' : ''; ?><?php echo $banner_blog_page ? 'banner_blog_page' : ''; ?> <?php echo $banner_service_section ? 'banner_service_section' : ''; ?>">
            <!-- HEADER -->
            <header class="header <?php echo $direction_class; ?>">
                <div class="navbar-container">
                    <div class="mobile">
                        <?php get_template_part('template-parts/common/select_language'); ?>
                    </div>
                    <!-- LOGO -->
                    <div class="navbar-brand">
                        <?php if (has_custom_logo()) : ?>
                            <?php the_custom_logo(); ?>
                        <?php else : ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <h1><?php bloginfo('name'); ?></h1>
                            </a>
                        <?php endif; ?>
                    </div>

                    <!-- BOUTON BURGER (mobile) -->
                    <button class="menu-toggle" aria-label="Toggle navigation">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/menu_icon.png" alt="Icône du menu">
                    </button>

                    <!-- MENU NAVBAR -->
                    <div class="navbar-collapse">
                        <button id="closeMenu" type="button">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/close.png" alt="Icône close">
                        </button>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'main-menu',
                            'container'      => false,
                            'menu_class'     => 'navbar-menu',
                            'fallback_cb'    => false,
                            'walker'         => new Walker_Nav_Menu(),
                        ));
                        ?>

                        <div class="mobile social_contact mt-5">
                           <?php get_template_part('template-parts/common/social_contact'); ?> 
                        </div>
                    </div>
                    <div class="desktop">
                        <?php get_template_part('template-parts/common/select_language'); ?>
                    </div>
                    <!-- Bouton CTA pour desktop -->
                    <button class="cta-button desktop">
                        <?php echo esc_html($cta_button_text); ?>
                    </button>
                </div>
            </header>

        