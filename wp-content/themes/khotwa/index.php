<?php

/**
 * Template Name: Index Template
 * Description: A page template for Home pages, displaying ACF fields (banner, etc.)
 */

get_header(); // Récupère le header.php du thème
?>


<?php
// Affiche chaque section si elle est configurée dans ACF
get_template_part('template-parts/home/flags_home');
get_template_part('template-parts/home/process_home');
get_template_part('template-parts/home/testimonial_home');
get_template_part('template-parts/home/consultation_home');
get_template_part('template-parts/home/study_countries_home');
get_template_part('template-parts/home/reviews_home');
?>


<?php
get_footer(); // Récupère le footer.php du thème
?>